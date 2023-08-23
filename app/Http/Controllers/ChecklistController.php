<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checklist;
use Validator;

class ChecklistController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return respons(400,  $validator->errors()->all());
        }

        $user = new Checklist([
            'name' => $request->name,
        ]);

        $user->save();

        return respons(200,  'Successfully created');
    }

    public function show(Request $request)
    {
        $data=Checklist::all();
        return respons(200,'ok',$data);
    }

    public function delete(Request $request)
    {

        $validator = Validator::make(['checklistId'=>$request->checklistId], [
            'checklistId' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return respons(400,  $validator->errors()->all());
        }

        $data = Checklist::find($request->checklistId);

        if($data){
            $data->delete();
            return respons(200,'Successfully deleted',$data);
        }else{
            return respons(404,'Data not found',$data);
        }

    }
}
