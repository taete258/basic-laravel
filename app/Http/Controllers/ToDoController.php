<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;



class ToDoController extends Controller
{
    public function getToDoData(){
        try{
            $data = DB::table('todolists')->where('user_id',Auth::user()->id)->get();
            return response()->json(['message' => 'Success!','data'=>$data ,'status'=>200], 200);
        }
        catch(QueryException $e){
            return response()->json($e->getMessage(), 500);
        }
    }

    public function deleteToDoById(Request $request){
        try{
            DB::table('todolists')->where('id',$request->id)->delete();
            return response()->json(['message' => 'Success!','status'=>200], 200);
        }
        catch(QueryException $e){
            return response()->json($e->getMessage(), 500);
        }
    }

    public function createToDo(Request $request){

        try{
            $data = array();
            $data["user_id"] =  Auth::user()->id;
            $data["name"] =  $request->name;
            $data["description"] =  $request->description;
            $data["state"] =  'Current';

            // not yet
            // $data["step_id"] =  1;
            // $data["order_in_steplist"] =  1;



            
            $request->validate([
                'name' => 'required| unique:todolists',
                'description' => 'required'
            ],[
                'name.unique' => 'To Do name has already been taken.',
                'name.required' => 'ToDo name field is required.',
                'description.required' => 'Description field is required.'
            ]);
            DB::table('todolists')->insert($data);
            return response()->json(['message' => 'Success!','data'=>$request,'status'=>200], 200);
        }
        catch(QueryException $e){
            return response()->json($e->getMessage(), 500);
        }
    }

}
