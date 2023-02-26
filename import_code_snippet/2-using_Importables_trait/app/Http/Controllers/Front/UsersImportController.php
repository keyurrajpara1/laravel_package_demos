<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class UsersImportController extends Controller
{
    public function show(Request $request){
        return view('front.users.import');
    }
    public function store(Request $request){
        $file = $request->file('file');
        // Excel::import(new UsersImport, $file);
        (new UsersImport)->import($file);
        return back()->withStatus('Excel file imported successfully');
    }
}
