<!-- Modal -->
<div class="modal fade" id="modalFormPelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Pelanggan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
          <form method="post" action="pelanggan">
            @csrf
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label">Kode Pelanggan n</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="kode" name='kode_pelanggan'>
              </div>

              <label for="staticEmail" class="col-sm-4 col-form-label">Nama Pelanggan</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nama" name='nama'>
              </div>

              <label for="staticEmail" class="col-sm-4 col-form-label">Alamat</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="alamat" name='alamat'>
              </div>

              <label for="staticEmail" class="col-sm-4 col-form-label">No Telepon</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="no_telp" name='no_telp'>
              </div>

              <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="email" name='email'>
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
