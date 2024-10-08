<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;



class CalculatorController extends Controller
{


    public function add(Request $request)
    {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
       $result = $num1 + $num2;
        return view('prelim-raymund.add', compact('result'));
        
    }
    public function sub(Request $request)
    {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $result = $num1 - $num2;
        return view('prelim-raymund.sub',compact('result'));
    }

    public function multiply(Request $request)
    {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $result = $num1 * $num2;
        return view('prelim-raymund.multiply', compact('result'));
    }


    
    public function divide(Request $request){
        

        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $result =  $num1 / $num2;
        
    
        if ($num2 == 0 ) {
            return view('prelim-raymund.divide', ['result' => 'Error: Division by zero!']);
        }if ($num1 == 0) {
            return view('prelim-raymund.divide', ['result' => 'Error: Division by zero!']);
        } else {
            $result = $num1 / $num2;
            return view('prelim-raymund.divide', ['result' => $result]);
        }
        
    }    
   
}
