<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagAdminController extends Controller
{
    
    public function index()
    {
        $tags=Tag::all();
        return view('admin.tags.index',compact('tags'));
    }



    public function edit(Tag $tag)
    {
        return view('admin.tags.edit',compact('tag'));
    }


    public function update(Request $request, Tag $tag)
    {
        $data = $request->all();

        // If the name has changed, update the slug as well
        if ($request->has('name') && $request->name !== $tag->name) {
            $data['slug'] = Str::slug($request->name);
        }

        
    
        $tag->update($data);
        return redirect()->route('admin.tags.index');
    }


    public function destroy(Tag $tag)
    {
        // Detach all related news before deleting the tag
        $tag->news()->detach();
    
        $tag->delete();
    
        return redirect()->route('admin.tags.index');
    }
}
