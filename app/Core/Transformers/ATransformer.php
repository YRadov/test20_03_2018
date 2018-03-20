<?php

namespace App\Core\Transformers;


abstract class ATransformer
{
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