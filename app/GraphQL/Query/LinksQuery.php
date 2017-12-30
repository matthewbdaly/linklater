<?php

namespace LinkLater\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use LinkLater\Eloquent\Models\Link;

class LinksQuery extends Query
{
    protected $attributes = [
        'name' => 'LinksQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Link'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::string()],
            'link' => ['name' => 'link', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (isset($args['id'])) {
            return Link::where('id' , $args['id'])->get();
        } else {
            return Link::all();
        }
    }
}
