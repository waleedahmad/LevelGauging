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
				<h2>Data - {{$tank_specs->marking_id}} {{$tank_specs->fuel_grade}}</h2>
			</div>
			<div class="header-right">
				Location - {{$tank_location->location_name}}
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
                        <div class="left update-levels">
                            @include('client.svgs.data.upload_button')
                        </div>

                        <div class="right">
                            @include('client.svgs.data.download_button')
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
