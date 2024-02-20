<?php

namespace App\Http\Controllers;

use App\Http\Requests\tag\TagCreateRequest;
use App\Http\Requests\tag\TagUpdateRequest;
use App\Http\Resources\tag\TagAllResource;
use App\Http\Resources\tag\TagCreateResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
        public function store(TagCreateRequest $request)
    {
        $data = Tag::create($request->validated());
        return (new TagCreateResource($data))->response()->setStatusCode(201);
    }

    public function index()
    {
        $tag = Tag::all();
        return new TagAllResource($tag);
    }

    public function update(TagUpdateRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return new TagCreateResource($tag);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json([

        ],204);
    }
}
