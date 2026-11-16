<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
   $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['acrsaid']=$ret['ID'];
     echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
    }
    else{
  echo "<script>alert('Неверные данные');</script>";
    }
  }
if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];
$password=md5($_POST['newpassword']);
        $query=mysqli_query($con,"select ID from tbladmin where  Email='$email' and MobileNumber='$contactno' ");
        
    $ret=mysqli_num_rows($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
      $query1=mysqli_query($con,"update tbladmin set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
       if($query1)
   {
echo "<script>alert('Пароль успешно изменён');</script>";

  }
    
   }
   else{
   
    echo "<script>alert('Неверные данные. Пожалуйста, попробуйте снова.');</script>";
   }
  }

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
 
  <title>Система ремонта мобильных телефонов :: Страница входа</title>


  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>

<body>
 
  <div id="login-page"><a href="../index.php" class="logo pull-left"><h2 style="padding-top: 30px;padding-left: 30px;color: blue"><i class="fa fa-home"></i></h2></a>
    <div class="container">
      <form class="form-login" method="post">
        <h2 class="form-login-heading">Войти сейчас</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" placeholder="Имя пользователя" autofocus name="username" required="true">
          <br>
          <input type="password" name="password" class="form-control" placeholder="Пароль">
          <label class="checkbox">
            <span class="pull-right">
              <a data-toggle="modal" href="login.php#myModal">Забыли пароль?</a>
            </span>
          </label>
          <button class="btn btn-theme btn-block" type="submit" name="login"><i class="fa fa-lock"></i> ВОЙТИ</button>
          <hr>
         </div>
        </div></form>
        
        <!-- Modal -->
          <form class="form-login" method="post" name="changepassword" onsubmit="return checkpass();">
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Забыли пароль?</h4>
              </div>
                <div class="modal-body">
                <p>Введите следующие данные ниже, чтобы сбросить пароль.</p>
                 
                <input type="text" name="email" placeholder="Электронная почта" autocomplete="off" class="form-control placeholder-no-fix">
                <br />
                <input type="text" name="contactno" placeholder="Номер телефона" autocomplete="off" class="form-control placeholder-no-fix">
                <br />
                <input type="password" name="newpassword" placeholder="Новый пароль" autocomplete="off" class="form-control placeholder-no-fix">
                <br />
                <input type="password" name="confirmpassword" placeholder="Подтвердите пароль" autocomplete="off" class="form-control placeholder-no-fix">
                </div>
                <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Отмена</button>
                <button class="btn btn-theme" type="submit" name="submit">Сбросить</button>
              </div>
              
            </div>
          </div>
        </div>
       </form>
        <!-- modal -->
    
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
