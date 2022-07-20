<?php

namespace App\GraphQL\Mutations\Quest;

use GraphQL\Type\Definition\Type as GraphQLType;
use Rebing\GraphQL\Support\Mutation;
use App\Models\Quest;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UpdateQuestMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateQuest',
        'description' => 'updates a quest'
    ];

    public function type(): GraphQLType
    {
        return GraphQL::type('Quest');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => GraphQLType::nonNull(GraphQLType::int()),
            ],

            'title' => [
                'name' => 'title',
                'type' => GraphQLType::nonNull(GraphQLType::string()),
            ],

            'description' => [
                'name' => 'description',
                'type' => GraphQLType::nonNull(GraphQLType::string()),
            ],

            'reward' => [
                'name' => 'reward',
                'type' => GraphQLType::nonNull(GraphQLType::int()),
            ],

            'category_id' => [
                'name' => 'category_id',
                'type' => GraphQLType::nonNull(GraphQLType::int()),
                'rules' => ['exists:categories,id']
            ],
        ];
    }

    public function resolve($root, $args){
        $quest = Quest::findOrFail($args['id']);
        $quest->fill($args);
        $quest->save();

        return $quest;

    }
}
