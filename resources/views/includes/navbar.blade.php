<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('todos.index') }}">Todos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('todos.index') ? 'active' : ' d' }}" aria-current="page"
                        href="{{ route('todos.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : ' d' }}"
                        href="{{ route('categories.index') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('categories.create') ? 'active' : ' d' }}"
                        href="{{ route('categories.create') }}">Create Todo</a>
                </li>
            </ul>
            <form class="d-flex" role="search" method="GET" action="{{ route('todos.index') }}">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search"
                    value="{{ request('search') }}" />
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
