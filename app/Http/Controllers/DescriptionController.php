<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DescriptionController extends Controller
{
    public function show(Request $request)
    {
        $model = new ("App\\Models\\" . Str::studly($request->entity));

        return $model::with('description')
            ->where('id', $request->id)
            ->first();
    }
}
