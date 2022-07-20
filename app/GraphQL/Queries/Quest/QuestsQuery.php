<?php

namespace App\GraphQL\Queries\Quest;

use App\Models\Quest;
use GraphQL\Type\Definition\Type as GraphQLType;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQl\Support\Facades\GraphQL;

class QuestsQuery extends Query
{
    protected $attributes = [
        'name' => 'Quests',
    ];

    public function type(): GraphQLType
    {
        return GraphQLType::listOf(GraphQL::type('Quest'));
    }

    public function resolve($root, $args)
    {
        return Quest::all();
    }
}
