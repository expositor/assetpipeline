Asset pipeline

    require ('../vendor/autoload.php');
    use Wollnerstudios\AssetPipeline\AssetPipeline;
    $pipeline = new AssetPipeline();
    $pipeline->addAsset('bootstrap');
    $pipeline->addCSS('Open Sans')->withoutBaseURL();
    $pipeline->addJS('jQuery')->version('2.1.4')->withoutBaseURL();
    pipeline->showCSS();
    $pipeline->showJS();
