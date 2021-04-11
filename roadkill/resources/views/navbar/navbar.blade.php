<nav class="navbar navbar-expand-lg navbar-light bg-light">


        <a class="navbar-brand" href="#">Navbar</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Add a Post</a>
                </li>

                @auth

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    My Profile
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">My Posts</a>
                        <a class="dropdown-item" href="#">Edit My Profile</a>
                    </div>
                </li>

                @endauth

                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
        </div>

        <div>
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
    </div>
</nav>
