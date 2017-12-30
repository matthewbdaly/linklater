<?php

namespace LinkLater\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use LinkLater\Eloquent\Models\Link;
use Illuminate\Contracts\Auth\Guard;

class CreateLinkMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreateLinkMutation',
        'description' => 'Create a link'
    ];

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function type()
    {
        return GraphQL::type('Link');
    }

    public function args()
    {
        return [
            'link' => ['name' => 'link', 'type' => Type::nonNull(Type::string())],
            'title' => ['name' => 'title', 'type' => Type::nonNull(Type::string())] 
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (!$user = $this->auth->user()) {
            return null;
        }
        $args['user_id'] = $user->id;
        $link = new Link($args);
        return $link;
    }
}
