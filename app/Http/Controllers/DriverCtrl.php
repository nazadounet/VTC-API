<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\driver;

class DriverCtrl extends Controller
{

    public function store(Request $request)
    {

        $duplicateDrive = driver::where('email', $request->input('email'))->first();

        if ($duplicateDrive["email"] == $request->input('email')) {
            return json_encode(['statuCode' => 403, 'data' => 'email already used']);
        }else{
            try {
                $driver = new driver;
                $driver->firstname = $request->input('firstname');
                $driver->lastname = $request->input('lastname');
                $driver->email = $request->input('email');
                $driver->status = 1;
                $driver->save();

                $driverId = $driver->id;

                return json_encode(['statuCode' => 200, 'data' => 'driver added', 'driverId' => $driverId]);


            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
                $errorCode = $e->getCode();

                return 'Error occured with message :"' . $errorMessage . '" and code : "' . $errorCode . '"';

            }
        }
    }

    public function getDriverStatus(Request $request){
        $emailInput = $request->input('email');
        $driverStatu = driver::where('email', $emailInput)->first();
        return json_encode(['StatuCode' => 200, 'driverData' => $driverStatu]);
    }

    public function returnDriverProfil(Request $request){
        $dataFromAdminSystem = $request->input('dataFromAdminSystem');
        $driverStatu = driver::where('email', $dataFromAdminSystem)->orWhere('id', $dataFromAdminSystem)->first();
        return json_encode($driverStatu);
    }

}
