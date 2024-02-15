<?php

namespace App\Http\Controllers;

use App\Http\Requests\tag\TagCreateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
        public function store(TagCreateRequest $request)
    {
        $data = Tag::create($request->validated());
        return response()->json([
            "message"=>"Тег создан",
            "user"=> $data
        ],200);
    }

    public function index()
    {
        $tag = Tag::all();
        return response()->json([
            "data" => [
                "allTag" => $tag,
                "message" => "Все теги"
            ]
        ]);
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());
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
