@if(Session::has('global'))
<div class="global">
	{{Session::get('global')}}
	<span class="close">X</span>
</div>
@endif
