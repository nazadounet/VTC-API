<?php

namespace App\Http\Controllers;

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
                        DB::table('drivers')
                            ->where('id', 1)
                            ->update(["VTCCard" => $path]);
                        echo 'VTCCard path added';
                        break;
                    case "IDCard":
                        DB::table('drivers')
                            ->where('id', 1)
                            ->update(["IDCard" => $path]);
                        echo 'IDCard path added';
                        break;
                    case "driveCard":
                        DB::table('drivers')
                            ->where('id', 1)
                            ->update(["driveCard" => $path]);
                        echo 'driveCard path added';
                        break;
                    case "civilInsurance":
                        DB::table('drivers')
                            ->where('id', 1)
                            ->update(["civilInsurance" => $path]);
                        echo 'civilInsurance path added';
                        break;
                    case "atoutFrance":
                        DB::table('drivers')
                            ->where('id', 1)
                            ->update(["atoutFrance" => $path]);
                        echo 'atoutFrance path added';
                        break;
                    case "KBIS":
                        DB::table('drivers')
                            ->where('id', 1)
                            ->update(["KBIS" => $path]);
                        echo 'KBIS path added';
                        break;

                }
            };
        }
    }

}
