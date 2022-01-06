<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative bg-white">

  <div class="max-w-7xl mx-auto px-4 sm:px-6">
    <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
      <div class="flex justify-start lg:w-0 lg:flex-1">
        <a href="{{ url('/') }}">
          <img class="h-8 w-auto sm:h-10" src="images/logo.png" alt="">
        </a>
      </div>
      <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
      @if (Route::has('login'))
      @auth
        <a href="{{ url('/dashboard') }}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
          Home
        </a>
      @else
        <a href="{{ route('login') }}" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">
          Sign in
        </a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
          Sign up
        </a>
        @endif
      @endauth
      @endif
      </div>
      
    </div>
  </div>
