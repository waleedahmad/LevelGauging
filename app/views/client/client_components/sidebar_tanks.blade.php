<div class="sidebar-tanks">
    <ul class="tanks-list">
    <?php
        $email  =   User::where('id','=',$user_id)->get()->first()->email;
        $tanks  =   Tank::where('owner','=',$email)
                        ->orderBy('id','DESC')
                        ->lists('id');
    ?>
    @if($tank->count())
        @foreach($tanks as $id)
            <?php
                $tank_specs     =   TankSpecs::where('tank_id','=',$id)->get()->first();
            ?>
            @if($id == $tank->id)
                <a href='/user/{{$user_id}}/tank/{{$id}}/dashboard'>
                    <li class='tank active'>
                         <span class='glyphicon glyphicon-align-justify' aria-hidden='true'></span>
                         {{$tank_specs->marking_id}}
                         <i class='active-bar'><i></i></i>
                     </li>
                </a>
            @else
                <a href='/user/{{$user_id}}/tank/{{$id}}/dashboard'>
                    <li class="tank">
                        <span class='glyphicon glyphicon-align-justify' aria-hidden='true'>
                        </span>
                        {{$tank_specs->marking_id}}
                    </li>
                </a>
            @endif
        @endforeach
    @endif
    </ul>
</div>
