<?php

namespace App\Core\Transformers;


abstract class ATransformer
{
	const SUCCESS = 1;
	const FAIL  = 0;

	protected $guard = [];

    abstract public function toArray();

    public function toJson()
    {
        return json_encode($this->toArray());
    }

    public function __toString()
    {
        return $this->toJson();
    }

}//ATransformer