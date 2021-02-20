<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class CustomersController extends Controller
{
    public function paginate(Request $request)
    {
            if(isSet($request->customersPerPage)){
                $customersPerPage = $request->customersPerPage;
            }else{
                $customersPerPage = 20;
            }
            $customers = User::paginate($customersPerPage);
            return response()->json($customers);
    }

    public function getTodayAverage(){
        $count = User::where('created_at','>=', Carbon::now()->subDay(1))->count();
        return $count;
    }

    public function getLastWeekAverage(){
        $count = User::where('created_at','>=', Carbon::now()->subWeek(1))->count();
        return $count;
    }
    public function getLastMonthAverage(){
        $count = User::where('created_at','>=', Carbon::now()->subMonth(1))->count();
        return $count;

    }

    public function getLastThreeMonthsAverage(){
        $count = User::where('created_at','>=', Carbon::now()->subMonth(3))->count();
        return $count;

    }
    public function getLastYearAverage(){
        $count = User::where('created_at','>=', Carbon::now()->subYear(1))->count();
        return $count;
    }



}
