<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function createCategory(Request $request){
        $data = $request->all();

        $category = new Category;
        $category-> name_category = $data['name_category'];
        $category->save();
        
        $status = "success";
        return response()->json(compact('category','status'),200);
    }

    public function showCategory($id){
        $category = Category::findOrFail($id);
        $status = "success show category";
        return response()->json(compact('status','category'), 200);
    }

    public function updateCategory($id, Request $request){
        $data = $request->all();
        $category = Category::findOrFail($id);
        $validator = Validator::make(
            $data,[
                'name_category' => 'required|string|max:100',
               ]);
            if($validator->fails()){
                $error = $validator->errors();
                return response()->json(compact('error'), 500);
            }

        $category->name_category = $data['name_category'];
        $category->save();

        $category->push();
        $status = "success";
        return response()->json(compact('category','status'),200);
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        $category->delete();
        $status = "success delete";
        return response()->json(compact('status'), 200);
    }

    // public function getAllCategory(Request $request){
    //     $category->all();
    //     return response()->json(compact('status','category'), 200);
    // }
}
