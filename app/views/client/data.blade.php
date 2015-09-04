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
                	Select Dates
                </div>
                <div class="list">
                	
                </div>
            </div>
        </div>
	</div>
</div>
@stop()
