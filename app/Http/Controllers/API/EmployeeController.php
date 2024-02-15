<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use App\MoonShine\Resources\EmployeesResource;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return response()->json([
            'employees' => EmployeeResource::collection(Employee::with('position')->get())
        ]);
    }
}
