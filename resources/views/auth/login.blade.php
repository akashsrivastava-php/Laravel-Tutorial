<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Login</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="<?php echo url('css/bootstrap.min.css?ver=2.5'); ?>">
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="<?php echo url('css/materialize.min.css?ver=2.5'); ?>"  media="screen,projection"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo url('css/style.css?ver=2.5'); ?>">
<style>
.input-field2 input::-webkit-input-placeholder {
 color: rgba(255,255,255,0.6)
}
.input-field2 input:-moz-placeholder {
 color: rgba(255,255,255,0.6)
}
.input-field2 input::-moz-placeholder {
 color: rgba(255,255,255,0.6)
}
.input-field2 input:-ms-input-placeholder {
 color: rgba(255,255,255,0.6)
}
</style>
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="login-outer">
<div class="login-outer2">
<div class="login_wrapper">

<div class="login_inner" style="background-color: rgba(255,255,255,0);">
<div class="row">
<div class="col s12 text-center mt_15">
  <img src="<?php echo url('images/application-tracking_white.png'); ?>" style="height:80px;" alt=""/> </div>
    <form action="{{ route('login') }}" method="POST">
    {{ csrf_field() }}
      <div class="row">

        <div class="input-field input-field2 col s12">
          <i class="material-icons prefix" style="border-right:0px;"><img src="<?php echo url('images/user_icon.png'); ?>" alt=""/></i>
          <input id="icon_prefix" name="email" type="text" autocomplete="off" class="validate" placeholder="Email Address" style="background-color:transparent; border:1px solid #ec7998; box-shadow:none;" required readonly onfocus="this.removeAttribute('readonly');" autofocus>
          @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
        </div>
        <div class="input-field input-field2 col s12">
          <i class="material-icons prefix hight_43" style="border-right:0px;"><img src="<?php echo url('images/password_icon.png'); ?>" alt=""/></i>
          <input id="icon_telephone" type="password" name="password" autocomplete="off" class="validate" placeholder="Password" style="background-color:transparent; border:1px solid #ec7998; box-shadow:none;" required readonly onfocus="this.removeAttribute('readonly');">

          @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

        </div>

        <div class="clearfix"></div>
      <div class=" col s12 text-left" style="margin-top:10px;">
      <!--<input type="checkbox" id="test5" />
      <label id="new" for="test5" style="color:#fff !important;">Remember Password</label>
      <div class="clearfix"></div>-->
      <button class="waves-effect waves-dark btn col s12 mt_15 btn_default2 btn_login">Sign In</button>
    </div>
      </div>
      
    </form>
  </div>
  <div class="clearfix"></div>
  </div>
</div>
</div>
</div>
<script src="<?php echo url('js/jQuery-2.1.4.min.js'); ?>"></script>
<script src="<?php echo url('js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo url('js/materialize.min.js'); ?>"></script>
<script src="<?php echo url('js/main.js'); ?>"></script>
<!--<script>
$(document).ready(function(e) {
    $('.login_wrapper').height($(this).height());
    $('.login_wrapper').width($(this).width());
});
$(window).on('load resize', function(){
    $('.login_wrapper').height($(this).height());
    $('.login_wrapper').width($(this).width());
});
</script>-->
</body>
</html>
