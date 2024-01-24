@extends('layouts.base_admin.base_dashboard')
@section('judul', ' Kalender')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            Agenda
            <small>Kalender</small> <a href="https://sukajadi.bandung.go.id/portal/admin/agenda_cetak/cetak_agenda" class="btn btn-primary"><i class="fa fa-table"></i> Tabel</a>
          </h1> 
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Kalender</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

<div class="card bg-gradient-success">
    <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
    <h3 class="card-title">
    <i class="far fa-calendar-alt"></i>
    Kalender
    </h3>
    
    <div class="card-tools">
    <div class="btn-group">
    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
    <i class="fas fa-bars"></i>
    </button>
    <div class="dropdown-menu" role="menu">
    <a href="#" class="dropdown-item">Add new event</a>
    <a href="#" class="dropdown-item">Clear events</a>
    <div class="dropdown-divider"></div>
    <a href="#" class="dropdown-item">View calendar</a>
    </div>
    </div>
    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
    <i class="fas fa-minus"></i>
    </button>
    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
    <i class="fas fa-times"></i>
    </button>
    </div>
    
    </div>
    
    <div class="card-body pt-0">
    
    <div id="calendar" style="width: 100%"><div class="bootstrap-datetimepicker-widget usetwentyfour"><ul class="list-unstyled"><li class="show"><div class="datepicker"><div class="datepicker-days" style=""><table class="table table-sm"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">October 2023</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td data-action="selectDay" data-day="10/01/2023" class="day weekend">1</td><td data-action="selectDay" data-day="10/02/2023" class="day">2</td><td data-action="selectDay" data-day="10/03/2023" class="day">3</td><td data-action="selectDay" data-day="10/04/2023" class="day">4</td><td data-action="selectDay" data-day="10/05/2023" class="day">5</td><td data-action="selectDay" data-day="10/06/2023" class="day">6</td><td data-action="selectDay" data-day="10/07/2023" class="day weekend">7</td></tr><tr><td data-action="selectDay" data-day="10/08/2023" class="day weekend">8</td><td data-action="selectDay" data-day="10/09/2023" class="day">9</td><td data-action="selectDay" data-day="10/10/2023" class="day">10</td><td data-action="selectDay" data-day="10/11/2023" class="day">11</td><td data-action="selectDay" data-day="10/12/2023" class="day">12</td><td data-action="selectDay" data-day="10/13/2023" class="day">13</td><td data-action="selectDay" data-day="10/14/2023" class="day weekend">14</td></tr><tr><td data-action="selectDay" data-day="10/15/2023" class="day weekend">15</td><td data-action="selectDay" data-day="10/16/2023" class="day">16</td><td data-action="selectDay" data-day="10/17/2023" class="day">17</td><td data-action="selectDay" data-day="10/18/2023" class="day">18</td><td data-action="selectDay" data-day="10/19/2023" class="day">19</td><td data-action="selectDay" data-day="10/20/2023" class="day">20</td><td data-action="selectDay" data-day="10/21/2023" class="day weekend">21</td></tr><tr><td data-action="selectDay" data-day="10/22/2023" class="day active today weekend">22</td><td data-action="selectDay" data-day="10/23/2023" class="day">23</td><td data-action="selectDay" data-day="10/24/2023" class="day">24</td><td data-action="selectDay" data-day="10/25/2023" class="day">25</td><td data-action="selectDay" data-day="10/26/2023" class="day">26</td><td data-action="selectDay" data-day="10/27/2023" class="day">27</td><td data-action="selectDay" data-day="10/28/2023" class="day weekend">28</td></tr><tr><td data-action="selectDay" data-day="10/29/2023" class="day weekend">29</td><td data-action="selectDay" data-day="10/30/2023" class="day">30</td><td data-action="selectDay" data-day="10/31/2023" class="day">31</td><td data-action="selectDay" data-day="11/01/2023" class="day new">1</td><td data-action="selectDay" data-day="11/02/2023" class="day new">2</td><td data-action="selectDay" data-day="11/03/2023" class="day new">3</td><td data-action="selectDay" data-day="11/04/2023" class="day new weekend">4</td></tr><tr><td data-action="selectDay" data-day="11/05/2023" class="day new weekend">5</td><td data-action="selectDay" data-day="11/06/2023" class="day new">6</td><td data-action="selectDay" data-day="11/07/2023" class="day new">7</td><td data-action="selectDay" data-day="11/08/2023" class="day new">8</td><td data-action="selectDay" data-day="11/09/2023" class="day new">9</td><td data-action="selectDay" data-day="11/10/2023" class="day new">10</td><td data-action="selectDay" data-day="11/11/2023" class="day new weekend">11</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2023</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month active">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year">2021</span><span data-action="selectYear" class="year">2022</span><span data-action="selectYear" class="year active">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td></tr></tbody></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td></tr></tbody></table></div></div></li><li class="picker-switch accordion-toggle"></li></ul></div></div>
    </div>

</div>
@endsection
</div>
</div>  
