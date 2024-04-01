<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
          <h2 class="text-2xl font-bold uppercase mb-1">Register</h2>
        </header>
    
        <form method="POST" action="/users">
          @csrf
          <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2"> Name </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" required placeholder="Name *" value="" />
          </div>
    
        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2">Email</label>
            <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" required placeholder="Email *" value="" />
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message . " Perhaps you already have an account?" }}</p>
            @enderror
        </div>
        
    
          <div class="mb-6">
            <label for="password" class="inline-block text-lg mb-2">
                Password
            </label>
            <div class="relative">
                <input type="password" class="border border-gray-200 rounded p-2 w-full pr-10" name="password" id="password" required value="" />
                <span class="absolute inset-y-0 right-0 pr-3 flex items-center">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" onclick="togglePasswordVisibility()">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.293 7.293a1 1 0 011.414 0l8 8a1 1 0 01-1.414 1.414l-8-8a1 1 0 010-1.414z" />
                    </svg>
                </span>
            </div>
        </div>
    
          <div class="mb-6">
            <label for="password2" class="inline-block text-lg mb-2">
              Confirm Password
            </label>
            <div class="relative">
              <input type="password" class="border border-gray-200 rounded p-2 w-full pr-10" name="password" id="password" required value="" />
              <span class="absolute inset-y-0 right-0 pr-3 flex items-center">
                  <svg class="h-6 w-6 text-gray-400 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" onclick="togglePasswordVisibility()">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.293 7.293a1 1 0 011.414 0l8 8a1 1 0 01-1.414 1.414l-8-8a1 1 0 010-1.414z" />
                  </svg>
              </span>
          </div>
          </div>
    
          <div class="mb-6">
            <button type="submit" class="bg-gray-700 hover:bg-cyan-700 text-white rounded py-2 px-4 hover:bg-black">
              Sign Up
            </button>
          </div>
    
          <div class="mt-8">
            <p>
              Already have an account?
              <a href="/login" class="btn btn-link hover:text-cyan-700">Login</a>
            </p>
          </div>
        </form>
    </x-card>
    <script>
      function togglePasswordVisibility() {
          var passwordInput = document.getElementById("password");
          if (passwordInput.type === "password") {
              passwordInput.type = "text";
          } else {
              passwordInput.type = "password";
          }
      }
  </script>
</x-layout>