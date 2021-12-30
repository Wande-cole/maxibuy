<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Topic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MessageController extends Controller
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
    public function create(Request $request, $topic)
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
        $request->merge(['topic' => $request->route('topic')]);
        $this->validateData($request, [
            'topic' => ['required', 'exists:topics,name'],
            'title' => ['required'],
            'body' => ['required'],
        ]);

        $payload = [
            'title' => $request->title,
            'body' => $request->body
        ];
        Topic::where('name', $request->topic)->first()->messages()->create($payload);

        $subscribers = Topic::where('name', $request->topic)->first()->subscribers()->get();

        // Update to concurrent requests in the future
        $response_arr = [];
        foreach($subscribers as $subscriber){
            $response = null;
            try{
                $response = Http::accept('multipart/form-data')->post($subscriber->endpoint, [
                    'title' => $request->title,
                    'body' => $request->body
                ]);
            }catch(Exception $e){
                $message = 'Could not connect to: ' . $subscriber->endpoint;
            }

            array_push($response_arr, [
                'url' => $subscriber->endpoint,
                'response' => empty($response) ? $message : $response->body()
            ]);
        }

        $payload['responses'] = $response_arr;
        return $this->respondWithSuccess($payload);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
