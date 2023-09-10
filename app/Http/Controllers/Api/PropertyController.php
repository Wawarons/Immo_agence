<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Request;


class PropertyController extends Controller
{
    public function index() {
        return PropertyResource::collection(Property::limit(10)->with('options')->get());
    }
}
