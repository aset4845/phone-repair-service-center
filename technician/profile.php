<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['acrstid']==0)) {
  header('location:logout.php');
  } else{
    
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
        <h3><i class="fa fa-angle-right"></i> Просмотр профиля</h3>
        <!-- ОСНОВНАЯ ВАЛИДАЦИЯ ФОРМЫ -->
        <div class="row mt">
          <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> Просмотр профиля</h4>
            <div class="form-panel">
            
          <?php
      $tid=$_SESSION['tid'];
      $ret=mysqli_query($con,"select * from tbltechnician where TechnicianID='$tid'");
      $cnt=1;
      while ($row=mysqli_fetch_array($ret)) {

      ?>
      <h4 style="text-align: center;color: orange">ID сотрудника: <?php  echo $row['TechnicianID'];?></h4>
          <table class="table table-bordered">
            <tr>
            <th>Имя</th>
            <td><?php  echo $row['Name'];?></td>
            <th>Мобильный номер</th>
            <td><?php  echo $row['MobileNumber'];?></td>
            </tr>
            <tr>
            <th>Email</th>
            <td><?php  echo $row['Email'];?></td>
            <th>Адрес</th>
            <td><?php  echo $row['Address'];?></td>
            </tr>
             <tr>
            <th>Фото профиля</th>
            <td><img src="../admin/images/<?php  echo $row['ProfilePic'];?>" width="100" height="100"></td>
            <th>Дата присоединения</th>
            <td><?php  echo $row['JoiningDate'];?></td>
            </tr>
          </table>

              <?php }?>
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