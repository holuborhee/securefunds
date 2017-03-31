<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function transactions()
    {
        $deals = Auth()->user()->deals;
        $matches = array();
        foreach($deals as $deal) {
            $match = $deal->matches;
            
            $matches[] = $match;
        }

        return view('transaction', ['deals'=>$deals]);
    }

    public function donations()
    {
        $matches = Auth()->user()->matches();
        return view('donation',['matches'=>$matches]);
    }


    public function paid(Request $request)
    {
        /*$matches = Auth()->user()->matches();
        return view('donation',['matches'=>$matches]);*/
        if($request->ajax()){

            $this->validate($request, [
                'type' => 'required',
                'name' => 'required',
                'file' => 'required|image',
            ]);

            $match = Match::findOrFail($request->matchId);

        if ($request->file('file')->isValid()) {
            Storage::deleteDirectory('payments/'.$request->matchId);
            $path = $request->file('file')->store('payments/'.$request->advert,'local');
        }

            $match->payment_type = $request->type;
            $match->payment_name = $request->name;
            $match->url = $path;
            //$match->confirmed_on = $match->freshTimestamp();
            $match->save();
            /*$deal = Deal::findOrFail($match->deal_id);
            $matches = $deal->matches()->where('match_id', '!=', $request->matchId);
            if($matches->count()){
                $match = $matches->first();
                if($match->confirmed_on !)
            }*/
            return response()->json(['success'=>true], 200);

        }
    }
}
