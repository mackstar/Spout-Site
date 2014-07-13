<?php

namespace Bob\BobsCars\Resource\Page\Cars;

use BEAR\Resource\ResourceObject;
use BEAR\Sunday\Inject\ResourceInject;

class Detail extends ResourceObject
{
    use ResourceInject;

    /**
     * @var array
     */
    public $body = [
        'greeting' =>  ''
    ];

    public function onGet($id)
    {
        $this['greeting'] = 'Hello ' . $id;
        return $this;
    }
}