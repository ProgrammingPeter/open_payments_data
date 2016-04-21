<?php

namespace App\Http\Controllers;

use App\OpenPayment;
use App\Http\Controllers\Controller;
use Illuminate\Http;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

class OpenPaymentController extends Controller
{
    // Get Open Payments by user input
    public function getByInput($userInput)
    {
        if (!ctype_alpha($userInput)) {
            return new Http\Response("Incorrect input for search. Please search by First Or Last Name", 400);
        }

        $openPayments = OpenPayment::where('physician_first_name', 'like', '%' . $userInput . '%')->orWhere('physician_last_name', 'like', '%' . $userInput . '%')->get();

		return new JsonResponse($openPayments, 200);
    }
} 