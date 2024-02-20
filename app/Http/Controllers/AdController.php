<?php

namespace App\Http\Controllers;

use App\Http\Requests\ad\AdCreateRequest;
use App\Http\Requests\ad\AdUpdateRequest;
use App\Http\Resources\ad\AdAllResource;
use App\Http\Resources\ad\AdCreateResource;
use App\Http\Resources\ad\AdOneResource;
use App\Http\Resources\ad\AdUpdateResource;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $ad = Ad::all();
        return AdAllResource::make($ad);
    }

    public function store(AdCreateRequest $request)
    {
        $ad = Ad::create($request->validated());
        if($request->filled('tags')){
            $ad->tags()->sync($request->tags);
        }
        return new AdCreateResource($ad);
    }

    public function show(Ad $ad)
    {
        Ad::find($ad);

        return AdOneResource::make($ad);
    }

    public function update(AdUpdateRequest $request, Ad $ad)
    {
        $data = $ad->update($request->validated());
        $ad->tags()->sync($request->tags);
        return AdUpdateResource::make($ad);
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();
        return response()->json([

        ],204);
    }
}
