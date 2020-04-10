<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class SearchController extends Controller
{
    public function search (Request $request){
        if($request->ajax())
        {
            $output="abcd";
            $users=DB::table('registration')->where('name','like','%'. $request->search.'%')
            ->orWhere('role', 'like', '%'.$request->search.'%')
            ->get();
            
            if($users)
            {
                foreach ($users as $key => $user) {
                $output.='<tr>'.
            
                '<td>'.$user->id.'</td>'.
                '<td>'.$user->name.'</td>'.
                '<td>'.$user->email.'</td>'.
                '<td>'.$user->phone.'</td>'.
                '<td>'.$user->gender.'</td>'.
                '<td>'.$user->role.'</td>'.
                '<td>'.$user->address.'</td>'.
                
                '</tr>';
                }
            return Response($output);
            }
        }
    }
}
