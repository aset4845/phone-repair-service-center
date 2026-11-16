<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="images/images.png" class="img-circle" width="80"></a></p>
          <?php
$aid=$_SESSION['acrsaid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$aid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <h5 class="centered"><?php  echo $row['AdminName'];?></h5><?php } ?>
          <li class="mt">
            <a  href="dashboard.php">
              <i class="fa fa-dashboard"></i>
                <span>Панель управления</span>
              </a>
          </li>
            <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Бренд</span>
              </a>
            <ul class="sub">
              <li><a href="add-brand.php">Добавить бренд</a></li>
              <li><a href="manage-brand.php">Управление брендами</a></li>
            </ul>
            </li>
            <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Техник</span>
              </a>
            <ul class="sub">
              <li><a href="add-technician.php">Добавить техника</a></li>
              <li><a href="manage-technician.php">Управление техниками</a></li>
              
            </ul>
            </li>
          <li class="sub-menu dcjq-parent-li">
            <a href="javascript:;" class="dcjq-parent">
              <i class="fa fa-desktop"></i>
              <span>Заявки на обслуживание</span>
              <span class="dcjq-icon"></span></a>
            <ul class="sub" style="display: block;">
              <li><a href="notassign-service-request.php">Не назначенные заявки</a></li>
              <li><a href="assign-service-request.php">Назначенные заявки</a></li>
               <li><a href="cancelled-request.php">Отменённые заявки</a></li>
            </ul>
            </li>
            <li class="mt">
            <a href="completed-servicebytech.php">
              <i class="fa fa-dashboard"></i>
              <span>Выполненные услуги</span>
              </a>
            </li>
            <li class="sub-menu dcjq-parent-li">
            <a href="javascript:;" class="dcjq-parent">
              <i class="fa fa-desktop"></i>
              <span>Страницы</span>
              <span class="dcjq-icon"></span></a>
            <ul class="sub" style="display: block;">
              <li><a href="aboutus.php">О нас</a></li>
              <li><a href="contactus.php">Контакты</a></li>
               
            </ul>
            </li>
             <li class="mt">
            <a href="reg-users.php">
              <i class="fa fa-users"></i>
              <span>Все пользователи</span>
              </a>
            </li>
            <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Отчёты</span>
              </a>
            <ul class="sub">
              <li><a href="between-dates-reports.php">Отчёт за период</a></li>
              <li><a href="employeewise-report.php">Отчёт по сотрудникам</a></li>
              <li><a href="sales-report.php">Отчёт по продажам</a></li>
            </ul>
            </li>
             <li class="mt">
            <a href="search.php">
              <i class="fa fa-search"></i>
              <span>Поиск</span>
              </a>
          </li>
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>