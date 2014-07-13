<?php

namespace Bob\BobsCars\Resource\App\Test;

use Mackstar\Spout\Provide\Resource\ResourceObject;

class Example extends ResourceObject
{

    /**
     * @var array
     */
    public $body = [];

    public function onGet($name)
    {
        $this['body'] = [
            'test' => 'This is my test, welcome! ' . $name 
        ];
        return $this;
    }
}