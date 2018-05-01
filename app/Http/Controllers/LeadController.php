<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use Webpatser\Uuid\Uuid;

class LeadController extends Controller
{

    public $maxPageSize = 100;

    public function getNewId() {
        return Uuid::generate()->string;
    }

    public function create() {
        $id = $this->getNewId();
        $title = 'Get Your Free Comparative Market Analysis';
        return view('lead.create', compact('id', 'title'));
    }

    public function index(Request $request) {
        $itemsPerPage = min(request('page_size', 20), $this->maxPageSize);
        $leads = Lead::orderBy('last_name', 'asc')->orderBy('first_name', 'asc')->orderBy('email', 'asc')->paginate($itemsPerPage);
        $title = 'Lead Dashboard';
        return view('lead.list', compact('leads', 'title'));
    }
    
    public function show($id, Request $request) {

        $lead = Lead::findOrFail($id);
        $title = 'Lead Detail';
        return view('lead.detail', compact('lead', 'title'));
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
            return redirect('/')->with('submitted', 'true'); //$lead->toArray();
        }
        
    }
}
