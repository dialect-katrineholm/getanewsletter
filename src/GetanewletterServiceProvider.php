<?php

namespace Dialect\Getanewletter;

use Illuminate\Support\ServiceProvider;

class GetanewletterServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
	public function boot()
	{
		$configPath = __DIR__.'/../config/getanewsletter.php';
		$this->publishes([$configPath => config_path('getanewsletter.php')], 'config');
	}

	/**
	 * Register any package services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('getanewsletter', GetaNewsletter::class);
	}
}