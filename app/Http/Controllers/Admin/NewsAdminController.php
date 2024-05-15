<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsAdminController extends Controller
{
    //
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
        $user=Auth::user();
         
         $md=new \ParsedownExtra();
         $news=$user->news()->create([
            'title' => $request->title,
            'slug' => Str::slug($request->title).'-'. rand(1000,9999),
            'description' => $md->text($request->description),
            'location' => $request->location,
            'link' => $request->link,
            'image' => basename($request->file('image')->store('public/news')),
            'is_highlighted' =>$request->filled('is_highlighted'),
            'is_published' =>true,
        ]);

        foreach(explode(',', $request->tags) as $requestTag) {
            $tag = Tag::firstOrCreate([
                'slug' => Str::slug(trim($requestTag))
            ], [
                'name' => ucwords(trim($requestTag))
            ]);

            $tag->news()->attach($news->id);
        }

        return redirect()->route('dashboard');
        
     
        
        
    }


}
