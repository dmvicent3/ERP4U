<?php

namespace App\Http\Controllers\Actl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostalCode;

class PostalCodeController extends Controller
{
    public function PostalCodeAll(){
        $postalCodes = PostalCode::latest()->get();
        return view('backend.postalCode.postalCode_all', compact('postalCodes'));
    }
}
