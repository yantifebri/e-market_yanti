@extends('templates.layout')

@push('style')

@endpush

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Pemasok </h3>
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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalFormPemasok">
         Tambah Pemasok
      </button>
      @include('pemasok.data')
        </tbody>
      </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @include('pemasok.form')
    @include('pemasok.edit')
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
    $('#data-pemasok').DataTable()
   })

   //dialog hapus data
 $('.delete-data').on('click', function(e){
  const nama_pemasok = $(this).closest('tr').find('td:eq(1)').text();
  console.log('tes')
  Swal.fire({
    icon: 'error',
    title: 'Hapus Data',
    html: `Apakah data <b>${nama_pemasok}</b> akan di hapus?`,
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
 
  $('#formPemasokModal').on('show.bs.modal', function(e){
    let button = $(e.relatedTarget)
    let id = button.data('id')
    let nama = button.data('nama_pemasok')
    $('#nama_pemasok_edit').val(nama)
    $('.form-edit').attr('action',`/pemasok/${id}`)
  })
})
</script>

@endpush