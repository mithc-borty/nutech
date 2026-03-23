<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>{{ site_name() }} | Log in</title>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
   <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
   <link rel="stylesheet" href="{{ asset('admin/dist/css/style.css') }}">
</head>
<body class="hold-transition login-page">

<div class="login-box">
   <div class="card card-outline card-primary">
      <div class="card-header text-center">
         <a href="{{ url('admin') }}" class="h2"><b>{{ site_name() }}</b></a>
      </div>
      <div class="card-body">
         <p class="login-box-msg">Sign in to start your session</p>
         <form id="loginForm" method="post">
            <div class="input-group mb-3">
               <input type="email" name="email" class="form-control" placeholder="Email" required>
               <div class="input-group-append">
                  <div class="input-group-text"><span class="fas fa-envelope"></span></div>
               </div>
            </div>
            <div class="input-group mb-3">
               <input type="password" name="password" class="form-control" placeholder="Password" required>
               <div class="input-group-append">
                  <div class="input-group-text"><span class="fas fa-lock"></span></div>
               </div>
            </div>
            <div class="row">
               <div class="col-8">
                  <div class="icheck-primary">
                     <input type="checkbox" id="remember" name="remember">
                     <label for="remember">Remember Me</label>
                  </div>
               </div>
               <div class="col-4">
                  @csrf
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
               </div>
            </div>
         </form>
         <p class="mb-1">
            <a href="{{ url('admin/forgot-password') }}">I forgot my password</a>
         </p>
      </div>
   </div>
</div>

<div id="toastContainer"></div>

<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin/dist/js/common.js') }}"></script>

<script>
$(document).ready(function () {

    $("#loginForm").validate({
      errorElement: 'span',
      errorPlacement: function(error, element) {
         error.addClass('invalid-feedback');
         element.closest('.input-group').append(error);
      },
      highlight: function(element) { $(element).addClass('is-invalid'); },
      unhighlight: function(element) { $(element).removeClass('is-invalid'); },
      submitHandler: function(form) {
         let data = $(form).serializeArray().filter(d => d.name !== 'remember');
         data.push({ name: 'remember', value: $('#remember').is(':checked') ? '1' : '0' });

         $.ajax({
               url: "{{ url('api/admin/login') }}",
               method: "POST",
               data: $.param(data),
               success: function(response) {
                  if(response.status) {
                     showMessage('success', response.message);
                     setTimeout(() => window.location.href = "{{ url('admin') }}", 1000);
                  } else {
                     showMessage('error', response.message);
                  }
               },
               error: function(xhr) {
                  let err = xhr.responseJSON;
                  if(err && err.message) showMessage('error', err.message);
                  else showMessage('error', 'Something went wrong!');
               }
         });
         return false;
      }
   });

});
</script>
</body>
</html>