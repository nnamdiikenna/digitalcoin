<?php session_start();

include "conn/cos.php";



$msg = uri_data('3');

if(isset($_POST['doLogin'])){


  $user = addslashes(trim($_POST['usr']));
  $pass = addslashes(trim($_POST['pwd']));




  $msg = '';

  #..................CHECK EMPTY IMPORTANT FIELDS
  if($pass ==''or$user ==''){
    $msg .="All fields must be filled.";
  }

  $q = "select * from `admin` where user = '$user' and passme = '$pass'";
  $a = $co->query($q);
  $ar = $a->fetch();
  $arr = $a->size();

  if($arr==0){
    $msg = "Invalid Login Details";
  }else{

    $_SESSION['admin'] = $ar['id'];

    header("location:dashboard");
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Digital Coin Place Admin</title><meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="css/matrix-login.css" />
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="/img/favicon.png">
</head>
<body>
<div id="loginbox" style='width: 50%'>
 <div class="control-group normal_text"> 
 <h3 style=" margin-left: auto; margin-right: auto; width: 50%; display: block;"><img src="../img/logo.png" alt="Logo" /></h3></div>
 <div id="loginbox">  
  <br><h3 style=" color: white; text-align: center;">ADMIN LOGIN</h3><br><br>
  <b style="width: 100%; text-align: center; color: red;display: block;"><?php if(isset($msg)) echo $msg ?></b>

  <hr>
  <form id="loginform" class="form-vertical" action="" method="post">

   <b style="color:white; display: block; text-align: center;"> <?php if(!empty($_REQUEST['m'])){echo $_REQUEST['m'];} ?> </b>  
   <div class="control-group">
    <div class="controls">
      <div class="main_input_box">
        <!-- <span class="add-on bg_lg"><i class="icon-user"> </i></span> --><input type="text" placeholder="Username" name="usr" required />
      </div>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <div class="main_input_box">
       <!--  <span class="add-on bg_ly"><i class="icon-lock"></i></span> --><input type="password" placeholder="Password" name="pwd" required/>
     </div>
   </div>
 </div>
 <div class="form-actions">
<!--   <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
-->  <input type="hidden" name="doLogin" value="1">
<span class="pull-right"><button type="submit" class="btn btn-success"> Login</button></span>
</div>
</form>
<form id="recoverform" action="#" class="form-vertical">
  <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

  <div class="controls">
    <div class="main_input_box">
     <!--  <span class="add-on bg_lo"><i class="icon-envelope"></i></span> --><input type="text" placeholder="E-mail address" />
   </div>
 </div>

 <div class="form-actions">
  <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
  <span class="pull-right"><a class="btn btn-info">Recover</a></span>
</div>
</form>
</div>

<script src="js/jquery.min.js"></script>  
<script src="js/matrix.login.js"></script> 
</body>

</html>
