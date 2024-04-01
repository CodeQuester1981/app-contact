<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Login</h2>
        </header>
  
        <form method="POST" action="/users/authenticate">
            @csrf  
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" required placeholder="email *" value="" />
  
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
  
            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>
                <div class="relative">
                    <input type="password" class="border border-gray-200 rounded p-2 w-full pr-10" name="password" id="password" required value="" />
                </div>
                <div class="relative mt-2">
                    <input type="checkbox" class="inline-block mr-2" id="password-toggle" onclick="togglePasswordVisibility()">
                    <label for="password-toggle" class="inline-block">Show Password</label>
                </div>
            </div>
            
  
            <div class="mb-6">
                
            </div>
  
            <div class="mb-6">
                <button type="submit" class="bg-gray-700 text-white rounded py-2 px-4 mr-5 hover:bg-cyan-700">
                    Sign In
                </button>
            </div>  
            <div class="mt-8">
                <p>
                    Don't have an account?
                    <a href="/register" class="btn btn-link hover:text-cyan-700">Register</a>
                </p>
            </div>
        </form>
    </x-card>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var passwordToggle = document.getElementById("password-toggle");
            if (passwordToggle.checked) {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</x-layout>
