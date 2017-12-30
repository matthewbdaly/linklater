<?php

namespace LinkLater\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class Link extends BaseType
{
    protected $attributes = [
        'name' => 'Link',
        'description' => 'A link'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the link'
            ],
            'link' => [
                'type' => Type::string(),
                'description' => 'The link'
            ] 
        ];
    }
}
