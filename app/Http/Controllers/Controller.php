<?php

namespace App\Http\Controllers;

use App\View\Components\Error;
use App\View\Components\workspace\Send;
use App\View\Components\workspace\Settings;
use App\View\Components\workspace\Upload;
use App\View\Components\workspace\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function workspace(){
        return view('authenticated.workspace');
    }


    public function emailer(){
        return view("emailer");
    }


    public function renderTool(Request $req){
        $page = $req->input('page');
        switch($page){
            case "upload":
                $com = new Upload;
                break;
            case "settings":
                $com = new Settings;
                break;
            case "send":
                $com = new Send;
                break;
            case "view":
                $user = Auth()->user();
                $com = new View( $user );
                break;
            default:
                $com = new Error;
        }

        return $com->render();
    }
}

