<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\DetailModule;
class DetailModuleController extends Controller
{
    public function createDetailModule(Request $request, Category $category){
        $detail_module = new DetailModule();
        $detail_module->category_id = $category->id;
        $detail_module->date = $request->date;
        $detail_module->img = $request->img;
        $detail_module->title = $request->title;
        $detail_module->description = $request->description;
        $detail_module->link_url = $request->link_url;
        $detail_module->save();

        $category->detail_module;
        return response()->json(compact('status','category'), 200);
     }

    public function showDetailModule($id){
        $detail_module = DetailModule::findOrFail($id);
        $status = "success show detail module";
        return response()->json(compact('status','detail_module'), 200);
    }

    public function updateDetailModule($id, Request $request){
        $data = $request->all();
        $detail_assigment = DetailModule::findOrFail($id);
        $validator = Validator::make(
            $data,[
                'title' => 'required|string|max:100',
                'date' => 'required|string|max:100',
                'img' => 'required|string|max:100',
                'description' => 'required|string|max:600',
                'link' => 'required|string|max:100',
               ]);
            if($validator->fails()){
                $error = $validator->errors();
                return response()->json(compact('error'), 500);
            }

            $detail_module-> title= $data['title'];
            $detail_module-> date= $data['date'];
            $detail_module-> img= $data['img'];
            $detail_module-> description= $data['description'];

            $detail_module->save();
            $detail_module->push();
        $status = "success";
        return response()->json(compact('detail_module','status'),200);
    }

    public function deleteDetailModule($id){
        $detail_module = DetailModule::findOrFail($id);
        $detail_module->delete();
        $status = "success delete";
        return response()->json(compact('status'), 200);
    }
}
