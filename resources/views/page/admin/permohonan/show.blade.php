@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Detail Surat Permohonan')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
                    <i class="fa fa-arrow-left"></i>
                    </a>
                    Detail Surat Permohonan
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Surat Permohonan</a></li>
                    <li class="breadcrumb-item active">{{ $data->nomor }}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card card-primary card-outline" id="data-content">
        <div class="card-header">
            <button class="btn btn-primary" onclick="updateState('setuju')">
                <i class="fa fa-check"></i>
                Setuju
            </button>
            <button class="btn btn-danger" onclick="updateState('tolak')">
                <i class="fa fa-times"></i>
                Tolak
            </button>
            <div class="card-tools">
                {{-- <a class="btn btn-success" href="{{ route('admin.kda.pengajuan.edit', $data->id) }}">
                    <i class="fa fa-edit"></i>
                    Ubah
                </a> --}}
                <button class="btn btn-danger" onclick="hapus({{ $data->id }})">
                    <i class="fa fa-trash"></i>
                    Hapus
                </button>
            </div>
        </div>
        <div class="card-body">
            <h3 class="fs-4">{{ $data->nomor }}</h3>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Nama Pemohon
                </div>
                <div class="col-8">
                    : {{ $data->nama }}
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Jenis Kelamin
                </div>
                <div class="col-8">
                    : {{ $data->jk }}
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Tempat / Tanggal Lahir
                </div>
                <div class="col-8">
                    : {{ $data->tmp_lahir }} / {{ \Carbon\Carbon::parse($data->tgl_lahir)->translatedFormat('d F Y') }}
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Agama
                </div>
                <div class="col-8">
                    : {{ $data->agama }}
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Pekerjaan
                </div>
                <div class="col-8">
                    : {{ $data->pekerjaan }}
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Status Pernikahan
                </div>
                <div class="col-8">
                    : {{ $data->status_pernikahan }}
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Kewarganegaraan
                </div>
                <div class="col-8">
                    : {{ $data->kewarganegaraan }}
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Kategori Permohonan
                </div>
                <div class="col-8">
                    : 
                    @if($data->kategori == 'ktp')
                       Pengantar KTP
                    @elseif($data->kategori == 'kk')
                       Pengantar KK
                    @elseif($data->kategori == 'pindah')
                       Surat Keterangan Pindah / Masuk
                    @elseif($data->kategori == 'usaha')
                       Surat Izin Usaha
                    @elseif($data->kategori == 'domisili')
                       Surat Domisili
                    @endif
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Status
                </div>
                <div class="col-8">
                    : {{ $data->status }}
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Alamat Email
                </div>
                <div class="col-8">
                    : {{ $data->email }}
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Alamat
                </div>
                <div class="col-8">
                    : {{ $data->alamat }}
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    RT / RW
                </div>
                <div class="col-8">
                    : {{ $data->rt }}/ {{ $data->rw }}
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Kelurahan
                </div>
                <div class="col-8">
                    : {{ $data->nama_j_kelurahan }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script>
        

        $(document).ready(function() {


        });

        function updateState(val){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('admin.permohonan.state', $data->id) }}",
                data: {
                    'status': val,
                },
                cache: false,
                success: function (response) {
                    const data = response.data;
                    if(response.fail == true){
                        for (control in response.errors) {
                            $('#field-' + control).addClass('is-invalid');
                            $('#error-' + control).html(response.errors[control]);
                        }
                    }else{
                        if(response.fail == false){
                                Swal.fire({
                                    toast : true,
                                    title: "Berhasil",
                                    text: "Data Berhasil Diperbaharui!",
                                    timer: 1500,
                                    showConfirmButton: false,
                                    icon: 'success',
                                    position : 'top-end'
                                }).then((result) => {
                                    location.reload();
                                });
                            }else{
                                Swal.fire({
                                    toast : true,
                                    title: "Gagal",
                                    text: "Data Gagal Diperbaharui!",
                                    timer: 1500,
                                    showConfirmButton: false,
                                    icon: 'error',
                                    position : 'top-end'
                                });
                            }
                    }
                }
            });
        }
        function hapus(id)
        {
            Swal.fire({
                icon : 'warning',
                text: 'Hapus Data?',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: `Tidak, Jangan!`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/admin/permohonan/"+id+"/delete",
                        type: "DELETE",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function(data) {
                            if(data.fail == false){
                                Swal.fire({
                                    toast : true,
                                    title: "Berhasil",
                                    text: "Data Berhasil Dihapus!",
                                    timer: 1500,
                                    showConfirmButton: false,
                                    icon: 'success',
                                    position : 'top-end'
                                }).then((result) => {
                                    // location.reload();
                                    window.location.href = "{{ route('admin.permohonan.index') }}"
                                });
                            }else{
                                Swal.fire({
                                    toast : true,
                                    title: "Gagal",
                                    text: "Data Gagal Dihapus!",
                                    timer: 1500,
                                    showConfirmButton: false,
                                    icon: 'error',
                                    position : 'top-end'
                                });
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                                Swal.fire({
                                    toast : true,
                                    title: "Gagal",
                                    text: "Terjadi Kesalahan Di Server!",
                                    timer: 1500,
                                    showConfirmButton: false,
                                    icon: 'error',
                                    position : 'top-end'
                                });
                        }
                    });
                }
            })
        }
    </script>
@endpush