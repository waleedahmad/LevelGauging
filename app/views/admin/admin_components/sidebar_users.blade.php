<div class="sidebar-user">
    <input type="search" name="search" class="user-search" placeholder="Search user">
    <span class="glyphicon toggel-user-search glyphicon-option-horizontal" aria-hidden="true"></span>
    <div class="search-options">
        <p>Filter:</p> <span class="all active">All</span> <span class="enabled">Enabled</span> <span class="disabled">Disabled</span>
    </div>
    <ul>
    <?php
        $users  =   User::where('type','=','user')->get();

        if($users->count()){
            foreach($users as $user){
               
                if(isset($user_email) && $user_email === $user->email){
                    echo "<a href='/users/".$user_email."/authorize'><li class='active'> <span class='glyphicon glyphicon-user' aria-hidden='true'></span><span class='email'>".substr($user->email,0,15)." </span><i class='my-icon'><i></i></i></li></a>";
                }else{
                    echo "<a href='/users/".$user->email."/authorize'><li> <span class='glyphicon glyphicon-user' aria-hidden='true'></span><span class='email'>".substr($user->email,0,15)." </span></li></a>";
                }
            }


        }else{
            echo "No Tanks";
        }
    ?>
    </ul>
</div>
