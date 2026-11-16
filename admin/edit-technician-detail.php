<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['acrsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
   $eid=$_GET['editid'];
    $name=$_POST['name'];
    $mobnum=$_POST['mobnum'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $query=mysqli_query($con, "update  tbltechnician set Name='$name',MobileNumber='$mobnum',Email='$email',Address='$address' where ID='$eid'");
    if ($query) {
 
    echo '<script>alert("Данные техника были обновлены")</script>';
    echo "<script>window.location.href ='manage-technician.php'</script>";
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
  <title>Система ремонта мобильных телефонов :: Обновить данные техника</title>
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
        <h3><i class="fa fa-angle-right"></i> Обновить данные техника</h3>
        <!-- ОСНОВНАЯ ФОРМА ВАЛИДАЦИИ -->
        <div class="row mt">
          <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> Обновить данные техника</h4>
            <div class="form-panel">
              <form role="form" class="form-horizontal style-form" method="post" enctype="multipart/form-data">
          <?php
          $eid=$_GET['editid'];
      $ret=mysqli_query($con,"select * from tbltechnician where ID='$eid'");
      $cnt=1;
      while ($row=mysqli_fetch_array($ret)) {

      ?>
          <div class="form-group has-success">
            <label class="col-lg-2 control-label">ID техника</label>
            <div class="col-lg-10">
             <input type="text" class="form-control" name="techid" value="<?php  echo $row['TechnicianID'];?>" readonly="true">
            </div>
          </div>
           <div class="form-group has-success">
            <label class="col-lg-2 control-label">Имя</label>
            <div class="col-lg-10">
             <input type="text" class="form-control" name="name" value="<?php  echo $row['Name'];?>" required='true'>
            </div>
          </div>
          <div class="form-group has-success">
            <label class="col-lg-2 control-label">Мобильный номер</label>
            <div class="col-lg-10">
             <input type="text" class="form-control" name="mobnum" value="<?php  echo $row['MobileNumber'];?>" required='true' maxlength="10" pattern="[0-9]+">
            </div>
          </div>
          <div class="form-group has-success">
            <label class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
             <input type="email" class="form-control" name="email" value="<?php  echo $row['Email'];?>" required='true'>
            </div>
          </div>
          <div class="form-group has-success">
            <label class="col-lg-2 control-label">Адрес</label>
            <div class="col-lg-10">
             <textarea class="form-control" name="address" required='true'><?php  echo $row['Address'];?></textarea>
            </div>
          </div>
          <div class="form-group has-error">
            <label class="col-lg-2 control-label">Фото профиля</label>
            <div class="col-lg-10">
             <img src="images/<?php  echo $row['ProfilePic'];?>" width="100" height="100"> <a href="changetprofile.php?editid=<?php echo $row['ID'];?>"> &nbsp; Изменить изображение</a> 
            </div>
          </div>

          <div class="form-group has-success">
            <label class="col-lg-2 control-label">Дата присоединения</label>
            <div class="col-lg-10">
             <input type="text" class="form-control" value="<?php  echo $row['JoiningDate'];?>" readonly="true">
            </div>
          </div>
               <?php 
      $cnt=$cnt+1;
      }?>
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button class="btn btn-theme" type="submit" name="submit">Обновить</button>
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
  <!-- js placed at the end of the document so the pages load faster -->
   <?php include_once('includes/js.php');?>
</body>

</html>
<?php }  ?>