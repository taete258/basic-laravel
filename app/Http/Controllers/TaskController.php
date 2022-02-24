<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    public function getTasksData(){
        return DB::table('tasks')-> get();
    }

    public function deleteTaskById($id){
        DB::table('tasks')->where('id', $id)->delete();
        return redirect()->back(); 
    }
}
