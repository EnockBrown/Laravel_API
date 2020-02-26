<?php

namespace App;

class SendCode
{
    public static function sendCode($phone){
        $code=rand(1111,9999);
        $nexmo=app('Nexmo\Client');
        $nexmo->message()->send([
            'to'=>'+254'.(int)$phone,
            'from'=>'Enock',
            'text'=>'Verification Code: '.$code,
        ]);
        return $code;
    }
}
