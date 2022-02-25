<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;


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
        try{
            DB::table('tasks')->where('id',$request->id)->delete();
            return response()->json(['message' => 'Success!','status'=>200], 200);
        }
        catch(QueryException $e){
            return response()->json($e->getMessage(), 500);
        }
    }
}
