@if(Session::has('global'))
<div class="global">
	{{Session::get('global')}}
	<span class="glyphicon glyphicon-remove close"></span>
</div>
@endif