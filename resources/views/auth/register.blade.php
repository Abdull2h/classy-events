<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Registration - Classy Events</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <style>
        body {
            background-image: radial-gradient(circle at center center, rgba(217, 217, 217, 0.05) 0%, rgba(217, 217, 217, 0.05) 15%, rgba(197, 197, 197, 0.05) 15%, rgba(197, 197, 197, 0.05) 34%, rgba(178, 178, 178, 0.05) 34%, rgba(178, 178, 178, 0.05) 51%, rgba(237, 237, 237, 0.05) 51%, rgba(237, 237, 237, 0.05) 75%, rgba(138, 138, 138, 0.05) 75%, rgba(138, 138, 138, 0.05) 89%, rgba(158, 158, 158, 0.05) 89%, rgba(158, 158, 158, 0.05) 100%), radial-gradient(circle at center center, rgb(255, 255, 255) 0%, rgb(255, 255, 255) 6%, rgb(255, 255, 255) 6%, rgb(255, 255, 255) 12%, rgb(255, 255, 255) 12%, rgb(255, 255, 255) 31%, rgb(255, 255, 255) 31%, rgb(255, 255, 255) 92%, rgb(255, 255, 255) 92%, rgb(255, 255, 255) 97%, rgb(255, 255, 255) 97%, rgb(255, 255, 255) 100%);
            background-size: 42px 42px;
            font-family: 'Ubuntu', sans-serif;
        }

        .form-control {
            border-color: #eee;
            min-height: 41px;
            box-shadow: none !important;
        }

        .form-control:focus {
            border-color: #2890ac;
        }

        .form-control,
        .btn {
            border-radius: 3px;
        }

        .signup-form {
            width: 500px;
            margin: 0 auto;
            padding: 30px 0;
        }

        .signup-form h2 {
            color: #333;
            margin: 0 0 30px 0;
            display: inline-block;
            padding: 0 30px 10px 0;
            border-bottom: 3px solid #2890ac;
        }

        .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .signup-form .form-group row {
            margin-bottom: 20px;
        }

        .signup-form label {
            font-weight: normal;
            font-size: 14px;
            line-height: 2;
        }

        .signup-form input[type="checkbox"] {
            position: relative;
            top: 1px;
        }

        .signup-form .btn {
            font-size: 16px;
            font-weight: bold;
            background: #2890ac;
            border: none;
            margin-top: 20px;
            min-width: 140px;
        }

        .signup-form .btn:hover,
        .signup-form .btn:focus {
            background: #2890ac;
            outline: none !important;
        }

        .signup-form a {
            color: #2890ac;
            text-decoration: underline;
        }

        .signup-form a:hover {
            text-decoration: none;
        }

        .signup-form form a {
            color: #2890ac;
            text-decoration: none;
        }

        .signup-form form a:hover {
            text-decoration: underline;
        }

    </style>
</head>

<body>
    <div class="signup-form">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <div class="col-8 offset-4">
                    <h2>{{ __('Register') }}</h2>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-4" for="role">Sign As</label>
                <div class="col-8">
                    <select dusk='role' class="form-control form-select rounded-pill px-4" size="4" name="role"
                        required>
                        <option disabled>Select one</option>
                        <option dusk="admin" value="admin">Admin</option>
                        <option dusk="host" value="host">Host</option>
                        <option dusk="doorman" value="doorman">Doorman</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-4" for="name">{{ __('Name') }}</label>
                <div class="col-8">
                    <input id="name" type="text" class="form-control rounded-pill @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-4" for="email">{{ __('E-Mail Address') }}</label>
                <div class="col-8">
                    <input id="email" type="email"
                        class="form-control rounded-pill @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-4">{{ __('Password') }}</label>
                <div class="col-8">
                    <input id="password" type="password"
                        class="form-control rounded-pill @error('password') is-invalid @enderror" name="password"
                        required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-4">{{ __('Confirm Password') }}</label>
                <div class="col-8">
                    <input id="password-confirm" type="password" class="form-control rounded-pill"
                        name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-8 offset-4">
                    <p><label class="form-check-label"><input name="cb" type="checkbox" required="required"> I accept
                            the Terms
                            &amp;
                            Privacy Policy.</label></p>
                    <button type="submit" class="btn btn-primary rounded-pill">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
        <div class="text-center">Already have an account? <a href="/login">Login here</a></div>
    </div>
</body>

</html>
