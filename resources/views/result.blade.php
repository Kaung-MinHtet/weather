<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weather Details</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-600 to-purple-700 min-h-screen flex items-center justify-center px-4">

  <div class="max-w-2xl w-full bg-white rounded-xl shadow-lg overflow-hidden">
    <!-- City Weather Header -->
    <div class="bg-gradient-to-r from-indigo-500 to-blue-500 p-6 text-center">
      <h1 class="text-4xl font-bold text-white mb-2">{{ $city }}</h1>
      <p class="text-lg text-white">{{ $weather }}</p>
    </div>

    <!-- Weather Details -->
    <div class="p-8">
      <div class="flex justify-between items-center mb-8">
        <!-- Temperature Info -->
        <div class="text-center">
          <p class="text-6xl font-bold text-gray-800">{{ $temperature }}</p>
          <p class="text-gray-600">Current Temperature</p>
        </div>
        <!-- Weather Icon -->
        <div>
            {{-- {!! $icon !!} --}}
          <img src="https://openweathermap.org/img/wn/{{ $icon }}@2x.png" alt="Weather Icon" class="w-24 h-24">
        </div>
      </div>

      <!-- Additional Weather Details -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- Humidity -->
        <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
          <p class="text-2xl font-semibold text-gray-800">{{ $humidity }}</p>
          <p class="text-gray-600">Humidity</p>
        </div>
        <!-- Wind Speed -->
        <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
          <p class="text-2xl font-semibold text-gray-800">{{ $wind_speed }}</p>
          <p class="text-gray-600">Wind Speed</p>
        </div>
        <!-- Pressure -->
        <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
          <p class="text-2xl font-semibold text-gray-800">{{ $pressure }}</p>
          <p class="text-gray-600">Pressure</p>
        </div>
        <!-- Visibility -->
        <div class="bg-gray-100 p-4 rounded-lg shadow-md text-center">
          <p class="text-2xl font-semibold text-gray-800">{{ $visibility }}</p>
          <p class="text-gray-600">Visibility</p>
        </div>
      </div>

      <!-- Back Button -->
      <div class="mt-10 text-center">
        <a
          href="{{ route('home') }}"
          class="inline-block bg-gradient-to-r from-indigo-500 to-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:shadow-lg hover:from-indigo-600 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-opacity-75 transition duration-300"
        >
          Back to Search
        </a>
      </div>
    </div>
  </div>

</body>
</html>