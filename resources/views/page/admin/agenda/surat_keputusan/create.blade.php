@extends('layouts.base_admin.base_dashboard') 
@section('judul', 'Tambah Surat Keputusan')

@push('styles')

<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"/>

@endpush
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Surat Keputusan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Surat Keputusan</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <form id="form-kegiatan" method="POST" action="{{ route('admin.agenda.surat-keputusan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-nomor_urut">Nomor Urutan</label>
                            <input type="text" class="form-control {{ $errors->has('nomor_urut') ? 'is-invalid' : '' }}" name="nomor_urut" id="nomor_urut" placeholder="Masukan Nomor Urutan">
                            <x-input-error :messages="$errors->get('nomor_urut')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-tgl">Tanggal Diterima</label>
                            <input type="text" class="form-control bg-white {{ $errors->has('tgl') ? 'is-invalid' : '' }}" name="tgl" id="field-tgl" placeholder="Masukan Tanggal">
                            <x-input-error :messages="$errors->get('tgl')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-nomor_surat">Nomor Surat</label>
                            <input type="text" class="form-control {{ $errors->has('nomor_surat') ? 'is-invalid' : '' }}" name="nomor_surat" id="nomor_surat" placeholder="Masukan Nomor Surat">
                            <x-input-error :messages="$errors->get('nomor_surat')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-tgl_surat">Tanggal Surat</label>
                            <input type="text" class="form-control bg-white {{ $errors->has('tgl_surat') ? 'is-invalid' : '' }}" name="tgl_surat" id="field-tgl_surat" placeholder="Masukan Tanggal Surat">
                            <x-input-error :messages="$errors->get('tgl_surat')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-asal">Asal Surat</label>
                    <input type="text" class="form-control {{ $errors->has('asal') ? 'is-invalid' : '' }}" name="asal" id="field-asal" placeholder="Masukan Asal Surat">
                    <x-input-error :messages="$errors->get('asal')" class="mt-2" />
                </div>
                <div class="form-group">
                    <label for="field-perihal">Perihal Surat</label>
                    <input type="text" class="form-control {{ $errors->has('perihal') ? 'is-invalid' : '' }}" name="perihal" id="field-perihal" placeholder="Masukan Perihal Surat">
                    <x-input-error :messages="$errors->get('perihal')" class="mt-2" />
                </div>
                <div class="form-group">
                    <label for="field-disposisi">Disposisi / Tindak Lanjut Surat</label>
                    <input type="text" class="form-control {{ $errors->has('disposisi') ? 'is-invalid' : '' }}" name="disposisi" id="field-disposisi" placeholder="Masukan Disposisi Surat">
                    <x-input-error :messages="$errors->get('disposisi')" class="mt-2" />
                </div>
                <div class="form-group">
                    <label for="field-keterangan">Keterangan / Isi</label>
                    <textarea class="form-control" row="4" name="keterangan" id="field-keterangan" placeholder="Masukan Keterangan"></textarea>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" id="field-file">
                            <label class="custom-file-label" for="field-file">Pilih File</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</section>
@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/id.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            
            $("#field-tgl").flatpickr({
                altInput: true,
                altFormat: "j F Y",
                dateFormat: "Y-m-d",
                locale : "id",
                defaultDate : new Date(),
            });

            
            $("#field-tgl_surat").flatpickr({
                altInput: true,
                altFormat: "j F Y",
                dateFormat: "Y-m-d",
                locale : "id",
                defaultDate : new Date(),
            });

            
            $('#field-file').on('change',function(e){
                var fileName = e.target.files[0].name;
                $(this).next('.custom-file-label').html(fileName);
            });

            $('#field-keterangan').summernote({
                height: 300,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
            });
            
            $("#field-foto").fileinput({
                showCancel: false,
                showUpload:false,
                previewFileType:'any',
                maxFileSize: 10000,
                maxFileCount : 4,
            });
        });
    </script>
@endpush