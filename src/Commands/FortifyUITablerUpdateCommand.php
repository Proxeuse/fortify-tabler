<?php

namespace Proxeuse\FortifyUITabler\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class FortifyUITablerUpdateCommand extends Command
{
    public $signature = 'tabler:update {--T|type=full : The type of update. Either full, public, language, views or controllers.}';

    public $description = 'Update views, resources and routes for the Tabler.io framework.';

    public function handle()
    {
        // confirm the installation
        if ($this->confirm('Do you wish to continue? This updater will try to override certain files which may include files you\'ve edited.', true)) {
            switch ($this->option("type")) {
                case "public":
                    // publish public assets
                    $this->callSilent('vendor:publish', ['--tag' => 'tabler-update-public', '--force' => true]);
                    break;
                case "language":
                    // publish language files
                    $this->callSilent('vendor:publish', ['--tag' => 'tabler-update-language', '--force' => true]);
                    break;
                case "views":
                    // publish views
                    $this->callSilent('vendor:publish', ['--tag' => 'tabler-update-views', '--force' => true]);
                    break;
                case "controllers":
                    // publish controllers
                    $this->callSilent('vendor:publish', ['--tag' => 'tabler-update-controllers', '--force' => true]);
                    break;
                default:
                    // publish all files
                    $this->callSilent('vendor:publish', ['--tag' => 'tabler-update-full', '--force' => true]);
                    break;
            }

            // create symbolic link
            $this->callSilent('storage:link');

            // Clear the Route cache
            $this->callSilent('route:clear');
            $this->callSilent('route:cache');

            // print success message
            $this->info('The Tabler.io Framework is now updated.');
            $this->info('Please run php artisan migrate before continuing.');    
        } else {
            // print abort message
            $this->error('Update is aborted');
        }
    }
}
