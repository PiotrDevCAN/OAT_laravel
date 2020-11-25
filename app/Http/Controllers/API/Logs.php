<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Log;

class Logs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function list(Request $request)
    {
        $draw = $request->post('draw', 1);
        
        $start = $request->post('start', 0);
        $length = $request->post('length', OvertimeRequest::$limit);
        
        $status = $request->post('requestType', '');
        
        $page = $start / $length + 1;
        
        $additionalInput = array('page' => $page);
        $request->merge($additionalInput);
        
        $predicates = array();
        
        switch ($status) {
            case 'awaitingTable':
                $records = OvertimeRequest::awaiting($predicates, $page);
                break;
            case 'approvedTable':
                $records = OvertimeRequest::approved($predicates, $page);
                break;
            case 'otherTable':
                $records = OvertimeRequest::other($predicates, $page);
                break;
            default:
                $records = array();
                break;
        }
        
        $resourceCollection = new OvertimeRequestResourceCollection($records);
        
        $resourceCollection->additional([
            'draw' => $draw,
            'recordsTotal' => $records->total(),
            'recordsFiltered' => $records->total()
        ]);
        
        return $resourceCollection;
    }
    */
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $log = new Log([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'description'  => $request->get('description'),
            'active'  => $request->get('active')
        ]);
        $log->save();
        return response()->json($log);
    }

    /**
     * Display the specified resource.
     *
     * @param Log $log
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Log $log)
    {
        return response()->json($log);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Log $log
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Log $log)
    {
        $log->name = $request->get('name');
        $log->price = $request->get('price');
        $log->description = $request->get('description');
        $log->active = $request->get('active');
        $log->save();
        return response()->json($log);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Log $log
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Log $log)
    {
        $log->delete();
        return response()->json(['message' => 'Product deleted']);
    }
}
