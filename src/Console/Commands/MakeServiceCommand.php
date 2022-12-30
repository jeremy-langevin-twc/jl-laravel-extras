<?php

namespace JlTwc\JlLaravelExtras\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeServiceCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Service';

    protected $type = "Service";

    public function getStub()
    {
        return base_path('stubs/service.stub');
    }

    public function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Services';
    }

    public function replaceClass($stub, $name)
    {
        $class = str_replace($this->getNamespace($name) . '\\', '', $name);

        return str_replace('{{ service_name }}', $class, $stub);
    }
}
