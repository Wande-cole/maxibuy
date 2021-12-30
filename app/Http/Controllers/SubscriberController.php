<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Subscription;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriberController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $topic)
    {
        $request->merge(['topic' => $request->route('topic')]);
        $this->validateData($request, [
            'topic' => ['required', 'exists:topics,name'],
            'url' => ['required', 'url']
        ]);

        $subscriber = Subscriber::where('endpoint', $request->url)->first();
        if(empty($subscriber)){
            $subscriber = Subscriber::create([
                'endpoint' => $request->url
            ]);
        }
        
        $subscription = Subscription::create([
            'topic_id' => Topic::where('name', $request->topic)->first()->id,
            'subscriber_id' => $subscriber->id
        ]);

        $data = [
            'url' => $request->url,
            'topic' => $request->topic
        ];
        
        return $this->respondWithSuccess($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        //
    }
}
