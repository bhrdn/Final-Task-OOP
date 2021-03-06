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
                     <input type="text" class="form-control" id="books-add-title" placeholder="Logika Algoritma dan Pemrograman Dasar">
                  </div>
                  <div class="form-group">
                     <label>Author</label>
                     <input type="text" class="form-control" id="books-add-author" placeholder="Rosa A. S.">
                  </div>
                  <div class="form-group">
                     <label>Description</label>
                     <input type="text" class="form-control" id="books-add-desc" placeholder="Logika Algoritma dan Pemrograman Dasar">
                  </div>
                  <div class="form-group">
                     <label>Category</label>
                     <select class="form-control" id="books-add-category">
                        <option value="Bisnis & Ekonomi">Bisnis & Ekonomi</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Sastra">Sastra</option>
                        <option value="Komputer & Teknologi">Komputer & Teknologi</option>
                        <option value="Gaya Hidup">Gaya Hidup</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Total</label>
                     <input type="text" class="form-control" id="books-add-total" placeholder="1">
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary books-add-submit">Add books</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="books-edit">
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
                     <input type="text" class="form-control" id="books-edit-title" placeholder="Logika Algoritma dan Pemrograman Dasar">
                  </div>
                  <div class="form-group">
                     <label>Author</label>
                     <input type="text" class="form-control" id="books-edit-author" placeholder="Rosa A. S.">
                  </div>
                  <div class="form-group">
                     <label>Description</label>
                     <input type="text" class="form-control" id="books-edit-desc" placeholder="Logika Algoritma dan Pemrograman Dasar">
                  </div>
                  <div class="form-group">
                     <label>Category</label>
                     <select class="form-control" id="books-edit-category">
                        <option value="Bisnis & Ekonomi">Bisnis & Ekonomi</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Sastra">Sastra</option>
                        <option value="Komputer & Teknologi">Komputer & Teknologi</option>
                        <option value="Gaya Hidup">Gaya Hidup</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Total</label>
                     <input type="text" class="form-control" id="books-edit-total" placeholder="1">
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary books-edit-submit">Update books</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->