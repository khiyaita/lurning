<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('users.index') }}">Home </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('postes.index') }}">Postes </a>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.create') }}">Sing Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Log In</a>
                </li>
            @endguest
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('postes.create') }}">Add Poste</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Log Out</a>
                </li>
            @endauth
        </ul>
    </div>
</nav><br />
