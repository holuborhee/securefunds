<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Match;
use Illuminate\Support\Facades\Storage;

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

    public function cancelpayment()
    {
        $id = Auth()->user()->id;
        Auth()->user()->logout();
        User::findOrFail($id)->delete();
    }


    public function paid(Request $request)
    {                 
            $file = $this->base64ToImage($request->file,"temp.jpg"); //Convert base 64 to file
            Storage::deleteDirectory('payments/'.$request->matchId); //delete directory if exists
            $mime = $this->getFileMIMEType($file); //get mime type of file
            
            /*if($this->mimeToType($mime) === "jpeg")
                $path = 'payments/'.$request->matchId . "/" . $this->generateUniquename() . ".jpg";
            elseif($this->mimeToType($mime) === "png")
                $path = 'payments/'.$request->matchId . "/" . $this->generateUniquename() . ".png";
            elseif($this->mimeToType($mime) === "gif")
                $path = 'payments/'.$request->matchId . "/" . $this->generateUniquename() . ".gif";*/
            
            $path = 'payments/'.$request->matchId . "/" . $this->generateUniquename() . ".". $this->mimeToType($mime); //create a path and file name
            $uploaded = Storage::put($path, $file);
            return response()->json(['success'=>$request->matchId,'su'=>$path], 200);
            if($uploaded){

                $match = Match::findOrFail($request->matchId);
            
            $path = $request->file->store('payments/'.$request->matchId,'local');
            return response()->json(['success'=>$request->matchId,'su'=>$request->file], 200);
        //}else
          //  return response()->json(['success'=>$request->name,'su'=>$request->file], 200);

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

    

    public function base64ToImage($base64_string, $output_file) {
      $file = fopen($output_file, "wb");
  
     $data = explode(',', $base64_string);
 
     fwrite($file, base64_decode($data[1]));
     fclose($file);
     return $output_file;
    }

    public function getbase64MIMEType($base64_string){
        $imgdata = base64_decode($base64_string);
        //$file = $this->base64ToImage($base64_string,"temp.jpg");

        $f = finfo_open();
        //$mime_type = finfo_file($f, $file);
        $mime_type = finfo_buffer($f, $imgdata, FILEINFO_MIME_TYPE);
        return $mime_type;
    }

    public function getFileMIMEType($file){
        //$imgdata = base64_decode($base64_string);
        //$file = $this->base64ToImage($base64_string,"temp.jpg");

        $f = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($f, $file);
        //$mime_type = finfo_buffer($f, $imgdata, FILEINFO_MIME_TYPE);
        return $mime_type;
    }
    public function mimeToType($mime_type){
        $split = explode( '/', $mime_type );
        $type = $split[1];
        return $type;
    }

    public function generateUniquename()
    {
        return uniqid('img_');
    }
    
}
