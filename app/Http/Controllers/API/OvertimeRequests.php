<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OvertimeRequest;
use App\Events\OvertimeRequestApproved;
use App\Events\OvertimeRequestRejected;
use App\Http\Requests\CreateOvertimeRequest;
use App\Http\Requests\ApproveOvertimeRequest;
use App\Http\Requests\RejectOvertimeRequest;
use App\Http\Resources\OvertimeRequestResourceCollection;
use App\Events\OvertimeRequestFlowChanged;
use App\Http\Requests\ChangeFlowOvertimeRequest;
use App\Http\Resources\OvertimeRequestResource;

class OvertimeRequests extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOvertimeRequest $request)
    {
        $overtimeRequest = new OvertimeRequest();
        
//         $overtimeRequest = new OvertimeRequest([
//             'name' => $request->get('name'),
//             'price' => $request->get('price'),
//             'description'  => $request->get('description'),
//             'active'  => $request->get('active')
//         ]);
//         $overtimeRequest->save();
        
        return response()->json($overtimeRequest);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, OvertimeRequest $overtimeRequest)
    {
        $resource = new OvertimeRequestResource($overtimeRequest);
        
        return $resource;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OvertimeRequest $overtimeRequest)
    {
//         $overtimeRequest->name = $request->get('name');
//         $overtimeRequest->price = $request->get('price');
//         $overtimeRequest->description = $request->get('description');
//         $overtimeRequest->active = $request->get('active');
//         $overtimeRequest->save();
        
        return response()->json($overtimeRequest);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, OvertimeRequest $overtimeRequest)
    {
        $overtimeRequest->delete();
        return response()->json(['message' => 'Overtime Request deleted']);
    }
    
    public function approve(ApproveOvertimeRequest $request, $ref, $lvl, $status, $via)
    {
        // Request approval logic...
        
        $overtimeRequest = OvertimeRequest::find($ref);
        
//         $flight->name = 'New Flight Name';

//         $flight->save();
        
        event(new OvertimeRequestApproved($overtimeRequest));
        
        return response()->json(['message' => 'Overtime Request has been approved']);
    }

    public function reject(RejectOvertimeRequest $request, $ref, $lvl, $status, $via)
    {
        // Request rejection logic...
        
        $overtimeRequest = OvertimeRequest::find($ref);
        
//         $flight->name = 'New Flight Name';
        
//         $flight->save();
        
        event(new OvertimeRequestRejected($overtimeRequest));
        
        return response()->json(['message' => 'Overtime Request has been rejected']);
    }
    
    public function changeFlow(ChangeFlowOvertimeRequest $request, $ref, $lvl, $status, $via)
    {
        // Request rejection logic...
        
        $overtimeRequest = OvertimeRequest::find($ref);
        
        //         $flight->name = 'New Flight Name';
        
        //         $flight->save();
        
        event(new OvertimeRequestFlowChanged($overtimeRequest));
        
        return response()->json(['message' => 'Approval Flow in Overtime Request has been changed']);
    }
}
