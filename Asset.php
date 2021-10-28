<?php

declare(strict_types=1);

namespace PhatKoala;

/**
 * Class Asset
 * @package PhatKoala
 */
class Asset
{
    /**
     * @var array|null
     */
    private static $manifest;

    /**
     * @var array|null
     */
    private static $entrypoints;

    /**
     * @return array
     */
    public static function getManifest(): array
    {
        if (is_null(self::$manifest)) {
            self::$manifest = json_decode(
                file_get_contents(sprintf('%s/build/manifest.json', getcwd())),
                true
            );
        }

        return self::$manifest;
    }

    /**
     * @return array
     */
    public static function getEntrypoints(): array
    {
        if (is_null(self::$entrypoints)) {
            self::$entrypoints = json_decode(
                file_get_contents(sprintf('%s/build/entrypoints.json', getcwd())),
                true
            );
        }

        return self::$entrypoints;
    }

    /**
     * @param string $file
     * @return string|null
     */
    public static function file(string $file): ?string
    {
        $manifest = self::getManifest();

        if (isset($manifest[$file])) {
            return $manifest[$file];
        }

        return null;
    }

    /**
     * @param string $name
     * @return array|null
     */
    public static function entrypoint(string $name): ?array
    {
        $entrypoints = self::getEntrypoints();

        if (isset($entrypoints[$name])) {
            return $entrypoints[$name];
        }

        return null;
    }
}
