<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SpareResource;
use App\Models\Spare;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;


class SpareController extends Controller
{

    public function list()
    {
        return SpareResource::collection(Spare::paginate(10));
    }

}
