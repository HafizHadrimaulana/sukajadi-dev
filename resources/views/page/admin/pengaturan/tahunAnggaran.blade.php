@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Tahun Anggaran')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('content')
@role('superadmin|kecamatan')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tahun Anggaran</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Tahun Anggaran</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>
@endsection
@else

<script type="text/javascript">
  // Gunakan DOMContentLoaded untuk memastikan script dieksekusi setelah dokumen dimuat sepenuhnya
  document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
          icon: 'error',
          title: 'Akses Ditolak',
          text: 'Anda tidak memiliki akses ke halaman ini.',
          confirmButtonText: 'Kembali'
      }).then((result) => {
          // Redirect ke halaman utama atau tindakan lainnya
          window.location.href = '{{ route("home") }}';
      });
  });
</script>
@endrole