<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Rules\CustomValidation;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    public function index() {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        $blog = Blog::where('user_id', $user->id)
        ->orderBy('blog_title')
        ->filter(request(['search']))
        ->paginate(6);


        return view('blog.index', compact('blog'));
    }

    public function show(Blog $blog) {
        if (!auth()->check()) {
            return redirect('/login');
        } else {
            return view('blog.show', [
                'blog' => $blog
            ]);
        }        
    }

    public function create() {
        return view('blog.create');
    }

    public function store(Request $request) {
        try {
            $userId = auth()->user()->id;
            info('User ID: ' . $userId);
            $formFields = $request->validate([
                'interest' => 'required',
                'blog_title' => 'required',
                'tone' => 'required', // Assuming tone is part of the request
                'description' => 'required', // Assuming description is part of the request
                'blogCount' => 'required', // Assuming blogCount is part of the request
            ]);
            
            // Generate the blog response
            $blogResponse = $this->generateResponse($formFields);
    
            // Additional fields to be stored
            $formFields['user_id'] = $userId;
            $formFields['blog_body'] = $blogResponse;
    
            // Create the blog post
            $createdBlog = Blog::create($formFields);
            Log::info('Blog post created: ' . json_encode($createdBlog));
    
            return redirect('/blogs')->with('message', 'Blog Post Created');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->withInput()->withErrors(['error' => 'An error occurred while creating the contact.']);
        }
    }
    
    public function generateResponse($formFields) {
        $tone = $formFields['tone'];
        $description = $formFields['description'];
        $blogCount = $formFields['blogCount'];
        $minWords = $blogCount * 0.75;
        $whoAreYou = "You are a professional, creative and {$tone} blogger, who has a flare for word play.";
    
        $message = "Generate a blog post about {$description}. "
            . "You may not use fewer than: {$minWords} words in total. "
            . "You may not use more than: {$blogCount} words in total. "
            . "The tone of your writeup should be: {$tone}.";
    
        $response = Http::withHeaders([
            "Content_Type" => "application/json",
            "Authorization" => "Bearer " . config('app.open_ai_api')
        ])->post('https://api.openai.com/v1/chat/completions', [
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "system",
                    "content" => $whoAreYou
                ],
                [
                    "role" => "user",
                    "content" => $message
                ],
                [
                    "role" => "assistant",
                    "content" => $description
                ]
            ]
        ]);
    
        $r = json_decode($response);
        $blogResponse = $r->choices[0]->message->content;
    
        return $blogResponse;
    }
}
