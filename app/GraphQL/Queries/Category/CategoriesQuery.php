<?php

namespace App\GraphQL\Queries\Category;

use App\Models\Category;
use GraphQL\Type\Definition\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class CategoriesQuery extends Query
{

    protected $attributes = ['id'=> 'categories'];

    public function type(): GraphQLType
    {
        return Type::listOf(GraphQL::type('categories'));
    }

    public function resolve($root, $args)
    {
        return Category::all();
    }
}
