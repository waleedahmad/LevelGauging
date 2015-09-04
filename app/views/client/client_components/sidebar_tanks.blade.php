<div class="sidebar-tanks">
    <ul>
    <?php
        $email  =   Session::get('auth')['email'];
        $tanks  =   Tank::where('owner','=',$email)
						->orderBy('marking_id','ASC')
                        ->lists('id');
        $count  =   1;
        if($tank->count()){
            foreach($tanks as $id){
                if($id == $tank->id){
                    echo "<a href='/tank/".$id."/dashboard'><li class='active'> <span class='glyphicon glyphicon-align-justify' aria-hidden='true'></span> Tank ".$count." <i class='my-icon'><i></i></i></li></a>";
                }else{
                    echo "<a href='/tank/".$id."/dashboard'><li> <span class='glyphicon glyphicon-align-justify' aria-hidden='true'></span> Tank ".$count."</li></a>";
                }
                $count++;
            }
        }else{
            echo "No Tanks";
        }
    ?>
    </ul>
</div>
