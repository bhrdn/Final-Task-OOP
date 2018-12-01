<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
         <div class="pull-left image">
            <img src="<?=$baseurl?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
         </div>
         <div class="pull-left info">
            <p>Administrator</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
         </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
         <li class="header">Main Navigation</li>
         <!-- Optionally, you can add icons to the links -->
         <li><a href="<?=$baseurl?>"><i class="fa fa-home fa-fw"></i> <span>Dashboard</span></a></li>
         <li class="treeview">
            <a href="#"><i class="fa fa-book fa-fw"></i> <span>Manage Books</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
               <li><a href="<?=$baseurl?>books-manager"><i class="fa fa-angle-double-right fa-fw"></i> <span>Reserved Books</span></a></li>
               <li><a href="<?=$baseurl?>books-manager/view-loan"><i class="fa fa-angle-double-right fa-fw"></i> <span>View BooksLoan</span></a></li>
            </ul>
         </li>
      </ul>
      <!-- /.sidebar-menu -->
   </section>
   <!-- /.sidebar -->
</aside>
