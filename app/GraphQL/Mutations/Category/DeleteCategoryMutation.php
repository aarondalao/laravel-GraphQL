<?php

namespace App\GraphQL\Mutations\Category;

use GraphQL\Type\Definition\Type as GraphQLType;
use Rebing\GraphQL\Support\Mutation;
use App\Models\Category;


class DeleteCategoryMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteCategory',
        'description' => 'deletes a category',
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
                'type' => GraphQLType::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {

        $category = Category::findOrFail($args['id']);

        return $category->delete() ? true : false;
    }
}
