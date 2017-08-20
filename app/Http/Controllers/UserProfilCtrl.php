<?php

namespace App\Http\Controllers;

use App\UsersProfilsModel;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserProfilCtrl extends Controller
{

    public function store(Request $request)
    {
        try {
            $userProfil = UsersProfilsModel::create([
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'sexe' => $request->input('sexe')
            ]);

            return \Illuminate\Support\Facades\Response::json($userProfil, 200, [], JSON_NUMERIC_CHECK) . 'response code :' . http_response_code();

        } catch (\Exception $e) {
             $errorMessage = $e->getMessage();
             $errorCode = $e->getCode();

             return 'Error occured with message :"' . $errorMessage . '" and code : "' . $errorCode . '"';

        }

    }
}
