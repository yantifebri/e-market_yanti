@extends('templates.layout')

@push('style')

@endpush

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">User </h3>
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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFormUser">
         Tambah 
      </button>
      @include('users.data')
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
    @include('users.form')
    @include('users.edit')
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
    $('#data-user').DataTable()
   })

   //dialog hapus data
 $('.delete-data').on('click', function(e){
  const name = $(this).closest('tr').find('td:eq(1)').text();
  console.log('tes')
  Swal.fire({
    icon: 'error',
    title: 'Hapus Data',
    html: `Apakah data <b>${name}</b> akan di hapus?`,
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
 
  $('#formUserEdit').on('show.bs.modal', function(e){
    let button = $(e.relatedTarget)
    let id = button.data('id')
    let name = button.data('name')
    let email = button.data('email')
    let password = button.data('password')
   
    $(this).find('#name').val(name)
   $(this).find('#email').val(email)
   $(this).find('#password').val(password)

 
    $('.form-edit').attr('action',`{{url('users')}}/${id}`)
  })
})
</script>

@endpush