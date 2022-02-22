<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = $this ->getTasksData();
        return view('dashboard',compact('tasks'));
    }

    private function getTasksData(){
        return DB::table('tasks')-> get();
    }

    public function deleteTaskById($id){
      return DB::table('tasks')->where('id', $id)->delete();
    }


}
