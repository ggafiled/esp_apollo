<?php

namespace App\Http\Controllers\API\V1;

use Exception;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends BaseController
{
    protected $role = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Role $role)
    {
        $this->middleware('auth:api');
        $this->role = $role;
        $this->middleware('role:superadministrator|administrator')->only(['store', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if (!\Gate::allows('isAdmin')) {
                return $this->unauthorizedResponse();
            }
            $roles = $this->role->latest()->with(['permissions' => function ($query) {
                $query->select('id', 'name as text');
            }])->get();
            return $this->sendResponse($roles, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.get.failed'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {

        try {
            if (!\Gate::allows('isAdmin')) {
                return $this->unauthorizedResponse();
            }
            $roles = $this->role->paginate(20);
            return $this->sendResponse($roles, trans('actions.get.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.get.failed'));
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        try {
            $roles = $this->role->create([
                'name' => strtolower($request->get('name')),
                'display_name' => $request->get('display_name'),
                'description' => $request->get('description')
            ]);

            // update pivot table
            $permission_ids = [];
            foreach ($request->get('permissions') as $permission) {
                $permission_ids[] = $permission['id'];
            }
            $roles->syncPermissions($permission_ids);
            return $this->sendResponse($roles, trans('actions.created.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.created.failed'));
        }
    }

    /**
     * Update the resource in storage
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {

        try {
            $roles = $this->role->findOrFail($id);

            $roles->update($request->all());

            // update pivot table
            $permission_ids = [];
            foreach ($request->get('permissions') as $permission) {
                $permission_ids[] = $permission['id'];
            }
            $roles->syncPermissions($permission_ids);
            return $this->sendResponse($roles, trans('actions.updated.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.updated.failed'));
        }
    }

    public function destroy($id)
    {
        try {
            $this->authorize('isAdmin');
            $roles = $this->role->findOrFail($id);
            $roles->delete();
            return $this->sendResponse($roles, trans('actions.destroy.success'));
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.destroy.failed'));
        }
    }
}