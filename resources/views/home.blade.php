<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        <div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-blue-500 to-purple-600 px-4">
            <div class="max-w-md w-full bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-500 hover:scale-105">
              <div class="p-6">
                <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Find Weather</h2>
                <form action="{{ route('search-weather') }}" method="POST">
                  @csrf
                  <div class="mb-5">
                    <label for="city" name="city" class="block text-sm font-medium text-gray-700 mb-2">Enter City Name</label>
                    <input
                      type="text"
                      id="city"
                      name="city"
                      placeholder="e.g. Tokyo, London"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition duration-300"
                    />
                    @error('city')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="flex justify-center">
                    <button
                      type="submit"
                      class="w-full sm:w-auto bg-gradient-to-r from-indigo-500 to-blue-500 text-white px-8 py-3 rounded-lg shadow-md hover:shadow-lg hover:from-indigo-600 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-75 transition duration-300"
                    >
                      Get Weather
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
    </body>
</html>
