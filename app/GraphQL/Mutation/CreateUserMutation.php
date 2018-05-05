<?php

namespace LinkLater\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use LinkLater\Eloquent\Models\User;
use Hash;

class CreateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreateUserMutation',
        'description' => 'Create a user'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'name' => ['name' => 'name', 'type' => Type::nonNull(Type::string())],
            'email' => ['name' => 'email', 'type' => Type::nonNull(Type::string())],
            'password' => ['name' => 'password', 'type' => Type::nonNull(Type::string())],
            'password_confirmation' => ['name' => 'password_confirmation', 'type' => Type::nonNull(Type::string())],
        ];
    }

    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'name' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed'],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if ($user = User::where('email', $args['email'])->first()) {
            return null;
        } else if ($args['password'] != $args['password_confirmation']) {
            return null;
        }
        $args['password'] = Hash::make($args['password']);
        unset($args['password_confirmation']);
        $user = User::create($args);
        return $user;
    }
}
