<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\News;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    //

    public function index(Request $request)
    {
        $query = News::query()
        ->where('is_published', true)
        ->with('tags')
        ->latest();

            $tags=Tag::orderBy('name')->get();

            if ($request->has('s')) {
                $searchQuery = trim($request->get('s'));
    
                $query->where(function (Builder $builder) use ($searchQuery) {
                    $builder
                        ->orWhere('title', 'like', "%{$searchQuery}%")
                        ->orWhere('location', 'like', "%{$searchQuery}%");
                });
            }
    
            if ($request->has('tag')) {
                $tag = $request->get('tag');
                $query->whereHas('tags', function (Builder $builder) use ($tag) {
                    $builder->where('slug', $tag);
                });
            }
    
            $news = $query->get();
    
            $tags = Tag::orderBy('name')
                ->get();
    
            return view('news.index', compact('news', 'tags'));
        }

           
                

    }
