<?php namespace Wollnerstudios\AssetPipeline;

require ('../vendor/autoload.php');
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

use Wollnerstudios\AssetPipeline\Assets;


class AssetPipeline
{
	use Assets;

	protected $assets;
	protected $baseurl;
	protected $assetPath;
	protected $fullAssetPath;
	protected $registeredAssets;
	
	public function __construct()
	{
		
		$this->registeredAssets = $this->assets();
		
		$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,strpos( $_SERVER["SERVER_PROTOCOL"],'/'))).'://';

		$this->baseurl = $protocol.$_SERVER['HTTP_HOST'].'/';

		//$this->assetPath = 'vendor/wollnerstudios/assetpipeline/src/assets/';

		$this->assetPath = 'src/assets/';

		$this->fullAssetPath = $this->baseurl.$this->assetPath;

		return;

	}

	public function setBaseURL($baseurl)
	{

		$this->baseurl = $baseurl;

		if (substr($baseurl,-1) !== '/')
		{
			$this->baseurl = $baseurl.'/';
		}

		return $this->fullAssetPath = $this->baseurl.$this->assetPath;
	}

	public function addAsset($asset)
	{

		echo $this->fullAssetPath.$this->registeredAssets['bootstrap']['css'][0];
		
	}

}