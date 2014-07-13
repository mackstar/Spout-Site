<?php

namespace Bob\BobsCars\Resource\Page\Blog;

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
        $this['blog_posts'] = $this->resource->get->uri('app://spout/resources/index')
            ->eager
            ->withQuery(['type' => 'blog'])
            ->request();;
        return $this;
    }
}