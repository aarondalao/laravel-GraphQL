<?php

// app\graphql\mutations\category\CreateCategoryMutation

namespace App\GraphQL\Mutations\Category;

use App\Models\Category;
use GraphQL\Type\Definition\Type as GraphQLType;
use \Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateCategoryMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createCategory',
        'description' => 'Creates a category'
    ];

    public function type(): GraphQLType
    {
        return GraphQL::type('Category');
    }

    public function args():array{
        return [
            'title' =>[
                'name' => 'title',
                'type' => GraphQLType::nonNull(GraphQLType::string()),
            ]
        ];
    }

    public function resolve($root, $args)
    {
//        create a new class object called category
        $category = new Category();

        // fill the category object with an array of $args
        $category->fill($args);

        //save to the database
        $category->save();

        return $category;
    }
}
