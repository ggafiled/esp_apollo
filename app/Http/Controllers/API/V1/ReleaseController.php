<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Provider;
use App\Models\Release;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
            $user_provider_release = Release::where('provider_id', $id)->get();
            return $this->sendResponse($user_provider_release, trans('actions.get.success'));
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
            $user_provider = Provider::where('user_id', Auth::id())->where('provider_key', $request->input('provider_key'))->first();
            $asset_name = Str::uuid() . '.' . $request->file('file_path')->getClientOriginalExtension();
            $user_provider_release = Release::create([
                'provider_id' => $user_provider->id,
                'releases_name' => $request->input('releases_name'),
                'file' => $request->file('file_path')->storeAs(
                    $user_provider->provider_key, #$path
                     $asset_name, #$fileName
                    ['disk' => 's3']#$options
                ),
                // 'file' => Storage::disk('s3')->put($user_provider->provider_key . '/' . $asset_name, $request->file('file_path')),
                'file_size' => $request->input('file_size'),
            ]);

            return $this->sendResponse($user_provider_release, trans('actions.created.success'));
        } catch (ValidationException $ex) {
            return $this->sendError([], $ex->getMessage());
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

        // try {
        //     $user_provider = Provider::where('user_id', Auth::id())->where('provider_key', $request->input('provider_key'))->first();
        //     $asset_name = Str::uuid() . '.' . $request->file('file_path')->getClientOriginalExtension();
        //     $user_provider_release = Release::create([
        //         'provider_id' => $user_provider->id,
        //         'releases_name' => $request->input('releases_name'),
        //         'file' => $request->file('file_path')->storeAs(
        //             $user_provider->provider_key, #$path
        //              $asset_name, #$fileName
        //             ['disk' => 's3']#$options
        //         ),
        //         // 'file' => Storage::disk('s3')->put($user_provider->provider_key . '/' . $asset_name, $request->file('file_path')),
        //         'file_size' => $request->input('file_size'),
        //     ]);

        //     return $this->sendResponse($user_provider_release, trans('actions.created.success'));
        // } catch (ValidationException $ex) {
        //     return $this->sendError([], $ex->getMessage());
        // } catch (Exception $ex) {
        //     return $this->sendError([], trans('actions.created.failed'));
        // }
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
            // dd($id);
            $user_provider_release = Release::where('id',$id)->first();
            $provider_current_version = Provider::where('id', $user_provider_release->provider_id)->first();

            if (Storage::disk('s3')->exists($user_provider_release->file)) {
                Storage::disk('s3')->delete($user_provider_release->file);
            }

            if ($user_provider_release->id == $provider_current_version->releases_current_version) {
                $provider_current_version->update([
                    'releases_current_version' => null,
                ]);
            }

            $user_provider_release->delete();

            return $this->sendResponse($user_provider_release, trans('actions.destroy.success'));
        } catch (ValidationException $ex) {
            return $this->sendError([], $ex->getMessage());
        } catch (Exception $ex) {
            return $this->sendError([], trans('actions.destroy.failed'));
        }
    }

}