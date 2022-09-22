<?php

namespace App\Http\Controllers\Api;

use App\Models\Plate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlateRequest;
use App\Http\Resources\PlateResource;

class PlateController extends Controller
{
    //
    public function index(){

        $orderColumn = request('order_column', 'plate');
        if (!in_array($orderColumn, ['plate', 'owner', 'start_date', 'end_date'])) {
            $orderColumn = 'plate';
        }

        $orderDirection = request('order_direction', 'asc');
        if (!in_array($orderDirection, ['asc', 'desc'])) {
            $orderDirection = 'asc';
        }

        // Using plate != null to get all plates at the lack of time to get a better solution
        // since Plate:all() was not working with the orderby function
        $plates = Plate::where('plate','!=', null)
            ->orderby($orderColumn, $orderDirection)
            ->get();
        
        return PlateResource::collection($plates);
    }

    public function store(StorePlateRequest $request){

        $post = Plate::create($request->validated());

        // AM_NOTE: add response codes
        // 200 valid request
        // 400 request malformed
        // 422 invalid german plate
        return new PlateResource($post);
    }
}
