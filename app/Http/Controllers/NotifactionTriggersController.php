<?php

namespace App\Http\Controllers;

use App\Models\NotifactionTriggers;
use Illuminate\Http\Request;

class NotifactionTriggersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'mail' => 'sometimes|in:1',
            'website' => 'sometimes|in:1',
        ]);

        // x table
        // user id, notification, mail, website
        // 1, xyz, true, true
        // 1, abc, false, true
        // 1, pqr, true, false

        $user_id = auth()->id();
        //for submitted report
        if (isset($request['name'])) {
            $name = $request['name'];
            $notification = NotifactionTriggers::where('name', $name)->where('user_id', $user_id)->first();
            if (isset($request['mail_submit'])) {
                $mail_submit = true;
            } else {
                $mail_submit = false;
            }
            if (isset($request['website_submit'])) {
                $website_submit = true;
            } else {
                $website_submit = false;
            }
            
            if($notification){
                $notification->mail = $mail_submit;
                $notification->website = $website_submit;
                $notification->save();
            }else{
                NotifactionTriggers::create([
                    'user_id' => auth()->id(),
                    'name' => $name,
                    'mail' => $mail_submit,
                    'website' => $website_submit,
                ]);  
            }
        }
        //for approval
        if (isset($request['name_approve'])) {
            $name_approve = $request['name_approve'];
            $notification1 = NotifactionTriggers::where('name', $name_approve)->where('user_id', $user_id)->first();
            if (isset($request['mail_approve'])) {
                $mail_approve = true;
            } else {
                $mail_approve = false;
            }
            if (isset($request['website_approve'])) {
                $website_approve = true;
            } else {
                $website_approve = false;
            }
            if($notification1){
                $notification1->mail = $mail_approve;
                $notification1->website = $website_approve;
                $notification1->save();
            }else{
                NotifactionTriggers::create([
                    'user_id' => auth()->id(),
                    'name' => $name_approve,
                    'mail' => $mail_approve,
                    'website' => $website_approve,
                ]);  
            }
            
        }
        //for rejected
        if (isset($request['name_reject'])) {
            $name_reject = $request['name_reject'];
            $notification2 = NotifactionTriggers::where('name', $name_reject)->where('user_id', $user_id)->first();
            if (isset($request['mail_reject'])) {
                $mail_reject = true;
            } else {
                $mail_reject = false;
            }
            if (isset($request['website_reject'])) {
                $website_reject = true;
            } else {
                $website_reject = false;
            }
            
            if($notification2){
                $notification2->mail = $mail_reject;
                $notification2->website = $website_reject;
                $notification2->save();
            }else{
                NotifactionTriggers::create([
                    'user_id' => auth()->id(),
                    'name' => $name_reject,
                    'mail' => $mail_reject,
                    'website' => $website_reject,
                ]);  
            }
        }
        //for comments
        if (isset($request['name_comment'])) {
            $name_comment = $request['name_comment'];
            $notification3 = NotifactionTriggers::where('name', $name_comment)->where('user_id', $user_id)->first();
            if (isset($request['mail_comment'])) {
                $mail_comment = true;
            } else {
                $mail_comment = false;
            }
            if (isset($request['website_comment'])) {
                $website_comment = true;
            } else {
                $website_comment = false;
            }
            
            if($notification3){
                $notification3->mail = $mail_comment;
                $notification3->website = $website_comment;
                $notification3->save();
            }else{
                NotifactionTriggers::create([
                    'user_id' => auth()->id(),
                    'name' => $name_comment,
                    'mail' => $mail_comment,
                    'website' => $website_comment,
                ]);
            }
             
        }
        //for project
        if (isset($request['name_project'])) {
            $name_project = $request['name_project'];
            $notification4 = NotifactionTriggers::where('name', $name_project)->where('user_id', $user_id)->first();
            if (isset($request['mail_project'])) {
                $mail_project = true;
            } else {
                $mail_project = false;
            }
            if (isset($request['website_project'])) {
                $website_project = true;
            } else {
                $website_project = false;
            }
            
            if($notification4){
                $notification4->mail = $mail_project;
                $notification4->website = $website_project;
                $notification4->save();
            }else{
                NotifactionTriggers::create([
                    'user_id' => auth()->id(),
                    'name' => $name_project,
                    'mail' => $mail_project,
                    'website' => $website_project,
                ]);  
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
