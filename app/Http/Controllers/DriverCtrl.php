<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\driver;

class DriverCtrl extends Controller
{

    public function store(Request $request)
    {
        $duplicateDrive = driver::where('email', $request->input('email'))->first();

        if ($duplicateDrive["email"] == $request->input('email')) {
            return Response::json('emailAlready used', 403, [], JSON_NUMERIC_CHECK);
        }else{
            try {
                $driverProfil = driver::create([
                    'firstname' => $request->input('firstname'),
                    'lastname' => $request->input('lastname'),
                    'email' => $request->input('email')
                ]);

                return Response::json($driverProfil, 200, [], JSON_NUMERIC_CHECK) . 'response code :' . http_response_code();

            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
                $errorCode = $e->getCode();

                return 'Error occured with message :"' . $errorMessage . '" and code : "' . $errorCode . '"';

            }
        }
    }

    public function getDriverId(Request $request){
        $emailInput = $request->input('email');
        $driverId = DB::table('drivers')->where('email',$emailInput )->value('email');
        return $driverId;
    }

}
