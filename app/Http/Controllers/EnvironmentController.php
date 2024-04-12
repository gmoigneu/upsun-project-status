<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnvironmentRequest;
use App\Http\Requests\UpdateEnvironmentRequest;
use App\Models\Environment;

class EnvironmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreEnvironmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Environment $environment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Environment $environment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnvironmentRequest $request, Environment $environment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Environment $environment)
    {
        //
    }
}
