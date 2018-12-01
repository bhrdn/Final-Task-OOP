<?php 
$this->layout('layouts::master');
$this->appendCss([
   'bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'
]);
$this->appendJs([
   'bower_components/datatables.net/js/jquery.dataTables.min.js',
   'bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'
]);

$js = <<<EOF
  let API_ENDPOINT = location.protocol + '//' + location.host + '/datatables/'
  let LOAN = API_ENDPOINT + 'loan'
  
  $('#viewloan-tables').dataTable({
    'ajax': {
      url: LOAN,
      type: 'GET'
    },
    columns: [
      { data: 'rsv' },
      { data: 'title' },
      { data: 'tanggal_1' },
      { data: 'tanggal_2' },
      { data: 'status' }
    ]
  });

EOF;

$this->customJs($js);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         View 
         <small>BooksLoan</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">BooksLoan</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="box">
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="viewloan-tables" class="table table-bordered table-striped">
                     <thead>
                        <tr>
                           <th>ID Pinjam</th>
                           <th>Judul</th>
                           <th>Tanggal Pinjam</th>
                           <th>Tanggal Pengembalian</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                     </tbody>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
      </div>
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
