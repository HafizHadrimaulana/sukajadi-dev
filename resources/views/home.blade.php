@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Halaman Dashboard')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard
          <small>Grafik</small>
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
<div class="container-fluid">

<div class="box-header with-border row">
<div class="col-lg-3 col-6">

<div class="small-box bg-info">
                <div class="inner"> 
                  <script type="text/javascript">window.setTimeout("waktu()",1000);function waktu(){var waktu=new Date();setTimeout("waktu()",1000);document.getElementById("jam").innerHTML=checkTime(waktu.getHours())+":"+checkTime(waktu.getMinutes())+":"+checkTime(waktu.getSeconds());var tanggallengkap=new String();var namahari=("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");namahari=namahari.split(" ");var namabulan=("Jan Feb Mar Apr Mei Jun Jul Ags Sep Okt Nov Des");namabulan=namabulan.split(" ");var tgl=new Date();var hari=tgl.getDay();var tanggal=tgl.getDate();var bulan=tgl.getMonth();var bulan3=tgl.getMonth()+1;var tahun=tgl.getFullYear().toString().substr(2,2);document.getElementById("tanggal2").innerHTML=tanggal+" "+namabulan[bulan]+" "+tahun;document.getElementById("tanggal3").innerHTML=tanggal+" / "+bulan3;document.getElementById("hari2").innerHTML=namahari[hari];}function checkTime(i){if(i<10){i="0"+i};return i;}</script> 
                    
                    <h3 class="hidden-xs"><span id="tanggal2">22 Okt 23</span></h3> 
                  
                  <p><span id="jam">22:56:30</span> - <span id="hari2">Minggu</span></p>
                  
                </div>
                <div class="icon">
                  <i class="fa fa-calendar"></i>
                </div>
                <a href="https://sukajadi.bandung.go.id/portal/admin/agenda/agenda_kalender" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
</div>

<div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                                    <h3>0</h3>
    
                  <p><b>0</b> Permohonan +<b> 0</b> Pengambilan</p>
                </div>
                <div class="icon">
                  <i class="fa fa-credit-card"></i>
                </div>
                <!-- href="https://sukajadi.bandung.go.id/portal/admin/kependudukan/entri_pendaftaran" -->
                <a href="#grafik-pelayanan" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <!--                  <h3>4878</h3>-->
                                    <h3>27.103</h3>
    
                  <p>Rekap Vaksinasi</p>
                </div>
                <div class="icon">
                  <i class="fas fa-syringe"></i>
                </div>
                <a href="https://sukajadi.bandung.go.id/portal/publik/covid/vaksin_publik_pendaftaran" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-orange">
                <div class="inner">
                  <!--                  <h3>0</h3> 
                  <i class="ion ion-pie-graph"></i>-->
                                    <h3>78</h3> 
    
                  <p>Posyandu</p>
                </div>
                <div class="icon">
                  <i class="fa fa-hospital"></i>
                </div>
                <a href="https://sukajadi.bandung.go.id/portal/pokjanal" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
        </div>
        <div class="box-header with-border row">
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner"> 
                                    <h3>Prestasi</h3> 
    
                  <p>Tahun ini</p>
                </div>
                <div class="icon">
                  <i class="fa fa-star"></i>
                </div>
                <a href="https://sukajadi.bandung.go.id/portal/admin/data/data_daftar_penghargaan" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-gray">
                <div class="inner"> 
                                    <h3>4.878</h3> 
    
                  <p>Data Sarana Prasarana</p>
                </div>
                <div class="icon">
                  <i class="fa fa-database"></i>
                </div>
                <a href="https://sukajadi.bandung.go.id/portal/admin/data/data_daftar_sarpras" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-pink">
                <div class="inner"> 
                                    <h3>1.192</h3> 
    
                  <p>DUTABULIN</p>
                </div>
                <div class="icon">
                  <i class="fa fa-child"></i>
                </div>
                <a href="https://sukajadi.bandung.go.id/portal/dutabulin" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner"> 
                                    <h3>816</h3> 
    
                  <p>Rembug Warga</p>
                </div>
                <div class="icon">
                  <i class="fa fa-comments"></i>
                </div>
                <a href="https://sukajadi.bandung.go.id/portal/admin/aspirasi/rembugwarga_rekap" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
        </div>
</div>  



<div class="row">

<section class="col-lg-7 connectedSortable ui-sortable">

<div class="card">
<div class="card-header ui-sortable-handle" style="cursor: move;">
<h3 class="card-title">
<i class="fas fa-chart-pie mr-1"></i>
Sales
</h3>
<div class="card-tools">
<ul class="nav nav-pills ml-auto">
<li class="nav-item">
<a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
</li>
</ul>
</div>
</div>
<div class="card-body">
<div class="tab-content p-0">

<div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
<canvas id="revenue-chart-canvas" height="300" style="height: 300px; display: block; width: 837px;" width="837" class="chartjs-render-monitor"></canvas>
</div>
<div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
<canvas id="sales-chart-canvas" height="0" style="height: 0px; display: block; width: 0px;" class="chartjs-render-monitor" width="0"></canvas>
</div>
</div>
</div>
</div>


<div class="card direct-chat direct-chat-primary">
<div class="card-header ui-sortable-handle" style="cursor: move;">
<h3 class="card-title">Direct Chat</h3>
<div class="card-tools">
<span title="3 New Messages" class="badge badge-primary">3</span>
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
<i class="fas fa-comments"></i>
</button>
<button type="button" class="btn btn-tool" data-card-widget="remove">
<i class="fas fa-times"></i>
</button>
</div>
</div>

<div class="card-body">

<div class="direct-chat-messages">

<div class="direct-chat-msg">
<div class="direct-chat-infos clearfix">
<span class="direct-chat-name float-left">Alexander Pierce</span>
<span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
</div>

<img class="direct-chat-img" src="vendor/adminlte3/img/user1-128x128.jpg" alt="message user image">

<div class="direct-chat-text">
Is this template really for free? That's unbelievable!
</div>

</div>


<div class="direct-chat-msg right">
<div class="direct-chat-infos clearfix">
<span class="direct-chat-name float-right">Sarah Bullock</span>
<span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
</div>

<img class="direct-chat-img" src="vendor/adminlte3/img/user3-128x128.jpg" alt="message user image">

<div class="direct-chat-text">
You better believe it!
</div>

</div>


<div class="direct-chat-msg">
<div class="direct-chat-infos clearfix">
<span class="direct-chat-name float-left">Alexander Pierce</span>
<span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
</div>

<img class="direct-chat-img" src="vendor/adminlte3/img/user1-128x128.jpg" alt="message user image">

<div class="direct-chat-text">
Working with AdminLTE on a great new app! Wanna join?
</div>

</div>


<div class="direct-chat-msg right">
<div class="direct-chat-infos clearfix">
<span class="direct-chat-name float-right">Sarah Bullock</span>
<span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
</div>

<img class="direct-chat-img" src="vendor/adminlte3/img/user3-128x128.jpg" alt="message user image">

<div class="direct-chat-text">
I would love to.
</div>

</div>

</div>


<div class="direct-chat-contacts">
<ul class="contacts-list">
<li>
<a href="#">
<img class="contacts-list-img" src="vendor/adminlte3/img/user1-128x128.jpg" alt="User Avatar">
<div class="contacts-list-info">
<span class="contacts-list-name">
Count Dracula
<small class="contacts-list-date float-right">2/28/2015</small>
</span>
<span class="contacts-list-msg">How have you been? I was...</span>
</div>

</a>
</li>

<li>
<a href="#">
<img class="contacts-list-img" src="vendor/adminlte3/img/user7-128x128.jpg" alt="User Avatar">
<div class="contacts-list-info">
<span class="contacts-list-name">
Sarah Doe
<small class="contacts-list-date float-right">2/23/2015</small>
</span>
<span class="contacts-list-msg">I will be waiting for...</span>
</div>

</a>
</li>

<li>
<a href="#">
<img class="contacts-list-img" src="vendor/adminlte3/img/user3-128x128.jpg" alt="User Avatar">
<div class="contacts-list-info">
<span class="contacts-list-name">
Nadia Jolie
<small class="contacts-list-date float-right">2/20/2015</small>
</span>
<span class="contacts-list-msg">I'll call you back at...</span>
</div>

</a>
</li>

<li>
<a href="#">
<img class="contacts-list-img" src="vendor/adminlte3/img/user5-128x128.jpg" alt="User Avatar">
<div class="contacts-list-info">
<span class="contacts-list-name">
Nora S. Vans
<small class="contacts-list-date float-right">2/10/2015</small>
</span>
<span class="contacts-list-msg">Where is your new...</span>
</div>

</a>
</li>

<li>
<a href="#">
<img class="contacts-list-img" src="vendor/adminlte3/img/user6-128x128.jpg" alt="User Avatar">
<div class="contacts-list-info">
<span class="contacts-list-name">
John K.
<small class="contacts-list-date float-right">1/27/2015</small>
</span>
<span class="contacts-list-msg">Can I take a look at...</span>
</div>

</a>
</li>

<li>
<a href="#">
<img class="contacts-list-img" src="vendor/adminlte3/img/user8-128x128.jpg" alt="User Avatar">
<div class="contacts-list-info">
<span class="contacts-list-name">
Kenneth M.
<small class="contacts-list-date float-right">1/4/2015</small>
</span>
<span class="contacts-list-msg">Never mind I found...</span>
</div>

</a>
</li>

</ul>

</div>

</div>

<div class="card-footer">
<form action="#" method="post">
<div class="input-group">
<input type="text" name="message" placeholder="Type Message ..." class="form-control">
<span class="input-group-append">
<button type="button" class="btn btn-primary">Send</button>
</span>
</div>
</form>
</div>

</div>


<div class="card">
<div class="card-header ui-sortable-handle" style="cursor: move;">
<h3 class="card-title">
<i class="ion ion-clipboard mr-1"></i>
To Do List
</h3>
<div class="card-tools">
<ul class="pagination pagination-sm">
<li class="page-item"><a href="#" class="page-link">«</a></li>
<li class="page-item"><a href="#" class="page-link">1</a></li>
<li class="page-item"><a href="#" class="page-link">2</a></li>
<li class="page-item"><a href="#" class="page-link">3</a></li>
<li class="page-item"><a href="#" class="page-link">»</a></li>
</ul>
</div>
</div>

<div class="card-body">
<ul class="todo-list ui-sortable" data-widget="todo-list">
<li>

<span class="handle ui-sortable-handle">
<i class="fas fa-ellipsis-v"></i>
<i class="fas fa-ellipsis-v"></i>
</span>

<div class="icheck-primary d-inline ml-2">
<input type="checkbox" value="" name="todo1" id="todoCheck1">
<label for="todoCheck1"></label>
</div>

<span class="text">Design a nice theme</span>

<small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>

<div class="tools">
<i class="fas fa-edit"></i>
<i class="fas fa-trash-o"></i>
</div>
</li>
<li class="done">
<span class="handle ui-sortable-handle">
<i class="fas fa-ellipsis-v"></i>
<i class="fas fa-ellipsis-v"></i>
</span>
<div class="icheck-primary d-inline ml-2">
<input type="checkbox" value="" name="todo2" id="todoCheck2" checked="">
<label for="todoCheck2"></label>
</div>
<span class="text">Make the theme responsive</span>
<small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
<div class="tools">
<i class="fas fa-edit"></i>
<i class="fas fa-trash-o"></i>
</div>
</li>
<li>
<span class="handle ui-sortable-handle">
<i class="fas fa-ellipsis-v"></i>
<i class="fas fa-ellipsis-v"></i>
</span>
<div class="icheck-primary d-inline ml-2">
<input type="checkbox" value="" name="todo3" id="todoCheck3">
<label for="todoCheck3"></label>
</div>
<span class="text">Let theme shine like a star</span>
<small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
<div class="tools">
<i class="fas fa-edit"></i>
<i class="fas fa-trash-o"></i>
</div>
</li>
<li>
<span class="handle ui-sortable-handle">
<i class="fas fa-ellipsis-v"></i>
<i class="fas fa-ellipsis-v"></i>
</span>
<div class="icheck-primary d-inline ml-2">
<input type="checkbox" value="" name="todo4" id="todoCheck4">
<label for="todoCheck4"></label>
</div>
<span class="text">Let theme shine like a star</span>
<small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
<div class="tools">
<i class="fas fa-edit"></i>
<i class="fas fa-trash-o"></i>
</div>
</li>
<li>
<span class="handle ui-sortable-handle">
<i class="fas fa-ellipsis-v"></i>
<i class="fas fa-ellipsis-v"></i>
</span>
<div class="icheck-primary d-inline ml-2">
<input type="checkbox" value="" name="todo5" id="todoCheck5">
<label for="todoCheck5"></label>
</div>
<span class="text">Check your messages and notifications</span>
<small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
<div class="tools">
<i class="fas fa-edit"></i>
<i class="fas fa-trash-o"></i>
</div>
</li>
<li>
<span class="handle ui-sortable-handle">
<i class="fas fa-ellipsis-v"></i>
<i class="fas fa-ellipsis-v"></i>
</span>
<div class="icheck-primary d-inline ml-2">
<input type="checkbox" value="" name="todo6" id="todoCheck6">
<label for="todoCheck6"></label>
</div>
<span class="text">Let theme shine like a star</span>
<small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
<div class="tools">
<i class="fas fa-edit"></i>
<i class="fas fa-trash-o"></i>
</div>
</li>
</ul>
</div>

<div class="card-footer clearfix">
<button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</button>
</div>
</div>

</section>


<section class="col-lg-5 connectedSortable ui-sortable">

<div class="card bg-gradient-secondary">
<div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
<h3 class="card-title">
<i class="fas fa-map-marker-alt mr-1"></i>
GIS Sukajadi Bandung
</h3>

<div class="card-tools">
<button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
<i class="far fa-calendar-alt"></i>
</button>
<button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
<i class="fas fa-minus"></i>
</button>
</div>

</div>
<div class="card-body">
  <iframe width='100%' height='640px' src='https://www.arcgis.com/apps/View/index.html?appid=aff8a31acc4342c191004bc9c4eb84cb&extent=107.5702,-6.8908,107.6105,-6.8706' frameborder='0' scrolling='no'></iframe>
</div>

</div>

</div>
</div>


<div class="card bg-gradient-info">
<div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
<h3 class="card-title">
<i class="fas fa-th mr-1"></i>
Sales Graph
</h3>
<div class="card-tools">
<button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
<i class="fas fa-times"></i>
</button>
</div>
</div>
<div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
<canvas class="chart chartjs-render-monitor" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 837px;" width="837" height="250"></canvas>
</div>

<div class="card-footer bg-transparent">
<div class="row">
<div class="col-4 text-center">
<div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>
<div class="text-white">Mail-Orders</div>
</div>

<div class="col-4 text-center">
<div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>
<div class="text-white">Online</div>
</div>

<div class="col-4 text-center">
<div style="display:inline;width:60px;height:60px;"><canvas width="60" height="60"></canvas><input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgcolor="#39CCCC" readonly="readonly" style="width: 34px; height: 20px; position: absolute; vertical-align: middle; margin-top: 20px; margin-left: -47px; border: 0px; background: none; font: bold 12px Arial; text-align: center; color: rgb(57, 204, 204); padding: 0px; appearance: none;"></div>
<div class="text-white">In-Store</div>
</div>

</div>

</section>

</div>

</div>
</section>
@endsection