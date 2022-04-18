@extends('layouts.app')

@section('content')
    {{-- Modal Tambah --}}
    <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="errorDataTambah"></ul>
                    <div class="mb-3">
                        <label for="inputNisn" class="form-label">NISN</label>
                        <input type="number" class="form-control " id="inputNisn" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="inputNama" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="inputNama" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="inputKelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="inputKelamin">
                            <option selected>Pilih</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="inputAlamat" class="form-label">Alamat Siswa</label>
                        <textarea class="form-control" id="inputAlamat">
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="inputSekolah" class="form-label">Sekolah</label>
                        <select class="form-select" id="inputSekolah">
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_siswa">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- !!!Modal Tambah --}}

    {{-- Modal Edit --}}
    <div class="modal fade" id="editSiswaModal" tabindex="-1" aria-labelledby="editSiswaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSiswaModalLabel">Edit Data Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="errorEditSiswa"></ul>
                    <input type="text" id="idSiswa">
                    <div class="mb-3">
                      <label for="inputEditNisn" class="form-label">NISN</label>
                      <input type="number" class="form-control " id="inputEditNisn" placeholder="">
                  </div>
                  <div class="mb-3">
                      <label for="inputEditNama" class="form-label">Nama Siswa</label>
                      <input type="text" class="form-control" id="inputEditNama" placeholder="">
                  </div>
                  <div class="mb-3">
                      <label for="inputEditKelamin" class="form-label">Jenis Kelamin</label>
                      <select class="form-select" id="inputEditKelamin">
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                      </select>
                  </div>
                  <div class="mb-3">
                      <label for="inputEditAlamat" class="form-label">Alamat Siswa</label>
                      <textarea class="form-control" id="inputEditAlamat">
                      </textarea>
                  </div>
                  <div class="mb-3">
                      <label for="inputEditSekolah" class="form-label">Sekolah</label>
                      <select class="form-select" id="inputEditSekolah">
                      </select>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="" class="btn btn-primary updateSiswaBtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    {{-- !!!Modal Edit --}}


    {{-- Modal Delete --}}
    <div class="modal fade" id="deleteSiswaModal" tabindex="-1" aria-labelledby="deleteSiswaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSiswaModalLabel">Hapus Data Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="deleteId">
                    <h5>Apakah anda yakin akan menghapus data ini ?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger deleteSiswa">Confirm</button>
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
                    <div class="col-6 text-end"><a class="btn btn-primary btn-sm" href="#" data-bs-toggle="modal"
                            data-bs-target="#tambahDataModal">Tambah Data</a></div>
                </div>
            </div>
            <div class="card-body">
                <div id="successDataSiswa"></div>
                <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel"
                    aria-hidden="true">
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
                            <th scope="col">NISN</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Sekolah</th>
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
    fetchSekolah();
    function fetchSekolah(){
      $.ajax({
        type:"GET",
        url:"/siswa/show",
        dataType:"json",
        success: function(response){
          $('#inputSekolah').html("");
          $.each(response.sekolah, function (key,item){
            $('#inputSekolah').append('<option value="'+item.id+'">'+item.nama_sekolah+'</option>');
          });
          $('#inputEditSekolah').html("");
          $.each(response.sekolah, function (key,item){
            $('#inputEditSekolah').append('<option value="'+item.id+'">'+item.nama_sekolah+'</option>');
          });
        }
      });
    }
    function fetchdata(){
      $.ajax({
        type:"GET",
        url:"/siswa/show",
        dataType:"json",
        success: function(response){
          {{-- console.log(response.sekolah); --}}
          $('tbody').html("");
          $.each(response.siswa, function (key,item){
          $.each(response.sekolah, function (key,is){
            if(item.sekolah_id == is.id){

              $('tbody').append('<tr>\
                <th scope="row">'+item.nisn+'</th>\
                <td>'+item.nama_siswa+'</td>\
                <td>'+item.jenis_kelamin+'</td>\
                <td>'+item.alamat+'</td>\
                <td>'+is.nama_sekolah+'</td>\
                <td><button type="button" value="'+item.nisn+'" id="editSiswaBtn" class=" btn btn-warning btn-sm mx-1">Edit</button><button type="button" value="'+item.id+'"  id="deleteSiswaBtn" class=" btn btn-danger btn-sm mx-1">Delete</button></td>\
              </tr>');
              {{-- console.log(item.id);
              console.log('sekolah');
              console.log(is.id) --}}
            }
          }); 
          });
        }
      });
    }
	
    {{-- Show Data --}}
    $(document).on('click','#editSiswaBtn',function(e){
      e.preventDefault();
      var nisn = $(this).val();
      console.log(nisn);
      $('#inputEditNisn').val(nisn);
      $('#editSiswaModal').modal('show');
      $.ajax({
        type: "GET",
        url: "/siswa/edit/"+nisn,
        dataType: "json",
        success:function(response){
          console.log(response);
          if(response.status == 404){
            $('#successDataSiswa').html();
            $('#successDataSiswa').addClass('alert alert danger');
            $('#successDataSiswa').text(response.message);
          }else{
            {{-- $('#inputEditNisn').val(response.siswa.nisn); --}}
            $('#inputEditNama').val(response.siswa.nama_siswa);
            {{-- $('#inputEditKelamin').val(response.siswa.jenis_kelamin); --}}
            $('#inputEditAlamat').val(response.siswa.alamat);
            
          }
        }
      });
    });
    {{-- !!!Show Data --}}

    $(document).on('click','.updateSiswaBtn',function(e){
      e.preventDefault();
      console.log('test');
      let nisn = $('#inputEditNisn').val();
      var data = {
        nama_siswa:$('#inputEditNama').val(),
        jenis_kelamin:$('#inputEditKelamin').val(),
        alamat:$('#inputEditAlamat').val(),
        sekolah_id:$('#inputEditSekolah').val()
      };
      console.log(data);

      {{-- let nisn = $('#inputNisn').val();
      let nama_siswa = $('#inputNama').val();
      let jenis_kelamin = $('#inputKelamin').val();
      let alamat = $('#inputAlamat').val();
      let sekolah_id = $('#inputSekolah').val();       --}}
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      {{-- $('#editSiswaModal').modal('hide'); --}}
      $.ajax({
        type: "PUT",
        url: "/siswa/update/"+nisn,
        {{-- data: {
          nisn:nisn,
          nama_siswa:nama_siswa,
          jenis_kelamin:jenis_kelamin,
          alamat:alamat,
          sekolah_id:sekolah_id        
        }, --}}
        data:data,
        dataType: "JSON",
        success: function(response){
          console.log(response);
          if(response.status == 400){
            $('#errorEditSiswa').html("");
            $('#errorEditSiswa').addClass('alert alert-danger');
            $.each(response.error,function (key, err_values){

              $('#errorEditSiswa').append('<li>'+err_values+'</li>');
            })
          }else if(response.status == 404){
            $('#successDataSiswa').html();
            $('#successDataSiswa').addClass('alert alert danger');
            $('#successDataSiswa').text(response.message);
          }else{
            $('#successDataSiswa').html("");
            $('#successDataSiswa').addClass('alert alert-success');
            $('#successDataSiswa').text(response.message)
            $('#editSiswaModal').modal('hide');
			      fetchdata();
          }
        }
      });
    });
    
	$(document).on('click','#deleteSiswaBtn',function(e){
		e.preventDefault();
		var id= $(this).val();
		$('#deleteId').val(id);

		console.log(id);	    
    $('#deleteSiswaModal').modal('show');
	});
	$(document).on('click','.deleteSiswa',function(e){
		e.preventDefault();
		var btnIdDelete = $('#deleteId').val();
    console.log(btnIdDelete);
		$.ajaxSetup({
			headers: {
			  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		  });
		$.ajax({
			type: "DELETE",
			url: '/siswa/delete/'+btnIdDelete,
			success: function (response) {
				console.log(response);
				$('#successDataSiswa').html("");
				$('#successDataSiswa').addClass('alert alert-success');
				$('#successDataSiswa').text(response.message)
				$('#deleteSiswaModal').modal('hide');
				fetchdata();
			}

		})
	});


    $(document).on('click','.add_siswa',function(e){
      e.preventDefault();
      var data = {
        nisn:$('#inputNisn').val(),
        nama_siswa:$('#inputNama').val(),
        jenis_kelamin:$('#inputKelamin').val(),
        alamat:$('#inputAlamat').val(),
        sekolah_id:$('#inputSekolah').val()
      };
      {{-- console.log(data);
      let nisn = $('#inputNisn').val();
      let nama_siswa = $('#inputNama').val();
      let jenis_kelamin = $('#inputKelamin').val();
      let alamat = $('#inputAlamat').val();
      let sekolah_id = $('#inputSekolah').val(); --}}
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: 'post',
        url: '/siswa',
        {{-- data: {
          nisn:nisn,
          nama_siswa:nama_siswa,
          jenis_kelamin:jenis_kelamin,
          alamat:alamat,
          sekolah_id:sekolah_id
        }, --}}
        data:data,
        dataType: 'json',
        success: function (response){
          {{-- console.log(response) --}}
          if(response.status == 400)
          {
            $('#errorDataTambah').html("");
            $('#errorDataTambah').addClass('alert alert-danger');
            $.each(response.error,function (key, err_values){

              $('#errorDataTambah').append('<li>'+err_values+'</li>');
            })
          }else{
            $('#successDataSiswa').html("");
            $('#successDataSiswa').addClass('alert alert-success');
            $('#successDataSiswa').text(response.message)
            $('#tambahDataModal').modal('hide');
            $('#tambahDataModal').find('input').val("");
            $('#tambahDataModal').find('textarea').val("");
			fetchdata();
          }
        }
      });
    })
  })
@endsection