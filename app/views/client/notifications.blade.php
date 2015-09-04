@extends('index')

@section('title')
    Tank Alerts - fuelgauging.com
@stop()

@section('client-notifications')
<div class="client-notifications">
    @include('client.client_components.sidebar')
    @include('client.client_components.sidebar_tanks')
    <div class="content">
        <div class="header">
            <div class="header-left">
                <h2>Notification - Tank {{$tank->marking_id}} {{$tank->fuel_grade}}</h2>
            </div>
            <div class="header-right">
                Location - {{$tank->location_name}}
            </div>
        </div>

        <div class="content-blocks">
            <div class="top">
                <div class="header">
                    <div class="left">
                        <div class="icon">
                            <?xml version="1.0" encoding="utf-8"?>
                            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 32.4 32.4" enable-background="new 0 0 32.4 32.4" xml:space="preserve">
                            <g>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M6.8,0c0.5,0.3,0.7,0.7,0.6,1.3c0,1.2,0,2.3,0,3.5
                                    c0,0.9-0.3,1.2-1.3,1.2S4.9,5.7,4.9,4.8c0-1.2,0-2.4,0-3.5c0-0.6,0.1-1,0.6-1.3C6,0,6.4,0,6.8,0z"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M20.7,0c0.5,0.3,0.7,0.7,0.6,1.3c0,1.2,0,2.3,0,3.5
                                    c0,0.9-0.3,1.2-1.3,1.2c-0.9,0-1.3-0.3-1.3-1.2c0-1.2,0-2.4,0-3.5c0-0.6,0.1-1,0.6-1.3C19.9,0,20.3,0,20.7,0z"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M26.3,14.8c-0.8-0.1-1.5-0.1-2.3-0.2c0-1.5,0-3,0-4.6
                                    c-7.3,0-14.5,0-21.7,0c0,0.2,0,0.4,0,0.6c0,3.7,0,7.4,0,11.1c0,1.4,0.5,2,1.9,2c3.1,0,6.3,0,9.4,0c0.2,0,0.5,0,0.7,0
                                    c0.1,0.9,0.1,1.7,0.2,2.5c-0.2,0-0.4,0-0.6,0c-3.8,0-7.7,0-11.5,0c-1.6,0-2.4-0.8-2.4-2.4c0-6.2,0-12.3,0-18.5
                                    c0-1.6,0.8-2.4,2.4-2.4c0.4,0,0.8,0,1.3,0c0,0.7,0,1.3,0,1.9c0,1.6,0.9,2.4,2.5,2.4c1.6,0,2.5-0.8,2.5-2.4c0-0.6,0-1.2,0-1.9
                                    c2.9,0,5.9,0,8.8,0c0,0.6,0,1.3,0,1.9c0,1.5,0.9,2.3,2.5,2.3c1.6,0,2.5-0.8,2.5-2.3c0-0.6,0-1.3,0-1.9c0.7,0,1.4-0.1,2,0
                                    c0.9,0.1,1.6,0.9,1.6,1.8C26.3,8.1,26.3,11.4,26.3,14.8z"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M16.7,24.6c0-4.3,3.5-7.8,7.8-7.9c4.4,0,7.9,3.5,7.9,7.9
                                    c0,4.2-3.5,7.7-7.7,7.8C20.3,32.4,16.7,28.9,16.7,24.6z M30.4,24.4c0-3.2-2.7-5.8-5.9-5.8c-3.2,0.1-5.8,2.7-5.8,5.9
                                    c0,3.2,2.7,5.8,5.9,5.8C27.8,30.4,30.4,27.7,30.4,24.4z"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M5.1,13.8c0-1.1,0.9-2,2-2c1.1,0,2,0.9,2,2c0,1.1-0.8,2-1.9,2.1
                                    C6.1,15.8,5.1,14.9,5.1,13.8z"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M15.2,13.8c0,1.1-0.9,2-2,2c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2
                                    C14.2,11.7,15.1,12.7,15.2,13.8z"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M17.2,13.8c0-1.1,0.9-2,2-2c1.1,0,2,0.9,2,2c0,1.1-0.9,2-2,2
                                    C18.1,15.8,17.2,14.9,17.2,13.8z"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M9.1,19.8c0,1.1-0.9,2-2,2c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2
                                    C8.2,17.8,9.1,18.7,9.1,19.8z"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M13.2,17.8c1.1,0,2,0.9,2,2c0,1.1-1,2-2,2c-1.1,0-2-0.9-2-2
                                    C11.1,18.8,12.1,17.8,13.2,17.8z"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M23.8,23.8c0-1,0-1.8,0-2.8c0.6,0,1.1,0,1.7,0c0,1.5,0,2.9,0,4.5
                                    c-1.5,0-2.9,0-4.5,0c0-0.5,0-1.1,0-1.7C21.9,23.8,22.8,23.8,23.8,23.8z"/>
                            </g>
                            </svg>
                        </div>

                        <div class="title">
                            Email reporting
                        </div>
                    </div>

                    <div class="right">
                        <?xml version="1.0" encoding="utf-8"?>
                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <svg version="1.1" id="add-reporting-email" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 93.6 27.2" enable-background="new 0 0 93.6 27.2" xml:space="preserve">
                        <g>
                            <rect fill="#839D3C" stroke="#F3F8F9" stroke-miterlimit="10" width="93.6" height="27.2"/>
                            <g>
                                <rect x="28.1" y="9.4" fill="none" width="68.2" height="29.8"/>
                                <text transform="matrix(1 0 0 1 28.0796 17.4541)" fill="#FFFFFF" font-family="'ProximaNova-Semibold'" font-size="12.1205">Add email</text>
                            </g>
                            <g>
                                <g>
                                    <path fill="#FFFFFF" d="M12.4,20.2v-5.4H7v-2.3h5.4V7.1h2.3v5.4h5.4v2.3h-5.4v5.4H12.4z"/>
                                </g>
                            </g>
                        </g>
                        </svg>
                    </div>
                </div>
                <div class="list">
                    
                </div>
            </div>

            <div class="middle">
                <div class="header">
                    <div class="left">
                        <div class="icon">
                            <?xml version="1.0" encoding="utf-8"?>
                            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 35.3 31.4" enable-background="new 0 0 35.3 31.4" xml:space="preserve">
                            <g>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M17.7,31.4c-4.8,0-9.5,0-14.3,0c-2.8,0-4.2-2.5-2.8-4.9
                                    C5.3,18.3,10.1,10,14.9,1.7c1.3-2.3,4.2-2.3,5.5,0C25.2,10,30,18.3,34.8,26.6c1.4,2.4,0,4.9-2.8,4.9C27.2,31.4,22.4,31.4,17.7,31.4
                                    z M17.6,29.4c4.8,0,9.6,0,14.4,0c1.2,0,1.6-0.7,1-1.7c-3.7-6.4-7.4-12.8-11.1-19.2c-1.1-1.9-2.2-3.8-3.3-5.8
                                    c-0.5-0.9-1.3-0.8-1.8,0c-0.1,0.1-0.2,0.3-0.2,0.4c-4.7,8.2-9.4,16.3-14.2,24.5c-0.5,0.9-0.2,1.8,1,1.8
                                    C8.1,29.3,12.9,29.4,17.6,29.4z"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M17.7,5.1c4.1,7.3,8.2,14.5,12.4,21.7c-8.3,0-16.5,0-24.8,0
                                    C9.4,19.6,13.5,12.4,17.7,5.1z M19.6,14.5c0-0.2,0-0.4,0-0.6c0.1-1.7-0.5-2.4-2.2-2.3c-1.2,0-1.9,0.7-1.8,2
                                    c0.1,2.3,0.3,4.5,0.5,6.8c0.1,1,0.7,1.7,1.6,1.7c0.9,0,1.5-0.7,1.6-1.8C19.4,18.3,19.5,16.4,19.6,14.5z M17.6,26.1
                                    c1.1,0,1.9-0.8,1.9-1.9c0-1-0.8-1.9-1.8-1.9c-1,0-1.9,0.8-1.9,1.9C15.7,25.2,16.6,26.1,17.6,26.1z"/>
                            </g>
                            </svg>
                        </div>

                        <div class="title">
                            Level alerts
                        </div>
                    </div>

                    <div class="right">
                        <?xml version="1.0" encoding="utf-8"?>
                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <svg version="1.1" id="add-reporting-email" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 93.6 27.2" enable-background="new 0 0 93.6 27.2" xml:space="preserve">
                        <g>
                            <rect fill="#839D3C" stroke="#F3F8F9" stroke-miterlimit="10" width="93.6" height="27.2"/>
                            <g>
                                <rect x="28.1" y="9.4" fill="none" width="68.2" height="29.8"/>
                                <text transform="matrix(1 0 0 1 28.0796 17.4541)" fill="#FFFFFF" font-family="'ProximaNova-Semibold'" font-size="12.1205">Add email</text>
                            </g>
                            <g>
                                <g>
                                    <path fill="#FFFFFF" d="M12.4,20.2v-5.4H7v-2.3h5.4V7.1h2.3v5.4h5.4v2.3h-5.4v5.4H12.4z"/>
                                </g>
                            </g>
                        </g>
                        </svg>
                    </div>
                </div>
                <div class="list">
                    
                </div>
            </div>


            <div class="bottom">
                <div class="header">
                    <div class="left">
                        <div class="icon">
                            <?xml version="1.0" encoding="utf-8"?>
                            <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 30.1 34.2" enable-background="new 0 0 30.1 34.2" xml:space="preserve">
                            <g>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M0,19.1c0-4.3,0-8.5,0-12.8c0-2.3,0.8-3.1,3.1-3.1
                                    c1.6,0,2.3,0,3.9,0c0.6,0,1-0.2,1.1-0.8C8.5,0.9,9.7,0.1,11.2,0c1.5,0,2.7,0.8,3.2,2.3c0.2,0.8,0.6,1,1.4,1c1.6,0,3.2,0,4.8,0
                                    c2,0,2.8,0,2.8,1.9c0,1.1,0,2.1,0,3.2c0,1-0.6,1.7-1.6,1.7c-1,0.1-0.7-0.4-0.9-1.5c-0.1-0.7-0.1-1.3-0.1-2c0-0.6-0.2-0.9-0.9-0.9
                                    c-0.9,0-2.7-0.1-3.2,1.1c-0.2,0.4-1.1,0.8-1.7,0.8c-2.4,0.1-4.8,0.1-7.2,0c-0.9,0-1.6-0.5-2.1-1.3C5.5,5.8,3.1,5.4,2.7,5.9
                                    C2.5,6.3,2.5,6.8,2.5,7.2c0,4.4,0,9.6,0,14c0,3.1,0,6.2,0,9.3c0,0.9,0.2,1.1,1.1,1.1c6.1,0,12.3,0,18.4,0c1.4,0,1.9,0,1.2,1.2
                                    c-0.5,0.9-1.2,1.3-2.2,1.3c-6.4,0-11.9,0-18.3,0c-1.9,0-2.7-0.9-2.7-2.9C0,26.9,0,23.5,0,19.1C0,19.1,0,19.1,0,19.1z M12.8,3.2
                                    c0-0.8-0.8-1.5-1.6-1.5c-0.8,0-1.5,0.7-1.5,1.6c0,0.8,0.7,1.5,1.5,1.5C12,4.8,12.8,4.1,12.8,3.2z"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M21.6,29.8c-4.5,0.1-8.4-3.6-8.6-8.1c-0.2-5,3.7-8.7,7.9-9
                                    c5.7-0.3,9.1,4.1,9.2,8C30.2,26,26.7,29.7,21.6,29.8z M20.4,22.9c-0.4-0.5-0.8-0.9-1.1-1.3c-0.5-0.7-1.2-0.8-1.8-0.3
                                    c-0.7,0.5-0.7,1.2-0.1,1.9c0.6,0.8,1.3,1.7,2,2.5c1,1.3,1.9,1.2,2.7-0.2c1-2,2-3.9,3-5.9c0.3-0.5,0.6-1.1,0.7-1.6
                                    c0.2-0.7-0.1-1.3-0.7-1.4c-0.5-0.1-1.2,0.2-1.5,0.5c-0.4,0.4-0.6,1-0.9,1.6C21.9,20,21.2,21.4,20.4,22.9z"/>
                                <g>
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M9.2,14c0,0.3-0.3,0.6-0.6,0.6H6c-0.3,0-0.6-0.3-0.6-0.6v-2.7
                                        c0-0.3,0.3-0.6,0.6-0.6h2.6c0.3,0,0.6,0.3,0.6,0.6V14z"/>
                                    <circle fill="#FFFFFF" cx="7.3" cy="12.6" r="1"/>
                                </g>
                                <g>
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M9.2,20.9c0,0.3-0.3,0.6-0.6,0.6H6c-0.3,0-0.6-0.3-0.6-0.6v-2.7
                                        c0-0.3,0.3-0.6,0.6-0.6h2.6c0.3,0,0.6,0.3,0.6,0.6V20.9z"/>
                                    <circle fill="#FFFFFF" cx="7.3" cy="19.5" r="1"/>
                                </g>
                                <g>
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M9.2,28.1c0,0.3-0.3,0.6-0.6,0.6H6c-0.3,0-0.6-0.3-0.6-0.6v-2.7
                                        c0-0.3,0.3-0.6,0.6-0.6h2.6c0.3,0,0.6,0.3,0.6,0.6V28.1z"/>
                                    <circle fill="#FFFFFF" cx="7.3" cy="26.7" r="1"/>
                                </g>
                            </g>
                            </svg>
                        </div>

                        <div class="title">
                            Tank Inspection due alert
                        </div>
                    </div>

                    <div class="right">
                        <?xml version="1.0" encoding="utf-8"?>
                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <svg version="1.1" id="add-reporting-email" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 93.6 27.2" enable-background="new 0 0 93.6 27.2" xml:space="preserve">
                        <g>
                            <rect fill="#1376A1" stroke="#F3F8F9" stroke-miterlimit="10" width="93.6" height="27.2"/>
                            <g>
                                <rect x="28.1" y="9.4" fill="none" width="68.2" height="29.8"/>
                                <text transform="matrix(1 0 0 1 28.0796 17.4541)" fill="#FFFFFF" font-family="'ProximaNova-Semibold'" font-size="12.1205">Add email</text>
                            </g>
                            <g>
                                <g>
                                    <path fill="#FFFFFF" d="M12.4,20.2v-5.4H7v-2.3h5.4V7.1h2.3v5.4h5.4v2.3h-5.4v5.4H12.4z"/>
                                </g>
                            </g>
                        </g>
                        </svg>
                    </div>
                </div>
                <div class="list">
                    
                </div>
            </div>

        </div>
    </div>
</div>
@stop()
