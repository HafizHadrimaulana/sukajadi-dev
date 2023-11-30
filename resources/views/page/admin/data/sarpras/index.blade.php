@extends('layouts.base_admin.base_dashboard')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Akun</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">Akun</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- Default box -->
    <a href="/dashboard/admin/sarpras/create"><button class="btn btn-success fa fa-plus">Tambah
    </button></a>

    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
                <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="collapse"
                    title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button
                    type="button"
                    class="btn btn-tool"
                    data-card-widget="remove"
                    title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0" style="margin: 20px">
            <table
                id="previewAkun"
                class="table table-striped table-bordered display"
                style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $data)
                    <tr>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->latitude}}</td>
                        <td>{{$data->longitude}}</td>
                        <td>
                             <a href="/dashboard/admin/sarpras/{{$data->id}}/edit"><button class="btn btn-warning btn-sm mt-1"><i class="bi bi-pencil-square"> Edit</i></button></a>   
                             <form action="/dashboard/admin/sarpras/{{$data->id}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm mt-1"><i class="bi bi-pencil-square"> delete</i></button>
                            </form>
                            <a href="/dashboard/admin/sarpras/{{$data->id}}"></a>   
                        </td>    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
    <!-- /.card -->

</section>


@endsection