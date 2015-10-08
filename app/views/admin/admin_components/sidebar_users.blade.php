<div class="sidebar-user">
    <input
        type="search"
        name="search"
        class="user-search"
        placeholder="Search user">

    <span
        class="glyphicon toggel-user-search glyphicon-option-horizontal"
        aria-hidden="true">
    </span>

    <div class="search-options">
        <p>Filter:</p>
        <span class="active" data-action="all">All</span>
        <span data-action="enabled">Enabled</span>
        <span data-action="disabled">Disabled</span>
    </div>

    <div class="search-results">
        <div class="s-header">
            <span class='glyphicon glyphicon-user' aria-hidden='true'></span>
            <p>Search Results</p>
        </div>
    </div>

    <ul class="users-list">
    <?php
        $users      =   User::where('type','=','user')->paginate(17);;
        $active     =   basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    ?>
    @if($users->count())
        @foreach($users as $user)
            @if(isset($user_email) && $user_email === $user->email)
                <a href='/users/{{$user_email}}/{{$active}}' class='single-user' data-status='{{$user->approved}}'>
                    <li class='active'>
                        <span class='glyphicon glyphicon-user' aria-hidden='true'></span>
                        <span class='email'>{{substr($user->email,0,15)}}</span>
                        <i class='active-bar'><i></i></i>
                    </li>
                </a>
            @else
                <a href='/users/{{$user->email}}/{{$active}}' class='single-user' data-status='{{$user->approved}}'>
                    <li>
                        <span class='glyphicon glyphicon-user' aria-hidden='true'></span>
                        <span class='email'>{{substr($user->email,0,15)}}</span>
                    </li>
                </a>
            @endif
        @endforeach
    @endif
    </ul>
    {{$users->links()}}
</div>
