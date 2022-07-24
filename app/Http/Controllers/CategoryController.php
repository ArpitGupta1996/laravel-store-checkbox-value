<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('index');
    }

    public function store(Request $request){
        $input = $request->all();

        $data = [];

        $data['name'] = json_encode($input['name']);

        Category::create($data);

        return response()->json(['success' => 'Record inserted succesfully']);
    }
}
