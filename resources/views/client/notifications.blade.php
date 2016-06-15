@extends('index')

@section('title')
    Tank Alerts - fuelgauging.com
@stop()

@section('client-notifications')
<div class="client-notifications">
    @include('client.client_components.sidebar')
    @include('client.client_components.sidebar_tanks')
    <div class="content">
        <div class="header">
            <div class="header-left">
                <h2>Notification - {{$tank_specs->marking_id}} {{$tank_specs->fuel_grade}}</h2>
            </div>
            <div class="header-right">
                Location - {{$tank_location->location_name}}
            </div>
        </div>

        <div class="content-blocks">
            <div class="top">

                <div class="header">
                    <div class="left">
                        <div class="icon">
                            @include('client.svgs.notifications.email_reporting_icon')
                        </div>
                        <div class="title">
                            Email reporting
                        </div>
                    </div>

                    <div class="right">
                        @include('client.svgs.notifications.add_email_button_green_top')
                    </div>
                </div>

                <div class="list reporting">

                    <div class="header">
                        View by : <a href="#">Daily</a> | <a href="#">Weekly</a> | <a href="#">Monthly</a>
                    </div>

                    <div class="data">
                        <ul>
                            @foreach($email_reportings as $report)
                                @if($report->report_type === "reporting")
                                <li data-freq="{{$report->frequency}}">
                                    <div class="email">
                                        {{$report->email}}
                                    </div>

                                    <div class="status">
                                        @if($report->active)
                                            Active
                                        @else
                                            Disabled
                                        @endif
                                    </div>

                                    <div class="actions">
                                        <div class="edit edit-notifications" data-name="reporting"  data-id="{{$report->id}}">
                                            @include('client.svgs.notifications.edit_notification_email')
                                        </div>

                                        <div class="remove remove-notifications" data-name="reporting" data-id="{{$report->id}}">
                                            @include('client.svgs.notifications.remove_notification_email')
                                        </div>
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="middle">
                <div class="header">
                    <div class="left">
                        <div class="icon">
                            @include('client.svgs.notifications.level_alerts_icon')
                        </div>

                        <div class="title">
                            Level alerts
                        </div>
                    </div>

                    <div class="right">
                        @include('client.svgs.notifications.add_email_button_green_middle')
                    </div>
                </div>
                <div class="list levels">
                    <div class="header">
                        View by:     <a href="#">5% till empty</a>  |  <a href="#">Re-order</a>  |  <a href="#"> 5% till Max SFL</a>
                    </div>

                    <div class="data">

                        <ul>
                            @foreach($email_reportings as $report)
                                @if($report->report_type === "levels")
                                <li data-freq="{{$report->frequency}}">
                                    <div class="email">
                                        {{$report->email}}
                                    </div>

                                    <div class="status">
                                        @if($report->active)
                                            Active
                                        @else
                                            Disabled
                                        @endif
                                    </div>

                                    <div class="actions">
                                        <div class="edit edit-notifications" data-name="levels" data-id="{{$report->id}}">
                                            @include('client.svgs.notifications.edit_notification_email')
                                        </div>

                                        <div class="remove remove-notifications" data-name="levels" data-id="{{$report->id}}">
                                            @include('client.svgs.notifications.remove_notification_email')
                                        </div>
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>


            <div class="bottom">
                <div class="header">
                    <div class="left">
                        <div class="icon">
                            @include('client.svgs.notifications.inspec_alert_icon')
                        </div>

                        <div class="title">
                            Tank Inspection due alert
                        </div>
                    </div>

                    <div class="right">
                        @include('client.svgs.notifications.add_email_button_blue_bottom')
                    </div>
                </div>
                <div class="list inspection">
                    <div class="header">
                        <p class="big">
                            Next recorded inspection due:  {{$tank->date_inspected}}
                        </p>
                        <p class="small">
                            Note: please Inform your tank cleaning contractor 3 to 4 weeks before due date.
                        </p>
                    </div>

                    <div class="data inspection">

                        <ul>
                            @foreach($email_reportings as $report)
                                @if($report->report_type === "inspection")
                                <li data-freq="{{$report->frequency}}">
                                    <div class="email">
                                        {{$report->email}}
                                    </div>

                                    <div class="status">
                                        @if($report->active)
                                            Active
                                        @else
                                            Disabled
                                        @endif
                                    </div>

                                    <div class="actions">
                                        <div class="edit edit-notifications" data-name="inspection" data-id="{{$report->id}}">
                                            @include('client.svgs.notifications.edit_notification_email')
                                        </div>

                                        <div class="remove remove-notifications" data-name="inspection" data-id="{{$report->id}}">
                                            @include('client.svgs.notifications.remove_notification_email')
                                        </div>
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop()
