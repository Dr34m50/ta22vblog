<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all(); // Retrieve all tags
        return response()->json($tags); // Return as JSON
    }

    public function create()
    {

        return view('tags.create'); // Return a view for creating a tag
    }

    public function store(StoreTagRequest $request)
    {

        $validated = $request->validated(); // Validate the request
        $tag = Tag::create($validated); // Create a new tag
        return redirect()->route('tags.index')
                         ->with('success', 'Tag created successfully.');
    }

    public function show(Tag $tag)
    {

        return view('tags.show', compact('tag')); // Return a view to show the tag
    }

    public function edit(Tag $tag)
    {

        return view('tags.edit', compact('tag')); // Return a view for editing the tag
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {

        $validated = $request->validated(); // Validate the request
        $tag->update($validated); // Update the tag
        return redirect()->route('tags.index')
                         ->with('success', 'Tag updated successfully.');
    }

    public function destroy(Tag $tag)
    {

        $tag->delete(); // Delete the tag
        return redirect()->route('tags.index')
                         ->with('success', 'Tag deleted successfully.');
    }
}