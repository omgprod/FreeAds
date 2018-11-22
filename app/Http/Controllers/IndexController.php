<?php
/**
 * Created by PhpStorm.
 * User: omg-p
 * Date: 21/10/2018
 * Time: 11:27
 */

namespace App\Http\Controllers;


class IndexController extends Controller
{
    public function showIndex()
    {
        return view('default');
    }
}
