@extends('templates.layout')

@push('style')

@endpush

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Barang</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('success')}}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                </div>
        @endif
  
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <ul>
                      @foreach ($errors->all() as $error)
                       <li>{{ $error }} </li>
                       @endforeach
                      </ul>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                </div>    
        @endif
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormBarang">
           Tambah Barang
        </button>
        @include('barang.data')
          </tbody>
        </table>
        </div>
      <!-- /.card-body -->
      <div class="card-footer ">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @include('barang.form')
    @include('barang.edit')
  </section>
@endsection

@push('script')

<script>
  $(document).ready(function() {
   $('.alert-success').fadeTo(2000, 500).slideUp(500, function(){
      $('.alert-success').slideUp(500)
  })
  $('.alert-danger').fadeTo(2000, 500).slideUp(500, function(){
      $('.alert-danger').slideUp(500)
  })
 })

  $(function(){
   $('#data-barang').DataTable()
  })

  //dialog hapus data
$('.delete-data').on('click', function(e){
 const nama_barang = $(this).closest('tr').find('td:eq(1)').text();
 console.log('tes')
 Swal.fire({
   icon: 'error',
   title: 'Hapus Data',
   html: `Apakah data <b>${nama_barang}</b> akan di hapus?`,
   confirmButtonText: 'Ya',
   denyButtonText: 'Tidak',
   'showDenyButton': true,
   focusConfirm: false
   }).then((result)=>{
     if(result.isConfirmed) 
     $(e.target).closest('form').submit()
     else swal.close()
   })
})
 

</script>
{{-- <script>  
 let table = new DataTable('#myTable');
</script> --}}
<script> 
$(document).ready(function(){

 $('#formBarangModal').on('show.bs.modal', function(e){
   let button = $(e.relatedTarget)
   let id = button.data('id')
   let kode = button.data('kode_barang')
   let produk = button.data('produk_id')
   let nama = button.data('nama_barang')
   let satuan = button.data('satuan')
   let harga= button.data('harga_jual')
   let stok = button.data('stok')
   let ditarik = button.data('ditarik')
   let user = button.data('user_id')


   $(this).find('#kode_barang').val(kode)
   $(this).find('#produk_id').val(produk)
   $(this).find('#satuan').val(satuan)
   $(this).find('#nama_barang').val(nama)
   $(this).find('#harga_jual').val(harga)
   $(this).find('#stok').val(stok)
   $(this).find('#ditarik').val(ditarik)
   $(this).find('#user_id').val(user)

   $('.form-edit').attr('action',`/barang/${id}`)
 })
})  
</script>

@endpush