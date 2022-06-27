{{-- <head>
    <title>Form Validation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <script type="text/jaavascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="scripts.js"></script>

    <style>
        #contact label {
            display: inline-block;
            width: 100px;
            text-align: right;
        }

        #contact_submit {
            padding-left: 100px;
        }

        #contact div {
            margin-top: 1em;
        }

        textarea {
            vertical-align: top;
            height: 5em;
        }

        /*-----------ERROR CSS -----------------*/
        .error {
            display: none;
            margin-left: 10px;
        }

        .error_show {
            color: red;
            margin-left: 10px;
        }

        /*-----------REAL TIME VALIDATION-----------------*/

        input.invalid,
        textarea.invalid {
            border: 2px solid red;
        }

        input.valid,
        textarea.valid {
            border: 2px solid green;
        }

    </style>
</head>

<body>
    <form id="contact" method="post" action="">
        <!-- Name -->
        <div>
            <label for="contact_name">Name:</label>
            <input type="text" id="contact_name" name="name">
            <span class="error">This field is required</span>
        </div>
        <!-- Email -->
        <div>
            <label for="contact_email">Email:</label>
            <input type="email" id="contact_email" name="email">
            <span class="error">A valid email address is required</span>
        </div>
        <!--Website -->
        <div>
            <label for="contact_website">Website:</label>
            <input type="url" id="contact_website" name="website">
            <span class="error">A valid url is required</span>
        </div>
        <!-- Message -->
        <div>
            <label for="contact_message">Message:</label>
            <textarea id="contact_message" name="message"></textarea>
            <span class="error">This field is required</span>
        </div>
        <!-- Submit Button -->
        <div id="contact_submit">
            <button type="submit">Submit</button>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            //Detect that a user has started entering their name itno the name input
            // Name can't be blank
            $('#contact_name').on('input', function() {
                var input = $(this);
                var is_name = input.val();
                if (is_name) {
                    input.removeClass("invalid").addClass("valid");
                } else {
                    input.removeClass("valid").addClass("invalid");
                }
            });

            // Email must be an email
            $('#contact_email').on('input', function() {
                var input = $(this);
                var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                var is_email = re.test(input.val());
                if (is_email) {
                    input.removeClass("invalid").addClass("valid");
                } else {
                    input.removeClass("valid").addClass("invalid");
                }
            });
            // Website must be a website
            $('#contact_website').on('input', function() {
                var input = $(this);
                if (input.val().substring(0, 4) == 'www.') {
                    input.val('http://www.' + input.val().substring(4));
                }
                var re = /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&:\/~+#-]*[\w@?^=%&\/~+#-])?/;
                var is_url = re.test(input.val());
                if (is_url) {
                    input.removeClass("invalid").addClass("valid");
                } else {
                    input.removeClass("valid").addClass("invalid");
                }
            });
            // Message can't be blank
            $('#contact_message').keyup(function(event) {
                var input = $(this);
                var message = $(this).val();
                console.log(message);
                if (message) {
                    input.removeClass("invalid").addClass("valid");
                } else {
                    input.removeClass("valid").addClass("invalid");
                }
            });
            // After Form Submitted Validation
            $("#contact_submit button").click(function(event) {
                var form_data = $("#contact").serializeArray();
                var error_free = true;
                for (var input in form_data) {
                    var element = $("#contact_" + form_data[input]['name']);
                    var valid = element.hasClass("valid");
                    var error_element = $("span", element.parent());
                    if (!valid) {
                        error_element.removeClass("error").addClass("error_show");
                        error_free = false;
                    } else {
                        error_element.removeClass("error_show").addClass("error");
                    }
                }
                if (!error_free) {
                    event.preventDefault();
                } else {
                    alert('No errors: Form will be submitted');
                }
            });
        });
    </script>


    <form>
        <input id="customer" name="first-input" type="text">
        <input id="customerCost" name="second-input" type="text">
        <input id="custNameNext" type="submit" value="Submit" disabled="disabled">
    </form>
    
    <script>
        $(document).ready(function() {
            $('#custNameNext').prop('disabled', true);

            function validateNextButton() {
                var buttonDisabled = $('#customer').val().trim() === '' || $('#customerCost').val().trim() === '';
                $('#custNameNext').prop('disabled', buttonDisabled);
            }

            $('#customer').on('keyup', validateNextButton);
            $('#customerCost').on('keyup', validateNextButton);
        });
    </script> --}}


<!doctype html>
<html lang="en">

<head>
    <title>User Registration | Form Validation Using jQuery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        label.error {
            color: #dc3545;
            font-size: 14px;
        }

    </style>
</head>

<body>
    <div class="container pt-3">
        <form action="{{ url('register-user') }}" method="POST" autocomplete="off" id="regForm">
            @csrf
            <div class="row">
                <div class="col-xl-8 m-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4 class="text-center font-weight-bold"> Form Validation Using jQuery Validator </h4>
                        </div>

                        <div class="card-body pl-4 pr-4">

                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @elseif(Session::has('failed'))
                                {{ Session::get('failed') }}
                            @endif

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="firstName"> First Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="firstName" id="firstName" class="form-control"
                                            placeholder="First Name">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="lastName"> Last Name <span class="text-danger">*</span> </label>
                                        <input type="text" name="lastName" id="lastName" class="form-control"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="email"> Email <span class="text-danger">*</span> </label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="phone"> Phone <span class="text-danger">*</span> </label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            placeholder="Phone">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="password"> Password <span class="text-danger">*</span> </label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Password">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="confirmPassword"> Confirm Password <span
                                                class="text-danger">*</span> </label>
                                        <input type="password" name="confirmPassword" id="confirmPassword"
                                            class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="gender"> Gender <span class="text-danger">*</span> </label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option selected value="" disabled>Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="dateOfBirth"> Date of Birth <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" name="dateOfBirth" id="dateOfBirth" class="form-control"
                                            placeholder="Date of Birth">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="address"> Address <span class="text-danger">*</span></label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            placeholder="Address">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="city"> City <span class="text-danger">*</span></label>
                                        <input type="text" name="city" id="city" class="form-control"
                                            placeholder="City">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="state"> State <span class="text-danger">*</span> </label>
                                        <input type="text" name="state" id="state" class="form-control"
                                            placeholder="State">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="zipcode"> Zip Code <span class="text-danger">*</span></label>
                                        <input type="text" name="zipcode" id="zipcode" class="form-control"
                                            placeholder="Zip Code">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6 offset-lg-6 text-right">
                                    <button type="submit" class="btn btn-success"> Create your account </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#regForm").validate({
                rules: {
                    firstName: {
                        required: true,
                        maxlength: 20,
                    },
                    lastName: {
                        required: true,
                        maxlength: 20,
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 50
                    },
                    phone: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        number: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirmPassword: {
                        required: true,
                        equalTo: "#password"
                    },
                    gender: {
                        required: true,
                    },
                    dateOfBirth: {
                        required: true,
                        date: true
                    },
                    address: {
                        required: true,
                        maxlength: 50
                    },
                    city: {
                        required: true,
                        maxlength: 40
                    },
                    state: {
                        required: true,
                        maxlength: 40
                    },
                    zipcode: {
                        required: true,
                        minlength: 6,
                        maxlength: 6
                    }
                },
                messages: {
                    firstName: {
                        required: "First name is required",
                        maxlength: "First name cannot be more than 20 characters"
                    },
                    lastName: {
                        required: "Last name is required",
                        maxlength: "Last name cannot be more than 20 characters"
                    },
                    email: {
                        required: "Email is required",
                        email: "Email must be a valid email address",
                        maxlength: "Email cannot be more than 50 characters",
                    },
                    phone: {
                        required: "Phone number is required",
                        minlength: "Phone number must be of 10 digits"
                    },
                    password: {
                        required: "Password is required",
                        minlength: "Password must be at least 5 characters"
                    },
                    confirmPassword: {
                        required: "Confirm password is required",
                        equalTo: "Password and confirm password should same"
                    },
                    gender: {
                        required: "Please select the gender",
                    },
                    dateOfBirth: {
                        required: "Date of birth is required",
                        date: "Date of birth should be a valid date"
                    },
                    address: {
                        required: "Address is required",
                        maxlength: "Address cannot not be more than 50 characters"
                    },
                    city: {
                        required: "City is required",
                        maxlength: "City cannot be more than 40 characters"
                    },
                    state: {
                        required: "State is required",
                        maxlength: "City cannot be more than 40 characters"
                    },
                    zipcode: {
                        required: "Zipcode is required",
                        minlength: "Zipcode must be of 6 digits",
                        maxlength: "Zipcode cannot be more than 6 digits"
                    }
                }
            });
        });
    </script>
</body>

</html>
