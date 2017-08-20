<?php

namespace App\Http\Controllers;

use App\UsersProfilsModel;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
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
                $fileName = $driverId . '-' . $fileKey[0] . '.' . $file->getClientOriginalExtension();
                var_dump($fileName);
                $path = storage_path('app/public/driverFile/' . $driverId);
                $file->move($path, $fileName);
            };
        }
    }

}
