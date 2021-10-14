<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\;

class LabelController extends Controller
{
    public function createLabel(Request $request){
        $data = $request->all();

        $label = new Label;
        $label-> label = $data['label'];
        $label->save();
        
        $status = "success";
        return response()->json(compact('label','status'),200);
    }

    public function showLabel($id){
        $label = Label::findOrFail($id);
        $status = "success show category";
        return response()->json(compact('status','label'), 200);
    }

    public function updateLabel($id, Request $request){
        $data = $request->all();
        $label = Label::findOrFail($id);
        $validator = Validator::make(
            $data,[
                'label' => 'required|string|max:100',
               ]);
            if($validator->fails()){
                $error = $validator->errors();
                return response()->json(compact('error'), 500);
            }

        $label->label = $data['label'];
        $label->save();

        $label->push();
        $status = "success";
        return response()->json(compact('label','status'),200);
    }

    public function deleteLabel($id){
        $label = Label::findOrFail($id);
        $label->delete();
        $status = "success delete";
        return response()->json(compact('status'), 200);
    }
}
