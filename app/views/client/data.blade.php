@extends('index')

@section('title')
    Tank Data - fuelgauging.com
@stop()

@section('client-data')
<div class="client-data">
    @include('client.client_components.sidebar')
    @include('client.client_components.sidebar_tanks')
    <div class="content">
       	<div class="header">
			<div class="header-left">
				<h2>Data - Tank {{$tank->marking_id}} {{$tank->fuel_grade}}</h2>
			</div>
			<div class="header-right">
				Location - {{$tank->location_name}}
			</div>
		</div>

		<div class="content-blocks">
            <div class="data">
                <div class="header">
                	<div class="title">
                		Raw data levels*
                	</div>
                	<div class="details">
                		Accuracy of level sensor used on this tank: -/+ 0.2% - Equivalent to 50 L max
                	</div>
                </div>
                <div class="date-selector">
                	<div class="leftpicker">
                	    <input type="text" name="dateleft" id="datefrom" value="" placeholder="From">
                	</div>

                    <div class="arrows">
                        @include('client.svgs.data.datepicker_arrows')
                    </div>

                    <div class="rightpicker">
                        <input type="text" name="dateleft" id="dateto" value="" placeholder="To">
                    </div>

                    <div class="actions">
                        <div class="left">
                            <?xml version="1.0" encoding="utf-8"?>
                            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            	 viewBox="0 0 87.1 24.2" enable-background="new 0 0 87.1 24.2" xml:space="preserve">
                            <g>
                            	<rect fill="#839D3C" stroke="#F3F8F9" stroke-miterlimit="10" width="87.1" height="24.2"/>
                            	<g>
                            		<rect x="32" y="7.8" fill="none" width="60.2" height="26.4"/>
                            		<text transform="matrix(1 0 0 1 31.96 15.9278)" fill="#FFFFFF" font-size="12.1205">Update </text>
                            	</g>
                            	<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M6,12.3C6,12.3,6.1,12.3,6,12.3c1.2-1.9,2.6-3.5,4.4-4.8
                            		c1-0.7,2.1-1.3,3.3-1.6c1.7-0.5,3.4-0.3,5.1,0.4c1.2,0.5,2.2,1.2,3.2,2.1c1.3,1.1,2.4,2.5,3.3,3.9c0,0.1,0,0.1,0,0.2
                            		c-1.2,1.9-2.6,3.5-4.5,4.8c-1,0.7-2,1.2-3.2,1.5c-1.7,0.4-3.4,0.3-5.1-0.4c-1.2-0.5-2.2-1.2-3.1-2c-1.3-1.1-2.4-2.4-3.3-3.8
                            		c0,0,0,0-0.1-0.1C6,12.5,6,12.4,6,12.3z M15.6,17.2c2.6,0,4.7-2.1,4.7-4.7c0-2.6-2-4.8-4.7-4.8c-2.6,0-4.7,2.1-4.7,4.7
                            		C10.9,14.9,12.9,17.2,15.6,17.2z"/>
                            	<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M15.6,10.3c1.1,0,2.1,1,2.1,2.1c0,1.1-1,2.1-2.1,2.1
                            		c-1.2,0-2.1-0.9-2.1-2.1C13.5,11.3,14.5,10.3,15.6,10.3z"/>
                            </g>
                            </svg>
                        </div>

                        <div class="right">
                            <?xml version="1.0" encoding="utf-8"?>
                            <!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            	 viewBox="0 0 101.1 28.5" enable-background="new 0 0 101.1 28.5" xml:space="preserve">
                            <g>
                            	<rect x="-0.1" y="0.5" fill="#839D3C" stroke="#F3F8F9" stroke-miterlimit="10" width="101.2" height="28"/>
                            	<g>
                            		<rect x="31.5" y="10" fill="none" width="63.3" height="32.8"/>
                            		<text transform="matrix(0.904 0 0 1 31.5298 19.3174)" fill="#FFFFFF" font-family="'ProximaNova-Semibold'" font-size="14.0268">Download</text>
                            	</g>
                            	<polygon fill="#FFFFFF" points="16,16 16,12 14,12 14,16 12.5,16 14.1,19.5 15.8,22.9 17.4,19.4 19.1,16 	"/>
                            	<g>
                            		<path fill="#FFFFFF" d="M6,8v13h18V8H6z M23,20H7V9h16V20z"/>
                            	</g>
                            </g>
                            </svg>



                        </div>
                    </div>
                </div>
                <div class="list">

                </div>
            </div>
        </div>
	</div>
</div>
@stop()
