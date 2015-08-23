@extends('index')

@section('title')
	Login - FuelGauging.com
@stop()

@section('login-form')
<div class="auth">
	<div class="login">
		<div class="form">

			<div class="left">
				<div class="form">

					<form class="fields" method="post" action="/login">
						<div class="formfields">
							<input class="credentials" type="email" name="email" placeholder="Email" required>
						</div>
						<div class="formfields">
							<input  class="credentials" type="password"	name="password" placeholder="Password" required>
						</div>
						<div class="message">
							<p>For remote access and summary overview of your tank fuel levels</p>
						</div>
						<div class="button">
							<button type="submit" class="submit">
								<svg version="1.1" id="submit" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 113.7 34.2" enable-background="new 0 0 113.7 34.2" xml:space="preserve">
								<g>
									<rect x="0" y="2.6" fill="#839D3C" stroke-miterlimit="10" width="113.7" height="31.5"/>
									<g>
										<rect x="41.7" y="12.9" fill="none" width="86.5" height="34.5"/>
										<text transform="matrix(1 0 0 1 41.7245 23.4292)" fill="#FFFFFF" font-size="15.8237">Connect</text>
									</g>
									<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M7.9,18.7c0,0,0.1-0.1,0.1-0.1c1.5-2.4,3.4-4.4,5.6-6.1
										c1.3-0.9,2.7-1.7,4.3-2.1c2.3-0.6,4.5-0.4,6.6,0.5c1.5,0.7,2.9,1.6,4.1,2.7c1.7,1.5,3.1,3.2,4.3,5.1c0.1,0.1,0.1,0.2,0,0.3
										c-1.6,2.5-3.5,4.6-5.8,6.3c-1.3,0.9-2.7,1.6-4.2,2c-2.3,0.6-4.5,0.4-6.6-0.5c-1.5-0.6-2.9-1.6-4.1-2.6c-1.7-1.5-3.1-3.1-4.3-5
										c0,0,0-0.1-0.1-0.1C7.9,18.9,7.9,18.8,7.9,18.7z M20.4,25.1c3.3,0,6.1-2.7,6.2-6.1c0-3.4-2.7-6.3-6.2-6.3c-3.4,0-6.1,2.8-6.2,6.1
										C14.2,22.1,16.9,25,20.4,25.1z"/>
									<path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M20.4,16.1c1.5,0,2.8,1.3,2.8,2.8c0,1.5-1.3,2.7-2.8,2.7
										c-1.5,0-2.8-1.2-2.8-2.8C17.7,17.4,18.9,16.1,20.4,16.1z"/>
								</g>
								</svg>
							</button>
							@if($errors->count())
							<div class="errors">
								<ul>
									@foreach($errors->all() as $error)
										<li>{{$error}}</li>
									@endforeach
								</ul>
							</div>
							@endif
						</div>
					</form>

				</div>
			</div>

			<div class="right">
				<p class="big">
					Sign in 
				</p>
				<p class="big">
					to fuel<b>gauging</b><sup>TM</sup>
				</p>
				<p class="small">
					Solution designed and build to deliver
				</p>
			</div>
		</div>
	</div>
	<div class="copyright">
		<p>© Copyright Air Fuel Systems 2006 - 2015</p>
	</div>
</div>
@stop