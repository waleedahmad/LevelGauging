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

                    <div class="upload">
                        <form class="history-form" method="post" enctype="multipart/form-data" action="/upload/history">
                            <span id="filename">Upload new File</span>
                            <label for="file-upload">Browse<input type="file" name="history" id="file-upload"></label>
                            <input name="tankid" type="hidden" value="{{$tank->id}}">
                        </form>
                    </div>

                    <div class="files">
                        @foreach($files as $file)
                            <div class="file">
                                <div class="icon">
                                    <?xml version="1.0" encoding="utf-8"?>
                                    <!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                    <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 27.8 28" enable-background="new 0 0 27.8 28" xml:space="preserve">
                                    <g id="dscQRY_1_">
                                        
                                            <image overflow="visible" width="507" height="512" id="dscQRY" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAf8AAAISCAYAAADCw8Z/AAAACXBIWXMAAMo7AADKOwFMP92hAAAA
                                    GXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAfXhJREFUeNrsvQeUHcd5Jlp9ZzAY
                                    DIBBIDLBIQiCCSSYxQCCFMmlZIvSoYK9tkhZOlo/H1txn7y7VHi0n+Tj1VKSj621tUp+PvvWz0eW
                                    V7vOkixTJEckATAABEAkEpHIGQNgMJgZTLj9+u+5jalbU1Vd3V23b4fvw2nMDX07Vtf3/X/9/1+M
                                    AQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                    AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                    AAAAAAAAAAAAAAAAAAAAAAAAAAAAAIBVOLgEE1Ax/AwA8opqwu8BAAD5F4r0K8LrCsgfKJEIqEo+
                                    130GAADIvxDE38r9bRVEAAQAUFTir0r+Vg3eq8QBAAAg/1wRPy1twtIKAQCUkPRly0jIe4gBAMgJ
                                    WnEJ6oi/vbZ0cK8DEQDyB4omAMJIf0Tyd0TzPkwQAAAA8s8M8Qd/22pkP81bOmt/p0kEAAAUnfhl
                                    5M4vQyHvRyTCAUIAAED+mbT822oWf+eLL7745Jw5c66vVqutIyMjra7rVrzXFe8vrhaQK7S3t7fN
                                    mDFj2ujoaNVxHDY8PDziteWq1679vxcvXhzyMHLhwoX+gYGB/nPnzvWdOXOm79SpU2c99B0/frzX
                                    +3uBvjt27Fift95gbb1BbxODHPmLi0wUwCMAACD/TJK/b/kvXrz41rlz5y7DpQGKABKtonCl9yQG
                                    +Pd17oFqlZFA8MTCEAmEfg+eCOg5ceJEz8mTJ08dOXLkhCcGTnji4ExPT0+vJyD6SBQMDg76AsL7
                                    rr9G/qJA4D0CDCIAAJqDsgf8Vdj4GP9Mb5ntLfM2b9789SuvvHJ5pQIvP1B88pd9p3ovfueR/eCF
                                    Cxd6z58/3+MtJzxhcMwTCAf2799/8PDhw0e89z3kVfAEBHkT+vbt29cveASqEo8AAACw/FO3/jtG
                                    R0dxXYBiq37HCf0uIHr+Pb3mBUB7DbNnz55XrVav50XCyMhI39mzZw95ouDAuXPn9h07dmzHrl27
                                    tnvLiYGBgV4PfYcOHerfvXv3EEQAAMDyT5v0yeqfFlj93rJ4/fr1X77mmmuWwfIHimr5i+QeZv2L
                                    n8u8AfxnNGwg+533+dCFCxcOeIJg+5QpU0a8pf/MmTPPHTlyZNOBAweObNy4se/P//zPB4PN4O4B
                                    AMi/UZ4Pcvt31sh/AZH/unXrfv/aa69dCvIHikz+OpJXEXyYANDtk/8dLZxAoBenvM92DwwM/Mvh
                                    w4f/4eLFi0eGh4cHX3/99cGvfOUrEAEAAPJvGPnPqZF/16uvvvrU9ddfvwTkDxSV/MMyV0zG/cPI
                                    Xec1IG8DkX+wrrBNigU45H2/ur+//y/Pnj27YeHChf1LliwZ8n4HIQAAlsgPiKKWJC5S/jsAyHs7
                                    lpG2rG2rAgb57fPfBesHxC97Zmq/ofTaJd46S9rb239j/vz5Pd7rVzZv3vz97u7u5x988MFB73cj
                                    uIsAEB8wbWN2nLIFAPLajlXfia9F0he9ACLZy7YvCySUeQy43832yP/Rjo6Of7z88sv379q164eb
                                    Nm1a5QkBGC8AAPIHAEBH9DZ/R5/TsJgoEHiyVw0PyMREQPz89hT7mj06OvqrkydPfmnhwoX7d+zY
                                    8a3NmzdfjzsMACB/AABCiFwk9STeK5VlLyN+ZUfkkTsfY6MbWmtpafHXrVari0ZGRj7jvd6yffv2
                                    Ldu2bfv3u3fvnoc7DQAgfwAAEpB8mBtfZambeBxk3wUiQBQQ4iL8nspw3+Qt3+zv79+1ZcuWv9q7
                                    d+9duNsAAPIHAFj8BgRv+nsdwfPkrIspCNz8sjLDZN2bngM3LFDxBEDn0NDQb5w9e/alTZs2/eue
                                    PXtWoQUAAMgfAEoPXd5/VOEg8w7wsQAmAkI2/i8TDybBtcG+PRHQNjg4+O6enp6fv/7663+/Y8cO
                                    eAIAAOQPAOUiex0Rm4z/mwbz6X6jEiCyeQbCigbJMg34/QVxAZ4IaL948eIHTp8+/dz69eu/+9Zb
                                    by1CiwAAkD8AxIaJJaoj0rDXNo9TJFZdFH8Uqz/s/ExEQJiI4Lehq1QYFA2SeSFGR0enDQwM/PaZ
                                    M2defuONNz5F03SjBQMgfwAAQslTR2RhtR90wXKq16ptmuxHtl3eHW/i9lcF3cnOR5fTLxtmUP1e
                                    J5DEjACVUJLtqxZDULl48WKXJwC+uXbt2he2b9/8AFo3APIHAEBJrFkv5BRFBMTxMujOX2fRi/uQ
                                    HaNI6KrjVhQAMj6fYJ1qtdo2MDCw6sSJnr9/7bXX/nD9+vUdaPkAyB8ACm69m1jqhX7oJcV5xM+i
                                    Xk/d51G2Z+LRCLP0w44v8CAMDg7OPnfu3Bc9IfCvmzdvfgRPCQDyB4CCWfGy97g+jjL4TyWOgkA6
                                    mYUvi9TnK/fpagKY3hN+fd3EWyYxBK2trRQQ2NrX17fq5MmTP9i0adP/3d3d3Y6WAYD8ASBH5IW5
                                    FuJDZT3rLPHAW2AS8a8SGzyhi2QeJt50QzOm3gYSM3T8Fy5cmHf8+PEvtbe3/6+NGzfeihYBgPyB
                                    CZ0UkB1rXkcqQDIvgFEHUnOhy4YPVAStepb4benud/A5kbbK+pcVENIJANrOwMBA++nTp9/X29v7
                                    /27YsOE30SqAIgOzYgGZJyVdahrQmOsdx2PA36ugQp8sP1+2D5k1zw8hyPYj2y9fGlgcctCJgcAD
                                    cPHiRUoLvNVb/sgTALdUq9U/vPPOO0+hZQCw/AEgZesexG/vuka9/lE9LWHpjIFlz3sLZNsQv9e9
                                    tzX8Q+tOmjSJDQ8Ps56entmnT5/+lLefv1y3bh2qAwIgfwBoBCFhrL7xYiqJkNLNsmdS+1+Vt68j
                                    bvF72V+Tugsmx817GSgQkAoGnTp1qvXEiROPesfx7fXrX30CLQkA+QMALPtS3zOZqDCZ8U/nWQir
                                    UyAKAlMREHY8osgJhi3orycA2PHjx+9krOXrr7322h+gJgAA8geABBYo0HxvSxzrP0o8gGyfKtJW
                                    BQ2qvAOqbQW/kdUyML0WgQAgDwBtpyYAFnuC4PPVavX769atW4pWBID8ASBChw9k15IPI0fTMfYw
                                    ghfbhon7P8xjEFYt0CQOQPYdCQDOA9DuCYDf8MTBt1955RVMFQyA/AHAlnUJNF8MRI2/MC0UZCIi
                                    RIEguvkDq17mKRAtf37REXzYbIUUBEjwyJ+dPHmStvfL3vKnngD4VbQcAOQPAIwZzeMOFEOoRbWi
                                    TcbqZZ8RefOVBWWiQDZcoPIYyI4vbDbDQAAcOXKEnT17lrZ9u7fQBEGfwwyBAMgfAHGA8AvtFYji
                                    OdB5FOKsJ4sNCERBEKAXFv0vtk9ZbICqrkSQBXDgwAGqCEi/Xex99tVXXnnlaU8EzEZLAUD+AMgB
                                    gJdA83uTSH6RsGVDAOI6gQgQPQaqbUepY8DXAdi/f7//1/usw9v2572/f/zyyy8vQQsBQP5A4Tt+
                                    kD3agS0hoIvmFy11lctfFQ8gGy5QlQU2EbEkAPr6+tjBgwf5fX7c++rbngC4HS0EAPkDsPKB0rYD
                                    nWUdJiTChghUZC8jfF2mge44dedFAoACAI8dO8Yfx6Pe199as2bNA2ghAMgfKIRlB7IHbHoCwix9
                                    k1gAmRDg3wdDALLof5VoMM16oG2TACD3f238P1h3pbd8d/Xq1Y+hZQAgfyA3llyY1QYAtkSCiQCQ
                                    WfSyYj46kpd5BMLaeFgVSgoKJAEwOjrK9uzZc+l9bR/LveW7a9as+Q1kAgAgf6CwVhwARJ00SPZe
                                    F9lvUjwoSl0A2QRDceoSkPVPqX+UAigEGC7yvv/26tWrP9Hd3d2OFgKA/IFMW/wAkEZbipp3HyYY
                                    +FQ/1TBAmNs/zNpX1SAI3P8DAwPe+zpx0dnSUvmW9/3nXnnllU60EADkD8DKBwovAuJUCDQd79cV
                                    +dF5BVSEr/pOdnw8yN1P+f+U9jfm/mdCzIEnBxznae/7J7u7u+egdQAgfyAXHTMA2GpvUSbYCYvI
                                    Ny3rG+b2Dxt2EPehKgA0efJkduLECXbmzJm6fXLDAL/nvX7KEwAL0CoAkD8ASx+AANUIBROrPyB+
                                    fhsqtz+RMV/4RzZEoIsxkBUWCvZPr8n6pyqAY9t0xOyDz7W2tv6BJwCWoBUAIH8gtc4WAPIiBMKs
                                    flOCDrP+dZ/LRIVOTLe1tfmWf23yH3L5y0TGb7e2VkgALMPdB0D+AEgfQHsNqS+hCvwLI/GwoD8T
                                    6z9MoARCgbwKe/fuYSMjI0oPQ6XS+jGaE+Cll166FncdAPkDIH0AbVdBsKqpf02C+GQCQDYPgGq8
                                    X1UbQPyM4gFo7P/s2XPs9OnTl/Yxvl+Hzwb4NW99CAAA5A+A9AFA147DovDDigOpxv3FyX9MUgF1
                                    cQu0vX379vkFgPjUv0rFj/7nj+tXPQHw9e7u7utx1wGQPwDSB4CQdq0ifpn7X/c3IH6dF0FVREg8
                                    xuAvWf89PT2st7dXGnAoiJEPeJ9BAAAgfyB6Bwlkh6Rszl0f1eIsaluIUwdANhVwlHF/lXjgj0d1
                                    vWldGgI4cOCAZ/1XpZ4H4bPHvM/++MUXn12OpwlIC624BCB+wM41Np0RLirIfUwlZMmSpL+Dg4N+
                                    NbmgwEx7ezubO3cumz17Nps5c+aE39N6RbgP/HkE71X59/w4fGDhB+sF5EyfjaflVepeB+vRZ6qS
                                    wsF3MjFAVf9oxr9rr72WTZ8+PbgT3nadujiC4PgqFefRarWt2t3d/eRDDz30Fp48AOQPgPBTIpWs
                                    XVuaM57KxpIFSSlkRPg6TJs2jV199dXshhtuYFOnTjVuMwEBZV0kqASA7BwDciWC5tfnRYAoBPjP
                                    AiGgInud6z8QZefPn2dHjx71yX+c7OXnRofpONX3tbQ47Nlnn/2PjzzyyE48nQDIHwDxW7huqups
                                    WbuuZOlv3ryZbd++3bfyo4iFN954g+3cuZPdddddbNmyZZGuD38dsioE+HspO2ZREIipeHRtxfiA
                                    gNRlqX6BdyDYtsz6VwkTEgA04c/VVy9lkya1GZ2ft7n3eT8bqQmAvXh6gUYBY/4g/sJeL91kMVkF
                                    zQ3/zDPPsA0bNkQifh7kIXjhhRfYtm3brFy/LF43XcyDLEAvWEeW7icG/amC/GQFf3STDlHRHxqm
                                    OX++T6z0p5190Pv+A55w+PrPf/7zLjzJAMgfBAYYElVer9fFixd94idr0QZeeeUVtnv37oZd42Zf
                                    Z9OqgLo0Pl0hINUUwaYzARLJk6eBXP/BcMJ4vn9FUwTIX3510qRJX8dcAADIHwAUhFQEkPv4xRdf
                                    9FPEbOK1115j/f39qQmvZgqAqNkUJhUAw0oBq84/eB24/vlgQr7sr0oA1D7/sLedr/7sZz+bjacd
                                    APnD2od1X8Drs2PHDj+wzzZoCIAEQJHbb5gAEIWiSPxBpT+ZIAiz9lWph8F7ivo/f76XnTt3Viky
                                    WlrkaYa1z3+zvb39y//8z//cgV4AAPkXmOCAbFiUaYIIeuPGjQ3b/t69e617FLJ2D3WxHSYufpkF
                                    zo/Ni1UATaoNEuh3IyOj7MSJk5esf7Hkr8oTwH3+76dPn/7UV77yFfTXAMgfxF9s0i8TKDAvLI0v
                                    CWi82dbYf5bFgC4IULZv2URAute6KoKyIkDBayL0EydO1Ln+x4VFxUiIeMt/evDBB76IHgIA+YPs
                                    Cmnllw1DQ0Ns165dDd/P22+/zYaHhwsveGVV+HTzBJiM8aui9HWlfnnQuD9F/ZPAG5/cRxf0JwoQ
                                    /31bpdL6pe7u7s+g1wRA/rD2c0/2ZRc+NAFMIwPyAlANAFtZBHlpC6pxft5KV0X369z8urkDxPUI
                                    tC0ifqrQ6B1JbXKfinJiIfE7bjKgad77L3sC4LfQewIgf1j7EDw5BhXkSQvHjx8vhRcoivufJ2qV
                                    Zc/n96s+k+0n+BtUFTx16pTv+tfFF+i+q+17jveXBMCH8fQAIH+QH6z8HOLcuXM+IaSFkydP5rbt
                                    JHnOVKl4YWP/Kk+AarIf1TBAsJDrP5jmd2LQn6MY85cOTyz2lj98/vnnH8NTBID8Ye3jfHOGw4cP
                                    +2RgCqoYR6ljScRG3KqBRWhPUWdNVM30JyN43voXxQcFXNJ9I/KnuIvAjT++/RZl+p8sILAmCpZ5
                                    IuGrzz333MN4kgCQP6x9kH6OQJP2mGLp0qXsgx/8IPvABz7Arrnmmlj7o3FnIqCytC9V/r9I5oH1
                                    L3O5y4YAwqoAygQCBf3R9afJfkxTDfVVAP3aBMtbW1v+sLu7+yY8TQDIH0TYtPME6UcjYtPc+46O
                                    DrZy5Up/1r7Ozk72wAMP+LP3xUHeyT9qm1N9bxLEp6vuZ1r8h193ZGTEv/58yp86m6CiHAbgMgUq
                                    3np3ees//cwzzyzCUwWA/GHtAxkHWYCmLvjFixezyZMn13129913sylTpkTeL00cVNZnLWx+Ar7a
                                    XxRLP/Ac6Cb7Cb6nan9j5K+uITDR2ncEi79OnLR6y7vb2tq+/qMf/agNTxYA8gfxp2J1QeTEQ5RA
                                    vwULJs7tQsRvOmUvjzTSCpvZJm1Z/2Gfi94BmTdCPCYi9TNnztamEK5oyF7tBVCs30YTAc2bN+9p
                                    PFkAyD9jHRDOD+Bx+vRp43XJ1S9DV1f0GV+LSv4yQjf9Xkbeqip+Mi+Ayqsgfk6kTdd/LOK/fvt8
                                    fX8+6C9CLEA7zQPQ3d39n/B0ASB/kCLOL6OgyHsTUCevcu9Pnz49cvQ/TRtM0ed4Lutz9HkhYDq2
                                    r5seWLZfupc01EPxHhN/L4srUKf+yQWKM9Nb93c9AfAbeMIAkD/QEAsKUF83FQEFr8ntSyRsAkrv
                                    o0VVNpa+iwIiHwo8K9s94UleNyYfdQrgsN/zsQBE4pTqR9b/RAHhGE0yJE8LHJ8nwNvmopaWyu97
                                    AuCX8TQCIH9YxIkIDDCrEqea2lW8puT2NSX/oGNX7TcqiPij1BYoVGcnKcKjurcm6Xxh2xPvG72n
                                    a0/zOQQR/+PftfB1/LVBf+FVACvXUhGg55577nY8uQDIHwRZWjFj0/th4/oQAZtOskOdelAeVrad
                                    qFY8ufzL4vaP+hwHZK3zAuhm9FOJBLEtUabHWNBf/e9pjF+I5JcOC8hKEUviEu5sbW39o5///Odd
                                    uMsAyB8ECdLXEHxaWQxk9VPnn/TexCH/YL9hnoqik32UHH3ZtL3i/VGRvugRoPVokqUg6I+39tXV
                                    /NSeAHURIH/bD7e1tT3d3d3djp4bENGKSwCrpyznGli8wetmnX8U8tdZ6rSNqC58cXsyMhPXL4MQ
                                    kF0TnRCQjfuHLcF6FPBX3xbpezYh+DDsPspXp+06l+w6r338mrfdA97LL6HHA2D5A6WsPCgbn806
                                    iOBVBGw6dGAqJkyuYRk9QLLpf2WuftV2REFBY/5j5F3RThFcH3PgCMV+5HMBiEWAvM9bvb+f8qz/
                                    T6DXA0D+JSf9IscrFI2siPxVXoI41fp0YqKs11hG0mHDAmFxAapZBIMyv4HnSfabsbH/+op/Y4Re
                                    0cz8pwz+o7+d3mdPIQMAAPnD0i+kZV9EkJWosvApcCxroitPz0JwzKIYMsnq0M0JIJK9mBLIZ1zI
                                    gwUnWv36KoBGRYAWUwCgJwBuRW8IgPxLRvx5J8k8uu2TgoifBIAt8ufJCN4lOdmbejxUXgDdFMAB
                                    +VPch8zLIC/iU5HUBHBCgv6cCQLC+3uTt+43MQkQAPKHxZ8rwi+yF0MH1QRAcdz+fN2ARre3PHkE
                                    oozZhwX0ydqtmOsfZGmMC4Dxqn7ysX/Z5D4qV//EYQAuDuDByZMnIwMAQLQ/kA/hUiTCV+XtqyCr
                                    x09j93HIX5aulvY9zUIGQdhxqNIgw2ICVN4C/jMxjmPsWBgLfk7bDooABTMAeq3GW2dUK9wiXNeP
                                    efvc5/39MnoZWP5AAYkzb4RZVLIXQSV5o1jflBomgoYDsmj5m7THrN1b1XGZpu8F6+qqAYpphWT9
                                    i+mFqnTCwGoPphuWxwE4mjF/adXCz7/wwgsfQ08J8gcKajHn5VjDxl2LBJqMJwoByyx/mhjItESw
                                    SP5ZuL5Zu88qt77OCyDzppgKBlkGh0wo1BcB0sUBtCjT/xTFg9q97f6RJwAeRo8J8gdg7UOspACa
                                    kCfKbHwyy7+npyeW+zyNgL8kbTYv8QG6AD+dtyO49mFDDrpphk2qAKpnBeSXlnneet968cUXl6P3
                                    BPkDsPZT7TxL+dB5HW8U8qdysCJOnDiRiteh6MI1bJ8maX48YZsW/VEJANn2xHr/OiGgIvqJQwRB
                                    pkCFiP9PV69ejQwAkD8Aax+E32jyjzIVL7n4+XQ/ihQ/evRobPLP+j1oZjuRWd0qD4VufgRVzr+p
                                    4JBZ/WIRIDGdTywMpEr9q68C6H/2SLVa/YPu7u5p6FFB/gCs/VJ6JdIi/8mTJxuvT6l+vb29l96f
                                    OnUqdoGf9vb2XLXvRgoB3XZV+f7id6blgKOek7wGQL07nx/31xcBcpSzAnLLb3mfURlgZICB/AFY
                                    Rsk6VFj6akyZMsV4XXIPnzlz5tL73bt3x95vFNFR9jYfZvXLBIEuvz9qbINeAEy0+sfr+9cH/YUN
                                    BXBehKe95UN4OkH+AKzowomTrGDq1KmR1j927Jj/lyz+PXv2pCI6yuYNMCXksCyAsEp/UWotTCwC
                                    pJsAqCIZBlCn/k2cO8CpeGKBxv9X4QkF+QMgfhC+oXUoEoFumT59eqT9HD9+3P+7adOmWLP5BciT
                                    2z/Lz4OqJgBPyqr2wBO0+b5UNQDEMr6V0GEAeVrgpXkCFriu+63u7u7r0eOC/AEQf+69ETYtTl0e
                                    uCmmTYsWW0UFfdasWcN27NiR6DyKRP6NEJ261ENdHMCYdV4xmvgnTrqlvgiQU1cESF3z3zEtAnRr
                                    a2vrVz0BsBg9L8gfgEWt7IyKer0beY4dHR2R1idr/80330y834D8MSxjRwSqSF9l6QfEG6fYkroI
                                    0Pj2xzIBKtLaAKqgP0URoA95AuB3PQEwE3cd5A+A9AtDHCblWhsJIuG0g++ouBCJDl01uyKRchxQ
                                    cCUtYXX6g89F975unD9Yl+5D3FoLYtrgxCqAlQg1AJyQIkCV/+Ad669t27atjQGFA9I6gFIRf1aO
                                    nwLviIjjlOiNC6otoHP7hxWgKVMbl51/IAxkREzleqPEfZAASHqM/H5d1/EnBooiKuhc5KvTOTqB
                                    bfjNU6dOHfLW/Zm3nyp6QFj+QIOtFxxXtixC6w+e1+tGDfpLCvI0mI75590rEHbsIpGL38neR4n0
                                    l43LBxY23Yck5K+rKqjOBHDqKvvJPQOyIkBOR2try5++9NJLt6KHBvkDAMjeAmbOTHc4NWqQoe66
                                    5rGcdNhnpt4OnYtfHN+X1fSnKotRyjuHCQBdcOHEdD7dzH+qeQIqy7y/X+/u7l6GHgbkX1piyeO2
                                    i0ygefZMzJo1Kzfkb0qqeXp+ZW78sN+pIv5VMQIyQqbhFyJXW+djavXL0//UM/8J6z/iHfeTngBY
                                    ACYA+QMFJf68Wfh5Rdpuf9vkn0cRYKPdhAUATozAb6n7zmagp1wAyDwRoihwNKl/E1MDx7bHftsT
                                    AB9bv359BwNyDwT8gWxzQfpFTE0j8if3b5KiPVEQtaqgjXuU5cDB4HhlY/xhEf/iOD8RZPA78XWw
                                    zdHRUZ9kKUiP6jYQ6D0/2VKc2hFBgOL4ukTW1UsBgeNBgG6dvUenPRYkyKT3bcwbMP6Zd/je59Wn
                                    BwcH93nf/28EAIL8ARA/SD8mGZM1ztftzzP5RyHYZoM/noCoVYF+/OuwyX0CKzwgXVEEUMAlEf8r
                                    r7zif06Bf/QZLTQcQFkgQRooLcFnQYyALOhQ9pzwxzD2l75v8fY5qskIoGMNdQZXvO398YsvvnjI
                                    e70WvTjIH8ghmWW5joBoeRW1LcyePTsV8qcOvxnkn3URwB8bkaTquQiIXBQAvGXPky0/pk/rkdXP
                                    I3hPUzX39/f70zQH2+D3Q6TPi4MZM2awzs5OXzTSQsJA3JdcADDfG0Dr0r6D4QESBPXkzzTC4NL5
                                    LvZEy9Nr1679nZUrV76FXh3kD4D4rR1XWSrQXXbZZYkm6jEFWZFZmNQnC7UEVPsNRKfue9kYP0/W
                                    Mqua3y7vJQhEAln/9Dog/mCh90TUNJnT2bNn644tiB2ghcQAZY7QMBIFkZJACDwF9ZZ//TBAIAj4
                                    Y5546u6layac2gPetr6wZs2aL9x3330n0LuD/AGIkMIIkTQwZ86cVPZDBYWSFpZplIcna8cjHpN4
                                    nGLefxDUx6/LB9zR+yDoLyjKwxfpCdYP3gf7CH4nCoLgNxQrQkWizp07x/bt2+f/LhgmoPtNXiVq
                                    XyQIpkxp9+7/pMhFgMRxfwEf98TJru7u7j956KGHBtGzgvyBjJIbSD97IIstjaA/IoO4JWXTaAN5
                                    CAwMwI/l8wQv5vQHv+WHE0RREBB5sI5o/fP74teXCYPge4opIG/B0aNHxzp5T/QFXgHyNJEgoPdh
                                    7UF3T7hz/wNPcOz1Pvob9PQgf0DxoIBoQfoiyEojt+3p06cbup9mjvfHaRNpiAFdgB//3PJ/ZYQv
                                    knrw22B8XSwGJFr8fHAgvx/ZEmQLyMQALx54MUELDRtQG6MhJvIOUHsgz8CCBfM9UTDbb4eix0Jy
                                    xWQBga3e9r+6Zs2aI/fdd9+LeKJB/kCGyA7En93zpM6crLFGk3+jcvzz7hEItq+L7Oc/4y3xYB3x
                                    M1E8kAAIxvfFTADZOL+K+ANCF70B/Pf8d/x7sv757dNQAQmCt99+2yd+8grMnTvX9wrIhGLIEMBS
                                    b7tffumllz55//3370SPD/IHmkx2GG7Ix/ksXLiQ7dzZ2D6TvAt5vta2RIBqwh7Za95lLzsWfoye
                                    H/MPFt5TwFvk/HZUpC+O/assfNl71bbEIYPgPcUNHD582F/IK0BCgNokeQbGgkRV137cE+Bt5wHv
                                    ejy5du3aL6xcubIHPT/IH8QP4sf9CwFZXDyRgPzl9yItL4CqhK8sb58nVbHMbuBy57ME+FS+4PtA
                                    SATHIK4jI3iR6HWxAarf8H8DMUBeiuPHj7Njx475xE9eqUWLFvl/ZcTPXQbiko9523jT+/sn6P1B
                                    /iB8kD7uWwgoNYvc8r29vQ3ZPqWDkSs3bxX4bHsBVBY+/15V75/ftyxwTwwC5Emdd7/zIm885a6e
                                    4PlAvigCgP+eFxYqohezB8TvKQiVvAEkBqiNzps3j82fP/+Sl0NyG9q85SnP+t/rWf//ADYA+QMQ
                                    PzhODagzJeu/UeRPkf6qHP9mBNo1QwSo3P0m21AVnRKj+3kSDdL/eLd7sI4oNkSCFwlbRvIqKz+w
                                    3lXfyYSDzBMQ7COIV6BCVD09PezQoUOXRED9HAWXigDN9tb//ZdffvnAvffeuwE9IsgfxIf947g0
                                    oDHWRhX7MUnrkl2rrAuBuEMBJlH+/D54N744Va9oqYuLSNT8tlVkLhMnOvIWiZxSR1WkLrP0Vdvh
                                    sw+Cz6ga4d69e/00wgULFvhLEEzINbFbPdHwpdWrV/+fq1atOgJmAPmD+Au6f5B+cnR1dTUs359q
                                    Cdi6flkTBLYDAvlgvQB8FT9ZOV+eoIOyvXxwn0wI8NuSkb8qzU/1HU/sokgQPQH8OnwmgmwoQCYU
                                    6DdUlnj//v3s1KlTvheAFu586MX7vHPf293d/dRDDz00AoYA+YP4C7R/kL490Jj/5ZdffqlSWxbI
                                    P0+eARsBgbx7P7Dm+fPkrX0xop8fLxcj6sXrxf8VtyFeVxPrX1xEsuePKSD7YJvB+2C4wDQmgF7T
                                    fATkCaB0QUpVJe/VeFtz270r9on29vZd3pu/AEuA/EH8Od9/Fom1KKmEy5Ytawj5k9u/kYSblTK9
                                    uil6VQQsQrTsZefJF+ThrXtZeWDZcIvMva/63mQYQUzn42MNRALnv+MnIhIt+0AI8N/zwiI4N37+
                                    ARICl102m82fv8CPB/BW63Sc6hdefvnl3ffee+8vwBYgfxA/SA/nLsHixYv94DzqRK094LXSro2+
                                    D1kq02siAmQkLBM1ouXPF+chqFzxYZME6USISRyAzvWvSusTSVx0/fNpg9Rugs8DwheLE/EFhGgd
                                    GrI6fvwEu3Chn/cCLPPWfdITAPs8AbCPASB/EE9+jgEVAtMBFVhZsmQJ2759u7Vt0lSwaZb2zdKw
                                    gFikJ4pgEFP7xHMTXfqybYgZAiYeCZPXUclfjN4PCJvc9oGngCf4gPCDzwNyF0UALywCwUACYGBg
                                    gB08eND/W6th8bC33me95UmHphEEQP5APsiv2XMTlMnDcfXVV1slfyruw8/3nvZ9a6YAUA1JyPL4
                                    VR4Asf2rJvDhP+eHAsKOJ+z4dOQvEwKqKH/ZREE8gfPWPy8I+KEO0RsgK1FMnwWBq1QfYHBwkFID
                                    PQ3a/pue9b/NO+T/jl4c5A/yzfi+MayRPihqmsqrUl61LfLPyj1MUwhEIVidcBED+0TylFUF5IcC
                                    oh6vavpg2WudANClAspc+IEnQ7T8+UBAXjAEvw0EQiB6grgCEgqUEUBzCJCHwRMAM6dNm/a7a9eu
                                    fWvlypVrwSQgfwDED+LnQJ0qWf/r16+3sj2qzJa1Ntwsb4DOEyEb51eV+eW3E9ZOk9Yh0MUMyLIH
                                    +Cj+sHRAVWof79YXhQGfERBY/8G+eJFE61DQH61HMSxULtgTADd5YvQL3d3dn37ooYcOoVcH+QMZ
                                    IkKQfvNBUf+bNm3yLaYikb8JCdu2+qN4I1SV/GS/lVVGVP2uEeWIdQIgEJFBzQG+YE8Q7S+O8YuC
                                    gCd/fgm2yw9tyDwEwXcUx0LfkxeAhgG8dX55+vTpn/YO60vo2UH+QJM6yTJ7NrIMctVT5H/StD+6
                                    pjSEkOW2neaEPSovhOwYRCEQNlYvDgHIxEDU8wzLFBAFgPieP0cxEFAM2BOj+vnKfnw8gDhpkSgM
                                    RC9CEDBIAoBmDzx9+nSb990nVq9evW7VqlV/h6cd5A80mRSbQb5FJXwZsZicK7/+ddddZyXnv6+v
                                    L5PWf6Puf1SCFcld5eqXga8JwM/cp/pN1PM1JX+dJ4CvRcALARn58+P4YkofH+QnDgHIliAWgB8K
                                    oPklyANw5swZygH88rPPPrv1kUce2ckAkD9QHu9C3onf5PhVLmKT9cnyJw9Aksl+6L5u3LjRrxyY
                                    l2uZpC3qcubF1yZj9aZkbtoWbJYg1p0f7/qXVREUhUCYyz8QELwIEIcAwrwAvMeBBIDXrm/u6Oj4
                                    6oMPPvj4L37xC0r/QwpgyqjgEmSzM0yDHKOSk63zyivxp3n85Cqlsf+kOHLkiJ9zXfS2H5dY+Xsq
                                    kr1sFr+ki+3tidMLiwu524OF/zxYP4jMFxdK1xNf83+Dhcb0aeHX539HC79/+pxqT9D+L168+IHP
                                    fvazn6nxELgI5A/iL6LlnSfCN+m408A111zjd5ZJQdZ/Hu9B2uKNn7GPJ9Sw9mBK+iJBx22HYcfH
                                    kztP8gEBy8SAKALE9yK5898HrwOyl30uCoDadMCt3mdPffOb37wZAgDkDwCFt+pNQeVRbQTsUZoV
                                    zcCWJWFjywtgUkI3qsDQEbtNkWLruifxDKi8BTKCFz/nyVy1BL/jRUHwG/IYePdoTldX1/cXLVrU
                                    hl4I5A+rv8kdap73F7fDzCIoOvrChQtWtkXWv44MRQs1L89F0mM1FQA6om0UWSfdF2/9+529IfkH
                                    i0j6Oi+ATDDIPAX8MASRf+2z27/2ta9R6l8rOAnkD+IviCWN44qPYKY0Gzhx4oQ/9appO8yiABDv
                                    XVzLnv9ODAI0IdukY/iNsPKjeC9MvAHicIHMla8ieJX1L65D2yf3v7etyowZM/7917/+9dshANID
                                    ov1LZPGXSchESbHLKmyV+OWtf5o4yGS8WbyPWZq616QCnul5hQkEk+0ndf3buKZhBYZ46z+I4Bcr
                                    FapmEZQJJl488PX++f3w6X6yLAB+3gBv6Vy2bNk3vZ++i41H/iMDAJY/iB/EH/0Y8u5NsU3+p06d
                                    Ynv27El8TbNQBdK0bkLS9mmSv5/lZ0Z2rVRBjLIsAfFz3pJXZQuQV0DMNJB5APiFftPR0XHnn/3Z
                                    n/0aZ/2Dn0D+IP6s76OZpJCH8fsskD+BygYHZV/TIOBmiruw1L2oHoJGk3Saz6iYgaDLGBBfiyQu
                                    BgmqSD5w9Qcz/4lBg95nrUuXLv3DG2+8cSaDVxrkD+LPtxWOc4wHcos2gvx7enrY7t27U7fCbSJK
                                    sZ64pC96Oor0vKrSFWViQBYLIMYDiCmEPNGrvpe9p99MmTJl0ZNPPhkE/2H8H+QPZLkjaaa1X1RQ
                                    lL+tYD+Z9W9j0qA074dsPLoR+44zqU9en6eAxMNEj8z6D74LEwDiMAEf7KdKGVy0aOHHf/3Xf30J
                                    g/sf5A9iBvGnbYU1G1TWd3h4uCHbPnv2LNu5c2dD71Een6soJZuL1h+ZegH44kDBeuL4vSgCZEWF
                                    VEMENBwweXJ754c+9KGnvE23wfoH+RfyIcsrITejgy/brH+NcPnzeOONNxomLmy1EZ21b3u/WWpf
                                    zajFIV4DlRdAJgTE97K/ogjgvQiy2IH58+c/5qEL1j/IH9Z+ifZRRktfBI3NN9qz8NZbb2XuHsYh
                                    fFm7jNJm8i4WGiUAdMSvigPgc/lVxC8rMSxW/5s0aVLH448//qRg/YOvQP4g/rJYI0W671EquTXa
                                    8ids3rzZn2Etb23ItOBPo934aUXoZ+FZNxEBwXp8iqDM/S+KgEBAiGJg8eLFj91xxx3zGFz/IH+g
                                    OZ0EygFHI6Sk0eIU6JcG+ff19bHt27dnSgybVNezua88PBvNiuFRvQ+brIgPBFTNMCh+xwsALve/
                                    89Of/vS/g/UP8ofVn/L2Ye2bkbzt4yaXP9X1TwNk/Q8MDGRasMpc0lGGBmxPyJN2u21mVUWdIFAF
                                    BOrmEggbAhAFwLJlyz42f/78Tk4AACB/ED+s/eZY840GzcKXFoj4SQBk7RnhS8jyZZrjxAPIrNU8
                                    teE0255KKKnmCpBdW1mRIFWxIJk44F3/U6ZMmffxj3/8Llj/IP9cIQt10PNA/GUmehloEp40sW3b
                                    Nj8AsNnXXtcu4pL+hA6vkt8ur9kpvKp0QF1VQJNCQbIAQC4FsPLggw9+2ttVOxsv/AOA/LP9oObR
                                    Eki7yliR71McUAAe1eBPE5TyR5P+ZInc4kb9N1vQFaWGh8n+damAMmGgsvDF16I4uOyyy25fvHjx
                                    TFj/IH8o9IJaFs2w8rMGGu9vVGU/HXbt2nUpvTAgXN0Mb7Zhy7I3aWNlTR+1ef1MBIDJ9MEqLwAv
                                    BiZPntzxuc997lFY/yD/UhNoni3+Zne6eej003b5B6DJftavX19X8pW/XqIgsL3YbI9RAwnz1s6y
                                    INJVMQAyoufXlY39y4YIArc/gf7efvvtv1Ij/zZY/iD/TKKR1lHeiR9WfjjSDPYT8fbbb7OjR49K
                                    r5uqBnzWxFrSKXuL0ObT6sui1LHgRYAoAFReAX6ZNWvm9XPmzOGj/iEAQP7Zsvrz1JEUbbYyWQeU
                                    J9BkO2mP94sg619FBDJPQLMt0LS9BVnqa7KwD1mhpbgCQOdBmDy5fdpHP/rROznrH4V/QP7leRgh
                                    hop9D86dO+cX3mkmDh8+zPbv3y+9rrp0r2beW5uVA/PUJrMmAFT3wTQGQEz9E9dftWrVL7F61z8A
                                    8oewyBopo05AdNB4f7VabfpxrFu3TnocvGXXjHutyy/PcrstkwAQ75VsTF+MARDjTFQxAYsXL76d
                                    I39Y/yD/Ylv9eXRHpjkeXCSPy5EjRzJxHDT0sHv3buV95YcA0hhmSXNfQGOeTZn7P6xWgDhh0LRp
                                    0+bNnz8fKX8gfxB/Wa2QInb8NN6fJNhv3rx5Vq/L66+/7h+T7vrLIvVtl821VeO/2W2sjNa/TLip
                                    xJwu9Y8TAO3vf//7lzOM+4P8ISrQARUFlGN//vz52L+/55572MKFC60dD8UfmEz6Y1IOVmURJo0l
                                    yNvQVRk8hLIaAHWEo7D6+e9kqX8EEgN33333HRLyB4+B/NMlnzyREYi/OdfcdAlS7OJgypQpbMGC
                                    Bezmm2+2evxvvPEGGxwclH5nEu1vQuJB7f649xhR+tk+dtP0P1kWgLgukf9VV111M8gf5N/0Dh0W
                                    R3HnNI9y7jbGpCnKPi7mzJnjd45dXV2++98WLly4wLZs2RKJ9E09ATzpZ7mNQODbOQ5VDIDOGyBb
                                    Zs2atVggf1T7A/mng0bnN4P4s036Ktd1EtD0vSdPnoz9e7L6g6lQb7vtNqvnu3Xr1kvph/zseqr7
                                    o6rWpxMAWU7Vy9szmVWBoasBIGsrKg/A1KlTO2fPnh0E/fHV/sBlIP/8qmsQf/Y6xzQizIn4aWrd
                                    JOQfYMmSJVatfxImQeGfqPXeZb+RWYB5aDtlPc64+zCN41A9X6ohgra2ttb777+/iyHoD+QPFIec
                                    s2DtNyOdLEmK3+TJk2nWs/EH2uskb7/9dqvHt3Pnzro5B3T1+E1z8PPaPiEA4h2HyRCZzhMQtG1v
                                    qdxwww1Xsnq3PwQAyB9kndfjzArppw0i0STkT+P9FPDHg6z/+fPnWztGKvjz6quvTrhWMhEQZXa+
                                    vAZxAsmvg8qyF8WAzPV/1VVXdbW0tCDoD+SPBynPBN1Maz8LBWMoqC5JPX+Zi5/O584777R6nBSQ
                                    SBP/hN27rEysk5diQGVz/+t+p/IAiBUAr7zyyi5WX+WvFXwG8oclkaPjbMa5Z40Ujh8/zoaHh2P/
                                    ftGiRdLPKfJ/8eLFVo/1tddekxb+KZtFDfe/XdEvi/xXeQjGyvxevsiz/DvYxKA/AOQPMQHiz0dn
                                    mMTl39bWxmbPnq38/h3veEfdVLxJcebMGbZt2zbtOnxGQJFJEO7/5KQvI3eVOOA/a2ub3DE6Oipa
                                    /uAykD+Iv1EPal47mqyeBxFlkuI+s2bNonrnyu8pC2Dp0qVWj3nTpk2sv7+/YW2wrAKgyGIiSuBn
                                    mBggMeuJ3rbOzs4Ogfhh/YP8y0nWeRo+gNU0hrNnz/rWdFzwKX4q3HHHHX7+vy1QSuKGDRtyJWLL
                                    Kt7TuJZJth81XmTc8m9rXbly5eW1oD9E/IP8Qfxl74jyJjBovD/JFL4mEf00LHDDDTdYPe4333yT
                                    nT59GkTI4P63/byaVMr0SL+yfPnyxQriB6eB/IGyWSB58yocOnQo9m9pilPTYj5U9Y/qAdjC6Ogo
                                    W7duXS5LO2d9xr6iWv9xIvx1z/SyZcsWeCKAH/eH2x/kD6u/DGIi76AIf7L84yJsvJ8HrWd70p99
                                    +/axAwcOQIwCsa55WMW/sM+WLFmyoFKpiMQPPgP5g/iLaBUVwdoPQGP9SabwJZd/lPMm8p8xY4bV
                                    c6DUvyTR/Xiucf6i9S8TCbJnfQ5Vt5ro9ocAAPnjYSva9hotUtIGpfglmSTKJNiPB6UF3nXXXVbP
                                    geYkeOutt1IRYnkQpra2l5fhjkYbNrr0v+nTp08TLH/M7gfyh3WQleMqs7tWNftf8FmS/H6K3o8z
                                    ec/VV1/NLr/8cqvn+frrr/uT/6Qp/GCxZxNxxKwq4l9X859eT5kypW3u3LnTOOKH1Q/yByAmmnO+
                                    umlK+b9ElvxEOVFB7vvOzs7I0wrTevfcc4/Vwj803e/GjRtTvVdZr1xXVmGSNPDP5PkJllYPS5Ys
                                    mc4muvzBaSD/7FmBQP6vn25GMlPYmMKXr3WusphkII/B9ddfb/WabN26VVqvoNHDAPAm5FcARJnW
                                    WbY+kb/3HHQyjPeD/LOMJGO7jexQbXfORRU5cQhehyQpfoQrrrgitOPVCROa9Ke9vd3a9aHMBX7W
                                    PxBidoVEXsb+xT5TJnJnz54tuv3BaSD/Yj/AZTi/rETy2yZ+6tSSkP+kSZMiTdcrO+6pU6f6lf9s
                                    gmb8E2f9a3T7h/Vf7OML8xDMmzdPZfmD10D+eMjQ2WVLeJw7dy5RdTzKcDLN79ed00033RRJRJjg
                                    lVde0c5QmPUo9rLEEjQaNjydYWl/hFmzZnWA9EH+IFhct0wRiQoU5U8V8uLCRrQ+nSNlDNx3331W
                                    g/9oroLNmzej7ZWY+BvV78nibDo7O6fB6gf5gxCbRHBFEDhpDi8krYpnM1WPAgdXrFhh9fxo1j/y
                                    buSZzMrgSShCnzdt2rQOhkh/kD8Az0ZcayItUIrfsWPHYv+exurnzp1r9Zgo+I/SBm1haGgoNPiv
                                    KKIRAqAx18kkE4A+956HNnAYyL/QD33WLJG8lQHOSodMtfz7+/tj/57G6KlSn03QhD8rV660us09
                                    e/YYeTjKNsFOmcR20j5CV+SHa7ttDG5/kD8AodQM0RIFSVP8Fi9e3JDjWrp0qb/YBAX/jYyMpH5P
                                    iiy60Q+MIQgonDRpUhv4DOQPqz+nHVBZpvpNmuJHgXmLFi1q2PGR9W9z2l/KaKDiP81qU0Ul3CJF
                                    /Uc5F35bwf1tb29XFfgBr4H88aBnuVMt0+Q/VAGvp6cn9u9nz57NZs6c2bDjo3F/Kv1rExs2bDCe
                                    ubDo4rSM4jvuM6j7jTAcAP4C+QN563jKVvv98OHDrFqtxv49VfWzmZYnw4033siuvPJKa9ujAEea
                                    9rdZ9w1u++yfn6qQj664FlffH/wF8oelkKcOooyTvuzfvz/R77u6ulI5zgceeMBq6d+dO3dGGu4o
                                    chYAxEj8c+JFQjAEUCN/pPiB/IEyWi15OE+K8KdI/7iYPn16rCl84+7LdvQ/Bf9FKWyEQjt4NmVj
                                    /OIi8aSBz0D+6CBsnlOWUwT5657V609V/cQ576OAAv2opn9aoFn/bEb/0yyG27dvRweBvsuof6CF
                                    hrhkC1WmDJZGD4OB/IHcPoiNmF0ri8j6Me7bty/R75csWZL6Ma9atYp1dHRY29769euNg//yIjqb
                                    /WyjfDgA8gfxN2Q7WZ80JStpfDrQRDdk+ccFpd8tXLgw9eOmyYOo9r8tDA4OshdffDEXYjIPzyY8
                                    CwDIH427lNcmL9ebyvn29fXF/j1V9bNpgUfBNddcw2644QZr26Oqf5T+16z7bEsQAwDIHygs2WJ6
                                    02THFXgkkk7kQy5/VcBTGiDrn2oM2AK5/5N4QvCMQowAIH90CDnomMqQI62qQ04R7knIn4KadCV9
                                    0xADNJfAww8/TGlVVrZHEdrd3d3+MEAz2hGsf4gJAORfSEu76B1Ts88vCuFSiVua4z4uaAa/WbNm
                                    xRYitkBphjar//X29vrj/2V/RrL4rDYyJgPCAuQPlED5IxJ5rLBPks70qquuyoxQuvnmm9nVV19t
                                    bXs081+zav/jmQUAkH9mHjwbiruoFk2WrP0o9zOJy59ymG2k+NkUAffff78/B4AtUPEfqgGANg4h
                                    AYD8SysgslJkA52Rnf2Tuz8qsfGI6vJP41pS1sFDDz1krbgKpUHS+D/9TbtNYOw//fPKc5onyB+A
                                    Yi9Bh2hj7JwK+0QpaSuCKuw1Is0t6TYvv/xydu+991o7LoqLeOmll0rbVmFpAyB/EG7uz6UI7n5b
                                    +3z77bdj/5ai/BtZ1S+psLnlllvYddddZ+14duzYwd54443U71NWLNGyeCHKkP0D8gfpQ/nnrJOw
                                    uU9y+Z84cSL27+fMmWPd5W+77dHsfzYnG6Lx/4MHD4J0AQDkn23iL+JUoRBzdpDU5U9R/mnd07j7
                                    oYmG3vWud7EpU6ZYOQ7K/3/++ef9NECQd3GBcX+QPwACbWpn3EgRl8TlbyvKP+q1iHMdZsyY4RcA
                                    snUNaerjZ599NlIAIMbtG3McEEUgf6CBCjYLlksZx+EaSfzk8j9+/Hjs31OUv81yuo1uC1deeaXV
                                    AkB07VavXm3Fk0Bi4ty5c+zMmTN+YCENxdASFF8iL8PAwEAmrNGyPIMY988OWnEJmke6uBbpX5NG
                                    74MK+yRx+S9btiwT6Y1RCPG2227zCfatt96ysn/aDsU9rFixQrkOlQe+cOGCP00wkTy/0OdE6uRB
                                    oHtB50ILCQLf4qlULs0ZT8GVNIRBwxe00GyGM2fO9GMuyLNB5Y3pewAA+QNATok/Dezduzf2b4lk
                                    KMUvj3jnO9/pk66toL21a9f6BExzG9CsiGSlk8A4deqUb7WTRU/7iwNRnJFQkMUa0HwGU6dOZe3t
                                    7f5Cx0OpjiRM6H0SwZQV4QaA/IGUQQ9oXgvYlF2oqJDU5b9o0SKrFfTSJBGyoCkA8J/+6Z98gk4K
                                    stKfeeYZNn36dN+6v3jxYurXYGRkxBcZtBDIq7Np0yZfEFCp4+XLl/vegaISdyOPByKl+cCYf46J
                                    qCjioZHnkeYUuEld/tdee23m2miU60bW8C/90i/5rnMbIMInIdEM4teBPA6bN29mf/d3fxe5PgEE
                                    OQDyB5raSZShk0n7HGmymrig8eaurq7cX0eyhN/97neXYpx8aGjIr0/wr//6r358QZEKDwEgfwDI
                                    rdWfZkfa09OTqLAPpfeJ48h59QIsWLDA9wBQsFwZQHUdqEYBDROUUfQCIH8AD2cuycoGdu/encjl
                                    f8011xTm2lOAHl17W+7/vAiAdevWFa5vQF9VXCDgDw9T4a5F2teYgtOSuPwptYyC/fIKSrsjr8ex
                                    Y8fY4cOH/ah8+qxs2LJli+/BIc8HAID8gToUIcofZVXrQaRHbv+4oMhxipbPi2AjYqfzJaKnc6ep
                                    iyldDs+2yzZs2MAeffRRdHQAyB+A96Do14Vc/nFBpJ+1KH8RNJxBUfeBZU+vKf0OmIgjR474FQQv
                                    u+yyRO04abxKHlLpkO4H8gdBwerPLSjKO0ktfyoa06xyvjpQJDvVLKBzo8I9VMMACAcNAZFASkL+
                                    AADyB4CM49ChQ36AW1zccMMNdYKIHxZK2yqifHqy7onw6byC4jZANCTJ+oCFDoD8YfUX3mrO0nWN
                                    i127dsX+LVXz083gl4YIoPF7slQpWj2pkMkSqG4/LWSJBzX900JWhkRskTaIH+QPgCQhXjjQJDIH
                                    DhyI/XtK7xOL4ciuT9CJ2xIDdNxE9ET4RPz0vgig1MI777zTz54IJuQhcUMeDVqoMh+NyZN3o5HZ
                                    CFGmJM6Dtd1IEQqvAsgfgHjIHYg845aepUC/66+/Pva1j9pp0hg+ET6lJNIYfhGj84ncKfjyvvvu
                                    uxRHQXMD8Lj55pt978bWrVv90ryNIjQAAPkDhSDurA5ZNLOj3blzZ+zfXnHFFf4scUnPWScCKEr/
                                    6NGjPuHTvANFj9Cn60AC52//9m/ZHXfc4RO9LIWSPAT33HOPX4r4hRdesH4cHR0dhbNoYZ2D/AEA
                                    nggPlO5GxBoXQaCfjfPnrwN10nRsRPgUuEdpZ1kGETHNkpdkNkQRVGb31Vdf9b0ANAxw1VVXKe8B
                                    XaMkQzcy2JrprywpfwDIHwByg7feeit2IBmRw5VXXmn1eCgVj4YhiPSJSNMOcotiFc+dO5fNnz/f
                                    r2pI7nma04BmyVu7dq3V4ybhQ5PuUFDlihUr/LRKEfSdbfLPc7VGAOQPwNLNhIWdRdD4eZJyvtdd
                                    dx1rbU3+6FHQGrnzafiBAveyMrEMD7LqieCJEInwifgnT548YT1y0dP4fHd3t/VgPBJFtBD533TT
                                    Tf6QS3D9SYzYBJ2bLfLPUqQ+PAggf6BJBJp3ArZ9/M24HkEHSIQbNyWOotCjBPrJQNHqlGK4d+/e
                                    zI3jU4Q9ETwRYFDAiKYrNgG550kA/PznP/fnB7ANEki0BJ6XpUuXWr9+lMFher4gXADkDwA5EjFv
                                    vvlm7N8vW7bMz++PCopkp/HpHTt2+OSfpTQwItOA7BcuXJhoNr85c+aw97///b4HgERWI0DFi2iY
                                    gRYx1TJRZ9ra6nsWskTeEBAAyL/JSDqhT7MmBMpilH8zvSA0jky54nFARWdo7NkUFK1PlioRPhFh
                                    VmbKI8t23rx5bPHixT7ZE2HzUfVJyYZc8TQ5zqZNm9hrr72WaKrkMNjIyQ/wjne8w1qwHwCA/Atk
                                    MTbr9xizt3fviIjjkhGRJbnEw0Aub4pUJ9d+ktkCbYIK55BlT+5yGru3PVYuu+a33Xabvy9Kx2vE
                                    MIBN0HWJIuwAAOQPFNpjUSSQlZiknC8FtemsfIo63759u1+Ep9nBe2TJ0+Q0XV1dfoAcWfqmQYo2
                                    Xc00nPDBD37QzwSgDIssgrwfDz/8cMPqWGRpiAdDCCB/AB6LUhwPv78khXLINU5EKqK3t9cXFORR
                                    aLaVT8GIZGmTFUuEn5XZBikV8KGHHvKv37p16zLlBaDrRMRP165R4rvIpA0xAfIvNBGW2XIu0rkn
                                    CfQjlzCN+QcdHo3l0/YoiI9SB5tJrOTOp0h7+pskWK/RuPrqq32ypbK8tNgcr4/TrmlYgioJBvc1
                                    q9Z2lgm2WTNYAiD/1NQtXOf5EhLivijQj9zxcUDj5VRNjibQofQ8In2bFe2iggL2yJ1OhE9xCJSL
                                    n0XSUnknKLCOUuooGDBJvYUk1j4RP7n7AQDkD2SS9CA67GDbtm2xq8+Ry5/KzRLpN2sGPSL8wMIn
                                    wm90wF6jQYLq3e9+tx8nQSl7cYVZ1PtIlr5uGua0RFAWhBgA8ocFX1AChnAYA82Al2QSH4rcbwbI
                                    pU9WKhWzIeInwi8aCVAcAC2UfknBkiQG4s60qBNOt9xyC7vxxhutVGYEAJA/yBDIwX2mYLys5NiH
                                    gaL0yaVPxYQocE8cw8+rFRh23HTOtFBAJoktCs48ceJEohoBFPB47bXX+kMMefeUAADIH8ilWGqW
                                    8CLyIJd/1q8zRelTQBy5pMOmCk5LADRDaFB5YBqPp4UmO6LAShIBJ0+e9KskUnClbPiGgvaoLj/9
                                    PqhWSH+D4kXNFExw2wMgfyBVlDFQUTxfsiCzWmCGLFNy6dNCefhAPSgugBZy1xNoPgaKuSAvDp9h
                                    QSV+ybKnwEdVXX4QMADyB2C5lwhbtmzJ1PEQOZF1T+5o3jKFNRkOIvdGZDaUrU+ACAL5A0ChxQ65
                                    iw8dOtT04yKCp7QyInwi/jyNP9ski6TbSvL7ZhJelsgWxA/yB2A9Fx5bt25tamdHbn0ax6fgPSq1
                                    CzSPuJIIh2aKlrxY/vAogPwL2eE0SwCgPkD886Wx4WYUkKGgM4rSJyuf8vEbmVpWtg4Xln8xhRkA
                                    8oflD1jBqVOn/KI8tvPFw6z86667zk8r6+zsxE2AcMikSANJg/wBiIfUjjuta0Bj/FQznvLEGzmH
                                    fAAay6cCNVT6l6z9uMF76MiLKxxwnwCQPwCkQPpxS/hGAeWSk4VPln4zx/IxqQpEFgDyBzLcceTR
                                    +s/DcdPkOlQXPi3Sp9Q8svIpL5/G9stCTGUP5kLAHwDyB2JbZzhuezh27Jhv6VNAX6M7MqqvT2RP
                                    pF/WWeBAFrh+AMgfyIkFnXS/WbT8ydLftGlTKqRP7nwifErTE+vrAwCsbQDkDxTScs8S8R89etS3
                                    9Pfu3dvQTpTS8ihwj0ifZtNLO4APANIwCgCQP5BTC7gsOH36NNuwYQPbtWtXQzstSs2jvHwK4Aub
                                    VAcAQLhyYwHCAuQPCzqjFnRecO7cOd+9T1PxDg8PN3RfNKHOY4895o/tAyAZAAD5A1Ysf0T7m4Oq
                                    8tFEPFSWl2ZuSwMrV67MNfGXjQzLSvxZv88QZCB/WP5AZFAlvm3btvnET9O2pgXK1acSvCBDCIys
                                    X7+sTK4EgPwBIDGoCh+59jdu3MjOnj2b6r7b2trY3XffjZsAqw73EgD5A9l7UIvoeaDzosI8RPon
                                    T55syjHccsstbObMmWhkAACA/IFsoYixBgcPHmTr169nR44cadoxUHT/rbfeCisOliJgsa9CWwH5
                                    w/qG5T8BZ86c8Ul/586dTT8WcvdnpTwvOvXiCKWy95MAyB8ALoGC+aj+Pi1pTrGrAtXnp5x+IP1O
                                    vZlBb82c0hd5/gDIH4j8QOUZVJyHrH2y+m2CgvUIQ0NDka8npfYhgwMAYPmD/IFMP1B5JCqaeGfd
                                    unX++L5NkKueqvBRCd5nn3028u+XL1/OFixYgIYF67K0xw0LHeQPANZx/vx5vxzvm2++aXWK3SlT
                                    pvj19m+88UY/WO/ll19mAwMDkbZBk/Pcc889sLRwzrDQAZA/AM+Bjd9Tvj5V5aPUParSZwtTp071
                                    rXVagpn1SGDQvqKC3P0kIgAQBa4jAPIHCo00hgz27dvHXnvtNXbq1Clr25wxY4ZP+GTti4RNs/tF
                                    Heu/6qqrChXklxaZFMlFDALGNQD5A5m1oLN23Dr09vb6pG8zde+yyy5jK1as8MvuBkF9PGjCn+3b
                                    t0faJm3nvvvuQwfe5H2BeLJhDOA+gPxB4kDsa0hj+kT8tlz8c+fOZTfffDNbtmwZa21VN2mKJ4g6
                                    y9873vEOVPKD6AEAkH/ZlW+avysayLVPwXa2ovgXLlzok/7SpUtZpVLRrtvT0xPZyzB//nx/+yBA
                                    kC2uAwDyB3LX+TRTfND+KaCPgvloGRkZSbzNOXPm+BY5kb7pMaxevTrSvklM3H///aylpQWNCAAA
                                    kD+I1ME5R8ChQ4d8a99GQB/l6d92222+NT5p0iTj31GQX1RvA8UOkOUPAPAcACB/oHSiIe5x03g+
                                    VeejADsbHRgF8ZG1P2vWrEi/I9FB8QVRMHv2bHbXXXcVSvDlmURQHrfY9x4CB+QPFES4UFneV199
                                    1c+pT4rLL7+c3Xnnnf7fqMdDww2/+MUvIgX5kbv/wQcfrMsWyLsASLtzLVpn3szzyVKEPUga5A/A
                                    8yAFpe+tXbuWvf3224m3Rdb37bff7lv8cY+dPA/Hjx+P9BsSGhRICAAAAPIHckPAzcKOHTvYK6+8
                                    kjh9LxjXpzF31bi+ybU8cOCAn9oXBTRjHwmOoty/ZlhqsPrtXgtY2wDIH+Ihk+RDZE/WPrn6k4Im
                                    3aFxfaq/nwR9fX2su7s70vwA5OYnd78uuh91HsohYAAA5A9YQ97HjGXHf+TIEZ9kyd2fBBRVTwF2
                                    V1xxReJjJcKnYyIBEAX33nuvUTBhXgQArH6IB5w/APKH9W9932+99ZafOx+1Yh4PsrLvuOMO380f
                                    NZ8+6NTE60Hj/OTyjwKqF3DTTTcl3jc6e6Co9xLtCuQPQDj4qXOvv/56om1QoR4qomMzuI4mCSLy
                                    j4KOjg72wAMPJOoQsyACitg5g3AAAOQP8m0y6NipQh6lziUd37/lllv8sX3Z5Dtxcfr0afbcc89F
                                    Jox3vvOd/tS/eb23WSDIopJ0s88LE+kAIH+g6SDif/bZZxOl8VEk/0MPPWRclte0gx4YGGA/+9nP
                                    2ODgYKTfUmS/rWNJ2wtQdFLIe6Q8Iv1xjiB/IPfWPxXLIas6CfHTzHiPPPIImzdvnnVR8swzz7Cz
                                    Z89G+h0FF959990N68wadZ/RWQIAAPKHgGj4byl6/vnnn2d79+6NfcxUsOc973mPn8JnWwC98MIL
                                    7PDhw5F+M23aNPbwww+HzgRoi6QD923U8xZ/g2j68pwXRB4A8gea2gHRGP+ePXsSWfyPPvoomz59
                                    uvXjowmDqLhQFFBWARE/CYC0O3JREJh08mUkAbjMISAAkD/QRKxbt47t3Lkz9u9pjP9d73rXBOK3
                                    Yf1TNUGaIjgqbNUTKHvHDGIpz7XBvS4mClGubBtjbWc6Ox5xmPNLDnOv9T6a553Ycu99uxOcpDP2
                                    l5YKd+LBZ25tYdxrfqH/xt+7jH8cXMXv+e+ZZJ36B2zi+tL1ZA8n2jEAALbIXvN+vP9yteuq+jrX
                                    De8rZb91ld+7E/pQ1W9rGPQ+2e71+icc19ntsOq/TO2/+OyvMTYE8s8J1nZ2zh5mo7/sOu6/rbjM
                                    I342zeHIfJzYHcYLgAq3TiMEgLbhM6PGqRUDUckewgAAgKT9hL4fc7XrTFjflfexJgJgYv/sThAW
                                    YX2r+Lnjsj5WcZ913cr/Yi2TfvZbvb09IP8MopuxdndGx3/wCP8L3g3slJF4YN1PEABO/Trib/UK
                                    Uy4AWETlygy/04kBkDsAAI0i+yjeRpkQ0IkAUy9A2Ov6965UVOj6VldNhr0uc55uvTDwX/+d7yUA
                                    +TcdX/H4/L7pHR+vOOyr3tsFTEPiKgFQqb2RCYAw618lAEwavE6JxmmksR52qAQAAGKSvslQpJSQ
                                    I4oAnRdA7ZV1tYKCSfpjXd9a44ET3raeOto/+N897qkW8X7ngvx/1jl5WUu15X96R3v7JTJ36k9C
                                    No4vflapeQBEAVARfmekOqUq043k5g8bvzd194PXAQCwKgRCYpDChEFYvxhFBEQRALIhhah9cD0x
                                    uhuGW9ivf7r34m6Qf8r4l+kdj3kH+QNWG9OfYPE7Ewk/qgAwCQBUNlpXr3jDGlyUsSmQPQAASS36
                                    uOvKBEFY3yb2jaFWvSUBECWWQHXeHDn2j7qVj3yqv/8fQP7pEf9ve3++G3C6OD5/ibg1AkAM8Isb
                                    AMiYfhggzO0VRQjYfGABAADi9B9h/ZEuul4/7m9PBEQRAGFZWSGoDlbd3/3cwMU/A/k3GD/pnPqE
                                    dwd/wCSELx3fdyYSPpOSv3kAYCQBIIgA05SYqAIARA8AQFpCwCRGSSUEwtP13PBUvhqJV0O8AFWN
                                    AKgqPRHh5ysS5CnX/eTv9V/8C+/lCMi/Afjnzil3eXfhBe9lez3xO0qS5j0AMsI3Hf+PIgBUjZy5
                                    ZukwJoSPcX4AANKy9k3WDw1idvX9JJNY625EL4CpAKi6BincmnN0BLL09jG0bcT9lW9fvPizvAuA
                                    zJH/P3Z0LHJa3HXey0WyA+Qtd6l734nu/pd5AERvQ5gA0HkBZCIgCrG7Fh9iAACApAaGaQBdWDof
                                    iyACqq6e8GUCwFQ46M5BJMthxnqeGRp9z4+HhzfkWQBkqrzvVzyOdlvcv3U54nclVvjY/45/oysy
                                    0nUmvJzwmv6v2f7KYA+XqesAOJKHgf/MDYYhXJ3eco1cTWHqDQIAAICkFqBr0Le4CsNI/HupT6wZ
                                    VnwBHnWfpf6GPqWhXXEYIOj/+fdVfnuOW2eIORG9GjJMYmz2O9sqf7V2mP2bHsaOsJymAmbK8v+7
                                    6VO+6B3Q00xq7de/5nP3J7j3JdZ/1LF/xuRxBmFqURlM4qoblys0tThkDgEAAEAjvABRY5K0Qc2u
                                    WSq1zgvAb4Mfz69KPABVbvy/qvQQTNyP7BxFXtgzWv0ffzw49B+9l7msCJgZ8v/R1KkLWp3qLu9l
                                    3XRrYj7/RHe+M2Fcv6IY+w+L/FeN/U/0PLB4+fyuyQPlgtgBAMgk+TNmlioXpca/STxAVAHg1r2f
                                    OP7vMn0goa7fDXhhlLGhvxgc/rebR0ef99725e1eV7JyIK2V6pPejZhWrd2QS8rNVRduUJKwq2+Q
                                    jE2sDKVTsPxnjkQ1OQZ/HcGFoPNm8P8Y01ckdNBfAQBg0Ro0XSoGxpJsvcCoC76rMHmtFdFAq9uO
                                    M2bkhcV2VWrbkPW5LGYfGnBDC2NtD0xqJcu/y1va8navMzHm/6POztmj1eHfZhqypTd0wyeSsntp
                                    9N5l6nEd6Ta5bflDQ47aJSISvzi+JRv7kv3e5TfuTjyWie8dzbm42XLfAABQKKs/bv/ihvw2iAeQ
                                    7djlSLnK9a7SMX5nzEAMxvplZH6J+mvj/2IfLYtFcA25Y1mLs3JhC1t1dNR3/R8D+UfF6PDHPeKd
                                    ZtKiAgHAmJo4Za9V35s0YlkjUQkAFeFLG5xwAjohIH+wQPsAANggfje0vzERA2J/Jw/Yrv/ecVgd
                                    KfPLeEC3c2kM3xFEgCgA6oP+hH6fiwEM68PDhjecMQJtfbB10uM/HB3e6r09y3I0GVAmyN8j/o/o
                                    GpKqcTGJtR+X5KMoV1fSmHUPgMPCMg/0QsBUTQMAAMSx9FWGhCgKomYmyUSA1r3g6q3tii8CXO69
                                    XgDwGQBO7bcO02cpaK9ZbaXACKXfXVup3Or9We4tB7zlUF7uf9PH/Mnl792Y28WxfmUUqKSAhGkj
                                    N52q0qQanxvyAOjGllTj/XU/lvivnIQLAACAaX8SiAIxCknlWncMtsvCvhMytbRZWkzI6FLEADDx
                                    twZTu+uIP3gdBB3OrTgzuyqVO9hYinpuxv6bbvmPjg7/suvo1V74eLrLZe2P3xzHgPFcbouOZONh
                                    3gOdctS5lVTDCUznEQjzxxk87AAAACbGknwYU+4HUPVvutx6mfdUrA0Q3vPWewB0Adm8NyAsXsvV
                                    ET9/nrU317ZUbjpQrS713u31llMgfwNUHXa3ihyVRFp7kcStb/oQmMQRmAoAxuTBJY7hgwc2BwCg
                                    oYyv6XtUwcj80ECUoUlVCV0xFkDW7VUlAsDhPuLH/SdmIYwN/DuuSkqohwFcWT/uvbm84iz2XhL5
                                    z84L+Tfd7e867rWiq9/SLEyJjOW4+3FCPpOlwzDJZ7rP4doHAMAqNJ2JznXPGJOmJYdt1mQogDF1
                                    AbYK06QCOvJ1GQsffmXMbAiACZw023E6vT/zvWUOy4nrv+mWv+s6y8IcOzr3UVqiOCyS32H68pU6
                                    74YqoCasFCWcAQAANMgBoHQBqL2h0T0BRsMDkg61vpRvfSBfsENHkQLIW/+uK5/ILcp1ot/MdJwO
                                    +uMt87yFXg+B/MMv4oIwMpPnv6dL9ib7DWs4qgdCRfguyB0AABtEHsEBoNyOIiMpTASEGTQsRCjo
                                    BMC4de/4aYB1Uf61DABZfRbVUK0yTsvRF4+b6jhk7bfXLH8i/7Mg/9AG6k4Tm58TQyE2ivnD8u1l
                                    EwCFpY6oHoiwNBqU+QUAIAmRxxEN2kBkAxEgTmAWZulHEQAqQ1G0+ANPAWPjqYD+5HC1sX8Z4UeZ
                                    NK11bJOB9d+eh/aRAbd/7WJfmomvvlmYNJSsqGwngieg0VY/hAIAADZEg9ZQMRQBohcgzJPrxhAA
                                    gfXPBIu94o6TfliJX5MhXM11Iet/OsOYf0SSqiueMK4b41r6jmP/OE2HAkwbj6nVb8t9FxdtXV1s
                                    1oefyEyjHTp4gA0fOCD9fEjyeVYw//NfzNwxXVizuu79wNYtbPTcuVyS1qzHn2BtV3SVhqTp3vUJ
                                    989afxzSF0URAaIXwCSuyYkgAOo9r+NfiuP/cvf/eOS/SfZWyHVrrVn/rXloP5kg/7B6+FmCyTAA
                                    i+ABCBMBLANeD+pQs0hcOoz29rLBGpENbNnskxp1ls0ktjxdw6GDB9mwJ6YGtmzxXu9ng95f20Rj
                                    G7Mf/wibuvK+0pD/8W98zfo9CRtqDI1bEkSAfCgg2jBAmAAQx/L5AEDG5KSuigMQzzWiEKjUOLWS
                                    h/aTHcuf+yCw/vnRf5NJe7IE07zRKCKgUZZ9EdHS2XmJCDrf8+ilzwe3bWVnfvgDb/nr3Fq46Qi+
                                    K/yFJ1MSVCSgen/6Y2/5Ca5fBvqYpP1AlH7GjSoCNF4A2TBAlDLt4pwAEz0AwrHGtP7r1nXCCg/V
                                    iYDMIxMHqZrXOaxxOoYN14lJmklrAjgJCBu5+41B+403sYX/+Wl23cYtbPF/+y5rmTEDFyWCoCIh
                                    tfhb37l0/WhICMi/gDCpFxJW1nfCe2EK8/q/jrJvNimFrqsDICsBbLQtxXq2BRfIX0embjTyzdSx
                                    N/gBBewR2awPP+6TWN6GNDJ1/TZshggouCiIKwLEN3EFADMgbfn7+sJDaqEgWTem0Qbyj2H1M2an
                                    gl8WHyJmsSFhIh/7JDbPI/9rXlgNAouJQARARBVbCJiKAFMBMG6hO6FErxMmIqkzFl5ZULofR1+B
                                    tWh9aibI34b1bFKS0WnSOTlNOg7H4lJ00HDAsl+sZlNuWmH1upXpGgYiqpHXEGK3cc+4Y7ivsM9V
                                    ZMsLAJkXwNTSl/b7jqFF74TPOKg9B2Wfnz+zNVNj/vEfAMdMfSa02qOKGFvbBtLzAlz1Tz9hnY++
                                    FxcjgYiia0hpd0C+xUQcERDaDztqgy2KAFCJgmTWvzNhXoAJ51igjjtzlr8rqCnXYqNuJis7ER4i
                                    oLkCoOv/+wFr96xXIP41vPxb32ELv/o1XIwCC4Ewt38cARD2WjvW76hJPcz6Zxrrv6ju/8yM+evm
                                    T84j3IgPGZAtkPUKAZAMl/3OJ/xgQKA4QsCk/3JMyNxRWfiOkvRN+lDRcjeZVTBMBDCmFysgf4uE
                                    mZa17zThAYIAyI/1uvjbSAVMipkffhwCoGAiwPTzKAKg/neO1uo3SdlzDK3/MPHhRPBygPxjWv5x
                                    GmDcHExH0tAaYe1Hrc8PAZAt0Pj1vM9/CRfCggBADEDxvQBRov9lQYD1fx1tH68LyHOUmQXqGIG6
                                    dZ2QIMOCdNSZsfyjVL8LJXQn2jaypOggALIFcl1PvW8VLkRCUAwAAinL6QVIKgBM+8bI1j8LTysM
                                    +w7kn6IASCQKMv7QRPVgAOlg4X9B4JoVAYBiQBAAqt8oBABj0dz/KutfKggc1f4c4xRDkH8TSN+J
                                    2PiaZXG7CfYHAZANkPsfbuvk8LMAMP5fSAEQlSCl/bcjJ2IWwSIPy9lniu9kwiBMPOQdmZl6sNGT
                                    9jg5frDiCqSsYfjgQX9Sncjku+LmCYF3FIlPZJIWZj7+EX8yoCzgxDeieSJaZsz0ruHEzIVmzIBH
                                    +7zsE59kp7+XXRFw9m9+yIYO7M/883QhY7MsyiYvM5nePOzzYCKgsD5xwmRDtcl8eH7hJxUSZ+zj
                                    yV0322zYcYP8UyDxZkXzx5nWN2njKYIIGDp4IDJxhYHcyDQmP/W++9n0R9/bMEFApEX7GjpwIHfk
                                    b3INJ11Ru46r7m+4KKAgyrMZnlWRBOqFjE9fnOX+2TX8Xvqam6nPDREPqumHZTMJKj0FnEDQeSUm
                                    eA5qM/zlWQBkushPnIaXaHzGSecck+wS8QCCoPDImCzyQ5/5JNt52wrrxMhjekED1ugaEtnRtXv7
                                    sfeyN6++kh39vS/5nppGgAQaCgCVSxBEMuA07v+wfjNs0iGTWgKy4MBGG5SlJH8ZSYalyInR/E5J
                                    HyjUNq8HWZJEYLsfvJ8NbttqffuzHv9Iaa4jueV31MTUaG+v9X1Q+h+C/8pB9mF9tGn8liNJzNZN
                                    /sNzRVjMgCrlz9SodHLYA1fK2jAdwxvmNOlhsSUIsjZpShoTvFzcuoXt8yxY2wKAAv9aZ8woxTUM
                                    lpMe+e95cFVDxBS5/8vaRrO0NEMAhAZqO+HCwAkREWHleh2JMambSpgVzNjKjNs/alS8E6K4nAY0
                                    Xhvn2UyRUTYvAAkA267rMpb8HT5wwL+WF9ausW79T4L1nwmDqBGEFiUmyzHcgGNoY6tS+sK8DlHE
                                    Rt777UrZGnkaN89lQFYEwOHPfNLqNsta8Ieu5cGPPmHdA3DZ73wKDTWDQiDNPjiqRR/mpVH9NqyM
                                    r6MRGo5CVMDyzwFZOjl58AC7oEA2St2y9sDMmFlqMUUeAJsxADNRP6HQIqBZ1r9Jtb6os/jZqikD
                                    8rfcmPgJG5LclEbeSLfJ+y8rzsaoLaCCLF++jB4AW6DIfwiAYhskcab9TWL9S3/nhMzS5yi25xS3
                                    X66ggWbvxkIA2Lf+GxGxXubref5ffmpte52Pvg8XteACINE2neiGoIm4UM3gx0KER1GyrDKX59+I
                                    hpWlG4R4gOZgcOsWXASLOPrUF61ta/p7HsXUySU3sKJY/4zFy9RyDPcdNegP5A8r2SrJw/q3TP5b
                                    7JB/M0riZhGUAWDT+u/AzIml62sdC78zHa9nBuvJ13UiDVuA/EtM+jjHbKJ67iwugmWc/t53rG2L
                                    yjMDxe6T4pRjV+X9h1n/UoHgyNcT4wLCqgSGbRPk3wRrOS9wU3rYAKCRoLF/W3UUpq6C5V9GoyRu
                                    BL0TcfuO4WdSL4HTmHMH+bN0xv3xsJUbNDOgFcKzXOgm7+j96U/s3J8bb8K4fwn6pEQZWE44wYe5
                                    /mW5/GFigbHw4L489tGFDPjLyk1xLZ43BEAyoJJco6z/l+wJtJtW4IJCVETyCkR1/TNmFhvANCLA
                                    9DhB/jEJE1HxEAA2iZ8sS8A++i1OfTsVQX+ltP5T9SI4eos+SgofUv2A1B84iIBo6LQ4Fa+trIGi
                                    gIr+2Br3n9R1JS4oDBKjwL8o/aNj8FN9RUCnkNP6gvxjwm3yNiAAzEDjyDbrxyNrQCKILNVQwNAM
                                    RETcz02j88XvHIlnwGHh0/gWId0P5J8DkRCmViEE1Jj7+S+xSVdcYW17Fyy6uQtD/ls2W9kOxvzL
                                    Y/3bzRhwEu1HrPQnXcfRlw7OI1qzQpBuRkms0cdla/tOxh5unVhJC1Qz/rLf+YTVbV70rNxmt9Os
                                    PSejveesbIfq/DslbKdFN1Li3gNX9Rn3pRPh2E3XlWUPuDG2A/JP2ADdjB0frOx8gIh/0be+Y3Wb
                                    NJ0tjXEDgiCyGAdBrn+qHthMXPmPP87U9e1fu8afTTENQekm+L2b8DeqbUTddtj6vhXvRu/LiyYK
                                    C+v2j5s10IhsAzfh90AE63HGDLbgq1+zTvx+J7waLv9Go+0KjPs32+JOM/rehmCRvY8yLW/UKXuL
                                    ku7XmrUDciOs51jcp5Pi7+BVsA+yGGd++Al22Sc+xSqdnQ3Zh82pgYsEeEOKKQKaYZjwVrvW9T/h
                                    c8f73I3tNRD3GyXdL68GXGbG/JOIgLx4IhwL65QdFBQWVIKjyWAoPax9xYqG5/GT6xUzA8ph87r4
                                    Ef8oopgpEeBmYP0J60UY93e4vlUkeFfiLXANPABFGPdvOvm7ws1RkaAbIhScCO+TEHdeAgCziI6V
                                    97Hlp/KZKgerPx1Mgts/916ANInRxr5M8v95z4JJ3YA8IPNj/q7hzQ3Wc125V8A18Ry48Y7P9rqI
                                    AcgWyOo/+8O/xoUAIAJS2G6SsfSo4/fjn49/w+f6G+8vh0og0+V9XdcuQboT3ruhx9Co84MAyA9O
                                    fv1pXAQAYNFn02vEvk0IPO4xmOb6F8E72/yJfVxzspNb924k8kyaBSAXEY0VQkDz0PP976GwDwA0
                                    WAA4CQ/EbBIgFtu6L+JQbKYsf1dKtG6o67/ZpXYbuS+XQQQ0C1Sz/uQ3YPUDQBqWvQlp2zhWk9K8
                                    JqmBJt4IkL8lCzuMFF3F7yPl2bvxiDqJJwFegOyh2tvLDn70CaSxAUACAeAU6FxMxADIPwaxRXL7
                                    WyTnKMMGcfbbjOsEJMfhz3wSqX0AkCK5Ozk6Boz5N8jSNx1TD0v/k22/2QRuw5qHCGgsjnz2U+z8
                                    T3+CCwEAFoiwEeTspPS7IiOzqX5RCY73CrhuXC9Ass9tZCBABDQPvqv/Yx9BWh8AFMyr0IhjybuQ
                                    aM3iQbkaYo9CmFEK5tStW3ujKjbkZPx65W37WQBN2nP40/lw9Rf9fri4LqmKfFuzijb6GLN4fx2W
                                    32p/2RjzdzWkb5Dr7xpcen3woGv1QUWnlS+c/MbX2J53rsIYf0xQyWVbGMA9aJq4yLrAAApm+atK
                                    8aqsbt61z1dV4n+nKsfrShqiaSngqJ8D2cfZv/khO/GNp5s+hWzeEcy1YAPVDGRX7Hv/+0pb2yFJ
                                    f2ar1C6MoZKQf5gl7LIg199RigEnpCHLCD5Ujabs+oeIAOkDQJb6X/RHxb4GrVlrcCbryaz7CUMG
                                    bvR6y7am9s3CFMHAOEZ7e1m/Z8n1/vTHfhQ/cvftYup9q6xtC0MvxfACFE0IiWKgCNelNWuNTJx6
                                    MUwcyNz6Ore/2ksw7lswcfHjwcgOqBLf0MExK56s+eED+z3CP8cGt2zxyQRknyOhhnuVawEQNiWu
                                    28TzgIcgY+Qf5rZXiQD5JD1OKFG7igbpaA4uDtHD+pdYddu2smP/1xcTbQN19rOHjlX3W2sfADwA
                                    eRMBeY1TaM3DTSIXvqsZf2cSr4Gj+SxJQ08j8K+oAoCsOpB38dB2RZeV7SAGoxgCoCxBe3k/z8wU
                                    +ZGl++nq97ssfEZA1TbVDdyduJ5mH5HmDMiAQgWARmDSFVfYsfy3bMbFLJnVjHMsOfm7Bu9dSTa+
                                    WPhHXHQeAl3hoKwUGYEAALIOm8F+yPEvPjk6BT0vkH+Db4ar8AjYLL8rtf4l+0/D+ocAAMpE/v0Y
                                    EioMskTyNsqw51XU5IL8dda46cQ+vHfAjXHzXQsM7KbQeAEgK5j+3vdZ2Q5lbCDSvxzWf9aOp6z9
                                    ayUvDc0P+pNZ/SFj8trSwUxd1jJshsEo4sIt4AMHAJO6ulj7jTdZ2VYvZlEsnABwmrx/3W94Pilr
                                    f1vJckPSTcur8hCEEbqJm15a6z/ko0a7/02PHwDSwqwPP2FtWxfWvIQLCg9ALo8xr5lZmbL8eStd
                                    Tuyukgxlk/y4IRZ8Uuu/WY0OIgDIAmY+/hEr26EKjOdh+ZcGjSDLONlYZUemxvyjfOaGeAfqiNKN
                                    RppZtv5VAgYA0iX+J6yl+IH4i2v952X686C/jzoMkOdyv61ZbUximV9d/n9Qx1+WDeCwiYV+dBP+
                                    qCbxufRdhKp/aU0KlIanIQ/HiQ43Pcz7/JesbevMD3+QqXZRJkHtWLpeTkptPqxOi5uhZwSWf+hN
                                    dQ1U2TjJ6/L63ZDfyvahqwtgqgajZhagYQJ5xrzPf9Ga1U9R/qj62Hyhk9SL6Ob8GjDBmNSdV1Em
                                    98l8nv/E4D43NN9ft06YsndNxElE9z/IHigKKK+fyN8WTn3/O7ioGRUEWfIuJFEcbgPO0UnrHMtA
                                    /q5Cdbkhlval9Vy5klWJCZXyDSN0XdnfZo7/A0Cj0X7TCtb1V39tbXsU6Hf2h3+NC1sQERBlXacJ
                                    YiFKn4xUvyYJAJ0XQO4NmNhYZda/TlgwracgXjBIWGOCAADyglmPP8Gu+qefsJbOTmvbPP2976Cw
                                    Twk9AVnglMx7NVJAa5ZvmHR2Pi64z2XqAEFxW45kHdk0v+qAP9f769QflyTSJWyKYkdzfACQNbR1
                                    dbHL/9t32dSV91ndLln9p7//XVzgnBGpE3OdRs2A51paP0mgIKb0bWADmxiUMr4WT+iyqH+VeJAJ
                                    A5Wq004RLIn+V73WPRxFncYXyCc6H32vt7yPzfzw4w3ZPqz+fFvScaY9b6bV36h6/nn23rZmvaG5
                                    Id+pov8Daz2w110F2UdpxMHWIACAIiGYnIf+tq+42f9r070vgiL8T3zja7jwBfcCpEHqKmLXpgQa
                                    DP+aCoY8C4Bsuv0561xq/VPKn6O+eTJR4MSw/mWEbVMAMIZhACA6aOw9LlpmzLBWjz8uDn3mk7iJ
                                    BRcAsu/EPtYmcZqkjIcZlnFd/3ntq1uz3JhE4q6/QfVWPe/650nYxPoPa4yOQgCoTsBUAMALAMSy
                                    1C2Pv6eJ09//HvL6SywA0vQIxLHkTcneZfl3+1ey2JhUNypsIh835DvGJkb+m030IzsGRTUpgxTA
                                    KFMMIyMAKAoGt21lR5/6Ii5EAQVA0a3kS8fvTDwfhyHPvyGNKWwWPynRu/q0P8bUtQFk75nB6ygC
                                    QPXeNL4BAPIGiu4/8NEncCEKLABSTWd2ra5mJFp4by+K/DSyMbkhROhqSN3Q+g8TGCrRMf69a1UA
                                    mFj7EAJAHvH2Y+9lQwcO4ELACxCbNF1Lx6Wr4hpPFOQTTR/zd0IunTjuL5ucR2nVS8b+JzQILj3Q
                                    CWls4mRAAfWLAYCXGjV3DIzpawzECfxzM/pAswwcM5AdHPrsp9jA1i25t2KLACel66fLbkprrNw1
                                    +M5WXj9m9WtgI1KV9HUdtSBQiQPxcybUB2BMHpmvEwD8r2RZALLzQfQ/UAbiP4MSvrm0zJ2E+zFJ
                                    b867iMrzebXmpcE6ClUeWPRSt73E+mcSK12n5lyFlS4v/KNPA2Sa7ZmKAAgBIA+gMf69j72XDebI
                                    4gfS63PyGCl/qU931MPSeUJmA/50OZhhAX+M6cbvXXmWgBttW4ypswAYU0wE5KoETPwAQMQAAFnD
                                    hbVr2O4HV4H4CyYEkk704yb0MMSNDzB18bsR9u2wfEf6Z97ydyXj8XLrfnw8X2f9M4UFf+kziftf
                                    XM+J6QFgCi8AM/QEmDR+NyedCFBca//4N55mp76X/5r9ZW6npv2MY3gd8+r+d5jMQ+xcMvDy7oFt
                                    zcNDKI7ji2pONrYvG/tnTO3+143/M6YvACSPTRgXABPWE56eqEGAcZQwADQSZ/7mhz7xI6K/GFa+
                                    iSAwFQFxJvvJ4rBAHY/UXP8Oy++4f2uWLmgcISBa/47G+hfJ2RUC9JihAHAMHhDe+a/1AhiIgLCH
                                    Ly9WEIYnimfpn/vpTzJD+mindiz7sGsbNzNJFyQXZlxZayNu/Gs2ftxj1r/jpNwRF9Hyj+o+ckMs
                                    ff6zau19ReL+r3rvKqq9R/AAOIqHQzYMwGKIAFj9QJYwsG0rO/PDH7CeH/41ZuYriGUfpW8Oy4pK
                                    Uu8/i4ao3Lrn3P/eF6PjVAPyj3DB+7xLOC2KIpdNr0uKruqMfVLhSV/4XbX2mWOi8DUCgLHowwC8
                                    FyCKCNCp7TRUPwD0rV3Den/6Y9/Sh2u/vELBxOo3qffPr2NSK3/Cdw1WDWZe3vGzHHFB/nEu8jHv
                                    zzKlmqzdAUfTeGTWv8wTUPX+q9TIPBABvPUvvdExBADTPBBuFBGgEAJJiNxN6TdpbAuwb9GTJU/k
                                    PnRgv1+Yh14PlCxqH8NTya3+OFOmR7XE0/IAmIzrDzB3hHubCyGQBbf/biJ/J+YDWkeg3Ni/zP1f
                                    YRPH//kAwCrnKTARAFFUq/hAGImAEOmdVgd1fs1qtnHOTPSGCYFr2Fjseuy9uAgJyT1MqIdlIslE
                                    gG4m0+C1rh9t5tCAozE4efRUWX+eiJ+xDOT5Vxxnp2mupEkdf9nrqigY3PHPxfz/qkRc6OoAqCYD
                                    0uXhT5x0yFWewwQrBAn+AABY9HCELTqjS+UtcUNERKOHLZMOb/Kc5GjeB8txt0rkP1JbYPkbNsBX
                                    +bSJMHeQzN1f19Ak1j/f2ALrnkkCABnnAXAUOw88ALJ61aaN2tQToNuuY+NJAgAACGFNkyFPR2HV
                                    M43VLFrUMutf9bpRp+7UXujS+GRDGvtGq301ehmsCQCQfxjaKq3PDFeHL11w8aI6jloAyNwx/GdV
                                    zrWhKvJTneD+0I/uBI3CkRQOcphZxKirJXaX+40TK9YAAAAglhVsEMQU5u5Xuf5NBIBu167kQ8cd
                                    f2MyO59Ymtdh9YV7VP112MREm6ujZ70/Q95yvvY382i62/93zp8/NcqczQGh8mTvOOFtVFWqly/j
                                    G1j84uuqW/9eVwK4Kq6nGQbQHhtTTy3MpMfhSocGUOIXAABTPo+7KDek+CisFHrYEIAjESyq0rph
                                    IseJKH7qXPuO3t1f4ZajVbfvyKg7WLP6z9b+wvI3wUV39H92OJWb+YkTojRs9Yx+Y+5/PpBvPMq/
                                    9reWASB6AFyhBoAqE0DXusS6BI5B49M9FCply0+LDAEAAIAtb4Ey6E+TkaQqgR5m5Zt4T5P0cbrh
                                    BF3ZdvH4RLw2Mnqi9pLG/Xtqf0H+JjjFWv/HFaz6+96FbQ/LF9UX06nP++dd8/XFfdQCIFB1Y0MC
                                    7iW3kMPqMwH4hqqKBXAF5ehGdHOZeON0ogAAACAaQToG/Y1eCIQRPzPow3XDCXFI3jSOoO54DHY6
                                    5NHEM8Mjx2p0Qlb/ibyQf0sWDmLN8PD5ByZVlrU7zq06ApS5chyFi8ip+8BRuo5cwdWj3r+ZO0Ln
                                    tXASPZQAAACNtfRNhIHqN47kjWkfbvKdaj8qj4DprIK6K1A3DC1wBy2rh0cPvzAyepJRqj9jb3rL
                                    upoAyDwyM6Xv5hH2Te/mDMaZIlE3zS+rWcbiuL4qBiBIA1SlAsrSCOviASSxAOK+xeNWrYfxfQAA
                                    0oBJX+NKopCUMUy1N7pxf/3U6OZj/bw4CYsV4Aldte6EsX5nzDMsjvWPeF32/x4ZPlRbjdz9+2p/
                                    c4GWrBzI1tHRM7e2tCycUXHudAyUpSwYQ7meU69cnRAPgEoIupIvtcMSjvw70+pXAAAAWbD6w3+j
                                    +cQxs/x1/bt2T064sHGMPAH6swoC0oPlx8Mjb68ZHj3NxqL793jL2poAGAX5R8PorpHRbXdMavnQ
                                    ZMeZIXOzqNwvOjFQr/YcrZBwJY3W1TR/XWPSiQDpOgbKHAIBAIBGWP22BIITQQToBAEL6ftVv9en
                                    Uav7USfEsBO55fCo2/cng0M7Rsd+TgLgNW/Z4C1nYPnHQB9jg2eqbOeNLS3vb3XYJFVFJV1jCVeI
                                    aqtdqjJDidvRPkwqEaBzfTkRBQBEAAAAjRYA0cWAEyoC4qTsORGPTOppdXS/dJQeCPrb57pDvzd4
                                    8Y1zLhuuWf07veWlmvU/kpd73pKx4xk54rrnLrrVwetbW97ZwtG1zq3PFCLBURK5E1nRqrwAuqEA
                                    XYlLUyFgeowQAQAAJBUArqE4iNZHOTobLLRfN+oDnRiTCimOYTzDy5kgOmic/7/0D23eU3UvsLEw
                                    rSNszN3/OhuL9s8NWjJ4TEP7qu6Jdse57OqWyk2mY/tMQfpy97+ZAHCVv43nCYjjEdA9lMgAAAAg
                                    LREQJdUu7JsoQwEm4sBko67WIFTth5cCDvt/Bod3vDTqj/MTyMW/sWb1U+DfaJ7ucxbJny5g/5uj
                                    1YNTncqCq1qca1SWvUq1sbD1TFqe7lujKX6dUAXtGggBN0R9w+IHACApTA2JKJP3xBEBYRa/TgC4
                                    zMynKxMAJumGf3lxeOffD48crb2lWv7bvKXbW95iY6l+uUJLRo+LxlH6to2OHh50Wed1rZVrWjSG
                                    tyoWQJcaohMAxqo3gghQBaKEuvwdM8JHWiAAAEmtfV1/4Rj2iyZxTK5MBDhm+9Z6AAzd/yoBINv2
                                    MGPV/zo4tO2fh0eO1z6i8r00zv+8t2zylnNFFnzNAKVSzvOWlUsrlV/5PyZPemxuxZnGDBqn7q+Y
                                    v8nYeH5o2NSNss/EIhCqoQd+/MikuIX2Nfz9AACkQARRXe+O4V9dv8g0dfX517K5Wy59dmnadndC
                                    XRZZrRZxZtjg/cFRt+8/Xxzavnd0tJ8zTHd7y3NsbKz/BMvJFL55sfyD+0IK6/wZ173wwsjouVHG
                                    pnRVnJmTHadFR84yj4D0O034p65huxpPQljAjCvxBsgUuMlrWPQAAIQSewJjwXTiHrHPNA1i5j2k
                                    ruAFiOIBYEoPgBPapzsS46qPuUN/dXFkz9cGL+7qcd1glr7+GvG/yMZS+8gTMJrXdtGS8eMjRUVR
                                    lWe8htG/q1q9+OJItXcSc1u7WlpmtArZACqVyBQeAJn1z0JdVWaFfdyQB0ps8K7BfmUPHFz8AACY
                                    EnicoUFHW/Asfrqyo6F3UwGg3ZZhcDf/GdXq//uhkf1fGRh6c8Po6Dl33DlArn0q3/uLGvHT2P9I
                                    nttFXhzINAHRbG9Z7i13ecuNMxxn0d2tLYtvbWmZc3WLM7uFK1Uc5sJyFNY/7/5XiQi1W18lKkwF
                                    iSM9RpObhFEAAABsdvZad79j1rcaGV9MPhTgcAJAlcItc/+L5dL5EsOuMAQQLET4W0erPWuHR049
                                    Mzzac2bc0g+s/VNsLLiPSH87GyvhO1Km9pAF0Jh/l7fc5C0rvGWpt8yZ7LD2O1oqs2/0lnmVSsdU
                                    5rTOr8UHhDZOgfxVngRTAVD3vRPe8JmBEAh7GAEAAGwTgel4v6Mp3xs2HOs0SADUje0LAmB/1e07
                                    71ZHDlXd/tdGqj2/GBnpGXAnjNsP1Uh/r7ds8Zat3nKAjUX5l04MZs0L0FXzBNzgLYu8Zaa3dLBo
                                    0xQHczS01pY2b2lfsWJF14wZM9qdkkTWOYggBEoO18WAWd7Q19c3tHHjxn1sLDZsqGaNj7Dxudai
                                    YqRm6VOxHire82bN0j9QFGtfJNK8gW7AidoNOlS7OV215fKaMJhWEwJttXOs4FHRd3wQAACIHygR
                                    qjUuGaoRfl+N4A/XyP5AjV96ausUDq05Pna6IcdqN2dvzfIn4l9QW+j99BBvQIW3+GuiYdqyZcsW
                                    LFy4UGr5B5+BMAEAgIhpHk6ePDniWf5E0L01Au/nPABhln9g5Z+vGZLHOD45WxMDQ0W+fq0FOIeh
                                    2g3rqam1jhqJt9dIvU1j+Vc40u9kY3UF5j/22GPLr7nmmk6R3HVioIiAuMnX9YEFG359ePEO0s/3
                                    uR04cKD/Rz/6EeXaU+T9KY60Bw3Iv1rjjqHa+n01MTBSluehtWDnM1JTgb0Rzr+9Rvxzar8bWr58
                                    +dD111/PKpWKUWdfdJKECGjsdQ06OP46g8hBkDg3/blNnz6diPtgzeg7wlntg2UicZB/BhpoUUmy
                                    6OeXlY4NhA9ixPkBIH+QJM4PAECKIH0A5A+SzM75QQAAIEScJwDyBwQUnRzhBQBAiDhHIL9A/jse
                                    1MTnGZwrOiegGW0P7Q4AYPnDOm7yuWJIAICwxrkCIH9AeIDLJATKcr4ASBDnDOQNcPvjgW74+cI1
                                    C+CZwTkDsPzRmZXUNY4gQQDEh3MHQP4QACUlQQwLACA9nD8A8i/9A19mAsQ1QPvHdcB1AED+8AKg
                                    A4QQANEBAADyhwCANwAA6eN6AADIH6RX6g4S1wfkhusCACB/iABcHwDEhusDACB/kFwZO1NcJxAZ
                                    rhcAgPwL1XGA2OJ3sLh2IC5cOwAA+UMAoAPGtQRZ4VoCIH8AAgAd85ggKONkTAAAgPyBnHTYEAGN
                                    JUOx7kDevAeBUATBQ1ABAMgfIgCw2KGHdfT8veHvl0lBI9k6UYkFRATSx7UEQP4QAUAGOrKw9+gM
                                    QVS4ngDIH4j10EAIoCMDcG9xTQEdKrgEeIgAADB/tvB8AbD8AXgCAACCGsC1BfkDAACAmABcX5A/
                                    AC8AAICYAFzfDAFj/njgAADA89EUwBiB5Q8AAAABAACw/IFGdm581DI6OwDAc9CMa41rDssfQIcH
                                    AKm2+7iVEwH0N7D8gcJ5AwCgLKSDNg+A/AFA0yGigwSKRPxoz7D6Abj9Sw+TaFtE5AJFauMmkykB
                                    jb8PuN4gfyAjahwkD8AiBXDNQf5AyRosHkgAAIByAGP+EngWcBVXAQAAIPOo1hbG/QVA/sbXoMI1
                                    nhG4vwEAAHJD/rK+HAhBGdz+FYPvqvwCyx8AACDbaGlp8Y01wfrnRQD68QKRf8Xy70SlSI1lqFKp
                                    oNEAAABkGDUjbagmAMQ+PakAKDwHNJv8Kw3+bSXkfSub6PYfamtrY54AwNMFAACQUUyaNIlx5F+V
                                    kD8T+vYoZB+VAHInFhpJ/pUG/q5i+F3F4PtWTiFSQxp0XXfQQ7/3t0JLkouQ9PeNAKL6AaCw1nAW
                                    rXPr26TzrFarg9RfC+Qv47WqgQgw9RJUY/JW5sRBUvJvFMFXYnxXMSR8plCIwfjR4Ouvv752/vz5
                                    R4aGhtqGh4dbvUbWOjo62lqrfqc9dm/dignReo23wv1GKRgk1ckqpkJDUdK0YiACKgmFQ9MFTyNE
                                    F+rBp0Nc/HXOOhHFQNX0Opj+VlLEqBpnHdl3Yb/jPaTefQvdb5Qh1WBftA16Tb/1lhHP4h9pb28f
                                    OnPmzKH/n717YXETiMIwrLOhlNL//0vLEkp6bBcUrGicc5mLyftASNYkOptVvzOTSfbf3Z9zp01W
                                    mSar6+356NknA84KAHGEfOqtMNAcYbWDXrP8WW8/nRQJ3+Yd5ev6x3z5OV++bn+f779tiqXcEYZk
                                    aOty/XFyfzrZnvZ27msYUaxp96lUcB/tqnBp0N6rDVlKhedK4HrFsQ3JeM5eoInyMfLkcX8U68/d
                                    du7vtixfv79/n0P/13z5nC/LKMDjJORz7ov4+3r21eLH5K3QySUyDLThpA1/2excy/JlJ1sHfzK0
                                    QXNbu+zsWrvNvYIjokCwFA8l3zZqGfzvMJlEOl5/9MlYHNvTBPuwE8aaMM9dJsrCQVN4aB6399gl
                                    1O/zufq+uv0IOMb2evZysE452N7Z3AExnifCj6lbxZNn6dDXPlY2v/9jp8q8D//PC7COOuSMDHiC
                                    Pym2nxTt04Z2CtwnIkcNSo849OQj4zF/XriYKNXTksDnivH5llDNCfOz62fLLD1s68+y6tk/VqH/
                                    e8gbbpeD0JaDn4+WWZav77fso+EfXbxlVj9X7X0k5UG1/szoOvRvypCzDLGnJ8Fr6f17b2vDXDMa
                                    4w3cpDxgar1l8I69/JajAaI4D0QM93vfCvAMew8ZwW/psWt68TlFQm47NCMd21EJ2SkExPAattLF
                                    dxCMGY0sccKzvp9vHRXI7Z2ng59ToXZqigHLKIFlNMAbwsnxt47en2qsj/CvG/4SuC0Jbndu8Ihy
                                    O6JYp7ZQsMwB0GzH8xocre+xUwxoih3v3yVyFKhV4Txop9SWKAaiJ/xpQlUTuNoefem2WgJd2zu3
                                    BmXEcH0quE+2KHhr9yyqnkgqFwXSqA1SYB3WsIgcStf2vr1t0QR9zohFTrHiKQA8IwrdTvgbC55k
                                    SvW8IkcNvLPePeuKHjGI7Hl7JuClwH0mVdgfe+7V91JUyIttx7KtmiMOUQWBpeDIDWFr79jSK/eO
                                    fESE/KWDvkT4lzhxtSwOLAFu+aRBRIFg/X0tczpK9MJbzcq/Ui/9KuSF2lPjBF5yAuPRHIfSH2Hz
                                    zOL39tBrfGSv5b51ufBvXSDUKhJyllm+mMhSUES9xt7ntJxk13PYvtMcAHmjbdfs8UWPWFh63ZYA
                                    thYjEUVM6WC/5P8BuNL/ru3ho10peJllNCF6/aWCKV1wPyHcKQyusu3I4XdP+IqzfZp1al9HufC+
                                    Qvh3ckKuXTxEjVpErLtED77VZD6gdAiU7plHfJOgBLTDGtw1w/vlA5zwv05vblS+/mNgkfFs3aPz
                                    /u3y0dimml++Y5n/QDHSby+5Zi/PGnDT5nrvPutzpoB2y0kbhsz7p4b7AQj/tyssPMVE5Pc9jIp9
                                    K/cx01Bv5j9f9tM2xEutT/u8SRlimoCcgto9BbSFgCb8QbHRxb41HoT/2Pg1GBseXy2O06mD9Wif
                                    K5Veg6nh60kYg/AHBQrHV/de8X8fE64AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                    AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
                                    AAAAAKCKvwIMAG5yW3jeaYmfAAAAAElFTkSuQmCC" transform="matrix(5.473900e-002 0 0 5.473900e-002 0 0)">
                                        </image>
                                    </g>
                                    </svg>
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
                    <span class="glyphicon glyphicon-open-file report-upload" aria-hidden="true"></span>
                    <span class="close">X</span>
                </div>
            </div>
        </div>
    </div>

</div>

@stop()
