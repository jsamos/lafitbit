<?php namespace Jsamos\Lafitbit;

use Illuminate\Support\ServiceProvider;
use Fitbit\Api;

class LafitbitServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;


	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('jsamos/lafitbit');
	}


	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['lafitbit'] = $this->app->share(function($app)
        {

        	$config = $app['config']->get('lafitbit::config');
        	extract($config);
        	return new Api($consumer_key, $consumer_secret, $callbackUrl, $responseFormat, $storageAdapter);

        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('lafitbit');
	}

}