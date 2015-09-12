<div class="sidebar-tanks">
    <ul>
    <?php
        $email  =   User::where('id','=',$user_id)->get()->first()->email;
        $tanks  =   Tank::where('owner','=',$email)
                        ->orderBy('id','DESC')
                        ->lists('id');
        if($tank->count()){
            foreach($tanks as $id){
                $tank_specs     =   TankSpecs::where('tank_id','=',$id)->get()->first();
                if($id == $tank->id){
                    echo "<a href='/user/".$user_id."/tank/".$id."/dashboard'><li class='active'> <span class='glyphicon glyphicon-align-justify' aria-hidden='true'></span>".$tank_specs->marking_id." <i class='my-icon'><i></i></i></li></a>";
                }else{
                    echo "<a href='/user/".$user_id."/tank/".$id."/dashboard'><li> <span class='glyphicon glyphicon-align-justify' aria-hidden='true'></span>".$tank_specs->marking_id."</li></a>";
                }
            }
        }else{
            echo "No Tanks";
        }
    ?>
    </ul>
</div>
