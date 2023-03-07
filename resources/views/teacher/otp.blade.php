<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Forgot Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=asset('assets/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=asset('assets/dist/css/adminlte.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form id="register_otp_form" name="register_otp_form" action="<?=url('/check-otp/'.encrypt($result['id']))?>" method="post">
          @csrf
          <div class="input-group mb-3">
              <input type="email" class="form-control" name="email" placeholder="Email" value="<?=$result['usr_email']?>" readonly>
              <div class="input-group-append">
                  <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                  </div>
              </div>
          </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="OTP" maxlength="6" name="otp">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-key"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1 text-right">
        <a href="login.html">Re-send OTP</a>
      </p>
      {{--<p class="mb-0">--}}
        {{--<a href="register.html" class="text-center">Register a new membership</a>--}}
      {{--</p>--}}
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=asset('assets/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=asset('assets/dist/js/adminlte.min.js')?>"></script>
<script src="<?=asset('assets/plugins/jquery-validation/jquery.validate.min.js')?>"></script>
<script src="<?=asset('assets/plugins/jquery-validation/additional-methods.min.js')?>"></script>
<script>
    $('#register_otp_form').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            otp:{
                required: true,
                maxlength:6,
                minlength: 6,
            }

        },
        messages: {
            email: {
                required: "Please enter a email address",
                email: "Please enter a vaild email address"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group,.input-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function () {
            form.submit();
        }
    });

</script>
</body>
</html>
