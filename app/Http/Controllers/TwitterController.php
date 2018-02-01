<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Twitter;
use File;
use DB;
use Carbon\Carbon;

class TwitterController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function twitterUserTimeLine()
    {
      $data = Twitter::getUserTimeline(['count' => 10, 'format' => 'array']);
      if(!empty($data)){
          foreach($data as $key => $value){
            $tid = DB::table('tweets')->where('Twitter_Id', $value['id'])->first();
            if(! $tid) {
            $tweetid= $value['id'];
            $tweet= $value['text'];
            $retweet_count= $value['retweet_count'];
            $data= array('Twitter_Id' => $tweetid, 'Message' => $tweet,'tweet_count' => $retweet_count , 'date' => date("Y-m-d") , 'time' => date("H:i:s") );
            DB:: table('tweets')->insert($data);
                       }
            else{

       $dataDB = DB::table('tweets') ->orderBy('Twitter_Id', 'desc','time', 'desc')->take(1)->get();
      foreach ($dataDB as $datas)
       {
        $timediff=date('G', strtotime(date("H:i:s")) - strtotime($datas->time));

      if($timediff>0)
       {
            $retweet_count= $value['retweet_count'];
            $tweetid= $value['id'];

            DB::table('tweets')
                    ->where('Twitter_Id', $tweetid)
                    ->update(['time' => date("H:i:s"), 'date' => date("Y-m-d"),'tweet_count' => $retweet_count]);
                  }
                }
             }

          }
      }

    	return view('twitter',compact('data'));
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function tweet(Request $request)
    {
  if( $request->ShowFromDb != ''){
$dataDBx = DB::table('tweets') ->orderBy('Twitter_Id', 'desc','time', 'desc')->take(10)->get()->toArray();
$dataDB = [];
  foreach ($dataDBx as $user)
  {
      array_push($dataDB, ['Twitter_Id' => $user->Twitter_Id, 'Message' => $user->Message, 'tweet_count' => $user->tweet_count]);
  }
return view('twitterdb',compact('dataDB'));
  }


      if( $request->addtweet != ''){
    	$this->validate($request, [
        		'tweet' => 'required'
        	]);
    	$newTwitte = ['status' => $request->tweet];
    	$twitter = Twitter::postTweet($newTwitte);

      $data = Twitter::getUserTimeline(['count' => 10, 'format' => 'array']);
      if(!empty($data)){
          foreach($data as $key => $value){
            $tid = DB::table('tweets')->where('Twitter_Id', $value['id'])->first();
            if(! $tid) {
            $tweetid= $value['id'];
            $tweet= $value['text'];
            $retweet_count= $value['retweet_count'];
            $data= array('Twitter_Id' => $tweetid, 'Message' => $tweet,'tweet_count' => $retweet_count , 'date' => date("Y-m-d") , 'time' => date("H:i:s") );
            DB:: table('tweets')->insert($data);
                       }
          }
      }
}
    	return back();
    }
}
