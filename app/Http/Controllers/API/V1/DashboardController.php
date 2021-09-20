<?php

namespace App\Http\Controllers\API\V1;

use Exception;
use App\Models\user;
use DB;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
            //จะทำให้ดูอันเดียวจากนั้นถ้าจะเพิ่มก็เพิ่มใน array เอา
            $dashboard = [
                'building' => 0,
                'constarution' => 0,
                'progress' => 0,
                'user' => 0,
                'planing' => 0,
                'chart_dp_groub_of_countyName' => [],
                'chart_dp_groub_of_progress' => [
                    'FM Progress' => [10,5,4,7,8,6,3],
                    'TOT Progress' => [10,5,4,7,8,6,3],
                    'AIS Progress' => [10,5,4,7,8,6,3],
                    '3BB Progress' => [10,5,4,7,8,6,3],
                    'SINET Progress' => [10,5,4,7,8,6,3],
                    'FN Progress' => [10,5,4,7,8,6,3],
                    'TRUE Progress' => [10,5,4,7,8,6,3],
                ],
            ];
            return $this->sendResponse($dashboard, trans('actions.get.success'));
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
    }
}