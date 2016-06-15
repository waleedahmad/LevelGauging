@extends('index')

@section('title')
    Tank Details - fuelgauging.com
@stop()

@section('client-details')
<div class="client-details">
    @include('client.client_components.sidebar')
    @include('client.client_components.sidebar_tanks')
    <div class="content">
        <div class="header">
            <div class="header-left">
                <h2>Details - {{$tank_specs->marking_id}} {{$tank_specs->fuel_grade}}</h2>
            </div>
            <div class="header-right">
                Location - {{$tank_location->location_name}}
            </div>
        </div>
        <div class="content-blocks">
            <div class="top">
                <div class="left">
                    <div class="specs">
                        <h3>Specification</h3>

                        <div class="grade">
                            <p>
                                Grade of fuel : {{$tank_specs->fuel_grade}}
                            </p>

                            <p>
                                Markings ID : {{$tank_specs->marking_id}}
                            </p>
                        </div>

                        <div class="geom">
                            <p>
                                Shape : {{$tank_specs->shape}}
                            </p>
                            <p>
                                Titled : {{$tank_specs->titled}}
                            </p>

                            <p>
                                Internal : {{$tank_specs->internal}}
                            </p>
                        </div>
                    </div>

                    @if(Auth::user()->type === "admin")
                    <div class="edit-tank-specs" data-tankid="{{$tank->id}}">
                        @include('client.svgs.details.edit_tank_inspection_button')
                    </div>
                    @endif

                    <div class="tank">
                        @include('client.svgs.details.tanks.rectangle_tank')
                    </div>
                </div>

                <div class="right">
                    <h3>Physical location</h3>
                    <p>
                        Name : {{$tank_location->location_name}}
                    </p>
                    <p>
                        Airport code : {{$tank_location->airport_code}}
                    </p>

                    <div class="address">
                        <div class="left">
                            Address :
                        </div>

                        <div class="right">
                            <p>
                                {{$tank_location->street1}}
                            </p>
                            <p>
                                {{$tank_location->street2}}
                            </p>

                            <p>
                                {{$tank_location->postcode}}
                            </p>

                        </div>
                    </div>

                    @if(Auth::user()->type === "admin")
                    <div class="edit-tank-location" data-tankid="{{$tank->id}}">
                        @include('client.svgs.details.edit_tank_inspection_button')
                    </div>
                    @endif
                </div>
            </div>

            <div class="bottom">
                <div class="left">
                    <div class="inspection">
                        <h3>Tank Inspection</h3>

                       
                        <div class="edit-inspections">
                            <div class="edit-tank-inspection" data-tankid="{{$tank->id}}">
                                @include('client.svgs.details.edit_tank_inspection_button')
                            </div>
                        </div>
                       

                        <div class="dates">
                            <ul>
                                <li>
                                    <p>
                                        Date Inspected : {{$tank_inspection->date_inspected}}
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Date Cleaned : {{$tank_inspection->date_cleaned}}
                                    </p>
                                </li>
                            </ul>


                        </div>

                        <div class="details">
                            <p>
                                Contractor : {{$tank_inspection->contractor}}
                            </p>

                            <p>
                                Telephone : {{$tank_inspection->phone}}
                            </p>

                            <p>
                                Email : {{$tank_inspection->email}}
                            </p>
                        </div>
                    </div>

                    <div class="inspect-date">
                        <h3>Next Inspection due :  {{$tank_inspection->next_inspection}}</h3>

                        <div class="set-alert">
                            @include('client.svgs.details.set_alert_button')
                        </div>
                    </div>
                </div>

                <div class="right">
                    <h3>Report Histroy</h3>

                    <div class="upload">
                        <form class="history-form" method="post" enctype="multipart/form-data" action="/upload/history">
                            <span id="filename">Upload new File</span>
                            <label for="file-upload">Browse<input type="file" name="history" id="file-upload"></label>
                            <input name="tankid" type="hidden" value="{{$tank->id}}">
                            <input type="hidden" name="userid" value="{{$user_id}}">
                        </form>
                    </div>

                    <div class="files">
                        @foreach($files as $file)
                            <div class="file">
                                <div class="icon">
                                    @include('client.svgs.details.file_history_pdf_icon')
                                </div>

                                <div class="filename">
                                    <a href="{{$file->uri}}" target="_blank">{{ substr($file->file_name, 0, 15)}}</a>
                                </div>

                                <div class="remove">
                                    <span class="delete" data-id="{{$file->id}}">X</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if(Auth::user()->type === "admin")
                        <span class="glyphicon glyphicon-open-file report-upload" aria-hidden="true"></span>
                    @endif
                    <span class="close">X</span>
                </div>
            </div>
        </div>
    </div>

</div>

@stop()
