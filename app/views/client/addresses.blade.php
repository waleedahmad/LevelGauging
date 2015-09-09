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
				<h2>Contacts - {{$tank->marking_id}} {{$tank->fuel_grade}}</h2>
			</div>
			<div class="header-right">
				Location - {{$tank->location_name}}
			</div>
		</div>

		<div class="content-blocks">
            <div class="address-list">
                <div class="header">
                    <div class="left">
                        @include('client.svgs.contacts.add_contact_button')
                    </div>

                    <div class="right">
                        <div class="remove">
                            <div id="remove-contact" data-id="">
                                @include('client.svgs.contacts.edit_contact_button')
                            </div>
                        </div>

                        <div class="edit">
                            <div id="edit-contact" data-id="">
                                @include('client.svgs.contacts.remove_contact_button')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="data">
                    <div class="address">
                        <div class="title">
                            {{$d_address->title}}
                        </div>

                        <div class="details">
                            <p>Name : {{$d_address->name}}</p>
                            <p>Job title : {{$d_address->job_title}}</p></p>
                            <p>Company : {{$d_address->company}}</p>
                            <p>Telephone 1 : {{$d_address->telephone_2}}</p>
                            <p>Telephone 2 : {{$d_address->telephone_1}}</p>
                            <p>Email : <span class='email'>{{$d_address->email}}</span></p>
                            @if(Session::get('auth')['type'] === "admin")
                                <input type="checkbox"  class="contact-checkbox" data-id="{{$d_address->id}}" name="name" value="">
                            @endif  
                        </div>
                    </div>
                    @foreach($addresses as $address)
                        <div class="address">
                            <div class="title">
                                {{$address->title}}
                            </div>

                            <div class="details">
                                <p>Name : {{$address->name}}</p>
                                <p>Job title : {{$address->job_title}}</p></p>
                                <p>Company : {{$address->company}}</p>
                                <p>Telephone 1 : {{$address->telephone_2}}</p>
                                <p>Telephone 2 : {{$address->telephone_1}}</p>
                                <p>Email : <span class='email'>{{$address->email}}</span></p>
                                <input  class="contact-checkbox" type="checkbox"  data-id="{{$address->id}}" name="name" value="">
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@stop()
