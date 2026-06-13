<header class="navbar navbar-dark bg-dark sticky-top px-3">
    <a class="navbar-brand" href="#">
        My Application
    </a>

    <div class="d-flex align-items-center">
        <span class="text-white me-3">
            {{ auth()->user()->name ?? 'Guest' }}
        </span>

        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-light">
                    Logout
                </button>
            </form>
        @endauth
    </div>
</header>