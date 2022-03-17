<?php

namespace App\Http\Controllers;

use App\Http\Resources\CurrencyIndexResource;
use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyApiController extends Controller
{
    public function index()
    {
        return CurrencyIndexResource::collection(Currency::all());
    }

    public function show($code)
    {
        return new CurrencyResource(Currency::firstWhere('code', $code));
    }
}
