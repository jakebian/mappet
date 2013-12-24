<?php

class UserController extends BaseController {

    public function getIndex()
    {
        return 'user root';
    }

    public function getProfile($id)
    {   $user=UserUtil::getByID($id);
        if($user){
            return View::make('user.profile')->with('user',$user);
        }
        return Redirect::to('/');
    }
    public function getDashboard($id)
    {   
        $user=Sentry::getUser();
        if(isset($user->id)){
            if($user->id==$id){
                 return View::make('user.dashboard')->with('user',$user);
            }
        }
        return Redirect::to('/');  
    }
    public function getDescEdit($id)
    {
        return View::make('user.dashboard-form.text')
        ->with(array('user'=>UserUtil::getByID($id),
                    'desc'=> "enter your new description!"));
    }
    public function getMugshotEdit($id)
    {
        $user=UserUtil::getByID($id);
        return View::make('user.dashboard-form.image')
        ->with(array('user'=>$user,
                    'desc'=> "Choose a new profile picture.",
                    'thumb'=>$user->profile_url ));
    }

    public function getProfileByAlias($alias)
    {
        return View::make('user.profile')->with('user',UserUtil::getByAlias($alias));
    }

    public function getRegister()
    {
        return View::make('user.register');
    }
   
    public function postRegister(){
        $user=UserUtil::registerUser(Input::get('email'),Input::get('password'),Input::get('alias'));
        if(is_string($user)){
            return View::make('user.register')->with('message',$user);
        }
        return View::make('user.activate')->with('code',$user->getActivationCode());
    }

    public function getLogin()
    {
        return View::make('user.login');
    }
    public function getLogout(){
        UserUtil::userLogOut();
        return Redirect::to('/');
    }

    public function postLogin(){
        $user= UserUtil::userLogin(Input::get('email'),Input::get('password'),Input::get('remember'));
        if(is_string($user)){
            return View::make('user.login')->with('message',$user);
        }
        return Redirect::to('/'.$user->id);
    }

    public function getActivateUser($code){
        $user=UserUtil::userActivate($code);
        if($user){
            return Redirect::to('/');
        }
            return Redirect::to("http://google.com");

    }
    public function postDesc($id){
        UserUtil::getByID($id)->updateDesc($_POST['new_desc']);
        return $_POST['new_desc'];
    }
    public function postMugshot($id){
        UserUtil::getByID($id)->updateMugshot($_POST['url']);
        return $_POST['url'];
    }
    public function postCover($id){
        UserUtil::getByID($id)->updateCover($_POST['url']);
        return $_POST['url'];
    }
}