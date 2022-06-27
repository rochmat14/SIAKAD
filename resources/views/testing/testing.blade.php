<head>
    <style>
        label.error {
            color: #dc3545;
            font-size: 14px;
        }

    </style>
</head>
@extends('layouts.app')
@section('content')
    {{-- <form id="postForm" action="/go">
        <div>Minimum of 10 characters</div>
        <textarea id="description" rows="10" cols="50" name="description"></textarea>
        <button>Simpan</button> --}}
    </form>
    

    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $("#postForm").validate({
                rules: {
                    description: {
                        required: true,
                        minlength: 10
                    }
                },
                onfocusout: function(element) {
                    this.element(element); // triggers validation
                },
                onkeyup: function(element, event) {
                    this.element(element); // triggers validation
                },
                messages: {
                    description: {
                        required: "Please enter your description",
                        minlength: "Description requires at least 10 characters"
                    }
                },
                errorElement: "div"
            });
        });
    </script> --}}

    {{-- =========================================================================================================== --}}

    <form action="{{url('/testing')}}" method="POST" autocomplete="off" id="add_people_form">
        @csrf
        <input type="hidden" id="counter" value="1">
        <div class="record">
            <input type="text" placeholder="Name" name="name[1]" class="name_input">
            <input type="email" name="email_' + 0 +'" placeholder="Email" class="email_input">
        </div>
        <div class="record">
            <input type="text" placeholder="Name" name="name[2]" class="name_input">
            <input type="email" name="email_' + 1 +'" placeholder="Email" class="email_input">
        </div>
        <button type="button" id="add_fields">+</button>
        <div id="add_people_div"></div>
        <button type="submit">Submit</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#add_fields').click(function() {
                add_inputs()
            });

            $(document).on('click', '.remove_fields', function() {
                $(this).closest('.record').remove();
            });

            function add_inputs() {
                var counter = parseInt($('#counter').val());

                var html = '<div class="record"><input type="text" placeholder="Name" name="name_' + counter +
                    '" class="name_input"><input type="email" name="email_' + counter +
                    '" placeholder="Email" class="email_input"><button type="button" class="remove_fields">-</button></div>';

                $('#add_people_div').append(html);
                $('#counter').val(counter + 1);
            }
        });

        
        $('form#add_people_form').on('submit', function(event) {
            //Add validation rule for dynamically generated name fields
            $('.name_input').each(function() {
                $(this).rules("add", {
                    required: true,
                    messages: {
                        required: "Nama harus di isi",
                    }
                });
            });
            //Add validation rule for dynamically generated email fields
            $('.email_input').each(function() {
                $(this).rules("add", {
                    required: true,
                    email: true,
                    messages: {
                        required: "Email harus di isi",
                        email: "Bukan tipe email",
                    }
                });
            });
        });
        $("#add_people_form").validate();
    </script>

    {{-- ======================================================= --}}
    
@endsection
