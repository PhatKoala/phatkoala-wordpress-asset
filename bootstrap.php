<?php
/**
 * Plugin Name: PhatKoala Asset
 * Plugin URI: https://www.phatkoala.uk/
 * Description: WordPress integration for Webpack Encore - compile, optimise and version your assets.
 * Version: 1.0
 * Author: Stewart Walter
 * Author URI: https://www.phatkoala.uk/
 */

require('Asset.php');

if (!function_exists('asset')) {
    function asset($file) {
        return PhatKoala\Asset::file($file);
    }
}

if (!function_exists('entrypoint')) {
    function entrypoint($name) {
        return PhatKoala\Asset::entrypoint($name);
    }
}