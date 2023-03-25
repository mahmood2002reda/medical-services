<?php

function isNotEmpty($value){

    if(!empty($value))
    {
        return true;
    }

    return false ; 

}

function ValidEmail($email){

    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){// if email not same the basck eamil return  not email
        return false ; 
    }
    return true ;
}


function checkless($value,$min){

if(trim(strlen($value))<=$min){

return false ;

}


    return true ;


}
function sanitizeString($string)
    {
        $string = trim($string);
        $string = filter_var($string,FILTER_SANITIZE_STRING);
        return $string;
    }
function check_duplicate($email){
    
}