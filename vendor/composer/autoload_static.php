<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb6f7ef2b47157929328fd64e686a7688
{
    public static $classMap = array (
        'Accessory' => __DIR__ . '/../..' . '/models/accessory.class.php',
        'AccessoryConfirm' => __DIR__ . '/../..' . '/views/accessory/confirm/accessory_confirm.class.php',
        'AccessoryController' => __DIR__ . '/../..' . '/controllers/accessory_controller.class.php',
        'AccessoryCreate' => __DIR__ . '/../..' . '/views/accessory/create/accessory_create.class.php',
        'AccessoryDetail' => __DIR__ . '/../..' . '/views/accessory/detail/accessory_detail.class.php',
        'AccessoryIndex' => __DIR__ . '/../..' . '/views/accessory/index/accessory_index.class.php',
        'AccessoryIndexView' => __DIR__ . '/../..' . '/views/accessory/accessory_index_view.class.php',
        'AccessoryModel' => __DIR__ . '/../..' . '/models/accessory_model.class.php',
        'AccessorySearch' => __DIR__ . '/../..' . '/views/accessory/search/accessory_search.class.php',
        'Bike' => __DIR__ . '/../..' . '/models/bike.class.php',
        'BikeConfirm' => __DIR__ . '/../..' . '/views/bike/confirm/bike_confirm.class.php',
        'BikeController' => __DIR__ . '/../..' . '/controllers/bike_controller.class.php',
        'BikeCreate' => __DIR__ . '/../..' . '/views/bike/create/bike_create.class.php',
        'BikeDetail' => __DIR__ . '/../..' . '/views/bike/detail/bike_detail.class.php',
        'BikeIndex' => __DIR__ . '/../..' . '/views/bike/index/bike_index.class.php',
        'BikeIndexView' => __DIR__ . '/../..' . '/views/bike/bike_index_view.class.php',
        'BikeModel' => __DIR__ . '/../..' . '/models/bike_model.class.php',
        'BikeSearch' => __DIR__ . '/../..' . '/views/bike/search/bike_search.class.php',
        'ComposerAutoloaderInitb6f7ef2b47157929328fd64e686a7688' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInitb6f7ef2b47157929328fd64e686a7688' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Database' => __DIR__ . '/../..' . '/application/database.class.php',
        'Dispatcher' => __DIR__ . '/../..' . '/application/dispatcher.class.php',
        'IndexView' => __DIR__ . '/../..' . '/views/index_view.class.php',
        'Tire' => __DIR__ . '/../..' . '/models/tire.class.php',
        'TireConfirm' => __DIR__ . '/../..' . '/views/tire/confirm/tire_confirm.class.php',
        'TireController' => __DIR__ . '/../..' . '/controllers/tire_controller.class.php',
        'TireCreate' => __DIR__ . '/../..' . '/views/tire/create/tire_create.class.php',
        'TireDetail' => __DIR__ . '/../..' . '/views/tire/detail/tire_detail.class.php',
        'TireIndex' => __DIR__ . '/../..' . '/views/tire/index/tire_index.class.php',
        'TireIndexView' => __DIR__ . '/../..' . '/views/tire/tire_index_view.class.php',
        'TireModel' => __DIR__ . '/../..' . '/models/tire_model.class.php',
        'TireSearch' => __DIR__ . '/../..' . '/views/tire/search/tire_search.class.php',
        'WelcomeController' => __DIR__ . '/../..' . '/controllers/welcome_controller.class.php',
        'WelcomeIndex' => __DIR__ . '/../..' . '/views/welcome/welcome_index.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitb6f7ef2b47157929328fd64e686a7688::$classMap;

        }, null, ClassLoader::class);
    }
}
