@extends('siswa.index')

@section('modal')
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
          <select class="form-select" id="inputJenisKelamin">
            <option selected>Pilih</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="inputAlamat" class="form-label">Alamat Siswa</label>
          <textarea class="form-control" id="inputAlamat" >
        </div>
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
        <label for="inputSekolah" class="form-label">Jenis Kelamin</label>
        <select class="form-select" id="inputSekolah">
        </select>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary saveSiswa">Save changes</button>
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


@endsection