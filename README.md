lafitbit
========

Laravel 4 Wrapper for [fitbitphp](http://github.com/popthestack/fitbitphp) package

Setup
=====

composer.json

```
{
    "require": {
        "slender/auth": "dev-master"
    }
}
```

add service provider and facade to app/config/app.php

```
'providers' => array(
    ...
    'Jsamos\Lafitbit\LafitbitServiceProvider',
    ...
);

...

'aliases' => array(
    ...
    'Fitbit'		  => 'Jsamos\Lafitbit\Facades\Fitbit',
    ...
);
```

Usage
=====

Each of the ApiGateways in the parent project are available through static methods

e.g. $factory->getUserGateway becomes Fitbit::user()


Example
=======

```
class FitbitController extends Controller {

	public function oauth()
	{

        $auth = Fitbit::authentication();
        $auth->initiateLogin();

	}

    public function authenticate()
    {
        $auth = Fitbit::authentication();
        $oauth_token = Input::get('oauth_token');
        $oauth_verifier = Input::get('oauth_verifier');
        $auth->authenticateUser($_GET['oauth_token'], $_GET['oauth_verifier']);

        if ($auth->isAuthorized()) {
            $profile = Fitbit::user()->getProfile();
            var_dump($profile);
        } else {
            echo 'Not connected.';
        }
    }

}
```
