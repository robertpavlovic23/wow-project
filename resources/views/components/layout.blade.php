<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
    @livewireStyles
    @livewireScripts
    <title>Document</title>
</head>

<body>
    <div class="fixed navbar bg-base-100 z-50">
        {{-- NavBar start --}}
        <div class="navbar-start">
            {{-- <div class="dropdown">
                <label tabindex="0" class="btn btn-square btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-5 h-5 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>
                </label>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <!-- Sidebar content here -->
                    @auth
                        <li><a href="/profile">Profile</a></li>
                        <li><a href="/dashboard">Dashboard</a></li>
                        <form action="/logout" method="POST">
                            @csrf
                            <li>
                                <button type="submit">Logout</button>
                            </li>
                        </form>
                    @else
                        <li><a href="/login" class="text-[16px]">Login</a></li>
                        <li><a href="/register" class="text-[16px]">Register</a></li>
                    @endauth
                </ul>
            </div> --}}

            <div class="drawer">
                <input id="my-drawer" type="checkbox" class="drawer-toggle" />

                <div class="drawer-content">
                    <!-- Page content here -->
                    <label for="my-drawer" tabindex="0" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block w-5 h-5 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16">
                            </path>
                        </svg>
                    </label>
                </div>
                <div class="drawer-side">
                    <label for="my-drawer" class="drawer-overlay"></label>
                    <ul class="menu w-60 min-h-full bg-base-200 text-base-content fixed">
                        <!-- Sidebar content here -->
                        <li><label for="my-drawer" tabindex="0" class="btn btn-square btn-ghost">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="inline-block w-5 h-5 stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16">
                                    </path>
                                </svg>
                            </label></li>
                        @auth
                            <li><a href="/profile" wire:navigate>Profile</a></li>
                            <li>
                                <details closed>
                                    <summary>Dashboards</summary>
                                    <ul>
                                        {{-- @if (auth()->check() && auth()->user()->role === App\Enums\UserRole::HeadAdmin->name) --}}
                                        @if (auth()->check() && auth()->user()->role <= 2)
                                            @if (auth()->check() && auth()->user()->role === 1)
                                            <li><a href="/admin" wire:navigate>Admin Panel</a></li>
                                            @endif
                                            <li><a href="/forms">Forms</a></li>
                                        @endif
                                        <li><a href="/raid-planner">Raid planner</a></li>
                                    </ul>
                                </details>
                            </li>
                            <form action="/logout" method="POST">
                                @csrf
                                <li>
                                    <button type="submit">Logout</button>
                                </li>
                            </form>
                        @else
                            <li><a href="/login" wire:navigate class="text-[16px]">Login</a></li>
                            <li><a href="/register" wire:navigate class="text-[16px]">Register</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>

        {{-- Navbar Center --}}
        <div class="navbar-center">
            <a href="/" wire:navigate class="btn btn-ghost normal-case text-xl">Home</a>
            <a href="/form" class="btn btn-ghost normal-case text-xl">Application Form</a>
        </div>

        {{-- NavBar End --}}
        <div class="navbar-end">
            {{-- <label class="swap swap-rotate">
                <!-- this hidden checkbox controls the state -->
                <input type="checkbox" />
                <!-- sun icon -->
                <svg class="swap-on fill-current w-8 h-8 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                </svg>
                <!-- moon icon -->
                <svg class="swap-off fill-current w-8 h-8 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                </svg>
            </label> --}}
        </div>
    </div>

    <main>
        {{-- VIEW OUTPUT --}}
        {{-- @yield('content') --}}
        {{ $slot }}
    </main>

    <footer class="footer footer-center p-4 bg-base-300 text-base-content">
        <div>
            <p>Copyright © 2023 - All rights reserved by Daito</p>
        </div>
    </footer>
    {{-- <x-flash-message /> --}}
    
</body>
</html>
