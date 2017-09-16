<?php

namespace App\Http\Controllers;

use App\driver;
use App\UsersProfilsModel;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class uploadFileCtrl extends Controller
{

    public function store(Request $request)
    {
        $driverFile = [];
        if($request->hasFile('VTCCard', 'driveCard')){

            $driverId = $request->input('id');
            $fileArray = $request->allFiles();

            foreach ($fileArray as $file){
                $fileKey = array_keys($fileArray, $file);
                $fileName = $driverId . '-' . $fileKey[0] . '.' . $file[0]->getClientOriginalExtension();
                $path = storage_path('app/public/driverFile/' . $driverId);
                $file[0]->move($path, $fileName);

                switch ($fileKey[0]) {
                    case "VTCCard":
                        driver::where('id', $driverId)
                                ->update(["VTCCard" => $path]);
                        break;
                    case "IDCard":
                        driver::where('id', $driverId)
                                ->update(["IDCard" => $path]);
                        break;
                    case "driveCard":
                        driver::where('id', $driverId)
                                ->update(["driveCard" => $path]);
                        break;
                    case "civilInsurance":
                        driver::where('id', $driverId)
                                ->update(["civilInsurance" => $path]);
                        break;
                    case "atoutFrance":
                        driver::where('id', $driverId)
                                ->update(["atoutFrance" => $path]);
                        break;
                    case "KBIS":
                        driver::where('id', $driverId)
                                ->update(["KBIS" => $path]);
                        break;
                }
            };
        driver::where('id', $driverId)->update(["status" => 1]);
        return ["statuCode" => 200, "message" => "All file's path added", "driver's status = 1"];
        }
    }

}
