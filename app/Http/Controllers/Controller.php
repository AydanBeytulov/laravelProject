<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

/**
* Class Controller
* @package App\Http\Controllers
*/
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {

    }

    /**
     * @var array
     */
    private $loadOnlyOnceHolder = array();

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index(){

        if(Auth::guest()) {
            return view("welcome");
        }else{
            return redirect('home');
        }

    }

    /**
     * Get current user language
     *
     * @return string
     */

    public static function getCurrentLanguage(){
        $default = "EN";

        $request = new Request();
        $userIP = $request->ip();

        if(Redis::exists("language_".$userIP)){
            return Redis::get("language_".$userIP);
        }else{
            return $default;
        }
    }

    /**
     * Change current user language
     *
     * @param $language
     * @return bool
     */

    public function setCurrentLanguage($language){

        $availableLanguages = array(
            "EN", "BG", "TR", "RU"
        );

        $request = new Request();
        $userIP = $request->ip();

        if(in_array($language, $availableLanguages)){
            Redis::set("language_".$userIP, $language);
            return true;
        }else{
            return false ;
        }
    }

    /**
     * Load user data only once.
     *
     * @return array|mixed
     */
    public function getCurrentUserData(){

        return $this->loadOnlyOnce('currentUserData', function(){
            return Auth::user();
        });
    }


    /**
     * Clear only one load cache.
     *
     * @param $name
     */
    public static function refreshLoadOnlyOnce($name){
        Redis::del($name);
    }


    /**
     * Load user data from DB only once.
     *
     * @param $name
     * @param $getDataFunction
     * @return array|mixed
     */

    public function loadOnlyOnce($name, $getDataFunction){

        if(empty($this->loadOnlyOnceHolder[$name])){

            if(Redis::exists($name)){
                $dataHolder = Redis::get($name);
            }else{
                $dataHolder = array();
            }

            if(empty($dataHolder)){

                $dataHolder = $getDataFunction();

                $this->loadOnlyOnceHolder[$name] = $dataHolder;
                Redis::set($name, $dataHolder);
                return $dataHolder ;
            }else{
                return json_decode($dataHolder);
            }

        }else{
            return $this->loadOnlyOnceHolder[$name] ;
        }

    }


}
