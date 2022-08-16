<?php

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/employees', function () {
    $employees = Employee::orderBy('first_name', 'ASC')->get();

    return EmployeeResource::collection($employees);
});
