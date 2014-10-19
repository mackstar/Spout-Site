<?php

namespace Mackstar\Site\Resource\Page\Blog;

use BEAR\Resource\ResourceObject;
use BEAR\Sunday\Inject\ResourceInject;

class Index extends ResourceObject
{
    use ResourceInject;

    public function onGet($page = '0')
    {
        $pp = 10;
        $blogItems = $this->resource->get->uri('app://spout/resources/listing')
            ->withQuery([
                'type' => 'blog',
                'sort' => 'updated',
                'direction' => 'DESC',
                'limit' => $pp + 1,
                'offset' => $pp * $page
            ])
            ->eager
            ->request()['resources'];

        if (count($blogItems) > $pp) {
            unset($blogItems[$pp]);
            $next = true;
        }
        $this['blogs'] = $blogItems;

        $this['_meta'] = [
            'next' => (isset($next))? $page + 1 : false,
            'previous' => ($page !== 0)? $page - 1 : false
        ];


        return $this;
    }
}