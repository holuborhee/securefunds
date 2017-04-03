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

            $uploaded = Storage::put($path, file_get_contents($file));
            
            if($uploaded){

                $match = Match::findOrFail($request->matchId);
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


    public function getUserdetails(Request $request){
        return response()->json(User::findOrFail($request->userid), 200); 
    }

    public function insertUsers()
    {
        
       /* $user_array = [ ['ONORIDE','MADAGWA','07087961392','F.C.M.B','1866307015'],
                        ['GBUBEMI','OMAGBEMI','08055926371','G.T.B','0109174674'],
                        ['ONUORAH','IKECHUKWU VICTOR','07037373502','FIRST BANK','3056137740'],
                        ['IFEATU','LEVI DIMAKA','08175072493','WEMA BANK','0222232102'],
                        ['PEACE','NKWOR','08166611215','FIRST BANK','3053012936'],
                        ['IMAOBONG','POLYCARP','08038236321','DIAMOND','0066829547'],
                        ['WEHIMI','VICTOR','08028038108','GTB','0031475689'],
                        ['JEMINEN','OMAGBEMI','08062523051','FIRST','3045755623'],
                        ['HELEN','OKOTIEBOH MICHEAL','08028865601','ACCESS','0046985905'],
                        ['ESTHER','CHINDA','08105046765','FIRSTBANK','3066183593'],
                    ];
                    for ($cat=1; $cat <= 4; $cat++) { 
                        for ($i=0; $i < sizeof($user_array); $i++) {
                            $email = str_random(rand(5,10)) . "@" . str_random(5) . ".com"; 
                            $user = new User;

                            $user->first_name = $user_array[$i][0];
                            $user->last_name = $user_array[$i][1];
                            $user->email = $email;
                            $user->phone = $user_array[$i][2];
                            $user->password = bcrypt($user_array[$i][2]);
                            $user->bank_name = $user_array[$i][3];
                            $user->acc_name = $user_array[$i][0] . " " . $user_array[$i][1];
                            $user->acc_number = $user_array[$i][4];

                            $user->save();

                            $user->deals()->create(['category_id'=>$cat]); 
                        }
                    }*/
        
        
    }

    public function test()
    {
       /* $i = 0;
        foreach (User::where('id', '<=', 40)->cursor() as $user) {
            $i++;
            if($i<=10)
                $cat = 1;
            elseif($i<=20)
                $cat = 2;
            elseif($i<=30)
                $cat = 3;
            elseif($i<=40)
                $cat = 4;

            if($i == 1 OR $i == 11 OR $i == 21 OR $i === 31)
            echo "<h2>Category {$cat}</h2>";
            echo "<p>Name: {$user->acc_name}, Email: {$user->email}, Password: {$user->phone}</p>";

        }*/
    }


    
}
