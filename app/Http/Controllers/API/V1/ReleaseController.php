<?php

namespace App\Http\Controllers\API\V1;

use Exception;
use App\Models\Provider;
use App\Models\Release;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ReleaseController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user_provider = Provider::where('user_id', Auth::id())->first();
            $user_provider_release = Release::where('provider_id', $user_provider->id)->get();
            return $this->sendResponse($user_provider_release, trans('actions.get.success'));
        } catch (ValidationException $ex) {
            return $this->sendError([], $ex->getMessage());
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.get.failed'));
        }
    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        try {
            return $this->sendResponse([], trans('actions.get.success'));
        } catch (ValidationException $ex) {
            return $this->sendError([], $ex->getMessage());
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
            $user_provider = Provider::where('user_id', '=', Auth::id())->where('provider_key', '=', $request->input('provider_key'))->first();
            $user_provider_release = Release::create([
                'provider_id' => $user_provider->id,
                'releases_name' => $request->input('releases_name'),
                'file' => $request->input('file') || "",
                'file_size' => $request->input('file_size') || "",

            ]);

            return $this->sendResponse($user_provider_release, trans('actions.created.success'));
        } catch (ValidationException $ex) {
            return $this->sendError([], $ex->getMessage());
        } catch (Exception $ex) {
            return $this->sendError([], $ex->getMessage());
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
            return $this->sendResponse([], trans('actions.updated.success'));
        } catch (ValidationException $ex) {
            return $this->sendError([], $ex->getMessage());
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.updated.failed'));
        }
    }

    /**
     * Destroy the resource in storage
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function destroy($id)
    {
        try {
            $user_provider_release = Release::findOrFail($id)->delete();
            return $this->sendResponse($user_provider_release, trans('actions.destroy.success'));
        } catch (ValidationException $ex) {
            return $this->sendError([], $ex->getMessage());
        } catch (Exception $ex) {
            return $this->sendError([], $ex->getMessage());
        }
    }

}