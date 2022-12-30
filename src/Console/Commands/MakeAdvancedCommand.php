<?php

namespace JlTwc\JlLaravelExtras\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeAdvancedCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:advanced-command {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new advanced command.';

    protected $type = "Command";
    
    public function getStub()
    {
        return base_path('stubs/advancedcommand.stub');
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Console\Commands';
    }

    public function replaceClass($stub, $name)
    {
        $class = str_replace($this->getNamespace($name) . '\\', '', $name);

        // Do string replacement
        return str_replace('{{ command_name }}', $class, $stub);
    }
}
