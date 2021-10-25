<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Label;
use App\Models\ListlModule;
class ListModuleController extends Controller
{
    public function createListModule(Request $request, Label $label){
        $list_module = new ListlModule();

        $list_module->label_id = $label->id;
        $list_module->date = $request->date;
        $list_module->img = $request->img;
        $list_module->title = $request->title;
        $list_module->description = $request->description;
        $list_module->save();

        $label->list_module;
        return response()->json(compact('status','label'), 200);
    }

    public function showListModule($id){
        $list_module = ListModule::findOrFail($id);
        $status = "success show List module";
        return response()->json(compact('status','list_module'), 200);
    }

    public function updateListModule($id, Request $request){
        $data = $request->all();
        $list_module = ListModule::findOrFail($id);
        $validator = Validator::make(
            $data,[
                'title' => 'required|string|max:100',
                'date' => 'required|string|max:100',
                'img' => 'required|string|max:100',
                'description' => 'required|string|max:600',
               ]);
            if($validator->fails()){
                $error = $validator->errors();
                return response()->json(compact('error'), 500);
            }

            $ListModule-> title= $data['title'];
            $ListModule-> date= $data['date'];
            $ListModule-> img= $data['img'];
            $ListModule-> description= $data['description'];
           

            $ListModule->save();
            $ListModule->push();
        $status = "success";
        return response()->json(compact('ListModule','status'),200);
    }

    public function deleteListModule($id){
        $ListModule = ListModule::findOrFail($id);
        $ListModule->delete();
        $status = "success delete";
        return response()->json(compact('status'), 200);
    }
}
