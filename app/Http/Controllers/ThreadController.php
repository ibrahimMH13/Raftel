<?php

namespace App\Http\Controllers;

 use App\Filters\ThreadFilter;
 use App\Models\Channel;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    public function index(Channel $channel,ThreadFilter $filter)
    {
        //
        $threads = $this->getThreads($channel)->get();
        return view('thread.threads',compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('thread.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Channel $channel,Request $request)
    {
        //
        $this->validate($request,[
            "title" =>"required",
            "body" =>"required"
        ]);
      $thread =Thread::create(
          [
           "title" =>$request->title,
          "body" =>$request->body,
          "channel_id" =>$request->channel,
          "user_id" =>auth()->user()->id
          ]
      );
      return redirect($thread->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel,Thread $thread)
    {
        //
        return view('thread.show',compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }

    /**
     * @param Channel $channel
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    protected function getThreads(Channel $channel)
    {
        if ($channel->exists) {

            $threads = $channel->thread();
        } else {
            $threads = Thread::latest();
        }

        if ($username = request('by')) {

            $user = User::where('name', $username)->firstOrFial();
        }
        return $threads;
    }
}
