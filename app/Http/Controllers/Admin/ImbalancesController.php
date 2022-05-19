<?php

namespace App\Http\Controllers\Admin;

use App\Events\RealTimeMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\imbalancesRequset;
use App\Http\Requests\UpdateImbalances;
use App\Models\Attachments;
use App\Models\Causes_glitch;
use App\Models\City;
use App\Models\comment;
use App\Models\Fault_side;
use App\Models\Imbalance;
use App\Models\User;
use App\Notifications\AddImbalances;
use App\Notifications\ImbalancesNotify;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;


class ImbalancesController extends Controller
{
    /// all my imbalances
    public function index(){
        $all_data=Imbalance::with('attachment')->get();
        $city=City::pluck('name','id');
        $Fault_side=Fault_side::pluck('name','id');
        $Causes_glitch=Causes_glitch::pluck('causes','id');
        return view('dashboard.imbalances.all_imbalances',compact('all_data','city','Fault_side','Causes_glitch'));


    }
    //end all

    // all my imbalances user
    public function all($id){
        $user=Imbalance::with('attachment')->get();
       $data= $user->where('user_id','=',$id);

       $city=City::pluck('name','id');
        $Fault_side=Fault_side::pluck('name','id');
        $Causes_glitch=Causes_glitch::pluck('causes','id');


        return view('dashboard.imbalances.index',compact('data','city','Fault_side','Causes_glitch'));
    }
    // end

    /// return view new imbalances
    public function create(){
      $Causes_glitch=  Causes_glitch::pluck('causes','id');
       $Fault_side= Fault_side::pluck('name','id');
      $city= City::pluck('name','id');
        return view('dashboard.imbalances.create',compact('city','Causes_glitch','Fault_side'));
}
///end


/// store new imbalances//
public function store(imbalancesRequset $request){
$arr=[];
        $data= $request->validated();



        foreach ($data['file'] as $files) {


            $trim = Storage::disk('google')->putFile('1nY-cpguYspI7zCdn1aQ3Q2NevB23Vp0Q', $files);
            $resutt = substr($trim, strpos($trim, '/') + 1, strlen($trim));

            $file = Storage::disk('google')->allFiles();

            for ($i = 0; $i < count($file); $i++) {
                $meta = Storage::disk('google')->getMetadata($file[$i]);
                if ($meta['name'] == $resutt) {
                    $path = $meta['path'];
                };

            }
            array_push($arr, ['file' => $path]);


            //  $path=Storage::disk('public')->putFile('/imbalances',$files);

            //  $data['file']=$path;
            // array_push($arr,['file'=>$path]);



};
    $create= Imbalance::create($data);
    $create->attachment()->createMany($arr);

      $admin=User::where('role','=','admin')->first();
      $admin_id=$admin->id;
     $create=Imbalance::latest()->first();

    Notification::send($admin,new AddImbalances($create));
     ////**** Event***//
   // $userUnreadNotifications=$admin->unreadNotifications()->count();
    //$userUnreadNotifications = auth()->user()->unreadNotifications()->count();
   // $user=User::findorFail($create->user_id);
    //$name_user=$user->name;
   // event(new \App\Events\AddImbalances($create,$userUnreadNotifications,$name_user,$admin_id));





    return redirect()->route('data',['id'=>$create->id , 'url' => 1]);

}
/// end


/// view all data with all relation
public function data($id , $url = null){



    $data=Imbalance::with('attachment','causes_glitch','fault_side','city','comment')->findorFail($id);
    $view=Imbalance::findorFail($id);
    if(!empty($url)){
        $view->increment('views');
    }





        return view('dashboard.imbalances.data1',compact('data'));
}
///end

/// update imbalances
public function update(UpdateImbalances $request,$id){
    $data= $request->validated();

       $imbalance= Imbalance::with('attachment')->findorFail($id)
       ;
    if(count($request->update)==count($request->file)) {
        for($i=0; $i<count($request->update); $i++){
           $imp=$imbalance->attachment->find($request->update[$i]);
           Storage::disk('google')->delete($imp->file);
            $fol = null ;
           $trim = Storage::disk('google')->putFile('1nY-cpguYspI7zCdn1aQ3Q2NevB23Vp0Q', $request->file[$i]);
            $resutt = substr($trim, strpos($trim, '/') + 1, strlen($trim));

            $file = Storage::disk('google')->allFiles();
            for ($x = 0; $x < count($file); $x++) {
                $meta = Storage::disk('google')->getMetadata($file[$x]);

                if ($meta['name'] == $resutt) {
                    $fol = $meta['path'];
                    break;

                };

            }

            $imp->file = $fol ;
            $imp->save();



            }
    }

    $imbalance->update($data);
    return redirect()->back();


}
/// end


/// delete imbalances
public function show ($id){
     Imbalance::destroy($id);
    return redirect()->back();


}
///end


//// change imbalances status
public function status(Request $request,$id){
    $status=Imbalance::findorFail($id);

        $status->status=$request->status;
        $status->save();
        $user=User::findorFail($status->user_id);
    Notification::send($user,new ImbalancesNotify($status));



              //Event imbalances Status//
   /* $userUnreadNotifications = auth()->user()->unreadNotifications()->count();
    $userUnreadNotifications= $user->unreadNotifications()->count();
    $admin=auth()->user()->name;
    event(new RealTimeMessage($status,$userUnreadNotifications,$admin));
        */
    return   redirect()->back();

}

/// end



/*public function info($id){
         Imbalance::findorFail($id);

}*/

}
