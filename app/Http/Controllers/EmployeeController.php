<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use App\Models\Employee;
use App\Helpers\Tokenizer;

class EmployeeController extends Controller
{
    public function listEmployees()
    {
        
        $employees = Employee::all();

        return View::component('Employees',['employees'=>$employees]);  	

    }

    public function switchVacation(Request $request)
    {
    	
        $validated = $this->validate($request, [
            'id'   => 'required|integer',
            'on_vacation'    => 'required|boolean'            
        ]);

        $employee = Employee::where('id',$request->id)->first();

        $employee->on_vacation = (int)$request->on_vacation;
        $employee->save();
         
        return response()->json([
            'status' => 'ok'           
        ]);

    }
   
}
