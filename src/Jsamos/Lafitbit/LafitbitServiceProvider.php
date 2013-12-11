<?php namespace Jsamos\Lafitbit;

use Illuminate\Support\ServiceProvider;

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
        	var_dump($config);

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