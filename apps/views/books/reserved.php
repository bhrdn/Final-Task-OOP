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

   let API_ENDPOINT = location.protocol + '//' + location.host
   let BOOK = API_ENDPOINT + '/books/'
   let LOAN = API_ENDPOINT + '/loan/'
   let ST = API_ENDPOINT + '/student/'

   var x, y, z = $('#viewloan-tables').dataTable({
      'ajax': {
         url: API_ENDPOINT + '/datatables/loan',
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

   $('#books-borrow-nim').keyup(function() {
      $.ajax({
         url: ST + $(this).val(),
         type: 'GET',
         success: function(response) {
            if (response[0]) {
               x = true
               $('#books-borrow-name').val(response[0].name)
            } else {
               x = false
               $('#books-borrow-name').val(null)
               $('.books-borrow-submit').prop('disabled', true)
            }
            
            if (x && y) $('.books-borrow-submit').prop('disabled', false)
         }
      })
   })

   $('#books-borrow-title').keyup(function() {
      $.ajax({
         url: BOOK + $(this).val(),
         type: 'GET',
         success: function(response) {
            if (response.result == 0) y = true
            else {
               y = false
               $('.books-borrow-submit').prop('disabled', true)
            }
            
            if (x && y) $('.books-borrow-submit').prop('disabled', false)
         }
      })
   })

   $('.books-borrow-submit').click(function(e) {
      e.preventDefault()

      $.ajax({
         url: LOAN,
         type: 'POST',
         data: {
            uuid: $('#books-borrow-uuid').val(),
            nim: $('#books-borrow-nim').val(),
            title: $('#books-borrow-title').val()
         },
         success: function() {
            z.api().ajax.reload();
            $('.books-borrow-error').html('<div class="callout callout-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> &nbsp;Success!</h4>' + $('#books-borrow-title').val() + ' successful booked !!</div>')
         }
      })
   })

   $('.books-rsv-submit').click(function(e) {
      e.preventDefault()
      
      $.ajax({
         url: LOAN + $('#books-rsv-id').val(),
         type: 'PUT',
         success: (res) => {
            z.api().ajax.reload();
            if (res == 'OK') $('.books-rsv-error').html('<div class="callout callout-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> &nbsp;Success!</h4> The book has been returned !!</div>')
            else $('.books-rsv-error').html('<div class="callout callout-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-close"></i> &nbsp;Failed!</h4> Reserved id not found !!</div>')
         },
         error: () => { 
            $('.books-rsv-error').html('<div class="callout callout-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-close"></i> &nbsp;Failed!</h4> Reserved id not found !!</div>') 
         }
      })
   })
   
   z.api().ajax.reload();

EOF;

$this->customJs($js);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Reserved 
         <small>Books</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Books</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content container-fluid">  
   
      <div class="row">
         <div class="col-md-6">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-bookmark fa-fw"></i> <span>Peminjaman Buku</span></h3>
                  <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                     </button>
                  </div>
                  <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <!-- error msg -->
                  <div class="books-borrow-error"></div>

                  <!-- form start -->
                  <form role="form">
                     <div class="box-body">
                        <div class="form-group">
                           <label>Reserved ID</label>
                           <input type="text" class="form-control" id="books-borrow-uuid" value="<?= $uuid_gen ?>" disabled>  
                        </div>
                        <hr>
                        <div class="form-group">
                           <label>NIM</label>
                           <input type="number" class="form-control" id="books-borrow-nim" placeholder="1301174412">  
                        </div>

                        <div class="form-group">
                           <label>Nama Mahasiswa</label>
                           <input type="text" class="form-control" id="books-borrow-name" disabled>  
                        </div>

                        <div class="form-group">
                           <label>Judul Buku</label>
                           <input type="text" class="form-control" id="books-borrow-title" placeholder="Dasar Algoritma">
                        </div>
                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-block books-borrow-submit" disabled>Submit</button>
                     </div>
                  </form>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <div class="col-md-6">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-exchange fa-fw"></i> <span>Pengembalian Buku</span></h3>
                  <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                     </button>
                  </div>
                  <!-- /.box-tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <!-- form start -->
                  <form role="form">
                     <div class="box-body">
                        <!-- error msg -->
                        <div class="books-rsv-error"></div>

                        <div class="form-group">
                           <label>Reserved ID</label>
                           <input type="text" class="form-control" id="books-rsv-id">  
                        </div>
                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-block books-rsv-submit">Submit</button>
                     </div>
                  </form>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
      </div>

      <div class="row">
         <div class="col-md-12">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-database fa-fw"></i> <span>Record BooksLoan</span></h3>
                  <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                     </button>
                  </div>
                  <!-- /.box-tools -->
               </div>
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
