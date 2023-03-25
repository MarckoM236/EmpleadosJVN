<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Helpers\MyHelper;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee=Employee::all();
        return response()->json($employee);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firtsName' => 'required|min:2|max:20|alpha|regex:/^[A-Za-z]+$/',
            'otherName' => 'max:50|alpha|regex:/^[A-Za-z]+$/',
            'firtsLastName' => 'required|min:2|max:20|regex:/^[A-Za-z\s]+$/',
            'country' => 'required'
        ]);

        if ($validator->fails()) {
                $response['status']= 0;
                $response['message']= $validator->errors();
                $response['code']= 422;
        }
        else{
            $employee = new Employee();
            $employee->firtsName = $request->firtsName;
            $employee->otherName = $request->otherName;
            $employee->firtsLastName = $request->firtsLastName;
            $employee->email = MyHelper::validateEmail(MyHelper::email($request->firtsName,$request->firtsLastName,$request->country));
            $employee->country = $request->country;
            

            if($employee->save()){
                $response['status']= 1;
                $response['message']= "Empleado registrado con éxito";
                $response['code']= 201;
            }
            else{
                $response['status']= 0;
                $response['message']= "No se pudo crear el registro";
                $response['code']= 401;
            }
        }

            return response()->json($response);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        if($employee->delete()){
            $response['status']= 1;
            $response['message']= "Empleado Eliminado con éxito";
            $response['code']= 201;
        }
        else{
            $response['status']= 0;
            $response['message']= "No se pudo eliminar el empleado";
            $response['code']= 401;
        }

        return response()->json($response);
    }
}
