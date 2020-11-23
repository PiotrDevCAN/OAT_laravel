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

class OvertimeRequests extends Controller
{
    public function list(Request $request)
    {
//         $predicates = array();
        
        $start = $request->post('start', 0);
        $length = $request->post('length', 10);
//         $page = $request->post('page', 1);
        
//         dump($request->post('start', 0));
//         dump($request->post('length', 10));
//         dump($request->post('page', 1));
        
//         dump($request->all());
        
//         dd();

        $page = $start / $length + 1;
        
        $additionalInput = array('page' => $page);
        $request->merge($additionalInput);
        
//         dump(' page number ');
//         dump($page);
        
        $records = OvertimeRequest::where('status', 'like', 'Awaiting%')
            ->whereNull('delete_flag')
            ->where('weekenddate', '>=', '2020-10-16')
//             ->where($predicates)
//             ->offset($start)
//             ->limit($length)
//             ->get()
            ->paginate($length);
        
//         dump($records);
        
//         dump($records->count());
//         dump($records->currentPage());
//         dump($records->total());
        
//         dd();
        
        $resourceCollection = new OvertimeRequestResourceCollection($records);
        
        $resourceCollection->additional([
            'draw' => 1,
            'recordsTotal' => $records->total(),
            'recordsFiltered' => $records->count()
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
        
        // single update
//         $flight = App\Flight::find(1);
        
//         $flight->name = 'New Flight Name';
        
//         $flight->save();
        
        // mass update
//         App\Flight::where('active', 1)
//             ->where('destination', 'San Diego')
//             ->update(['delayed' => 1]);
        
        return view('components.request.store');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, OvertimeRequest $overtimeRequest)
    {
        $data = array(
            'record' => $overtimeRequest
        );
        
        return view('components.request.show', $data);
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
        return view('components.request.update');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, OvertimeRequest $overtimeRequest)
    {
        
        // destroy action
        $overtimeRequest = new OvertimeRequest;
//         App\Flight::destroy(1);
        
        return view('components.request.destroy');
    }
    
    public function approve(ApproveOvertimeRequest $request, $ref, $lvl, $status, $via)
    {
        // Request approval logic...
        
        $overtimeRequest = OvertimeRequest::find($ref);
        
//         $flight->name = 'New Flight Name';

//         $flight->save();
        
        event(new OvertimeRequestApproved($overtimeRequest));
        
    }

    public function reject(RejectOvertimeRequest $request, $ref, $lvl, $status, $via)
    {
        // Request rejection logic...
        
        $overtimeRequest = OvertimeRequest::find($ref);
        
//         $flight->name = 'New Flight Name';
        
//         $flight->save();
        
        event(new OvertimeRequestRejected($overtimeRequest));
        
    }
}
