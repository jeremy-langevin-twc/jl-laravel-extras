<?php

namespace JlTwc\JlLaravelExtras\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeRepositoryCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Repository';

    protected $type = "Repository";

    public function getStub()
    {
        return __DIR__.'/../../stubs/repository.stub';
    }

    public function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repositories';
    }

    public function replaceClass($stub, $name)
    {
        $class = str_replace($this->getNamespace($name) . '\\', '', $name);

        return str_replace('{{ repository_name }}', $class, $stub);
    }
}
