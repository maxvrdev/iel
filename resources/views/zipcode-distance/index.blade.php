@extends('layouts.default')

{{-- Page title --}}
@section('title') Haversine Formula Demonstration
@parent
@stop

@section('footer_scripts')
    <script type="text/javascript">
        let start_zip;
        let start_latitude;
        let start_longitude;
        let dest_zip;
        let dest_latitude;
        let dest_longitude;

        let find_destination = function () {
            if(start_zip){
                if(dest_zip){
                    retrieve_distance();
                }
            }
        }

        let starting_point = function (e) {
            let ele = document.getElementById('starting_point');
            start_zip = e.dataset.zip;
            start_latitude = e.dataset.latitude;
            start_longitude = e.dataset.longitude;
            ele.innerHTML = '<strong>Zipcode:</strong> ' + start_zip + '<br><strong>Latitude:</strong> ' + start_latitude + '<br><strong>Longitude:</strong> ' + start_longitude;
            find_destination();
        };

        let destination = function (e) {
            let ele = document.getElementById('destination');
            dest_zip = e.dataset.zip;
            dest_latitude = e.dataset.latitude;
            dest_longitude = e.dataset.longitude;
            ele.innerHTML = '<strong>Zipcode:</strong> ' + start_zip + '<br><strong>Latitude:</strong> ' + start_latitude + '<br><strong>Longitude:</strong> ' + start_longitude;
            find_destination();
        };

        let retrieve_distance = function (e) {
            const form_data = new FormData();
            form_data.append('start_latitude', start_latitude);
            form_data.append('start_longitude', start_longitude);
            form_data.append('dest_latitude', dest_latitude);
            form_data.append('dest_longitude', dest_longitude);

            window.axios.post( "{{ route('ajax.distance') }}", form_data)
                    .then(function (response) {
                        let ele = document.getElementById('distance');
                        ele.innerHTML = '<p>' + response.data.distance_km + ' KM<br>' + response.data.distance_mi + ' MI</p>';
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    });
        }
    </script>
@endsection

{{-- Page content --}}
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Zip Code Distance</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Test for IEL</li>
                <li class="breadcrumb-item">Select the starting Zipcode</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-header">Starting Point</div>
                        <div id="starting_point" class="card-body"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-header">Destination</div>
                        <div id="destination" class="card-body"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-header">Distance</div>
                        <div id="distance" class="card-body"></div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Zip Codes
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Zip Code</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Zip Code</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($zipcodes as $zipcode)
                            <tr>
                                <td>{{ $zipcode->zip }}</td>
                                <td>{{ $zipcode->latitude }}</td>
                                <td>{{ $zipcode->longitude }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-primary btn-sm start" onclick="starting_point(this)"
                                           data-id="{{ $zipcode->id }}"
                                           data-zip="{{ $zipcode->zip }}"
                                           data-latitude="{{ $zipcode->latitude }}"
                                           data-longitude="{{ $zipcode->longitude }}">Start</a>
                                        <a href="#" class="btn btn-info btn-sm destination" onclick="destination(this)"
                                           data-id="{{ $zipcode->id }}"
                                           data-zip="{{ $zipcode->zip }}"
                                           data-latitude="{{ $zipcode->latitude }}"
                                           data-longitude="{{ $zipcode->longitude }}">Destination</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>


@stop
