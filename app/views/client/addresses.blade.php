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
                
            </div>
        </div>
    </div>
</div>
@stop()
