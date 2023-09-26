<!-- Modal -->
<div class="modal fade" id="ModalFormPemasok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Pemasok</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
          <form method="post" action="pemasok">
            @csrf
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Nama Pemasok</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nama_produk" name='nama_pemasok'>
              </div>
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambahkan</button>
       
        </div>
      </div>
    </div>
  </div> 
</form>
