<?php

namespace JlTwc\JlLaravelExtras\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeEnumCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:enum {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an Enum';

    protected $type = "Enum";

    public function getStub()
    {
        return __DIR__.'/../../stubs/enum.stub';
    }

    public function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Enum';
    }

    public function replaceClass($stub, $name)
    {
        $class = str_replace($this->getNamespace($name) . '\\', '', $name);

        return str_replace('{{ enum_name }}', $class, $stub);
    }
}
