<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use Inertia\Inertia;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $type;

    public function __construct(ProductType $pt)
    {
        $this->type = $pt;
    }

    public function index() {
        return Inertia::render('ProductType/TypeIndex');
    }

    public function fetchProductTypes()
    {
        $types = $this->type->orderBy('id', 'desc')->get();
        $columns = collect(['id', 'type_name', 'type_active', 'type_weight']);

        return response()->json([
            'columns' => $columns,
            'types' => $types,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
