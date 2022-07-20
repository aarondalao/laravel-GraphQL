<?php

namespace App\GraphQL\Mutations\Category;

use GraphQL\Type\Definition\Type as GraphQLType;
use Rebing\GraphQL\Support\Mutation;
use App\Models\Category;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UpdateCategoryMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateCategory',
        'description' => ' updates the category'
    ];

    public function type(): GraphQLType
    {
        return GraphQL::type('Category');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => GraphQLType::nonNull(GraphQLType::int())
            ],
            'title' => [
                'name' => 'id',
                'type' => GraphQLType::nonNull(GraphQLType::string())
            ],

        ];
    }

    public function resolve($root, $args){
        $category = Category::findOrFail($args['id']);
        $category->fill($args);
        $category->save();

        return $category;
    }
}
