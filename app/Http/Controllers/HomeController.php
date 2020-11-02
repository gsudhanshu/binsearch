<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['user'=> Auth::user()]);
    }

    /**
     * Perform Binary Search and return result as message
     */
    public function search(Request $request) {
        $items_array = $request->input('arr');
        $items_array = explode(',',$items_array);
        if(count($items_array) == 0) {
            //no element
            $message = "Comma Separated Values required to perform search";
        } else {
            $item = $request->input('srch_element');
            if(!isset($item)) {
                $message = "Please enter a valid value for Search Element";
            } else {
                $left = 0;
                $right = count($items_array) - 1;
                $message = "Search Element not found!";
                sort($items_array);
                while($left <= $right) {
                    $mid = (int) (($left+$right)/2);
                    if($items_array[$mid] == $item) {
                        $message = "Search Element found at ".($mid+1)." position in the sorted list";
                        break;
                    } elseif ($items_array[$mid] > $item) {
                        $right = $mid - 1;
                    } else {
                        $left = $mid + 1;
                    }
                }
            }
        }
        return view('home', ['message' => $message]);
    }

}
