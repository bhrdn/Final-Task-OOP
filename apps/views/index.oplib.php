<?php
$this->layout('layouts::master');
$this->appendCss([
   'bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'
]);
$this->appendJs([
   'bower_components/datatables.net/js/jquery.dataTables.min.js',
   'bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'
]);
$this->customJs(" 
$(function () {
   $('#books-record').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
   })
})
");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Dashboard
         <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Dashboard</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content container-fluid">
      <div class="row">
         <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
               <div class="inner">
                  <h3>100</h3>
                  <p>Registered Students</p>
               </div>
               <div class="icon">
                  <i class="ion ion-ios-people"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
               <div class="inner">
                  <h3>10</h3>
                  <p>Reserved Books</p>
               </div>
               <div class="icon">
                  <i class="ion ion-folder"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col -->
         <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-maroon">
               <div class="inner">
                  <h3><?= count($books) ?></h3>
                  <p>Books Record</p>
               </div>
               <div class="icon">
                  <i class="ion ion-ios-book"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
         </div>
         <!-- ./col -->
      </div>
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Record Books</h3>
                  <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#books-add"><span><i class="fa fa-plus fa-fw"></i> Add book</span></button>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="books-record" class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th>Title</th>
                           <th>Author</th>
                           <th>Description</th>
                           <th>Category</th>
                           <th>Total</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                      <?php if (isset($books)): foreach ($books as $data): ?>
                        <tr>
                          <td><?= $data->title ?></td>
                          <td><?= $data->author ?></td>
                          <td><?= $data->description ?></td>
                          <td><?= $data->category ?></td>
                          <td><?= $data->total ?? 1 ?></td>
                          <td>
                            <div class="row">
                              <div class="col-lg-4 col-xs-4"><button type="button" class="btn btn-block btn-warning btn-xs" data-toggle="modal" data-target="#books-edit"><i class="fa fa-edit fa-fw"></i></button></div>
                              <div class="col-lg-4 col-xs-4"><button type="button" class="btn btn-block btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></button></div>
                            </div>
                          </td>
                        </tr>
                      <?php endforeach; endif; ?> 
                     </tbody>
                     </tfoot>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>

      <?= $this->insert('sections::modals') ?>
   
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->