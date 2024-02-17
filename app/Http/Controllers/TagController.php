<?php

namespace App\Http\Controllers;

use App\Http\Requests\tag\TagCreateRequest;
use App\Http\Requests\tag\TagUpdateRequest;
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
        return (new TagCreateResource($tag))->response()->setStatusCode(200);
    }

    public function update(TagUpdateRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return response()->json([
            "data" => [
                "tag" => $tag,
                "message" => "Тег обновлен"
            ]
        ]);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json([
            "message" => "Тег удален"
        ]);
    }
}
