<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Provider;
use App\Models\Release;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ProviderController extends BaseController
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
            $user_provider = Provider::where('user_id', Auth::id())->orderby('created_at', 'DESC')->with('releases')->withCount('releases')->get();
            return $this->sendResponse($user_provider, trans('actions.get.success'));
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
            $user_provider = Provider::where('user_id', Auth::id())->where('provider_key', $id)->orderby('created_at', 'DESC')->with('releases')->withCount('releases')->first();
            return $this->sendResponse($user_provider, trans('actions.get.success'));
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
            $user_provider = User::findOrFail(Auth::id())->providers()->create([
                'provider_name' => $request->input('provider_name'),
            ]);
            return $this->sendResponse($user_provider, trans('actions.created.success'));
        } catch (ValidationException $ex) {
            return $this->sendError([], $ex->getMessage());
        } catch (Exception $ex) {
            return $this->sendError($ex, trans('actions.created.failed'));
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
            $user_provider = User::findOrFail(Auth::id())->providers()->findOrFail($id)->update([
                'provider_name' => $request->input('provider_name'),
            ]);
            return $this->sendResponse($user_provider, trans('actions.updated.success'));
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
            Release::where('provider_id', $id)->delete();
            $user_provider = User::findOrFail(Auth::id())->providers()->findOrFail($id)->delete();
            return $this->sendResponse($user_provider, trans('actions.destroy.success'));
        } catch (ValidationException $ex) {
            return $this->sendError([], $ex->getMessage());
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.destroy.failed'));
        }
    }

}