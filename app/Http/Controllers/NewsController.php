<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\News;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;


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
                        ->orWhere('description', 'like', "%{$searchQuery}%");
                });
            }
    
            if ($request->has('tag')) {
                $tag = $request->get('tag');
                $query->whereHas('tags', function (Builder $builder) use ($tag) {
                    $builder->where('slug', $tag);
                });
            }
    
            $news = $query->paginate(12);
    
            $tags = Tag::latest()
            ->take(20)
            ->get();
    
            return view('news.index', compact('news', 'tags'));
        }



        public function show(News $news, Request $request)
        {
            return view('news.show', compact('news'));
        }

           
                

    }
