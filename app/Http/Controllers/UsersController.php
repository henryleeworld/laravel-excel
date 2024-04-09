<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller 
{
    public function import() 
    {
        // set_time_limit(300);
        Excel::import(new UsersImport, storage_path('files/users.xlsx'));
        echo __('Imported successfully') . PHP_EOL;
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.' . now()->timestamp . '.xlsx');
    }
}
