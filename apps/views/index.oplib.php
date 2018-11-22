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
      'autoWidth'   : false,
      'ajax'        : 'http://127.0.0.1:3333/api/books'
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
                  <h3>44</h3>
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

      <div class="modal fade" id="books-add">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-book fa-fw"></i> Manage Books</h4>
              </div>
              <div class="modal-body">

                  <!-- form start -->
                  <form role="form">
                    <div class="box-body">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" id="books-add-title" placeholder="
Logika Algoritma dan Pemrograman Dasar">
                      </div>

                      <div class="form-group">
                        <label>Author</label>
                        <input type="text" class="form-control" id="books-add-title" placeholder="Rosa A. S.">
                      </div>

                      <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" id="books-add-title" placeholder="
Logika Algoritma dan Pemrograman Dasar">
                      </div>

                      <div class="form-group">
                        <label>Category</label>
                        
                        <select class="form-control">
                           <option>Bisnis & Ekonomi</option>
                           <option>Pendidikan</option>
                           <option>Sastra</option>
                           <option>Komputer & Teknologi</option>
                           <option>Gaya Hidup</option>
                        </select>
                     </div>

                     <div class="form-group">
                        <label>Total</label>
                        <input type="text" class="form-control" id="books-add-title" placeholder="1">
                      </div>
                    </div>
                  </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add books</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

