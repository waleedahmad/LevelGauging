@extends('index')

@section('title')
    Tank Dashboard - fuelgauging.com
@stop()

@section('client-dashboard')
<div class="client-dasboard">
    @include('client.client_components.sidebar')
    @include('client.client_components.sidebar_tanks')
    <div class="content">
        <div class="header">
            <div class="header-left">
                <h2>Dashboard - {{$tank_specs->marking_id}} {{$tank_specs->fuel_grade}}</h2>
            </div>
            <div class="header-right">
                Location - {{$tank_location->location_name}}
            </div>
        </div>
        <div class="content-blocks">
            <div class="content-block-left">
                <div class="content-block-left-capchart">
                    <div id="gauge"></div>
                    <div id="cap-chart"></div>
                    <div id="levels">
                        <div class="sfl">
                            Max SFL <span class="level">19000</span> L
                        </div>

                        <div class="litres">
                            <span class="level">16,825.6</span> L
                        </div>
                        <div class="refresh-levels-btn">
                            @include('client.svgs.dashboard.refresh_data')
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-block-right">
                <div class="top">
                    <div class="current-fuel">
                        <div class="title">
                            Current fuel
                        </div>
                        <div class="data">
                            <div class="cap">
                                {{number_format($tanklevels->current_fuel, 1, '.', ',')}} L
                            </div>

                            <div class="percent">
                                @if($tanklevels->current_fuel)
                                    {{round(($tanklevels->current_fuel/$tanklevels->max_sfl)*100, 2)}} %
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="ullage">
                        <div class="title">
                            Tank ullage
                        </div>
                        <div class="data">
                            <div class="cap">
                                {{number_format($tanklevels->tank_ullage, 1, '.', ',')}} L
                            </div>

                            <div class="percent">
                                @if($tanklevels->current_fuel)
                                    {{100 - round(($tanklevels->current_fuel/$tanklevels->max_sfl)*100, 2)}} %
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bottom">
                    <div class="mass">
                        <div class="mass-top">
                            <div class="title">
                                Fuel mass
                            </div>

                            <div class="data">
                                {{number_format($tanklevels->fuel_mass, 1, '.', ',')}} Kg
                            </div>
                        </div>

                        <div class="mass-bottom">
                            <div class="title">
                                Corrected density
                            </div>

                            <div class="data">
                                {{round($tanklevels->corrected_density,4)}} Kg/L
                            </div>
                        </div>
                    </div>

                    <div class="date">
                        <div class="sample-date">
                            Sample Taken : {{$tanklevels->sample_taken}}
                        </div>

                        <div class="sample-data">
                            <div class="sample-data-left">
                                <div class="density">
                                    Density of sample : {{round($tanklevels->corrected_density,4)}}
                                </div>
                                <div class="temp">
                                    Temperature of sample : {{$tanklevels->sample_temp}} C
                                </div>
                            </div>

                            <div class="sample-data-right">
                                <button class="upload-button">
                                    @include('client.svgs.dashboard.upload_button')
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="avg-fuel-chart">
            <div id="avg-chart"></div>
        </div>
    </div>
</div>
@stop()
