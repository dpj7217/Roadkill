<nav class="navbar navbar-expand-lg roadkill-navbar">


    <a class="navbar-brand" href="#">Roadkill</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse roadkill-navbar-inner" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('showCreatePost') }}">Add a Post</a>
            </li>

            @auth

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                My Profile
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('showUserDetails', auth()->user()->id) }}">My Posts</a>
                    <a class="dropdown-item" href="{{ route('showUserDetails', auth()->user()->id) }}">My Profile</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </div>
            </li>

            @else
            <li class=nav-item>
                <a class="nav-link" href={{route('login')}}>Sign In</a>
            </li>
            @endauth
        </ul>

        @if(Request::path() != 'search' && Request::path() != '/')
        <form method="post" action="{{ route('search') }}">
            @csrf
            <div class="searchbar">
                <a href="{{ route('search') }}" id="searchImg">
                    <svg >
                        <path d="M18 16.5l-5.14-5.18h-.35a7 7 0 10-1.19 1.19v.35L16.5 18l1.5-1.5zM12 7A5 5 0 112 7a5 5 0 0110 0z"></path>
                    </svg>
                </a>
                <input type="text" name="search" id="cornerSearch" placeholder="Search">
            </div>
        </form>
        @endif
    </div>
</nav>
