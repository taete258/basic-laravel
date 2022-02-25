<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;



class TaskController extends Controller
{
    public function getTasksData(){
        return DB::table('tasks')-> get();
    }

    public function deleteTaskById(Request $request){
        try{
            DB::table('tasks')->where('id',$request->id)->delete();
            return response()->json(['message' => 'Success!','status'=>200], 200);
        }
        catch(QueryException $e){
            return response()->json($e->getMessage(), 500);
        }
    }

    public function createTask(Request $request){
        // $request->all();
    


        try{
            $data = array();
            $data["user_id"] =  Auth::user()->id;
            $data["name"] =  $request->name;
            $data["description"] =  $request->description;

            // not yet
            $data["state"] =  'Archived';
            $data["step_id"] =  1;
            $data["order_in_steplist"] =  1;



            
            $request->validate([
                'name' => 'required| unique:tasks',
                'description' => 'required'
            ],[
                'name.unique' => 'Task name has already been taken.',
                'name.required' => 'Task name field is required.',
                'description.required' => 'Description field is required.'
            ]);
            DB::table('tasks')->insert($data);
            return response()->json(['message' => 'Success!','data'=>$request,'status'=>200], 200);
        }
        catch(QueryException $e){
            return response()->json($e->getMessage(), 500);
        }
    }

}
