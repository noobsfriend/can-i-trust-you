<?php

namespace App\Providers;

use App\Criteria\HasImpress;
use App\Services\WebsiteTrustManager;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(Client::class, Client::class);
		$this->app->bind(HasImpress::class, HasImpress::class);
		$this->app->bind(WebsiteTrustManager::class, function () {
			$criteriaConfiguration = config('criteria.classes');
			$criteria = [];

			foreach ($criteriaConfiguration as $criterionConfig) {
				$criteria[] = app($criterionConfig);
			}

			return new WebsiteTrustManager($criteria, app(Client::class));
		});
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}
}
