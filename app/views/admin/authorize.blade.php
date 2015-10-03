@extends('index')

@section('title')
    Authorize - fuelgauging.com
@stop()

@section('admin-authorize')
<div class="admin-authorize">
    @include('admin.admin_components.sidebar')
    @include('admin.admin_components.sidebar_users')
    <div class="content">
        <div class="header">
			<div class="header-left">
				<h2>Authorisation</h2>
			</div>
			<div class="header-right">
				@if(isset($user_email))
					<span class='glyphicon glyphicon-user' aria-hidden='true'></span>  {{$user_email}}
				@endif
			</div>
		</div>

		<div class="content-blocks">
           <div class="authblock">
           		<div class="header">
           			<div class="icon">
           				@include('admin.svgs.authorize_page_header_icon')
           			</div>
           			<div class="title">
	           			Sign in access control
	           		</div>
           		</div>

           		<div class="body">
           			<div class="table">
           			@if(isset($user_email))
           				<table>
	           				<thead>
	           					<tr>
	           						
		           					<th class="notes">eNotes</th>
		           					<th>Access</th>
		           					<th class="actions">Actions</th>
		           				</tr>
	           				</thead>

	           				<?php 
	           					$user 	=	User::where('email','=',$user_email)->get()->first();
	           				 ?>
	           				<tbody>
	           					<tr>
	           						
		           					<td class="notes">@if(strlen($user->enote) > 60) {{substr($user->enote,0,60)}}... @else {{$user->enote}}@endif</td>
		           					<td>
		           						@if($user->approved)
		           							Enabled
		           						@else
		           							Disabled
		           						@endif
		           					</td>
		           					

		           					<td class="actions">
		           						<div class="left admin-edit-user" data-email="{{$user_email}}">
											@include('admin.svgs.edit_contacts')
		           						</div>

		           						<div class="right admin-remove-user" data-email="{{$user_email}}">
		           							@include('admin.svgs.delete_contact')
		           						</div>
		           					</td>
		           				</tr>
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
