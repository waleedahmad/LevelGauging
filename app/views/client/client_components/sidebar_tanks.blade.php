<div class="sidebar-tanks">
    <ul>
    <?php
        $email  =   Session::get('auth')['email'];
        $tanks  =   Tank::where('owner','=',$email)
                        ->lists('id');
        $count  =   1;
        if($tank->count()){
            foreach($tanks as $id){
                $tank_specs     =   TankSpecs::where('tank_id','=',$tank->id)->get()->first();
                if($id == $tank->id){
                    echo "<a href='/tank/".$id."/dashboard'><li class='active'> <span class='glyphicon glyphicon-align-justify' aria-hidden='true'></span>".$tank_specs->marking_id." <i class='my-icon'><i></i></i></li></a>";
                }else{
                    echo "<a href='/tank/".$id."/dashboard'><li> <span class='glyphicon glyphicon-align-justify' aria-hidden='true'></span>".$tank_specs->marking_id."</li></a>";
                }
                $count++;
            }
        }else{
            echo "No Tanks";
        }
    ?>
    </ul>
</div>
