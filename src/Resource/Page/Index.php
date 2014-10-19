<?php

namespace Mackstar\Site\Resource\Page;

use BEAR\Resource\ResourceObject;
use BEAR\Sunday\Inject\ResourceInject;

class Index extends ResourceObject
{
    use ResourceInject;

    public function onGet($slug = 'about')
    {
        $this['page'] = $this->resource->get->uri('app://spout/resources/detail')
            ->eager
            ->withQuery(['type' => 'page', 'slug' => $slug])
            ->request()['resource'];
        return $this;
    }
}