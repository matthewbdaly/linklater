<?php

namespace LinkLater\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use LinkLater\Contracts\Repositories\Link;
use LinkLater\Contracts\Services\Fetcher;
use Illuminate\Contracts\Auth\Guard;

class CreateLinkMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreateLinkMutation',
        'description' => 'Create a link'
    ];

    public function __construct(Guard $auth, Link $repository, Fetcher $fetcher)
    {
        $this->auth = $auth;
        $this->repository = $repository;
        $this->fetcher = $fetcher;
    }

    public function type()
    {
        return GraphQL::type('Link');
    }

    public function args()
    {
        return [
            'link' => ['name' => 'link', 'type' => Type::nonNull(Type::string())],
        ];
    }

    public function rules()
    {
        return [
            'link' => ['required', 'url'],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (!$user = $this->auth->user()) {
            return null;
        }
        $args['user_id'] = $user->id;
        $args['title'] = $this->fetcher->fetch($args['link']);
        $link = $this->repository->create($args);
        return $link;
    }
}
