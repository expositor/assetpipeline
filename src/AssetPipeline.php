<?php 

namespace Wollnerstudios\AssetPipeline;

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);


class AssetPipeline
{

	protected $baseurl;

	protected $assetPath;

	protected $fullAssetPath;

	protected $registeredAssets;

	protected $addedAssetName;

	protected $addMethodName;

	protected $addedCSS;

	protected $addedJS;


	public function __construct()
	{

		require_once 'Assets.php';

		$this->registeredAssets = $registeredAssets;

		$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,strpos( $_SERVER["SERVER_PROTOCOL"],'/'))).'://';

		$this->baseurl = $protocol.$_SERVER['HTTP_HOST'].'/';

		$this->assetPath = 'vendor/wollnerstudios/assetpipeline/src/assets/';

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

	public function setAssetPath($assetPath)
	{

		$this->assetPath = $assetPath;

		if (substr($assetPath,-1) !== '/')
		{
			$this->assetPath = $assetPath.'/';
		}

		return $this->fullAssetPath = $this->baseurl.$this->assetPath; 
	}

	private function createCSSHTML($css)
	{
		return '<link href="'.$this->fullAssetPath.''.$css.'" rel="stylesheet">';
	}

	private function createJSHTML($js)
	{
		return '<script src="'.$this->fullAssetPath.''.$js.'"></script>';
	}

	private function addCSSToList($assetName)
	{
		
		$this->addedCSS[$this->addedAssetName] = null;

		$temporaryAsset = $this->registeredAssets[$assetName];

		usort($temporaryAsset, function($a,$b){

			return $b['version'] - $a['version'];

		});

		if (isset($temporaryAsset[0]['css']))
		{

			foreach ($temporaryAsset[0]['css'] as $css)
			{
				$this->addedCSS[$this->addedAssetName][] .= $this->createCSSHTML($css);
			}
		}

		return;
	}

	private function addJSToList($assetName)
	{
		$this->addedJS[$this->addedAssetName] = null;

		$temporaryAsset = $this->registeredAssets[$assetName];

		usort($temporaryAsset, function($a,$b){

			return $b['version'] - $a['version'];

		});

		if (isset($temporaryAsset[0]['js']))
		{

			foreach ($temporaryAsset[0]['js'] as $js)
			{
				$this->addedJS[$this->addedAssetName][] .= $this->createJSHTML($js);
			}
		}

		return;
	}

	public function addAsset($assetName)
	{

		$this->addMethodName = 'addAsset';

		$this->addedAssetName = $assetName;

		$this->addCSSToList($this->addedAssetName);

		$this->addJSToList($this->addedAssetName);

		return $this;
	}

	public function addCSS($assetName)
	{
		$this->addMethodName = 'addCSS';

		$this->addedAssetName = $assetName;
		
		$this->addCSSToList($this->addedAssetName);

		return $this;
	}

	public function addJS($assetName)
	{
		$this->addMethodName = 'addJS';

		$this->addedAssetName = $assetName;

		$this->addJSToList($this->addedAssetName);

		return $this;
	}

	public function version($versionNumber)
	{

		$temporaryAsset = $this->registeredAssets[$this->addedAssetName];

		$key = array_search($versionNumber, array_column($temporaryAsset,'version'));

		$this->addedCSS[$this->addedAssetName] = null;

		$this->addedJS[$this->addedAssetName] = null;

		if (($this->addMethodName == 'addAsset' || $this->addMethodName == 'addCSS') && isset($temporaryAsset[$key]['css']))
		{

			foreach ($temporaryAsset[$key]['css'] as $css)
			{

				$this->addedCSS[$this->addedAssetName][] .=  $this->createCSSHTML($css);
			}

		}

		if (($this->addMethodName == 'addAsset' || $this->addMethodName == 'addJS') && isset($temporaryAsset[$key]['js']))
		{

			foreach ($temporaryAsset[$key]['js'] as $js)
			{

				$this->addedJS[$this->addedAssetName][] .= $this->createJSHTML($js);
			}

		}

		return $this;

	}
	
	public function withoutBaseURL()
	{

		if (isset($this->addedCSS[$this->addedAssetName]))
		{
			foreach ($this->addedCSS[$this->addedAssetName] as $key=>$value)
			{
				$this->addedCSS[$this->addedAssetName][$key] = preg_replace("|".preg_quote($this->fullAssetPath)."|",null,$value,1);
			}
		}

		if (isset($this->addedJS[$this->addedAssetName]))
		{
			foreach ($this->addedJS[$this->addedAssetName] as $key=>$value)
			{
				$this->addedJS[$this->addedAssetName][$key] = preg_replace("|".preg_quote($this->fullAssetPath)."|",null,$value,1);
			}
		}

		return;
	}

	public function showAssetList($singleAsset = null)
	{

		foreach ($this->addedCSS as $css)
		{

			if (isset($css))
			{

				foreach($css as $css)
				{
					echo $css."\r\n";
				}
			}
		}

		foreach ($this->addedJS as $js)
		{
			if (isset($js))
			{
				foreach($js as $js)
				{
					echo $js."\r\n";
				}
			}
		}

		return;
	}

	public function showCSS()
	{

		foreach ($this->addedCSS as $css)
		{

			if (isset($css))
			{

				foreach($css as $css)
				{
					echo $css."\r\n";
				}
			}
		}

		return;
	}


	public function showJS()
	{

		foreach ($this->addedJS as $js)
		{
			if (isset($js))
			{
				foreach($js as $js)
				{
					echo $js."\r\n";
				}
			}
		}

		return;
	}

}