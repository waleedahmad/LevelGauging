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
                                {{round(($tank->tanklevels/$tanklevels->max_sfl)*100, 2)}} %
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
                                {{100 - round(($tanklevels->current_fuel/$tanklevels->max_sfl)*100, 2)}} %
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


                                    <?xml version="1.0" encoding="utf-8"?>
                                    <svg version="1.1" id="upload-data-button" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    	 viewBox="0 0 106 23.1" enable-background="new 0 0 106 23.1" xml:space="preserve">
                                    <g>
                                    	<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M0,3.5C0.6,2.9,1.2,2.4,1.9,2c1.5-1,3.2-1.6,4.9-1.8
                                    		c0.2,0,0.4,0,0.6-0.1l0.3,0l1,0l0.2,0c0.2,0,0.4,0.1,0.6,0.1c0.5,0.1,0.9,0.1,1.3,0.2c1.9,0.4,3.7,1.3,5.2,2.7
                                    		c0.1,0.1,0.3,0.2,0.4,0.4l-0.6,0.6C13.7,2.1,11.1,1,8.3,1c-2.9,0-5.5,1-7.7,3.1L0,3.5z"/>
                                    	<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M2.5,6.1c1.5-1.4,3.6-2.3,5.7-2.3s4.1,0.8,5.7,2.3l-0.6,0.6
                                    		c-1.5-1.3-3.2-2-5.1-2c-1.9,0-3.7,0.7-5.1,2L2.5,6.1z"/>
                                    	<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M10.9,9.3c-0.9-0.6-1.7-1-2.6-1c-0.9,0-1.8,0.3-2.6,1L5.1,8.7
                                    		c0.9-0.8,2-1.2,3.2-1.2c1.2,0,2.3,0.4,3.2,1.2L10.9,9.3z"/>
                                    	<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M8.3,13.7c-0.5,0-0.9-0.4-0.9-1c0-0.3,0.1-0.5,0.3-0.7
                                    		c0.2-0.2,0.4-0.3,0.7-0.3c0.3,0,0.5,0.1,0.7,0.3c0.2,0.2,0.3,0.4,0.3,0.7C9.2,13.3,8.8,13.7,8.3,13.7L8.3,13.7z"/>
                                    </g>
                                    <g>
                                    	<rect x="-2.5" y="-1.5" fill="#54ACC4" stroke-miterlimit="10" width="111.2" height="27.2"/>
                                    	<rect x="30.7" y="8.2" fill="none" width="106.3" height="29.8"/>
                                    	<text transform="matrix(1 0 0 1 30.6719 16.3277)">Upload data</text>
                                    	<g>
                                    		<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M5.3,8.7c0.6-0.6,1.2-1.1,1.9-1.5c1.5-1,3.2-1.6,4.9-1.8
                                    			c0.2,0,0.4,0,0.6-0.1l0.3,0l1,0l0.2,0c0.2,0,0.4,0.1,0.6,0.1c0.5,0.1,0.9,0.1,1.3,0.2C18,6.1,19.8,7,21.4,8.4
                                    			c0.1,0.1,0.3,0.2,0.4,0.4l-0.6,0.6c-2.2-2.1-4.8-3.1-7.7-3.1c-2.9,0-5.5,1-7.7,3.1L5.3,8.7z"/>
                                    		<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M7.8,11.3c1.5-1.4,3.6-2.3,5.7-2.3s4.1,0.8,5.7,2.3l-0.6,0.6
                                    			c-1.5-1.3-3.2-2-5.1-2c-1.9,0-3.7,0.7-5.1,2L7.8,11.3z"/>
                                    		<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M16.1,14.5c-0.9-0.6-1.7-1-2.6-1c-0.9,0-1.8,0.3-2.6,1l-0.6-0.6
                                    			c0.9-0.8,2-1.2,3.2-1.2c1.2,0,2.3,0.4,3.2,1.2L16.1,14.5z"/>
                                    		<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M13.5,18.9c-0.5,0-0.9-0.4-0.9-1c0-0.3,0.1-0.5,0.3-0.7
                                    			c0.2-0.2,0.4-0.3,0.7-0.3c0.3,0,0.5,0.1,0.7,0.3c0.2,0.2,0.3,0.4,0.3,0.7C14.5,18.5,14,18.9,13.5,18.9L13.5,18.9z"/>
                                    	</g>
                                    </g>
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="avg-fuel-chart">

        </div>
    </div>
</div>
@stop()
