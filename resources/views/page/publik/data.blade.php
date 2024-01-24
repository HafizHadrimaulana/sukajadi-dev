@extends('layouts.app') @section('judul', 'Data') @section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>
<style>

    html, body {
        height: 100%;
        margin: 0;
    }
    .leaflet-container {
        height: 400px;
        width: 600px;
        max-width: 100%;
        max-height: 100%;
    }
</style>
<style>body { padding: 0; margin: 0; } #map { height: 100%; width: 100vw; }</style>
@section('content')
<div class="container-fluid">
<div id="map"></div>
</div>
<script>
	var map = L.map('map').setView([-6.8923871723015395, 107.5882335402375], 14);
	var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZXJpcHJhdGFtYSIsImEiOiJjbGZubmdib3UwbnRxM3Bya3M1NGE4OHRsIn0.oxYqbBbaBwx0dHLguu5gOA', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(map);

    @foreach ($map as $map)
            {
                var marker = L.marker([{{$map->latitude}}, {{$map->longitude}}]).addTo(map)
		.bindPopup('<b>{{$map->nama}}</b><br />I am a popup.');
            }
        @endforeach



	// var circle = L.circle([51.508, -0.11], {
	// 	color: 'red',
	// 	fillColor: '#f03',
	// 	fillOpacity: 0.5,
	// 	radius: 500
	// }).addTo(map).bindPopup('I am a circle.');
	// var polygon = L.polygon([
	// 	[51.509, -0.08],
	// 	[51.503, -0.06],
	// 	[51.51, -0.047]
	// ]).addTo(map).bindPopup('I am a polygon.');
	// var popup = L.popup()
	// 	.setLatLng([51.513, -0.09])
	// 	.setContent('I am a standalone popup.')
	// 	.openOn(map);
	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent('You clicked the map at ' + e.latlng.toString())
			.openOn(map);
	}
	map.on('click', onMapClick);
</script>
@endsection