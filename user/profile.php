<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['acrsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['acrsuid'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
  $mobno=$_POST['mobilenumber'];
  $email=$_POST['email'];
  
     $query=mysqli_query($con, "update tbluser set FirstName='$fname',LastName='$lname' where ID='$uid'");
    if ($query) {
 
    echo '<script>alert("Профиль был обновлен")</script>';
    }
    else
    {
      echo '<script>alert("Что-то пошло не так. Пожалуйста, попробуйте еще раз.")</script>';
    }
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Система ремонта мобильных телефонов :: Профиль</title>
  <!-- Bootstrap core CSS -->
 <?php include_once('includes/css.php'); ?>
</head>

<body>
  <section id="container">
  
    <!--header start-->
    <?php include_once('includes/header.php');?>
   
    <!--sidebar start-->
<?php include_once('includes/sidebar.php');?>
    <!--sidebar end-->
   
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Мой профиль</h3>
        <!-- ОСНОВНАЯ ВАЛИДАЦИЯ ФОРМЫ -->
        <div class="row mt">
          <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> Мой профиль</h4>
            <div class="form-panel">
              <form role="form" class="form-horizontal style-form" method="post">
                <?php
$uid=$_SESSION['acrsuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Имя</label>
                  <div class="col-lg-10">
                   <input type="text" class="form-control" name="fname" value="<?php  echo $row['FirstName'];?>" required='true'>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Фамилия</label>
                  <div class="col-lg-10">
                   <input type="text" class="form-control" name="lname" value="<?php  echo $row['LastName'];?>" required='true'>
                  </div>
                </div>
                 
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Электронная почта</label>
                  <div class="col-lg-10">
                   <input type="email" class="form-control" name="email" value="<?php  echo $row['Email'];?>" readonly='true'>
                 
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Контактный номер</label>
                  <div class="col-lg-10">
                   <input type="text" class="form-control" name="mobilenumber" value="<?php  echo $row['MobileNumber'];?>" required='true' maxlength='10' readonly>
                 
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Дата регистрации</label>
                  <div class="col-lg-10">
                   <input type="text" class="form-control" id="email2" name="" value="<?php  echo $row['RegDate'];?>" readonly="true">                 
                  </div>
                </div>
                <?php } ?>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                  <button class="btn btn-theme" type="submit" name="submit">Сохранить</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
   
    <!--footer start-->
   <?php include_once('includes/footer.php');?>
    <!--footer end-->
  </section>
 <?php include_once('includes/js.php');?>

</body>

</html>
<?php }  ?>