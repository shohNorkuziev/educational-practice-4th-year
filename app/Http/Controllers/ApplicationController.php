<?php

namespace App\Http\Controllers;

use App\Http\Resources\application\ApplicationCreateResource;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $data = Application::create($request->all());
        return ApplicationCreateResource::make($data);
    }
}
