<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ site_name() }} | Recover Password</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="{{ url('admin') }}" class="h2"><b>{{ site_name() }}</b></a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Recover your password</p>

                    <form id="recoverPasswordForm" method="post">
                        @csrf

                        @if(empty($token))
                            <!-- OTP flow -->
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="otp" class="form-control" placeholder="Enter 6-digit OTP" required>
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-key"></span></div>
                                </div>
                            </div>
                        @else
                            <!-- Token link flow -->
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                                </div>
                            </div>
                        @endif

                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="New Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-lock"></span></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Change Password</button>
                            </div>
                        </div>
                    </form>

                    <p class="mt-3 mb-1">
                        <a href="{{ url('admin/login') }}">Login</a>
                    </p>

                </div>
            </div>
        </div>

        <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

        <script>
        $(document).ready(function () {

            $("#recoverPasswordForm").validate({
                rules: {
                    email: { required: true, email: true },
                    otp: { required: function() { return $('input[name="token"]').length == 0; }, digits: true, minlength: 6, maxlength: 6 },
                    password: { required: true, minlength: 6 },
                    password_confirmation: { required: true, equalTo: "[name='password']" }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                },
                highlight: function(element) { $(element).addClass('is-invalid'); },
                unhighlight: function(element) { $(element).removeClass('is-invalid'); },
                submitHandler: function(form) {
                    $.ajax({
                        url: "{{ url('api/admin/recover-password') }}",
                        method: "POST",
                        data: $(form).serialize(),
                        success: function(response) {
                            if(response.status){
                                alert(response.message);
                                $('#recoverPasswordForm')[0].reset();
                                window.location.href = "{{ url('admin/login') }}";
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function(xhr) {
                            let err = xhr.responseJSON;
                            if(err && err.message) alert(err.message);
                            else alert('Something went wrong!');
                        }
                    });
                    return false;
                }
            });

        });
        </script>
    </body>
</html>