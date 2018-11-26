<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="{{ route('index') }}">Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('partners.index') }}">Partners</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('properties.index') }}">Properties</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="{{ route('partners.create') }}">Add new partner</a>
                    <a class="dropdown-item" href="{{ route('properties.create') }}">Add new property</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
