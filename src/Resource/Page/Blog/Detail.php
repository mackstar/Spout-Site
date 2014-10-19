<?php

namespace Mackstar\Site\Resource\Page\Blog;

use BEAR\Resource\ResourceObject;
use BEAR\Sunday\Inject\ResourceInject;

class Detail extends ResourceObject
{
    use ResourceInject;

    public function onGet($slug)
    {
        $blog = $this->resource->get->uri('app://spout/resources/detail')
            ->eager
            ->withQuery(['type' => 'blog', 'slug' => $slug])
            ->request()['resource'];

        $user_id = $blog['user_id'];

        $this['blog'] = $blog;

        // $this['user'] = $this->resource->get->uri('app://spout/users/detail')
        //     ->eager
        //     ->withQuery(['id' => $user_id])
        //     ->request()['resource'];

        return $this;
    }
}