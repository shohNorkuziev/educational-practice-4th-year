<?php

namespace App\Http\Controllers;

use App\Http\Resources\message\MessageAllResource;
use App\Http\Resources\message\MessageCreateResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $data = Message::all();
        return MessageAllResource::make($data);
    }

    public function store(Request $request)
    {
        $data = Message::create($request->all());
        return MessageCreateResource::make($data);
    }

    public function show($message)
    {
        $data = Message::where('application_id' ,$message)->get();
        return response()->json([
            "message" => $data
        ],200);
    }
}
