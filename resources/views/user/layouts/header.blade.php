<style>/* Dropdown base */
.dropdown-menu {
    position: absolute;
    background: rgba(1, 0, 37, 0.397); /* transparent dark */
    padding: 10px 0;
    border-radius: 6px;
    min-width: 180px;
    display: none;
    backdrop-filter: blur(6px); /* adds glass effect */
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    z-index: 100;
}

/* Show dropdown on hover */
.nav-item.dropdown:hover .dropdown-menu {
    display: block;
}

/* Max height = 10 items, enable scroll */
.category-scroll {
    max-height: 350px;
    overflow-y: auto;
}

/* Scrollbar style */
.category-scroll::-webkit-scrollbar {
    width: 6px;
}
.category-scroll::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.63); /* light transparent scrollbar */
    border-radius: 4px;
}

/* Dropdown item */
.dropdown-item {
    padding: 8px 15px;
    color: #fff; /* white text on dark background */
    display: block;
    letter-spacing: 0.2px; 
      font-size: 12px;
    text-decoration: none;
    transition: background 0.2s;
}

.dropdown-item:hover {
    background: rgba(255, 255, 255, 0.315); /* light transparent hover */
}

</style>

<header class="header">
    <div class="container">
        <div class="header-content">
            <div class="logo">
                <a href="/" class="logo-text">EventHub</a>
            </div>
            @php
            $categories = \App\Models\Category::all();
            @endphp
            <nav class="nav-menu">
                <ul class="nav-list">
                    <li class="nav-item"><a href="/" class="nav-link">Home</a></li>

                    <li class="nav-item dropdown">
                        <a href="#category" class="nav-link dropdown-toggle">Events</a>
                        <ul class="dropdown-menu category-scroll">
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('event.list', $category->slug) }}" class="dropdown-item">
                                    {{ $category->title }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="{{ route(name: 'contact') }}" class="nav-link">Contact</a></li>
                </ul>
            </nav>

        </div>
    </div>
</header>