<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['acrstid']==0)) {
  header('location:logout.php');
  } else{
 if(isset($_POST['submit']))
  {
    
    $vid=$_GET['viewid'];
    $status=$_POST['status'];
    $scharge=$_POST['sercharge'];
    $pcharge=$_POST['partcharge'];
    $ocharge=$_POST['othercharge'];
    $remark=$_POST['remark'];
    
 
    
    $query=mysqli_query($con,"insert into tbltracking(ServiceNumber,Remark,Status) value('$vid','$remark','$status')"); 
   $query=mysqli_query($con, "update   tblrequest set Status='$status',Remark='$remark',ServiceCharge='$scharge',PartCharge='$pcharge',OtherCharge='$ocharge' where ServiceNumber='$vid'");
    if ($query) {
    
    echo '<script>alert("Заявка на обслуживание была обновлена.")</script>';
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
 
  <title>Система ремонта мобильных телефонов :: Просмотр заявки на обслуживание</title>

  
  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="../lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="../lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="../lib/advanced-datatable/css/DT_bootstrap.css" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">

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
        <h3><i class="fa fa-angle-right"></i>View Service Request</h3>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">

              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <?php
                $vid=$_GET['viewid'];
$ret=mysqli_query($con,"select tbluser.*,tblrequest.* from tblrequest join tbluser on tbluser.ID=tblrequest.UserID where ServiceNumber='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                  <tr align="center">
                  
<td colspan="4" style="font-size:20px;color:blue">
 Номер заявки: <?php  echo $_GET['viewid']; ?></td></tr>
          <tr>
<td colspan="4" style="font-size:20px;color:blue">
 Данные пользователя</td></tr>

  <tr>
  <th scope>ФИО</th>
  <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
  <th scope>Email</th>
  <td><?php  echo $row['Email'];?></td>
  </tr>
  <tr>
  <th scope>Мобильный номер</th>
  <td><?php  echo $row['MobileNumber'];?></td>
  <th>Дата бронирования</th>
  <td colspan="2"><?php  echo $row['ReqDate'];?></td>
  </tr>
  <td colspan="4" style="font-size:20px;color:blue">
 Детали заявки</td></tr>
  <tr>
  <th>Тип телефона</th>
  <td><?php  echo $row['ACtype'];?></td>
  <th>Операционная система</th>
  <td><?php  echo $row['ACcapcity'];?></td>
  </tr>
   <tr>
  <th>Характер проблемы</th>
  <td><?php  echo $row['Problem'];?></td>
  <th>Краткое описание проблемы</th>
  <td><?php  echo $row['ProblemDesc'];?></td>
  </tr>
  <tr>
  <th>Адрес</th>
  <td><?php  echo $row['Address'];?></td>
  <th>Бренд</th>
  <td><?php  echo $row['BrandName'];?></td>
  </tr>
   <tr>
  <th>Дата обслуживания</th>
  <td><?php  echo $row['DateofService'];?></td>
  <th>Время обслуживания</th>
  <td><?php  echo $row['SuitableTime'];?></td>
  </tr>
  <tr>
  <th>Финальный статус заявки</th>
  <td> 
<?php  $status=$row['Status'];  
if($row['Status']=="Approved")
{
  echo "Все еще ожидает выполнения со стороны техника";
}

if($row['Status']=="Completed")
{
  echo "Обслуживание завершено";
}
?></td>
<th>Дата запроса</th>
  <td><?php  echo $row['ReqDate'];?></td>
  </tr>
</tr>
<?php if($row['Status']==""){ ?>
  <tr>
    <th>Назначено</th>
   <td><?php echo "Еще не обновлено"; ?></td>
  <th>Примечание</th>
   <td><?php echo "Еще не обновлено"; ?></td>
  </tr>
<?php } else { ?>
  <tr>
    <th>Назначено</th>
  <td><?php  echo $row['AssignTo'];?></td>
  <th>Примечание</th>
    <td><?php  echo $row['Remark'];?></td>
  </tr><?php } ?>
<?php }?>
</table>
   <?php  if($status=='Completed'){
    $ret=mysqli_query($con,"select * from tblrequest  where ServiceNumber='$vid'");
$cnt=1;
   ?>   
   <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
  <tr align="center">
   <th colspan="8" style="text-align: center;color: blue">Счет за обслуживание</th> 
  </tr>
  <?php  
while ($row=mysqli_fetch_array($ret)) { 
  ?>
  <tr>
    <td>1</td>
<td>Стоимость обслуживания</td>
<td><?php  echo $sc=$row['ServiceCharge'];?></td></tr>
<tr>
  <td>2</td>
<td>Стоимость запчастей</td>
<td><?php  echo $pc=$row['PartCharge'];?></td>
</tr>
<tr>
  <td>3</td>
<td>Прочие расходы</td>
<td><?php  echo $oc=$row['OtherCharge'];?></td></tr>
<tr>
  
<td colspan="2" style="text-align: center;"><strong style="color: red;">Итого</strong></td>
<td><?php  echo $sc+$pc+$oc;?></td>
</tr>



<?php $cnt=$cnt+1;} ?>
</table> 
<?php } 
if ($status=="Approved"){
?>  




                                               
                                                 <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">

                                 <form method="post" name="submit">

                                
                               
     <tr>
    <th>Примечание :</th>
    <td>
    <textarea name="remark" placeholder="Примечание" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
    </tr>  
    
     <tr>
    <th>Стоимость обслуживания :</th>
    <td> <input name="sercharge" placeholder="Стоимость обслуживания" class="form-control wd-450" required="true"> </td>
    </tr>                  
  <tr>
    <th>Стоимость запчастей (если есть) :</th>
    <td> <input name="partcharge" placeholder="Стоимость запчастей" class="form-control wd-450"> </td>
    </tr>
    <tr>
    <th>Прочие расходы (если есть) :</th>
    <td> <input name="othercharge" placeholder="Прочие расходы" class="form-control wd-450"> </td>
    </tr>
    <tr>
    <th>Статус :</th>
    <td>

     <select name="status" class="form-control wd-450" required="true" >
     
     <option value="Completed">Завершено</option>
   </select></td>
  </tr>

</div>
 </table>
 <p style="text-align: center;"><button type="submit" name="submit" class="btn btn-primary">Обновить заявку</button></p>
  
  </form>
<?php } ?>
<?php  if($status!=""){
$ret=mysqli_query($con,"select tbltracking.OrderCanclledByUser,tbltracking.Remark,tbltracking.Status as fstatus,tbltracking.UpdationDate from tbltracking where tbltracking.ServiceNumber ='$vid'");
$cnt=1;

 $cancelledby=$row['OrderCanclledByUser'];
 ?>
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
  <tr align="center">
   <th colspan="4" style="color: blue">История отслеживания</th> 
  </tr>
  <tr>
    <th>#</th>
    <th>Примечание</th>
    <th>Статус</th>
    <th>Время</th>
  </tr>
<?php  
while ($row=mysqli_fetch_array($ret)) { 
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row['Remark'];?></td> 
  <td><?php  echo $row['fstatus'];
if($cancelledby==1){
echo "("."пользователем".")";
} else {

echo "("."компанией".")";
}

  ?></td> 
   <td><?php  echo $row['UpdationDate'];?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
<?php  }  
?>
</div>

                      
                        </div>
                    </div>        
             
            </div>
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
<?php include_once('includes/footer.php');?>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="../lib/advanced-datatable/js/jquery.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="../lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="../lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <!--script for this page-->
   <script type="text/javascript" src="../lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="../lib/sparkline-chart.js"></script>
  <script src="../lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      nCloneTd.innerHTML = '';
      nCloneTd.className = "center";

      $('#hidden-table-info thead tr').each(function() {
        this.insertBefore(nCloneTh, this.childNodes[0]);
      });

      $('#hidden-table-info tbody tr').each(function() {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      });

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "../lib/advanced-datatable/media/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "../lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>
</body>

</html>
<?php  } ?>