<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller 
{
    public function import() 
    {
        Excel::import(new UsersImport, public_path('uploads/users.xlsx'));
        
        return redirect('/')->with('success', 'All good!');
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.' . now()->timestamp . '.xlsx');
    }
}
