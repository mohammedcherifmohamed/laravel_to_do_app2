<nav class="bg-white border-b shadow-md px-6 py-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="text-2xl font-extrabold text-indigo-600">ToDoApp</div>
        @if(Auth::check())
            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile Image" width="100" class="rounded-circle">
        @else
            <img src="{{ asset('default-profile.png') }}" alt="Default Image" width="100" class="rounded-circle">
        @endif
       
        <ul class="hidden md:flex items-center space-x-6">
            <li><a href="{{ route('home') }}" class="text-gray-700 hover:text-indigo-600">Home</a></li>
            <li><a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600">Login</a></li>
            <li><a href="{{ route('register') }}" class="text-gray-700 hover:text-indigo-600">Register</a></li>
            <li><a href="{{ route('logout') }}" class="text-gray-700 hover:text-indigo-600">Logout</a></li>
        </ul>
    </div>
</nav>
