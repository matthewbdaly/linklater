<?php

namespace LinkLater\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use LinkLater\Eloquent\Models\Link;
use Illuminate\Support\Facades\Auth;

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
            'title' => ['name' => 'title', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $query = Link::where('user_id', Auth::user()->id);
        if (isset($args['id'])) {
            return $query->where('id' , $args['id'])->get();
        } else {
            return $query->get();
        }
    }
}
