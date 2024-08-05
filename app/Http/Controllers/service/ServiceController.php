<?php

namespace App\Http\Controllers\service;

use App\Http\Controllers\Controller;
use App\Models\Requests;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    public function index(){

        $pendingRequestsCount = Requests::where('service_status', 'en attente')->count();

        return view('service.dashboard',compact('pendingRequestsCount')) ;
    }
}
