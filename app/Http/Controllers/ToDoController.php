<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Debugbar;


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
            $request->validate([
                'name' => 'required| unique:todolists',
                'description' => 'required'
            ],[
                'name.unique' => 'To Do name has already been taken.',
                'name.required' => 'ToDo name field is required.',
                'description.required' => 'Description field is required.'
            ]);

            $todoId = DB::table('todolists')->insertGetId($data);

            $dataTask = array();
            foreach ($request->tasksData as $key => $task) {
                $dataTask[] = [
                    'name' => $task['name'],
                    'todolist_id'=> $todoId ,
                    'state'=> 'Current',
                    'description' => ($task['description'] ?? null),
                    'seq' => $key+1,
                ];
            }
            DB::table('tasks')->insert($dataTask);
            return response()->json(['message' => 'Success!','status'=>200], 200);
        }
        catch(QueryException $e){
            return response()->json($e->getMessage(), 500);
        }
    }

}
