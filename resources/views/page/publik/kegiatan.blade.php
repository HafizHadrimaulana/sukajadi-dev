<x-landing-layout>
    <section class="content pb-md-4 pt-md-4">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="fw-bold">Laporan Kegiatan</h1>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-md-5">
                            <x-sopd-select ></x-sopd-select>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control bg-white" id="filter-tgl"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="timeline">
                @foreach($data as $t)
                <div class="time-label">
                    <span class="bg-red">10 Feb. 2014</span>
                </div>


                <div>
                    <i class="fas fa-envelope bg-blue"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                        <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                        </div>
                        <div class="timeline-footer">
                            <a class="btn btn-primary btn-sm">Read more</a>
                            <a class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </div>
                </div>
                
                @endforeach

            </div>
        </div>
    </section>
</x-landing-layout>