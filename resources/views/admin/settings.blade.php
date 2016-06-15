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

	           		@if(isset($user_email))
						<div class="add-tank" data-email="{{$user_email}}">
							@include('admin.svgs.add_tank')
	           			</div>
					@endif
           		</div>

           		<div class="body">
           			<div class="table">
           			@if(isset($user_email))
           				@if(count($tanks))
           				<table>
	           				<thead>
	           					<tr>
		           					<th>Marking ID</th>

		           					<th>Fuel grade</th>
		           					<th>Shape</th>
		           					<th class="actions">Actions</th>
		           				</tr>
	           				</thead>
	           				<tbody>
	           					@foreach($tanks as $tank)
			           			<?php
			           				$tank_specs 	=	App\Models\TankSpecs::where('tank_id','=',$tank->id)->get()->first();
			           				$user_id 		=	App\Models\User::where('email','=',$tank->owner)->first()->id;
			           			?>

			           			<tr>
		           					<td>{{$tank_specs->marking_id}}</td>
		           					<td>{{$tank_specs->fuel_grade}}</td>
		           					<td>{{$tank_specs->shape}}</td>
		           					<td class="actions">
		           						<div class="left" data-email="{{$user_email}}">
											<a target="_blank" href="/user/{{$user_id}}/tank/{{$tank->id}}/dashboard">
												Edit
											</a>
		           						</div>

		           						<div class="right" data-email="{{$user_email}}">
		           							<span>Remove</span>
		           						</div>
		           					</td>
		           				</tr>
			           			@endforeach
	           				</tbody>
	           			</table>
	           			@else
	           				<div class="no-tanks">
	           					<div class="message">
	           						User <span class="user">{{$user_email}}</span> has no tanks assoiated with their account.
	           					</div>
	           					<div class="add-tank" data-email="{{$user_email}}">
									@include('admin.svgs.add_tank')
			           			</div>
	           				</div>
	           			@endif
	           		@endif
           			</div>
           		</div>
            </div>
        </div>
    </div>
</div>
@stop()
