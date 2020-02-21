<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\civil;

class civilController extends Controller
{
    public function index()
    {
        //echo "<pre>";print_r($request->all());exit;
        $Civil = civil::select('civil_case_no','party_name','p_father_name','p_age','p_address','p_phone_no','opponent_name','o_father_name','o_age','o_address','o_phone_no','case_history','decision','documents','lawyer_req')->where('deleted_at', '=', NULL)->get(); 
        $CivilArray = array();
        foreach($Civil as $value){
          $CivilArray[] = [
            "civil_case_no" => $value->civil_case_no,
            "party_name" => $value->party_name,
            "p_father_name" => $value->p_father_name,
            "p_age" => $value->p_age,
            "p_address" => $value->p_address,
            "p_phone_no" => $value->p_phone_no,
            "opponent_name" => $value->opponent_name,
            "o_father_name" => $value->o_father_name,
            "o_age" => $value->o_age,
            "o_address" => $value->o_address,
            "o_phone_no" => $value->o_phone_no,
            "case_history" => $value->case_history,
            "decision" => $value->decision,
            "documents" => $value->documents,
            "lawyer_req" => $value->lawyer_req,
            
          ];
        }
        return response::json(['error' => false, 'message' =>"success", "Result" => $Civil]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formdata=$request->all();
       // echo"<pre>"; print_r($formdata);exit;
       $document= $formdata["documents"];
        $doc_name = $document->getClientOriginalName();
        $document->move(public_path() . '/documents/', $doc_name);
        $documents= url('/') . '/documents/' . $doc_name;

        civil::create([
        'civil_case_no'=> $formdata['civil_case_no'],
        'party_name'=> $formdata['party_name'],
        'p_father_name'=> $formdata['p_father_name'],
        'p_age'=> $formdata['p_age'],
        'p_address'=> $formdata['p_address'],
        'p_phone_no'=> $formdata['p_phone_no'],
        'opponent_name'=> $formdata['opponent_name'],
        'o_father_name'=> $formdata['o_father_name'],
        'o_age'=> $formdata['o_age'],
        'o_address'=> $formdata['o_address'],
        'o_phone_no'=> $formdata['o_phone_no'],
        'case_history'=> $formdata['case_history'],
        'decision'=> $formdata['decision'],
        'documents'=> $documents,
        'lawyer_req'=> $formdata['lawyer_req'],
        ]
    );
return Response::json(['message'=>"stored successfully"]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MODELS\civil  $civil
     * @return \Illuminate\Http\Response
     */
    public function show($civil_id)
    {
       //echo "<pre>";print_r($request->all());exit;
       $Civil = civil::select('civil_case_no','party_name','p_father_name','p_age','p_address','p_phone_no','opponent_name','o_father_name','o_age','o_address','o_phone_no','case_history','decision','documents','lawyer_req')->where('civil_id', $civil_id)->first(); 
       $CivilArray = array();
       foreach($Civil as $value){
         $CivilArray[] = [
           "civil_case_no" => $value->civil_case_no,
           "party_name" => $value->party_name,
           "p_father_name" => $value->p_father_name,
           "p_age" => $value->p_age,
           "p_address" => $value->p_address,
           "p_phone_no" => $value->p_phone_no,
           "opponent_name" => $value->opponent_name,
           "o_father_name" => $value->o_father_name,
           "o_age" => $value->o_age,
           "o_address" => $value->o_address,
           "o_phone_no" => $value->o_phone_no,
           "case_history" => $value->case_history,
           "decision" => $value->decision,
           "documents" => $value->documents,
           "lawyer_req" => $value->lawyer_req,
           
         ];
       }
       return response::json(['error' => false, 'message' =>"success", "Result" => $Civil]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MODELS\civil  $civil
     * @return \Illuminate\Http\Response
     */
    public function edit(civil $civil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MODELS\civil  $civil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, civil $civil)
    {
        $formdata=$request->all();
        // echo"<pre>"; print_r($formdata);exit;
        $document= criminal::where('civil_id', $civil_id)->first();
        $documents = $document->document;
        
        if ($formdata['document'] != "") {
            $document= $formdata['document'];
            $doc_name = $doc_copy->getClientOriginalName();
            $size = $document-> getSize();
            $document->move(public_path() . '/document/', $doc_name);
            $updatedoc= url('/') . '/document/' . $doc_name;
        } else {
            $updatedoc = $documents;
        }
        
       
         civil::create([
         'civil_case_no'=> $formdata['civil_case_no'],
         'party_name'=> $formdata['party_name'],
         'p_father_name'=> $formdata['p_father_name'],
         'p_age'=> $formdata['p_age'],
         'p_address'=> $formdata['p_address'],
         'p_phone_no'=> $formdata['p_phone_no'],
         'opponent_name'=> $formdata['opponent_name'],
         'o_father_name'=> $formdata['o_father_name'],
         'o_age'=> $formdata['o_age'],
         'o_address'=> $formdata['o_address'],
         'o_phone_no'=> $formdata['o_phone_no'],
         'case_history'=> $formdata['case_history'],
         'decision'=> $formdata['decision'],
         'documents'=> $formdata['documents'],
         'lawyer_req'=> $formdata['lawyer_req'],
         ]
     );
     $Civil = civil::where('civil_id', $civil_id)->update($formdata);
         return Response::json(['message'=>"updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MODELS\civil  $civil
     * @return \Illuminate\Http\Response
     */
    public function destroy($civil_id)
    {
        $Civil = civil::where('civil_id', $civil_id)->update(['deleted_at' => date('y-m-d')]);
        return response::json(['error' => false, 'message' =>"Deleted successfully"]);  
     
    }
}
