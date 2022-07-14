<?php

namespace App\GraphQL\Queries\Quest;

use App\Models\Quest;
use GraphQL\Type\Definition\Type as GraphQLType;
use phpDocumentor\Reflection\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQl\Support\Facades\GraphQL;

class QuestsQuery extends Query
{
    protected $attributes = [
        'name' => 'quests',
    ];

    public function type(): GraphQLType
    {
        return Type::listOf(GraphQL::type('Quests'));
    }

    public function resolve($root, $args)
    {
        return Quest::all();
    }
}
