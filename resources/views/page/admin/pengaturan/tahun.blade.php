@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Tahun')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@role('superadmin|kecamatan')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tahun</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Tahun</li>
          </ol>
        </div>
      </div>
    </div>
</section>
<section class="content">

    <div class="card">
        <div class="card-header">
            <button class="btn btn-success" onclick="add_data_tabel()"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered datatable w-100">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TAHUN</th>
                        <th width="20%" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
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

@push('scripts')
    <script>
        $(document).ready(function() {

            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                dom : "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: {
                    url : "{{ route('admin.tahun.index') }}",
                },
                columns: [
                    {data: 'id_j_tahun', name: 'id_j_tahun'},
                    {data: 'nama_j_tahun', name: 'nama_j_tahun'},
                    {
                        data: 'action', 
                        name: 'action', 
                        orderable: true, 
                        searchable: true
                    },
                ]
            });
            $("#btn-filter").on("click", function(e){ 
                // alert('sasa');
                $("#data-content").removeClass('d-none');
                table.draw();
            });
            

            $("#btn-reset").on("click", function(e){ 
                // alert('sasa');
                $("#filter-tahun").val("");
                $('#filter-tahun').trigger('change');
                $("#data-content").addClass('d-none');
                table.draw();
            });

        });
    </script>
@endpush