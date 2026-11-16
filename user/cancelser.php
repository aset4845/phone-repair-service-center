<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    
   $serno=$_GET['serno'];
    $ressta="Запрос отменён";
    $remark=$_POST['restremark'];
    $canclbyuser=1;
 
    
    $query=mysqli_query($con,"insert into tbltracking(ServiceNumber,Remark,Status,OrderCanclledByUser) value('$serno','$remark','$ressta','$canclbyuser')"); 
   $query=mysqli_query($con, "update tblrequest set Status='$ressta', Remark='$remark' where ServiceNumber='$serno'");
    if ($query) {
    $msg="Заказ был обновлён";
  }
  else
    {
      $msg="Что-то пошло не так. Пожалуйста, попробуйте ещё раз";
    }

  
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Отмена заявки на обслуживание</title>
</head>
<body>

<div style="margin-left:50px;">
<?php  
$serno=$_GET['serno'];
$query=mysqli_query($con,"select ServiceNumber,Status from tblrequest where ServiceNumber='$serno'");
$num=mysqli_num_rows($query);
$cnt=1;
?>

<table border="1"  cellpadding="10" style="border-collapse: collapse; border-spacing:0; width: 100%; text-align: center;">
  <tr align="center">
   <th colspan="4" >Отмена заказа №<?php echo  $serno;?></th> 
  </tr>
  <tr>
<th>Номер услуги</th>
<th>Текущий статус</th>
</tr>
<?php  
while ($row=mysqli_fetch_array($query)) {
  ?>
<tr> 
  <td><?php  echo $serno;?></td> 
   <td><?php  $status=$row['Status'];
if($status==""){
  echo "Ожидание подтверждения";
} else { 
echo $status;
}
?></td> 
</tr>
<?php 
} ?>

</table>
     <?php if($status=="" || $status=="Approved") {?>
<form method="post">
      <table>
        <tr>
          <th>Причина отмены</th>
<td>    <textarea name="restremark" placeholder="" rows="12" cols="50" class="form-control wd-450" required="true"></textarea></td>
        </tr>
<tr>
  <td colspan="2" align="center"><button type="submit" name="submit" class="btn btn-danger">Обновить заявку</button></td>

</tr>
      </table>

</form>
    <?php } else { ?>
<?php if($status=='Request Cancelled'){?>
<p style="color:red; font-size:20px;"> Заявка на обслуживание была отменена</p>
<?php } else { ?>
  <p style="color:red; font-size:20px;">Вы не можете отменить это. Заявка на обслуживание выполнена.</p>

<?php }  } ?>
  
</div>

</body>
</html>

     