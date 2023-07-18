<?php

namespace Asciito\LaravelDawn;

use InvalidArgumentException;

class Dawn
{
    /**
     * The Dawn selector (@dawn) HTML attribute.
     *
     * @var string
     */
    public static $selectorHtmlAttribute = 'dawn';

    /**
     * Register the Dawn service provider.
     *
     * @param  array  $options
     * @return void
     */
    public static function register(array $options = [])
    {
        if (static::dawnEnvironment($options)) {
            app()->register(DawnServiceProvider::class);
        }
    }

    /**
     * Determine if Dawn may run in this environment.
     *
     * @param  array  $options
     * @return bool
     *
     * @throws \InvalidArgumentException
     */
    protected static function dawnEnvironment($options)
    {
        if (! isset($options['environments'])) {
            return false;
        }

        if (is_string($options['environments'])) {
            $options['environments'] = [$options['environments']];
        }

        if (! is_array($options['environments'])) {
            throw new InvalidArgumentException('Dawn environments must be listed as an array.');
        }

        return app()->environment(...$options['environments']);
    }

    /**
     * Set the Dawn selector (@dawn) HTML attribute.
     *
     * @param  string  $attribute
     * @return void
     */
    public static function selectorHtmlAttribute(string $attribute)
    {
        static::$selectorHtmlAttribute = $attribute;
    }
}
