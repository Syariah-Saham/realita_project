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

    /**
         * route	:	 /api/dictionary
         * method	:	 post
         * params	:	 null
         * description	:
              * this method for create new dictionary word
         * @return	:	 array
    */
    public function store(Request $request )
    {
        $request->validate([
            'keyword'     => 'required|min:1|max:50|unique:dictionaries',
            'description' => 'required|min:3|max:500',
        ]);

        $result = Dictionary::create($request->all());

        return response([
            "message" => "Data berhasil ditambahkan",
            "result" => $result,
        ] , 201);
    }


    /**
         * route	:	 /api/dictionary/{id}
         * method	:	get
         * params	:	 id
         * description	:
              * this method will return detail dictionary
         * @return	:	 array
    */

    public function show(Request $request , $id)
    {
        $dictionary = Dictionary::find($id);
        if(!$dictionary) return response("Data tidak ada", 404);
        return response($dictionary, 200);
    }

    /**
         * route	:	 /api/dictionary/{id}
         * method	:	 delete
         * params	:	 id
         * description	:
              * this method for destroy record dictionary
         * @return	:	 status
    */
    public function destroy(Request $request , $id)
    {
        $result = Dictionary::destroy($id);
        return response([
            "message" => "Data berhasil dihapus!",
            "dictionary_id" => $id,
        ],200);
    }

    /**
         * route	:	 /api/dictionary/{id}
         * method	:	 put
         * params	:	 id
         * description	:
              * this method for update data
         * @return	:	 array
    */
    public function update(Request $request , $id)
    {
        $request->validate([
            'keyword'     => 'required|min:1|max:50',
            'description' => 'required|min:3|max:500',
        ]);

        Dictionary::where('id' , $id)->update([
            'keyword' => $request->keyword,
            'description' => $request->description,
        ]);

        return response()->json([
            "message" => "Data berhasil diupdate!",
        ] , 200);
    }
}
