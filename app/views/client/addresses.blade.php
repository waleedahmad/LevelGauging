@extends('index')

@section('title')
    Tank Contacts - fuelgauging.com
@stop()

@section('client-addresses')
<div class="client-addresses">
    @include('client.client_components.sidebar')
    @include('client.client_components.sidebar_tanks')
    <div class="content">
        <div class="header">
			<div class="header-left">
				<h2>Contacts - Tank {{$tank->marking_id}} {{$tank->fuel_grade}}</h2>
			</div>
			<div class="header-right">
				Location - {{$tank->location_name}}
			</div>
		</div>

		<div class="content-blocks">
            <div class="address-list">
                <div class="header">
                    <div class="left">
                        <?xml version="1.0" encoding="utf-8"?>
                        <!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <svg version="1.1" id="add-contact" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 109.6 27.2" enable-background="new 0 0 109.6 27.2" xml:space="preserve">
                        <g>
                            <rect fill="#839D3C" stroke="#F3F8F9" stroke-miterlimit="10" width="109.6" height="27.2"/>
                            <g>
                                <rect x="28.1" y="9.4" fill="none" width="104.7" height="29.8"/>
                                <text transform="matrix(1 0 0 1 28.0801 17.4541)" fill="#FFFFFF" font-size="12.1205">Add contacts</text>
                            </g>
                            <g>
                                <g>
                                    <path fill="#FFFFFF" d="M12.4,20.2v-5.4H7v-2.3h5.4V7.1h2.3v5.4h5.4v2.3h-5.4v5.4H12.4z"/>
                                </g>
                            </g>
                        </g>
                        </svg>
                    </div>

                    <div class="right">
                        <div class="remove">
                            <?xml version="1.0" encoding="utf-8"?>
                            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                            <svg version="1.1" id="remove-contact" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 87.2 26.8" enable-background="new 0 0 87.2 26.8" xml:space="preserve">
                            <g>
                                <rect x="-0.1" y="0.3" fill="#F38585" stroke="#FFFFFF" stroke-miterlimit="10" width="87.2" height="26.5"/>
                                <g>
                                    <rect x="30.2" y="8.9" fill="none" width="64.8" height="29"/>
                                    
                                        <text transform="matrix(0.9766 0 0 1 30.1533 17.7627)" fill="#FFFFFF" font-size="13.2986">Remove</text>
                                </g>
                                <ellipse fill="#FFFFFF" cx="13.4" cy="14.3" rx="7.6" ry="7.8"/>
                                <g>
                                    <path fill="#F38585" d="M16.1,19.2l-2.8-3.7l-2.8,3.7H9l3.5-4.7L9.2,10h1.6l2.5,3.5l2.6-3.5h1.6l-3.3,4.4l3.5,4.7H16.1z"/>
                                </g>
                            </g>
                            </svg>
                        </div>

                        <div class="edit">
                            <?xml version="1.0" encoding="utf-8"?>
                            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                            <svg version="1.1" id="edit-contact" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 68.4 20.8" enable-background="new 0 0 68.4 20.8" xml:space="preserve">
                            <g>
                                <rect fill="#DFC852" stroke="#FFFFFF" stroke-miterlimit="10" width="68.4" height="20.8"/>
                                <g>
                                    <rect x="35.1" y="6.8" fill="none" width="66.5" height="22.8"/>
                                    
                                        <text transform="matrix(1.2768 0 0 1 35.1304 13.7139)" fill="#FFFFFF" font-family="'ProximaNova-Semibold'" font-size="10.4343">Edit </text>
                                </g>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M9.5,16.2c-0.3,0-0.5-0.2-0.5-0.4c0.3-1.1,0.4-2.1,0.8-3.2
                                    c0.1-0.4,0.3-0.7,0.5-1c0.2-0.3,0.5-0.6,0.8-0.9c1.9-1.5,3.8-2.9,5.7-4.4c0.3-0.2,0.5-0.2,0.8,0c1.4,1.1,2.8,2.2,4.1,3.2
                                    c0.2,0.2,0.2,0.4,0,0.6c-2,1.5-3.9,3.1-5.9,4.6c-0.5,0.4-1.1,0.6-1.8,0.8c-0.7,0.2-1.5,0.3-2.2,0.4C11.1,16,10.3,16.1,9.5,16.2
                                    C9.6,16.2,9.5,16.2,9.5,16.2z M11.2,11.8c-0.1,0.1-0.1,0.2-0.2,0.3c-0.3,0.6-0.4,1.2-0.5,1.8c0,0,0,0.1,0.1,0.1
                                    c0.4,0.3,0.7,0.6,1.1,0.9c0,0,0.1,0.1,0.2,0c0.2,0,0.5-0.1,0.7-0.1c0.6-0.1,1.3-0.2,1.8-0.4c0.1,0,0.1,0,0.1-0.1
                                    C13.5,13.6,12.3,12.7,11.2,11.8z M19.8,9.5c0-0.2-0.1-0.3-0.3-0.3c-0.2-0.1-0.4,0-0.5,0.1c-1.3,1-2.5,2-3.8,3
                                    c-0.2,0.1-0.3,0.2-0.5,0.4c-0.1,0.1-0.2,0.2-0.1,0.4c0.1,0.3,0.5,0.3,0.8,0.1c0.6-0.5,1.3-1,1.9-1.5c0.8-0.6,1.6-1.2,2.4-1.8
                                    C19.7,9.7,19.8,9.7,19.8,9.5z M17.9,8.1c0-0.2-0.1-0.3-0.3-0.3c-0.2-0.1-0.4,0-0.5,0.1c-1.4,1.1-2.8,2.2-4.2,3.3c0,0-0.1,0-0.1,0.1
                                    c-0.1,0.1-0.1,0.2-0.1,0.3c0.1,0.3,0.5,0.4,0.8,0.1c0.4-0.3,0.8-0.6,1.2-0.9c1-0.8,2-1.6,3.1-2.4C17.9,8.3,18,8.2,17.9,8.1z"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M23.8,7.1c0,0.7-0.3,1.2-0.8,1.7c-0.2,0.2-0.5,0.2-0.7,0
                                    c-1.3-1-2.6-2-3.8-3c-0.2-0.2-0.2-0.4,0-0.6c0.5-0.3,1.1-0.5,1.7-0.6c1.7-0.2,3.3,0.8,3.5,2.1C23.8,6.9,23.8,7,23.8,7.1z"/>
                            </g>
                            </svg>
                        </div>

                        

                    </div>
                </div>

                <div class="data">
                    <div class="address">
                        <div class="title">
                            {{$d_address->title}}
                        </div>

                        <div class="details">
                            <p>Name : {{$d_address->name}}</p>
                            <p>Job title : {{$d_address->job_title}}</p></p>
                            <p>Company : {{$d_address->company}}</p>
                            <p>Telephone 1 : {{$d_address->telephone_2}}</p>
                            <p>Telephone 2 : {{$d_address->telephone_1}}</p>
                            <p>Email : <span class='email'>{{$d_address->email}}</span></p>
                        </div>
                    </div>
                    @foreach($addresses as $address)
                        <div class="address">
                            <div class="title">
                                {{$address->title}}
                            </div>

                            <div class="details">
                                <p>Name : {{$address->name}}</p>
                                <p>Job title : {{$address->job_title}}</p></p>
                                <p>Company : {{$address->company}}</p>
                                <p>Telephone 1 : {{$address->telephone_2}}</p>
                                <p>Telephone 2 : {{$address->telephone_1}}</p>
                                <p>Email : <span class='email'>{{$address->email}}</span></p>
                            </div>
                        </div>
                    @endforeach 

                    
                </div>
            </div>
        </div>
    </div>
</div>
@stop()
