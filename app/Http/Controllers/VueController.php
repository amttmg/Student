<?php
/**
 * Created by PhpStorm.
 * User: amrit
 * Date: 5/29/17
 * Time: 9:39 AM
 */
namespace App\Http\Controllers;

class VueController extends Controller
{

    /**
     * VueController constructor.
     */
    public function __construct()
    {

    }
    public function index(){
        return view('vue.vue');
    }
}
