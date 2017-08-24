<?php

namespace App\Http\Controllers;

use App\UsersProfilsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Response;

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

            return Response::json($userProfil, 200, [], JSON_NUMERIC_CHECK) . 'response code :' . http_response_code();

        } catch (\Exception $e) {
             $errorMessage = $e->getMessage();
             $errorCode = $e->getCode();

             return 'Error occured with message :"' . $errorMessage . '" and code : "' . $errorCode . '"';

        }
    }
}
