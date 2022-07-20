<?php

namespace App\GraphQL\Mutations\Quest;

use GraphQL\Type\Definition\Type as GraphQLType;
use Rebing\GraphQL\Support\Mutation;
use App\Models\Quest;


class DeleteQuestMutation extends Mutation
{

    protected $attributes = [
        'name' => 'deleteQuest',
        'description' => 'deletes a quest'
    ];

    public function type(): GraphQLType
    {
        return GraphQLType::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => GraphQLType::nonNull(GraphQLType::int()),
                'rules' => ['exists:quests']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $category = Quest::findOrFail($args['id']);
        return $category->delete() ? true : false;
    }


}
