<?php namespace Wollnerstudios\AssetPipeline;

trait Assets {
	function assets()
	{
		$assets = 
		[
			'bootstrap' => [
				'css' => ['bootstrap-3.3.5/css/bootstrap.css'],
				'js' => ['bootstrap.js']
			],
			

		];
		return $assets;
	}
}