<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ site_name() }} | Forgot Password</title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
      <!-- icheck bootstrap -->
      <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
      <!-- Theme style -->
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
               <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
               <form id="forgotPasswordForm" method="post">
                  <div class="input-group mb-3">
                     <input type="email" name="email" class="form-control" placeholder="Email" required>
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-envelope"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Request new password</button>
                     </div>
                  </div>
               </form>
               <p class="mt-3 mb-1">
                  <a href="{{ url('admin/login') }}">Login</a>
               </p>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
      <!-- Bootstrap 4 -->
      <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <!-- AdminLTE App -->
      <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
      <!-- jQuery Validation -->
      <script src="{{ asset('admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
      <script>
         $(document).ready(function () {
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
             });
         
             $("#forgotPasswordForm").validate({
                 errorElement: 'span',
                 errorPlacement: function (error, element) {
                     error.addClass('invalid-feedback');
                     element.closest('.input-group').append(error);
                 },
                 highlight: function (element) {
                     $(element).addClass('is-invalid');
                 },
                 unhighlight: function (element) {
                     $(element).removeClass('is-invalid');
                 },
                 submitHandler: function(form) {
                     let data = $(form).serialize();
                     $.ajax({
                         url: "{{ url('admin.api.forgot-password') }}",
                         method: "POST",
                         data: data,
                         success: function(response) {
                             if(response.status){
                                 alert(response.message);
                                 $('#forgotPasswordForm')[0].reset();
                             } else {
                                 alert(response.message);
                             }
                         },
                         error: function(xhr) {
                             let err = xhr.responseJSON;
                             if(err && err.message){
                                 alert(err.message);
                             } else {
                                 alert('Something went wrong!');
                             }
                         }
                     });
                     return false;
                 }
             });
         });
      </script>
   </body>
</html>