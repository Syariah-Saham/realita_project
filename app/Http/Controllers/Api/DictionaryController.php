<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dictionary;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    /**
         * route	:	 /api/dictionary
         * method	:	 get
         * params	:	 null
         * description	:
              * this method will return all data dictionary
         * @return	: array
    */
    public function index()
    {
        $dictionary = Dictionary::get();
        return response($dictionary);
    }
}
