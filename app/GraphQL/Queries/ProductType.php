<?php

namespace App\GraphQL\Queries;

final class ProductType
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $types = \App\Models\ProductType::orderBy('id', 'desc')->get();
        //$columns = collect(['id', 'type_name', 'type_active', 'type_weight']);

        return response()->json([
            'productTypes' => $types,
        ]);
    }
}
