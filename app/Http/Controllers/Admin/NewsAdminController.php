<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Database\Eloquent\Builder;

class NewsAdminController extends Controller
{

    public function index()
    {
    $news=News::latest()->get();

        return view('admin.news.index', compact('news'));
    }


    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'location' => 'required',
            'link' => 'required|url',
        ]);
        $user = Auth::user();

        $md = new \ParsedownExtra();
        $news = $user->news()->create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . rand(1000, 9999),
            'description' => $md->text($request->description),
            'location' => $request->location,
            'link' => $request->link,
            'image' => Storage::disk('public')->put('news', $request->file('image')),
            'is_highlighted' => $request->boolean('is_highlighted'),
            'is_published' => true,
        ]);

        foreach (explode(',', $request->tags) as $requestTag) {
            $tag = Tag::firstOrCreate([
                'slug' => Str::slug(trim($requestTag))
            ], [
                'name' => ucwords(trim($requestTag))
            ]);

            $tag->news()->attach($news->id);
        }

        return redirect()->route('dashboard');
    }


    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }





    public function update(Request $request, News $news)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image',
            'location' => 'required',
            'link' => 'required|url',
            'description' => 'required',
         
        ]);
         // If the title has changed, update the slug as well
    if ($request->has('title') && $request->title !== $news->title) {
        $validatedData['slug'] = Str::slug($request->title) . '-' . rand(1000, 9999);
    }
    
        if ($request->hasFile('image')) {
            $validatedData['image'] = Storage::disk('public')->put('news', $request->file('image'));
        }

        if ($request->has('is_highlighted')) {
            $validatedData['is_highlighted'] = $request->boolean('is_highlighted');
        } else {
            $validatedData['is_highlighted'] = false;
        }

        
        if ($request->has('is_published')) {
            $validatedData['is_published'] = $request->boolean('is_published');
        } else {
            $validatedData['is_published'] = false;
        }
    
        $news->update($validatedData);
    
        if ($request->has('tags')) {
            $news->tags()->detach();
    
            foreach (explode(',', $request->tags) as $requestTag) {
                $tag = Tag::firstOrCreate([
                    'slug' => Str::slug(trim($requestTag))
                ], [
                    'name' => ucwords(trim($requestTag))
                    
                ]);
    
                $tag->news()->attach($news->id);
            }
        }
    
        return redirect()->route('dashboard');
    }







    public function destroy(News $news)
    {
    
        // Delete the image from the storage
    Storage::delete('public/news/' . $news->image);

      // Detach all related tags before deleting the news
      $news->tags()->detach();

    // Delete the news
    $news->delete();

    return redirect()->route('dashboard');
    }
}
