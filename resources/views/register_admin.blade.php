<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <style>
        body {
            background-image: url("images/ujian.jpg");
            background-size: cover;
        }

        .card {
            box-shadow: 0px 0px 26px 3px #68B0AB;
            background: -webkit-linear-gradient(bottom, #68B0AB, wheat);
        }
    </style>
    <title>SIAKAD</title>
</head>
<body>
    <main>
        <div class="content">
            <article>
                <section class="d-flex justify-content-center container">
                    <div class="card card-register-admin">
                        <div class="text-center">
                            <img src="{{ url('images/pendidikan.png') }}" width="82px" class="mt-3">
                        </div>

                        <div class="card-body">
                            <form method="POST" action="/register-admin">
                                <div class="form-group">
                                    <label for="name" class="label-form-login">Nama</label>
                                    <input type="text" name="name" class="col-md-12 input-form-login" >
                                    <span class="text-danger">{{ ($errors->has('name')) ? $errors->first('name'): '' }}</span>
                                </div>
                            
                                <div class="form-group">
                                    <label for="username" class="label-form-login">Username</label>
                                    <input type="text" name="username" class="col-md-12 input-form-login">
                                    <span class="text-danger">{{ ($errors->has('username')) ? $errors->first('username'): '' }}</span>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="label-form-login">Password</label>
                                    <div class="input-group">
                                        <input id="cpassword" type="password" name="password" class="input-form-login" style="width: 75%">
                                        <div class="input-group-append">
                                            <span id="showpaswd" style="cursor: pointer" class="text-primary">Tampilkan</span>
                                        </div>
                                    </div>
                                    <span class="text-danger">{{ ($errors->has('password')) ? $errors->first('password'): '' }}</span>
                                </div>

                                <br>
                                
                                @if (session('message'))
                                    <div class="alert alert-danger">{{ session('message') }}</div>
                                @endif
                                
                                <div class="form-group">
                                    @csrf
                                    <input type="hidden" name="_method" value="POST">
                                    
                                    <button type="submit" class="btn-login col-md-12">REGISTER</button>
                                </div>

                                <a href="/" class="text-white">Login</a>
                            </form>
                        </div>
                    </div>
                </section>
            </article>
        </div>
    </main>

    <script src="{{ asset('js/show-and-hide-password.js') }}"></script>
</body>
</html>