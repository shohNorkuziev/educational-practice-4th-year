<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $data = Message::all();
        return response()->json([
            "allMessage" => $data,
            "message" => "Все собщения"
        ],200);
    }

    public function store(Request $request)
    {
        $data = Message::create($request->all());
        return response()->json([
            "itemMessage" => $data,
            "message" => "Сообщение создано"
        ],200);
    }

    public function show(Message $message)
    {
        $data = Message::find($message);
        return response()->json([
            "message" => $data
        ],200);
    }
}
