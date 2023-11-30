<?php
//php artisan make:controller UserProfileController --invokable
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()//Request $request)
    {
        //ONLY ONE FUNCTION---CANNOT HAVE MORE
        #echo "Request details:";
        #echo $request;
        #echo "<br>";
        return "Single Action Controller Successful";
    }
}
