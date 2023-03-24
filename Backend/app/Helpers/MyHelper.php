<?php
namespace App\Helpers;
use Illuminate\Support\Str;
use App\Models\Employee;


class MyHelper
{
    public static function email($name, $lastName,$country)
    {
       
       $lastNameFormat=Str::replace(' ', '',$lastName);
        if($country==='COLOMBIA'){
            
            $email=$name.".".$lastNameFormat."@jvntecnolgias.com";
            
        }
        if($country==='ESTADOS UNIDOS'){
            
            $email=$name.".".$lastNameFormat."@jvntecnolgias.com.us";
        }

        return $email;
        
    }

    public static function validateEmail($email){
        $existingEmail = Employee::where('email',$email)->first();
        if($existingEmail){
            $em=explode("@", $email);
            $ema=substr($em[0],0,-2);
            $count = Employee::
            selectRaw('count(*) as total')
            ->where('email','like',$ema.'%')
            ->value('total')+1;
            $emailValidate=Str::replace('@jvntecnolgias.com', $count.'@jvntecnolgias.com',$email); 
        }
        else{
            $emailValidate=$email;
        }

        return $emailValidate;
    }
    
}