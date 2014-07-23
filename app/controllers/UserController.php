<?php

class UserController extends BaseController
{

  /**
   *
   */
  public function register()
  {
    if (! Input::has('code')) {
      return Redirect::to('/');
    }

    $oauth = new Coinbase_OAuth(
      Config::get('settings.client_id'),
      Config::get('settings.client_secret'),
      Config::get('settings.redirect_uri')
    );

    try {
      $tokens = $oauth->getTokens(Input::get('code'));
    } catch(Exception $e) {
      return Redirect::to('/');
    }

    Session::put( 'tokens', $tokens );

    return View::make('user.register');
  }

  /**
   *
   */
  public function create()
  {
    $validator = Validator::make(Input::all(), User::$rules);
    if ($validator->passes()) {
        $user = new User();
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->coinbase_token = Session::get('tokens.refresh_token');
        $user->save();
        Redirect::to('dashboard');
    } else {
        return Redirect::to('register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
    }
  }

  /**
   *
   */
  public function login()
  {
    return View::make('user.login');
  }

  /**
   *
   */
  public function auth()
  {
    if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
      $this->renew_token();
      return Redirect::intended('dashboard');
    } else {
      return Redirect::to('login')->with('message', "Invalid email or password. Try clicking 'Forgot Password' if you're having trouble signing in.");
    }
  }

  /**
   *
   */
  public function logout()
  {
    Auth::logout();
    return Redirect::to('/');
  }

  public function renew_token()
  {
    // this should be global somewhere
    $oauth = new Coinbase_OAuth(
      Config::get('settings.client_id'),
      Config::get('settings.client_secret'),
      Config::get('settings.redirect_uri')
    );

    try {
      $tokens = $oauth->refreshTokens([
        'refresh_token' => Auth::user()->coinbase_token
      ]);

      Auth::user()->coinbase_token = $tokens['refresh_token'];
      Auth::user()->save();
      Session::put('tokens', $tokens);
    } catch(Exception $e) {
      $tokens = false;
    }

    return $tokens;
  }

}
