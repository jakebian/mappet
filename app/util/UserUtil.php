<?php 
	class UserUtil{
		public static function getByID($id){
        	try{
        		$user=Sentry::getUserProvider()->findById($id);
        		return $user;
        	} 
        	catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
			 return false;
			}
    	}
		public static function registerUser($email, $password,$alias){
			try{
			    // Let's register a user.
			    $user = Sentry::register(array(
			        'email'    => $email,
			        'password' => $password,
			        'alias' => $alias,
			    ));

			    // Let's get the activation code
			    // $activationCode = $user->getActivationCode();
			    return $user;
			    // Send activation code to the user so he can activate the account
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
			    return 'Login field is required.';
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
			    return 'Password field is required.';
			}
			catch (Cartalyst\Sentry\Users\UserExistsException $e)
			{
			    return 'User with this login already exists.';
			}
    	}
    	public static function userActivate($code){
    		$user=static::activateUser($code);
    		if($user){
    			static::logInUser($user);
    		}
    		return $user;
    	}
    	public static function activateUser($code){
	    	try
			{
			    // Find the user using the user id

			    $user = Sentry::getUserProvider()->findByActivationCode($code);

			    // Attempt to activate the user
			    if ($user->attemptActivation($code))
			    {
			        // Redirect::to($user->id)
			         return $user;
			    }
			    else
			    {
			        echo "sorry try again";
			    }
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
			    echo 'User was not found.';
			}
			catch (Cartalyst\SEntry\Users\UserAlreadyActivatedException $e)
			{
			    echo 'User is already activated.';
			}
    	}

    	public static function authenticateUser($email, $password,$remember){
    		try
			{
			    // Set login credentials
			    $credentials = array(
			        'email'    => $email,
			        'password' => $password,
			    );

			    // Try to authenticate the user
			    $user =Sentry::authenticate($credentials, false);
				return $user;
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
				return 'Login field is required. ';
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
			    return 'Password field is required.';
			}
			catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
			{
			    return 'Wrong password, try again.';
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
			    return 'User was not found.';
			}
			catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
			{
			    return 'User is not activated.';
			}

			// The following is only required if throttle is enabled
			catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
			{
			    return 'User is suspended.';
			}
			catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
			{
			    return 'User is banned.';
			}
    	}
    	public static function loggedinUser(){
    		return Sentry::check();
    	}
    	public static function userLoggedIn()
	    {

	        if ( ! static::loggedinUser())
	        {
	        	echo "not loggedin";
	            // User is not logged in, or is not activated
	        }
	        else
	        {
	        	echo static::getUser()->alias;
	            // User is logged in
	        }
	    }
	    public static function getUser(){
	    	return Sentry::getUser();
	    }

	    public static function userLogOut(){
	    	Sentry::logout();
	    }

	    public static function logInUser($user){
	    	try
			{
			    // Log the user in
			   Sentry::login($user, false);
			   return $user;
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
			    return 'Login field is required.';
			}
			catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
			{
			    return 'User not activated.';
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
			    return 'User not found.';
			}

			// Following is only needed if throttle is enabled
			catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
			{
			    $time = $throttle->getSuspensionTime();

			    return "User is suspended for [$time] minutes.";
			}
			catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
			{
			    return 'User is banned.';
			}
	    }

	    public static function userLogin($email,$password,$remember){
	    	$user=static::authenticateUser($email,$password,$remember);
	    	if(!is_string($user)){
	    		return static::logInUser($user);
	    	}
	    	// var_dump($user);
	    	return $user;
	    }
}
