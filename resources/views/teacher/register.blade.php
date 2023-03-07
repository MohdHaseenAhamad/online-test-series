<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=asset('assets/plugins/fontawesome-free/css/all.min.css')?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=asset('assets/plugins/select2/css/select2.min.css')?>">
    <link rel="stylesheet" href="<?=asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')?>">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?=asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=asset('assets/dist/css/adminlte.min.css')?>">

    <link rel="stylesheet" href="<?=asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .ps-required {
            float: left;
            width: 100%;
            margin: 0 0 10px;
        }
        .ps-required .tddiv {
            float: left;
            line-height: 1.2em;
            padding: 0 5px 3px 0;
        }
        .ps-required .tddiv span.success {
            color: #096;
            background: #e6edeb;
        }

    </style>

</head>

<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new Teacher</p>
            {{--<div class="row">--}}
            <form id="register_teacher_form1" name="register_teacher_form" action="<?=url('/save')?>" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <label>Enter Your Full name</label>
                        <div class="input-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Full name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <label>Enter Your Contact No.</label>
                        <div class="input-group mb-3">

                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone"
                                   maxlength="10">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <label>Enter your Email</label>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">

                        <div class="form-group">
                            <label>Select Gender</label>
                            <select class="form-control select2" name="gender" style="width: 100%;">
                                <option value="">Select</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Other</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <label>Enter your Institute Name</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="institute_name" placeholder="Institute Name">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-university"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">

                        <div class="form-group">
                            <label>Select Country</label>
                            <select class="form-control select2" name="country" id="country" style="width: 100%;">
                                <option value="">Select</option>
                                <?php foreach ($countries as $cnt)
                                    {
                                        ?>
                                <option value="<?=$cnt->id?>"><?=$cnt->name?></option>
<?php
                                    }?>



                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">

                        <div class="form-group">
                            <label>Select State</label>
                            <select class="form-control select2" name="state" id="state" style="width: 100%;">
                                <option value="">Select</option>


                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">

                        <div class="form-group">
                            <label>Select City</label>
                            <select class="form-control select2" name="city" id="city" style="width: 100%;">
                                <option value="">Select</option>


                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <label>Enter your Address</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="address" placeholder="Address"
                                   maxlength="100">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-map-marked"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <label>Enter your Password</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" id="password"
                                   placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-eye toggle-password"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                        <div class="ps-required">
                            <div class="tddiv"><span class="failure char">8 - 20 Characters</span></div>
                            <div class="tddiv dash"><span class="failure char"><span class="fa fa-minus"></span></span>
                            </div>
                            <div class="tddiv"><span class="failure upper">1 Uppercase</span></div>
                            <div class="tddiv"><span class="failure sym">1 Symbol</span></div>
                            <div class="tddiv"><span class="failure num">1 Numeric</span></div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            {{--</div>--}}
            <a href="login.html" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->

<script src="<?=asset('assets/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->

<script src="<?=asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=asset('assets/plugins/select2/js/select2.full.min.js')?>"></script>
<script src="<?=asset('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js')?>"></script>
<script src="<?=asset('assets/plugins/jquery-validation/jquery.validate.min.js')?>"></script>
<script src="<?=asset('assets/plugins/jquery-validation/additional-methods.min.js')?>"></script>
<script src="<?=asset('assets/dist/js/adminlte.min.js')?>"></script>
<script>
    $.validator.addMethod("password", function (value, element) {
        var chkchar = 0;
        var chkupper = 0;
        var chknum = 0;
        var chksym = 0;

        if ($('#password').val().length == 0) {
            $(".char").removeClass("success");
            $(".char").addClass("failure");
            $(".upper").removeClass("success");
            $(".upper").addClass("failure");
            $(".num").removeClass("success");
            $(".num").addClass("failure");
            $(".sym").removeClass("success");
            $(".sym").addClass("failure");
            return false;
        }
        if ($('#password').val().length >= 8) {
            $(".char").removeClass("failure");
            $(".char").addClass("success");
            chkchar = 1;
        } else {
            $(".char").removeClass("success");
            $(".char").addClass("failure");
            chkchar = 0;

        }
        if (!(/^(?=.*[A-Z])/.test(value))) {
            $(".upper").removeClass("success");
            $(".upper").addClass("failure");
            chkupper = 0;
        } else {
            $(".upper").removeClass("failure");
            $(".upper").addClass("success");

            chkupper = 1;

        }
        if (!(/^(?=.*[0-9])/.test(value))) {
            $(".num").removeClass("success");
            $(".num").addClass("failure");
            chknum = 0;
        } else {
            $(".num").removeClass("failure");
            $(".num").addClass("success");

            chknum = 1;

        }

        if (!(/^(?=.*[~!@#{}\[\]?\$%\^&*\(\)\-\_\+\=])/.test(value))) {
            $(".sym").removeClass("success");
            $(".sym").addClass("failure");
            chksym = 0;
        } else {
            $(".sym").removeClass("failure");
            $(".sym").addClass("success");

            chksym = 1;

        }

        if (chkupper == 1 && chkchar == 1 && chknum == 1 && chksym == 1) {


            return true;
        } else {
            return false;
        }

    }, function (value, element) {
        if ($('#password').val().length == 0) {

            return "";
        } else {

            return "";
        }
    });
    $(function () {
        $('.select2').select2()
        //Initialize inputmask Elements
        $('[data-mask]').inputmask();
        $('#register_teacher_form').validate({
            rules: {
                name: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                country: {
                    required: true,
                },
                state: {
                    required: true,
                },
                city: {
                    required: true,
                },
                gender: {
                    required: true,
                },
                institute_name: {
                    required: true,
                    maxlength: 100
                },
                address: {
                    required: true,
                    maxlength: 100
                },
                password: {
                    required: true,
                    strong_password: true,
                    maxlength: 15,
                }
            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a vaild email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                terms: "Please accept our terms"
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
                alert("Form successful submitted!");
            }
        });
    });
    $(document).on('click', '.toggle-password', function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#password");
        input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password')
    });
    $(document).ready(function () {
       $("#country").on("change",function () {
          var cnt_id = $(this).val();
          $.ajax({
              url:'<?php echo "/getState"?>',
              method:'POST',
              data:{cnt_id:cnt_id, "_token": "{{ csrf_token() }}",},
              success:function (res) {
                  var data_obj = JSON.parse(res);
                  var option='';
                  $.each(data_obj,function (key,val) {
                      option += '<option value="'+val.id+'">'+val.name+'</option>'
                  });
                  $("#state").append(option);
              }
          })
       });
       $("#state").on("change",function () {
           var sts_id = $(this).val();
           $.ajax({
               url:'<?php echo "/getCity"?>',
               method:'POST',
               data:{sts_id:sts_id, "_token": "{{ csrf_token() }}",},
               success:function (res) {
                   var data_obj = JSON.parse(res);
                   var option='';
                   $.each(data_obj,function (key,val) {
                       option += '<option value="'+val.id+'">'+val.name+'</option>'
                   });
                   $("#city").append(option);
               }
           });
       });
    });

</script>
</body>
</html>
