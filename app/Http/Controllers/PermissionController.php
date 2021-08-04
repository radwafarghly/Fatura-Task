<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Dev\Domain\Service\PermissionService;
use App\Http\Response\Resources\CategoryResource;
use App\Http\Response\Resources\PermissionResource;
use App\Http\Response\Utility\ResponseType;
use Dev\Infrastructure\Models\Permission;

/**
 *
 */
class PermissionController extends Controller
{
    /**
     *
     */
    private $permissionService;

    /**
     *
     */
    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $result = $this->permissionService->index();
        if ($result->isEmpty()) {
            return (new PermissionResource([]))->additional(ResponseType::simpleResponse('No Permissions found', false));
        }
        return PermissionResource::collection($result)
            ->additional(ResponseType::simpleResponse('Permissions result', true));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  Permission  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        
             
    }
}