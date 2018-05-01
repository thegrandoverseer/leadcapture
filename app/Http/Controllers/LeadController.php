<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use Webpatser\Uuid\Uuid;

class LeadController extends Controller
{
    public function getNewId() {
        return Uuid::generate()->string;
    }

    public function create() {
        $id = $this->getNewId();
        return view('lead.create', compact('id'));
    }

    public function index(Request $request) {
        $leads = Lead::orderBy('last_name', 'asc')->orderBy('first_name', 'asc')->orderBy('email', 'asc')->get();
        return view('lead.list', compact('leads'));
    }
    
    public function updateOrCreate(Request $request) {
        $data = $request->only([
            'id', 
            'first_name', 
            'last_name', 
            'email', 
            'phone', 
            'address', 
            'sqft'
        ]);

        
        // filter empty data so we don't overwrite previously set data if user removes something
        $data = array_filter($data);
        
        
        $lead = Lead::updateOrCreate($request->only(['id']), $data);
        
        if($request->ajax()){
            return response()->json($lead->toArray());
        } else {
            return $lead->toArray();
        }
        
    }
}
