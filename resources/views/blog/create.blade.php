<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Create a Blog Post</h2>
      </header>
  
      <form method="POST" action="/blog-post" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
          <label for="interest" class="inline-block text-lg mb-2">
              Topic of Interest
          </label>
          <select name="interest" id="interest" class="border border-gray-200 rounded p-2 w-full">
              <option value="Archery">Archery</option>
              <option value="Boxing">Boxing</option>
              <option value="Aquascaping">Aquascaping</option>
              <option value="Dog Sled Racing">Dog Sled Racing</option>
              <option value="Mountain Climbing">Mountain Climbing</option>
              <option value="Gaming">Gaming</option>
          </select>
          <!-- Hidden input field to store the selected value -->
          <input type="hidden" id="selectedInterest" name="selectedInterest">
        </div>

        <div class="mb-6">
          <label for="blog_title" class="inline-block text-lg mb-2">Blog Title</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="blog_title" required placeholder="Blog Title *" value="" />
        </div>

        <div class="mb-6">
          <label for="tone" class="inline-block text-lg mb-2">Blog Tone</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tone" required placeholder="Funny, Serious, Sound like Sheldon *" value="" />
        </div>

        <div class="mb-6">
          <label for="blogCount" class="inline-block text-lg mb-2">Word Count</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="blogCount" required placeholder="How many words should the blog post be? *" value="" />
        </div>

        <div class="mb-6">
          <label for="description" class="inline-block text-lg mb-2">Description</label>
          <textarea class="border border-gray-200 rounded p-2 w-full" name="description" required placeholder="What would you like the article to cover *" value=""></textarea>
        </div>

        {{-- <div class="mb-6">
          <label for="surname" class="inline-block text-lg mb-2">Blog Post</label>
          <textarea class="border border-gray-200 rounded p-2 w-full" name="blog_body" required placeholder="Blog Post *" style="height: 200px;"></textarea>
        </div> --}}
    
        <div class="mb-6">
          <button type="submit" class="text-white rounded py-2 px-4 bg-gray-700 hover:bg-cyan-700">
            Create this Post
          </button>

          <a href="/" class="text-black ml-4"> Back </a>
        </div>
      </form>
    </x-card>
  </x-layout>