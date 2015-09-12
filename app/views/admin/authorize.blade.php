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
				<h2>Authorization</h2>
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
		           					<th>Access</th>
		           					<th>User ID</th>
		           					<th>Password</th>
		           					<th class="notes">eNotes</th>
		           					<th></th>
		           				</tr>
	           				</thead>
	           				<tbody>
	           					<tr>
		           					<td>Access</td>
		           					<td>User ID</td>
		           					<td>Password</td>
		           					<td class="notes">Payment pending for this week!</td>

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
