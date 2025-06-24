<nav class="bg-white border-b shadow-md px-6 py-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="text-2xl font-extrabold text-indigo-600">ToDoApp</div>
        <ul class="hidden md:flex items-center space-x-6">
            <li><a href="{{ route('home') }}" class="text-gray-700 hover:text-indigo-600">Home</a></li>
            <li><a href="{{ route('Login') }}" class="text-gray-700 hover:text-indigo-600">Login</a></li>
            <li><a href="{{ route('register') }}" class="text-gray-700 hover:text-indigo-600">Register</a></li>
        </ul>
    </div>
</nav>
