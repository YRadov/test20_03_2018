<?php

namespace App\Core\Helpers\Responses;


abstract class AApiResp
{
    const SUCCESS = 1;
    const FAIL  = 0;

    public function fail($text)
    {
        return [
			"status" => self::FAIL,
			"error" => $text,
        ];
    }
}//AApiResp