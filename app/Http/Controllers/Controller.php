<?php

namespace App\Http\Controllers;

use App\Services\WebsiteTrustManager;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	private WebsiteTrustManager $websiteTrustManager;

	public function __construct(WebsiteTrustManager $websiteTrustManager)
	{
		$this->websiteTrustManager = $websiteTrustManager;
	}

	public function form(Request $request)
	{
		return view('form');
	}

	public function check(Request $request)
	{
		if (!$url = $request->get('url', false)) {
			return 'Bitte URL angeben!';
		}

		$ranking = $this->websiteTrustManager->getRanking($url);

		return $ranking;
	}
}
