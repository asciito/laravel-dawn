<?php

namespace Asciito\LaravelDawn\Console;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class PageCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'dawn:page {name : The name of the class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Dawn page class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Page';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/page.stub';
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return $this->laravel->basePath().'/tests'.str_replace('\\', '/', $name).'.php';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Browser\Pages';
    }

    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace()
    {
        return 'Tests';
    }
}
