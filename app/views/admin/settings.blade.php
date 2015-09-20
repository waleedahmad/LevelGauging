@extends('index')

@section('title')
    User Settings - fuelgauging.com
@stop()

@section('admin-authorize')
<div class="admin-settings">
    @include('admin.admin_components.sidebar')
    @include('admin.admin_components.sidebar_users')

    <div class="content">
        <div class="header">
			<div class="header-left">
				<h2>Settings</h2>
			</div>
			<div class="header-right">
				@if(isset($user_email))
					<span class='glyphicon glyphicon-user' aria-hidden='true'></span>  {{$user_email}}
				@endif
			</div>
		</div>

		<div class="content-blocks">
            <div class="settings-block">
            	<div class="header">
           			<div class="icon">
           				@include('admin.svgs.settings_page_header_icon')
           			</div>
           			<div class="title">
	           			Tank Settings
	           		</div>
           		</div>

           		<div class="body">
           			<div class="table">
           			@if(isset($user_email))
           				<table>
	           				<thead>
	           					<tr>
		           					<th>Marking ID</th>
		           					
		           					<th>Fuel grade</th>
		           					<th>Shape</th>
		           					<th></th>
		           				</tr>
	           				</thead>
	           				<tbody>
	           					@foreach($tanks as $tank)
			           			<?php 
			           				$tank_specs 	=	TankSpecs::where('tank_id','=',$tank->id)->get()->first();
			           				$tank_loc 		=	TankLocation::where('tank_id','=',$tank->id)->get()->first();
			           				$tank_man 		=	TankManufacturer::where('tank_id','=',$tank->id)->get()->first();
			           				$tank_levels 	=	TankLevels::where('tank_id','=',$tank->id)->get()->first();
			           				$tank_inspect 	=	TankInspection::where('tank_id','=',$tank->id)->get()->first();
			           				$user_id 		=	User::where('email','=',$tank->owner)->first()->id;
			           			?>

			           			<tr>
		           					<td>{{$tank_specs->marking_id}}</td>
		           					
		           					<td>{{$tank_specs->fuel_grade}}</td>
		           					<td>{{$tank_specs->shape}}</td>
		           					<td class="actions">
		           						<div class="left" data-email="{{$user_email}}">
											<a target="_blank" href="/user/{{$user_id}}/tank/{{$tank->id}}/dashboard">
												@include('admin.svgs.edit_contacts')
											</a>
		           						</div>

		           						<div class="right" data-email="{{$user_email}}">
		           							@include('admin.svgs.delete_contact')
		           						</div>
		           					</td>
		           				</tr>
			           			@endforeach
	           				</tbody>
	           			</table>
	           		@endif
           			</div>
           		</div>
            </div>
        </div>
    </div>
</div>
@stop()
