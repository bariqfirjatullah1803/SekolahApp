@extends('layouts.app')

@section('content')
{{-- Modal Tambah --}}
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Tambah Data Sekolah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul id="errAdd"></ul>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nama Sekolah</label>
          <input type="text" class="form-control nama_sekolah" id="exampleFormControlInput1" placeholder="">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput2" class="form-label">Alamat Sekolah</label>
          <input type="text" class="form-control alamat_sekolah" id="exampleFormControlInput2" placeholder="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_sekolah">Save changes</button>
      </div>
    </div>
  </div>
</div>
{{-- !!!Modal Tambah --}}

{{-- Modal Edit --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Data Sekolah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul id="errEdit"></ul>
        <input type="hidden" id="idSekolah">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nama Sekolah</label>
          <input type="text" class="form-control" id="editNamaSekolah" placeholder="">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput2" class="form-label">Alamat Sekolah</label>
          <input type="text" class="form-control" id="editAlamatSekolah" placeholder="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary updateSekolah">Save changes</button>
      </div>
    </div>
  </div>
</div>
{{-- !!!Modal Edit --}}


{{-- Modal Delete --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="deleteModalLabel">Hapus Data Sekolah</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		  <input type="hidden" id="deleteId">
		  <h5>Apakah anda yakin akan menghapus data ini ?</h5>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-danger deleteSekolah">Confirm</button>
		</div>
	  </div>
	</div>
  </div>
{{-- !!!Modal Delete --}}


    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-6">List Data Sekolah</div>
                <div class="col-6 text-end"><a class="btn btn-primary btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Data</a></div>
              </div>
            </div>
            <div class="card-body">
              <div id="success"></div>
                <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formModalLabel">Form</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="modal-content"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Sekolah</th>
                            <th scope="col">Alamat Sekolah</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
  $(document).ready(function (){
    fetchdata();

    function fetchdata(){
      $.ajax({
        type:"GET",
        url:"/sekolah/show",
        dataType:"json",
        success: function(response){
          {{-- console.log(response.sekolah); --}}
          $('tbody').html("");
          $.each(response.sekolah, function (key,item){
            {{-- console.log(item.id); --}}
            $('tbody').append('<tr><th scope="row">'+item.id+'</th><td>'+item.nama_sekolah+'</td><td>'+item.alamat_sekolah+'</td><td><button type="button" value="'+item.id+'" class="edit btn btn-warning btn-sm mx-1">Edit</button><button type="button" value="'+item.id+'" class="delete btn btn-danger btn-sm mx-1">Delete</button></td></tr>');
          });
        }
      });
    }
	
	
    $(document).on('click','.edit',function(e){
      e.preventDefault();
      var id = $(this).val();
      {{-- console.log(id); --}}
      $('#editModal').modal('show');
      $.ajax({
        type: "GET",
        url: "/sekolah/edit/"+id,
        dataType: "json",
        success:function(response){
          if(response.status == 404){
            $('#success').html();
            $('#success').addClass('alert alert danger');
            $('#success').text(response.message);
          }else{
            $('#editNamaSekolah').val(response.sekolah.nama_sekolah);
            $('#editAlamatSekolah').val(response.sekolah.alamat_sekolah);
            $('#idSekolah').val(response.sekolah.id);
          }
        }
      });
    });

    $(document).on('click','.updateSekolah',function(e){
      e.preventDefault();
      var id = $('#idSekolah').val();
      let nama_sekolah = $('#editNamaSekolah').val();
      let alamat_sekolah = $('#editAlamatSekolah').val();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: "PUT",
        url: "/sekolah/update/"+id,
        data: {
          nama_sekolah:nama_sekolah,
          alamat_sekolah:alamat_sekolah
        },
        dataType: "JSON",
        success: function(response){
          console.log(response);
          if(response.status == 400){
            $('#errEdit').html("");
            $('#errEdit').addClass('alert alert-danger');
            $.each(response.error,function (key, err_values){

              $('#errEdit').append('<li>'+err_values+'</li>');
            })
          }else if(response.status == 404){
            $('#success').html();
            $('#success').addClass('alert alert danger');
            $('#success').text(response.message);
          }else{
            $('#success').html("");
            $('#success').addClass('alert alert-success');
            $('#success').text(response.message)
            $('#editModal').modal('hide');
			fetchdata();
          }
        }
      });
    });
    
	$(document).on('click','.delete',function(e){
		e.preventDefault();
		var id_sekolah= $(this).val();
		$('#deleteId').val(id_sekolah);

		console.log();
	    $('#deleteModal').modal('show');
	});
	$(document).on('click','.deleteSekolah',function(e){
		e.preventDefault();
		var btnIdDelete = $('#deleteId').val();
		$.ajaxSetup({
			headers: {
			  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		  });
		$.ajax({
			type: "DELETE",
			url: '/sekolah/delete/'+btnIdDelete,
			success: function (response) {
				{{-- console.log(response); --}}
				$('#success').html("");
				$('#success').addClass('alert alert-success');
				$('#success').text(response.message)
				$('#deleteModal').modal('hide');
				fetchdata();
			}

		})
	});


    $(document).on('click','.add_sekolah',function(e){
      e.preventDefault();
      let nama_sekolah = $('.nama_sekolah').val();
      let alamat_sekolah = $('.alamat_sekolah').val();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: 'post',
        url: '/sekolah',
        data: {
          nama_sekolah:nama_sekolah,
          alamat_sekolah:alamat_sekolah
        },
        dataType: 'json',
        success: function (response){
          console.log(response.error)
          if(response.status == 400)
          {
            $('#errAdd').html("");
            $('#errAdd').addClass('alert alert-danger');
            $.each(response.error,function (key, err_values){

              $('#errAdd').append('<li>'+err_values+'</li>');
            })
          }else{
            $('#success').html("");
            $('#success').addClass('alert alert-success');
            $('#success').text(response.message)
            $('#addModal').modal('hide');
            $('#addModal').find('input').val("");
			fetchdata();
          }
        }
      });
    })
  })
@endsection