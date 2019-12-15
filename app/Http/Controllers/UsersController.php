<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Exports\UsersExport;

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
