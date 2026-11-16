<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $contno=$_POST['contactno'];
    $email=$_POST['emailid'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select ID from tbluser where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_num_rows($ret);
    if($result>0){

echo "<script>alert('Этот адрес электронной почты или номер телефона уже связан с другой учетной записью');</script>";
  }
  else{
  $query=mysqli_query($con, "insert into tbluser(FirstName, LastName,MobileNumber,Email,Password) value('$fname','$lname','$contno','$email','$password' )");
  if ($query) {
  
  echo "<script>alert('Вы успешно зарегистрировались');</script>";
  }
  else
  {
    
    echo "<script>alert('Что-то пошло не так. Пожалуйста, попробуйте еще раз');</script>";
  }
}
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Система ремонта мобильных телефонов :: Страница регистрации</title>


  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">

</head>

<body>
 
  <div id="login-page">
    <div class="container">
      <form class="form-login" action="" method="post" onsubmit="return checkpass();">
        <h2 class="form-login-heading">зарегистрируйтесь сейчас</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="Имя" autofocus name="firstname" required="true">
            <br>
            <input type="text" class="form-control" placeholder="Фамилия" autofocus name="lastname" required="true">
            <br>
            <input type="email" class="form-control" placeholder="Электронная почта" autofocus name="emailid" required="true">
            <br>
            <input type="text" class="form-control" placeholder="Мобильный номер" autofocus name="contactno" required="true" maxlength="10" pattern="[0-9]+">
            <br>
            <input type="password" name="password" class="form-control" placeholder="Пароль">
        
        
          <label class="checkbox">
          
            <span class="pull-right">
            <a href="login.php">Уже есть аккаунт</a>
            </span>
            </label>

            <button class="btn btn-theme btn-block" type="submit" name="submit"><i class="fa fa-lock"></i> ЗАРЕГИСТРИРОВАТЬСЯ</button>
            <hr>
         
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Забыли пароль?</h4>
                </div>
                <div class="modal-body">
                <p>Введите свой адрес электронной почты ниже, чтобы сбросить пароль.</p>
                <input type="text" name="email" placeholder="Электронная почта" autocomplete="off" class="form-control placeholder-no-fix">
                </div>
                <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Отмена</button>
                <button class="btn btn-theme" type="button">Отправить</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="../lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("../img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
