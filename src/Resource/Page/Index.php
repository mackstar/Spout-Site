<?php

namespace Bob\BobsCars\Resource\Page;

use BEAR\Resource\ResourceObject;
use BEAR\Sunday\Inject\ResourceInject;

class Index extends ResourceObject
{
    use ResourceInject;

    /**
     * @var array
     */
    public $body = [
        'greeting' =>  ''
    ];

    public function onGet()
    {
        $this['greeting'] = 'Welcome';
        return $this;
    }
}