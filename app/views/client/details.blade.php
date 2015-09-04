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
                <h2>Details - Tank {{$tank->marking_id}} {{$tank->fuel_grade}}</h2>
            </div>
            <div class="header-right">
                Location - {{$tank->location_name}}
            </div>
        </div>

        <div class="content-blocks">
            <div class="top">
                <div class="left">
                    <div class="specs">
                        <h3>Specification</h3>

                        <div class="grade">
                            <p>
                                Grade of fuel : {{$tank->fuel_grade}}
                            </p>

                            <p>
                                Markings ID : Tank {{$tank->marking_id}}
                            </p>
                        </div>

                        <div class="geom">
                            <p>
                                Shape : {{$tank->shape}}
                            </p>
                            <p>
                                Titled : {{$tank->titled}}
                            </p>

                            <p>
                                Internal : {{$tank->internal}}
                            </p>
                        </div>
                    </div>

                    <div class="tank">
                        <?xml version="1.0" encoding="utf-8"?>
                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 257.8 172.5" enable-background="new 0 0 257.8 172.5" xml:space="preserve">
                            <g>
                            <g>
                                <g>
                                    <polygon fill="none" stroke="#637F0D" stroke-width="0.5" stroke-miterlimit="10" points="257.8,29.4 93.5,29.4 93.5,20.4
                                        98.4,20.4 98.4,16.3 52.5,16.3 52.5,20.4 56.3,20.4 56.3,29.4 2,29.4 2,161.6 31.8,161.6 31.8,172.3 61.7,172.3 61.7,161.6
                                        198.1,161.6 198.1,172.3 227.9,172.3 227.9,161.6 257.8,161.6 			"/>
                                    <g>
                                        <polygon opacity="0.2" fill="#686868" points="257.5,28.9 93.2,28.9 93.2,19.8 98.1,19.8 98.1,15.7 52.3,15.7 52.3,19.8
                                            56,19.8 56,28.9 1.7,28.9 1.7,161 31.5,161 31.5,171.8 61.4,171.8 61.4,161 197.8,161 197.8,171.8 227.6,171.8 227.6,161
                                            257.5,161 				"/>
                                        <polygon fill="#FFFFFF" stroke="#3D5916" stroke-width="0.25" stroke-miterlimit="10" points="4.7,158.3 4.7,32.2 59,32.2
                                            59,18 90.2,18 90.2,32.2 254.5,32.2 254.5,158.3 				"/>
                                    </g>
                                </g>
                                <rect x="4.5" y="42.7" opacity="0.4" fill="#788838" width="249.7" height="115.6"/>
                                <g opacity="0.3">
                                    <g>
                                        <polygon fill="#A4BE47" points="254.4,32.2 89.7,32.2 89.7,32.6 58.8,32.6 58.8,32.2 4.9,32.2 4.9,42.5 254.4,42.5 				"/>
                                    </g>
                                </g>
                                <polyline fill="#788838" points="121,7.5 121,1.5 120,1.5 120,7.5 		"/>
                                <polyline fill="#788838" points="120,17.5 120,20.6 120,21.5 115,21.5 115,22.5 118,22.5 118,29.5 120,29.5 120,30.9 120,135
                                    119,139.1 119,150.5 122,150.5 122,139.1 121,135 121,30.9 121,29.5 123,29.5 123,22.5 126,22.5 126,21.5 121,21.5 121,20.6
                                    121,17.5 		"/>
                                <polygon fill="#788838" points="127,3.2 127,3.2 127,3.2 127,3.2 127,3.2 127,3.2 127,3.2 127,3.2 		"/>
                                <path fill="#788838" d="M124,15.1c0,2.2-1.1,4.4-3.1,4.4h-0.2c-2,0-3.7-2.2-3.7-4.4v-4.4c0-2.2,1.7-4.2,3.7-4.2h0.2
                                    c2,0,3.1,2,3.1,4.2V15.1z"/>
                                <rect x="116" y="12.5" fill="#788838" width="9" height="1"/>
                                <rect x="5" y="151.5" fill="#788838" width="250" height="6"/>
                            </g>
                            </g>
                        </svg>
                    </div>
                </div>

                <div class="right">
                    <h3>Physical location</h3>
                    <p>
                        Name : {{$tank->location_name}}
                    </p>
                    <p>
                        Airport code (if applicable) : {{$tank->airport_code}}
                    </p>

                    <div class="address">
                        <div class="left">
                            Address :
                        </div>

                        <div class="right">
                            {{$tank->location_address}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="bottom">
                <div class="left">
                    <div class="inspection">
                        <h3>Tank Inspection</h3>

                        <div class="edit-inspections">
                            <?xml version="1.0" encoding="utf-8"?>
                            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            	 viewBox="0 0 62.2 24.2" enable-background="new 0 0 62.2 24.2" xml:space="preserve">
                            <g>
                            	<rect x="0" y="0" fill="#DFC852" stroke="#FFFFFF" stroke-miterlimit="10" width="62.2" height="24.2"/>
                            	<g>
                            		<rect x="31" y="7.8" fill="none" width="60.5" height="26.4"/>
                            		<text transform="matrix(1 0 0 1 30.9599 15.9282)" fill="#FFFFFF">Edit</text>
                            	</g>
                            	<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M7.7,18.8c-0.3,0-0.5-0.2-0.4-0.5c0.2-1.2,0.4-2.5,0.7-3.7
                            		c0.1-0.4,0.3-0.8,0.5-1.2c0.2-0.4,0.4-0.7,0.7-1c1.7-1.7,3.4-3.4,5.1-5.1C14.5,7,14.7,7,15,7.3c1.3,1.3,2.5,2.5,3.8,3.8
                            		c0.2,0.2,0.2,0.4,0,0.7c-1.8,1.8-3.6,3.6-5.4,5.4c-0.5,0.5-1,0.7-1.7,0.9c-0.7,0.2-1.4,0.3-2,0.4C9.1,18.5,8.4,18.7,7.7,18.8
                            		C7.7,18.8,7.7,18.8,7.7,18.8z M9.2,13.8c-0.1,0.1-0.1,0.2-0.2,0.4c-0.3,0.7-0.4,1.4-0.5,2.1c0,0,0,0.1,0.1,0.1c0.3,0.3,0.7,0.7,1,1
                            		c0,0,0.1,0.1,0.2,0.1c0.2,0,0.4-0.1,0.6-0.1c0.6-0.1,1.1-0.2,1.7-0.5c0,0,0.1,0,0.1-0.1C11.2,15.8,10.2,14.8,9.2,13.8z M17,11.1
                            		c0-0.2-0.1-0.3-0.3-0.4c-0.2-0.1-0.3,0-0.5,0.1c-1.2,1.2-2.3,2.3-3.5,3.5c-0.1,0.1-0.3,0.3-0.4,0.4c-0.1,0.1-0.2,0.3-0.1,0.4
                            		c0.1,0.3,0.5,0.4,0.7,0.2c0.6-0.6,1.1-1.1,1.7-1.7c0.7-0.7,1.4-1.4,2.1-2.1C17,11.3,17,11.2,17,11.1z M15.3,9.4
                            		c0-0.2-0.1-0.3-0.3-0.4c-0.2-0.1-0.3,0-0.5,0.1c-1.3,1.3-2.6,2.6-3.9,3.9c0,0-0.1,0-0.1,0.1c-0.1,0.1-0.1,0.2-0.1,0.4
                            		c0.1,0.3,0.5,0.4,0.7,0.2c0.4-0.4,0.7-0.7,1.1-1.1c0.9-0.9,1.9-1.9,2.8-2.8C15.3,9.7,15.3,9.6,15.3,9.4z"/>
                            	<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M20.6,8.3c0,0.8-0.3,1.4-0.7,2c-0.2,0.2-0.4,0.2-0.6,0
                            		c-1.2-1.2-2.3-2.3-3.5-3.5c-0.2-0.2-0.2-0.5,0-0.7c0.5-0.4,1-0.6,1.6-0.7c1.6-0.2,3,0.9,3.2,2.5C20.6,8,20.6,8.2,20.6,8.3z"/>
                            </g>
                            </svg>
                        </div>

                        <div class="dates">
                            <ul>
                                <li>
                                    <p>
                                        Date Inspected : {{$tank->date_inspected}}
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Date Cleaned : {{$tank->date_cleaned}}
                                    </p>
                                </li>
                            </ul>


                        </div>

                        <div class="details">
                            <p>
                                Contractor : {{$tank->contractor}}
                            </p>

                            <p>
                                Telephone : {{$tank->phone}}
                            </p>

                            <p>
                                Email : {{$tank->email}}
                            </p>
                        </div>
                    </div>

                    <div class="inspect-date">
                        <h3>Next Inspection due : 22/06/2016</h3>

                        <div class="set-alert">
                            <?xml version="1.0" encoding="utf-8"?>
                            <!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                            <svg version="1.1" id="set-alert-button" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            	 viewBox="0 0 87.4 23.9" enable-background="new 0 0 87.4 23.9" xml:space="preserve">
                            <g>
                            	<rect y="-0.2" fill="#54ACC4" stroke="#FFFFFF" stroke-miterlimit="10" width="87.4" height="24.2"/>
                            	<g>
                            		<rect x="30.2" y="7.6" fill="none" width="60.5" height="26.4"/>
                            		<text transform="matrix(1 0 0 1 30.1523 15.7191)" fill="#FFFFFF" font-family="'ProximaNova-Semibold'" font-size="12.1205">Set  alert</text>
                            	</g>
                            	<g>
                            		<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M12.2,17.6c0.3-0.4,0.5-0.9,0.8-1.3c0.4,0.1,0.8,0.3,1.3,0.4
                            			c3,0.7,6.1-1.3,6.6-4.4c0.5-3-1.4-5.8-4.3-6.4c-1.8-0.4-3.5,0.1-4.9,1.3c0,0-0.1,0.1-0.1,0.1c0.4,0.4,0.8,0.8,1.2,1.2
                            			C11.2,9,9.8,9.2,8.3,9.5C8.6,8,8.9,6.6,9.1,5.2C9.5,5.6,9.9,6,10.3,6.4c0.3-0.2,0.6-0.5,0.9-0.7c2.5-1.7,5.9-1.8,8.4,0.1
                            			c2,1.6,3,3.7,2.8,6.2c-0.3,3.2-2.6,5.8-5.8,6.3c-1.5,0.3-2.9,0-4.3-0.6C12.3,17.7,12.2,17.7,12.2,17.6z"/>
                            		<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M18.9,12.8c-1.5,0-3,0-4.5,0c0-1.6,0-3.2,0-4.8
                            			c0.5,0,0.9,0,1.4,0c0,1.1,0,2.3,0,3.4c1,0,2.1,0,3.1,0C18.9,11.9,18.9,12.3,18.9,12.8z"/>
                            		<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M10,15.9c0.4-0.3,0.8-0.6,1.2-0.9c0.3,0.2,0.5,0.5,0.8,0.7
                            			c-0.3,0.4-0.5,0.9-0.8,1.3C10.8,16.8,10.4,16.4,10,15.9z"/>
                            		<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M9.4,15.1c-0.2-0.5-0.5-1-0.7-1.5c0.5-0.1,1-0.3,1.5-0.4
                            			c0.2,0.3,0.3,0.6,0.5,1C10.3,14.5,9.9,14.8,9.4,15.1z"/>
                            		<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M9.9,11.3c0,0.3,0,0.7,0.1,1c-0.5,0.1-1,0.3-1.5,0.4
                            			c0-0.5-0.1-0.9-0.1-1.4C8.9,11.3,9.4,11.3,9.9,11.3z"/>
                            		<polygon fill="#FFFFFF" points="15.2,8 14.5,8 14.8,7.1 15.2,6.1 15.5,7.1 15.9,8 		"/>
                            		<polygon fill="#FFFFFF" points="18.9,12.1 18.9,11.4 19.8,11.7 20.7,12.1 19.8,12.4 18.9,12.8 		"/>
                            	</g>
                            </g>
                            </svg>
                        </div>
                    </div>


                </div>

                <div class="right">
                    <h3>Report Histroy</h3>

                </div>
            </div>
        </div>
    </div>
</div>
@stop()
