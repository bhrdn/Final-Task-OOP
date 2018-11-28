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

   $('#books-borrow-title').keyup(function() {
      $.ajax({
         url: BOOK + $(this).val(),
         type: 'GET',
         success: function(response) {
            if (response.result == 0) $('.books-borrow-submit').prop('disabled', true)
            else $('.books-borrow-submit').prop('disabled', false)
         }
      })
   })

   $('.books-borrow-submit').click(function(e) {
      e.preventDefault()
      if ($('#books-borrow-nim').val().length == 0) $('.books-borrow-error').html('<div class="callout callout-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-warning"></i> &nbsp;Alert!</h4>This form cant be empty !!</div>')
      else $('.books-borrow-error').html('x')
      
      // ADD LOAN DATAS, THEN DEC TOTAL (BOOK)
      $.ajax({
         url: LOAN,
         type: 'GET',
         data: {
            uuid: $('#books-borrow-uuid').val(),
            nim: $('#books-borrow-nim').val(),
            title: $('#books-borrow-title').val()
         },
         success: function() {
            $('.books-borrow-error').html('<div class="callout callout-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> &nbsp;Success!</h4>' + $('#books-borrow-title').val() + ' successful booked !!</div>')
         }
      })
   })

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
                        <div class="form-group">
                           <label>Reserved ID</label>
                           <input type="text" class="form-control" id="books-borrow-bid">  
                        </div>
                     </div>
                     <!-- /.box-body -->
                     <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                     </div>
                  </form>
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
