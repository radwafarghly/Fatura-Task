<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleFormRequest;
use Illuminate\Http\Request;


use App\Http\Response\Resources\RoleResource;
use Dev\Infrastructure\Models\Role;
use App\Http\Response\Utility\ResponseType;
use Dev\Domain\Service\RoleService;

/**
 *
 */
class RoleController extends Controller
{
    /**
     *
     */
    private $roleService;

    /**
     *
     */
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->get('per_page', 15);
        $filter = [];
        if ($request->has('name')) {
            $filter['name'] = $request->get('name');
        }
        $result = $this->roleService->index($filter, $limit);
        if ($result->isEmpty()) {
            return (new RoleResource([]))->additional(ResponseType::simpleResponse('No roles found', false));
        }
        return RoleResource::collection($result)
            ->additional(ResponseType::simpleResponse('Roles result', true));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleFormRequest $request)
    {
        $data = $request->validated();
        return (new RoleResource($this->roleService->create($data)))->additional(ResponseType::simpleResponse(trans('messages.role-add'), true));
    }

    /**
     * Display the specified resource.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return (new RoleResource($this->roleService->show($role->id)))->additional(ResponseType::simpleResponse('Role item', true));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(RoleFormRequest $request, Role $role)
    {
        $data = $request->validated();
        return (new RoleResource($this->roleService->update($role, $data)))->additional(ResponseType::simpleResponse(trans('messages.role-update'), true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if ($role->users()->exists()) {
            return (new RoleResource([]))->additional(ResponseType::simpleResponse(trans('messages.can-not-delete'), true));        

        }else{
            $this->roleService->delete($role);
            return (new RoleResource([]))->additional(ResponseType::simpleResponse(trans('messages.role-deleted'), true)); 
        }
               
    }


     /**
     *
     */
    public function getAllRoles()
    {
        $result = $this->roleService->getAllRoles();
        if ($result->isEmpty()) {
            return (new RoleResource([]))->additional(ResponseType::simpleResponse('No roles found', false));
        }
        return RoleResource::collection($result)
            ->additional(
                ResponseType::simpleResponse('All roles result', true));
    }



}