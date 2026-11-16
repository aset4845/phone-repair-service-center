<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['acrsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $bname=$_POST['brandname'];
$logo=$_FILES["logo"]["name"];
$extension = substr($logo,strlen($logo)-4,strlen($logo));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Логотип имеет недопустимый формат. Разрешены только форматы jpg / jpeg / png / gif');</script>";
}
else
{

$logo=md5($logo).time().$extension;
 move_uploaded_file($_FILES["logo"]["tmp_name"],"images/".$logo);
    $query=mysqli_query($con, "insert into  tblbrand(BrandName,BrandLogo) value('$bname','$logo')");
    if ($query) {
 
    echo '<script>alert("Бренд был добавлен")</script>';
    echo "<script>window.location.href ='add-brand.php'</script>";
  }
  else
    {
      echo '<script>alert("Что-то пошло не так. Пожалуйста, попробуйте еще раз.")</script>';
    }
  }
}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Система ремонта мобильных телефонов :: Добавить бренд</title>
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
        <h3><i class="fa fa-angle-right"></i> Добавить бренд</h3>
        <!-- ОСНОВНАЯ ФОРМА ВАЛИДАЦИИ -->
        <div class="row mt">
          <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> Добавить бренд</h4>
            <div class="form-panel">
              <form role="form" class="form-horizontal style-form" method="post" enctype="multipart/form-data">
          
          <div class="form-group has-success">
            <label class="col-lg-2 control-label">Название бренда</label>
            <div class="col-lg-10">
             <input type="text" class="form-control" name="brandname" value="" required='true'>
            </div>
          </div>
          <div class="form-group has-error">
            <label class="col-lg-2 control-label">Логотип бренда</label>
            <div class="col-lg-10">
              <input type="file" class="form-control" name="logo" value="" required='true'> 
            </div>
          </div>
               
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button class="btn btn-theme" type="submit" name="submit">Добавить</button>
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