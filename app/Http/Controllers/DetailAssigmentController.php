<?php
namespace App\Http\Controllers;
use App\Models\DetailAssigment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetailAssigmentController extends Controller
{
    public function createDetailAssigment(Request $request){
        $data = $request->all();

        $detail_assigment = new DetailAssigment;
        $detail_assigment-> title= $data['title'];
        $detail_assigment-> description= $data['description'];
        $detail_assigment->save();
        
        $status = "success";
        return response()->json(compact('detail_assigment','status'),200);
    }

    public function showDetailAssigment($id){
        $detail_assigment = DetailAssigment::findOrFail($id);
        $status = "success show detail assigment";
        return response()->json(compact('status','detail_assigment'), 200);
    }

    public function updateDetailAssigment($id, Request $request){
        $data = $request->all();
        $detail_assigment = DetailAssigment::findOrFail($id);
        $validator = Validator::make(
            $data,[
                'title' => 'required|string|max:100',
                'description' => 'required|string|max:600',
               ]);
            if($validator->fails()){
                $error = $validator->errors();
                return response()->json(compact('error'), 500);
            }

        $detail_assigment->title = $data['title'];
        $detail_assigment->description = $data['description'];
        $detail_assigment->save();

        $detail_assigment->push();
        $status = "success";
        return response()->json(compact('detail_assigment','status'),200);
    }

    public function deleteDetailAssigment($id){
        $detail_assigment = DetailAssigment::findOrFail($id);
        $detail_assigment->delete();
        $status = "success delete";
        return response()->json(compact('status'), 200);
    }
}
