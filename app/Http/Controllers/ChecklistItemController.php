<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checklist;
use App\Models\ChecklistItem;
use Validator;

class ChecklistItemController extends Controller
{
    public function create(Request $request)
    {
        $data=[
            'checklistId'=>$request->checklistId,
            'itemName'=>$request->itemName
        ];

        $validator = Validator::make($data, [
            'checklistId' => 'required|numeric',
            'itemName' => 'required|string',
        ]);

        if ($validator->fails()) {
            return respons(400,  $validator->errors()->all());
        }

        $user = new ChecklistItem([
            'checklistId' => $request->checklistId,
            'itemName' => $request->itemName,
        ]);

        $user->save();

        return respons(200,  'Successfully created');
    }

    public function show(Request $request)
    {
        $data=ChecklistItem::where('checklistId',$request->checklistId)->get();

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

        $data = ChecklistItem::find($request->checklistId);

        if($data){
            $data->delete();
            return respons(200,'Successfully deleted',$data);
        }else{
            return respons(404,'Data not found',$data);
        }

    }

    public function showItem(Request $request)
    {
        $data=[
            'checklistId'=>$request->checklistId,
            'checklistItemId'=>$request->checklistItemId
        ];

        $validator = Validator::make($data, [
            'checklistId' => 'required|numeric',
            'checklistItemId' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return respons(400,  $validator->errors()->all());
        }

        $data=ChecklistItem::where('checklistId',$request->checklistId)->where('checklistItemId',$request->checklistItemId)->get();

        return respons(200,'ok',$data);
    }

    public function deleteItem(Request $request)
    {

        $data=[
            'checklistId'=>$request->checklistId,
            'checklistItemId'=>$request->checklistItemId
        ];

        $validator = Validator::make($data, [
            'checklistId' => 'required|numeric',
            'checklistItemId' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return respons(400,  $validator->errors()->all());
        }

        $data = ChecklistItem::where('checklistId',$request->checklistId)->where('checklistItemId',$request->checklistItemId)->delete();

        if($data){
            return respons(200,'Successfully deleted',$data);
        }else{
            return respons(404,'Data not found',$data);
        }

    }

    public function updateItem(Request $request)
    {

        $data=[
            'checklistId'=>$request->checklistId,
            'checklistItemId'=>$request->checklistItemId,
            'itemName'=>$request->itemName
        ];

        $validator = Validator::make($data, [
            'checklistId' => 'required|numeric',
            'checklistItemId' => 'required|numeric',
            'itemName' => 'required|string',
        ]);

        if ($validator->fails()) {
            return respons(400,  $validator->errors()->all());
        }

        $data = ChecklistItem::where('checklistId',$request->checklistId)->where('checklistItemId',$request->checklistItemId)
                    ->update([
                        'itemName' => $request->itemName,
                    ]);

        if($data){
            return respons(200,'Successfully updated');
        }else{
            return respons(404,'Data not found',$data);
        }

    }

    public function updateItemStatus(Request $request)
    {

        $data=[
            'checklistId'=>$request->checklistId,
            'checklistItemId'=>$request->checklistItemId,
            'itemName'=>$request->itemName
        ];

        $validator = Validator::make($data, [
            'checklistId' => 'required|numeric',
            'checklistItemId' => 'required|numeric',
            'itemName' => 'required|string',
        ]);

        if ($validator->fails()) {
            return respons(400,  $validator->errors()->all());
        }

        $data = ChecklistItem::where('checklistId',$request->checklistId)->where('checklistItemId',$request->checklistItemId)
                    ->update([
                        'itemName' => $request->itemName,
                    ]);

        if($data){
            return respons(200,'Successfully updated');
        }else{
            return respons(404,'Data not found',$data);
        }

    }


}
