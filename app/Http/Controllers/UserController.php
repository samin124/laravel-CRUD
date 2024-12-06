<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function insertData(Request $request)
    {
        $query=DB::table('students_info')->insert([
            'Id'=>$request->userid,
            'Name'=>$request->username,
            'Section'=>$request->usersection,
            'Email'=>$request->useremail,
            'CGPA'=>$request->usercgpa,
            'Department'=>$request->userdepartment,
        ]);
        if($query)
        {
            return redirect('/');
        }
    }
    public function getData(){
        $query=DB::table('students_info')->paginate(10);
        return view('allUsers',['stack'=>$query]);
    }
    public function updatePage(string $id)
    {
        $query=DB::table('students_info')->where('Id',$id)->first();
        return view('/update',['stack2'=>$query]);
    }

    public function updateUser(Request $request,string $id1)
    {
        $query=DB::table('students_info')
        ->where('Id',$id1)
        ->update([
            'Id'=>$request->userid,
            'Name'=>$request->username,
            'Section'=>$request->usersection,
            'Email'=>$request->useremail,
            'CGPA'=>$request->usercgpa,
            'Department'=>$request->userdepartment,
        ]);
        return redirect()->route('all');
    }

    public function deleteUser(string $id)
    {
        $query=DB::table('students_info')
        ->where('Id',$id)
        ->delete();

        return redirect('all');
    }



}
