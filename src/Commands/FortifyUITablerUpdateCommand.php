<?php

namespace Proxeuse\FortifyUITabler\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class FortifyUITablerUpdateCommand extends Command
{
    public $signature = 'fortify-ui:tabler-update';

    public $description = 'Update views, resources and routes for the Tabler.io framework.';

    public function handle()
    {
        // confirm the installation
        if ($this->confirm('Do you wish to continue? This updater will try to overwrite existing views, resources, language files and routes.', true)) {
            // install fortifyUI
            \Artisan::call('fortify-ui:install');
            $this->info('FortifyUI has been updated. Proceeding to update Tabler.io.');
            
            // publish the assets, routes, controllers, etc.
            $this->publishAssets();

            // create symbolic link
            \Artisan::call('storage:link');

            // Clear the Route cache
            \Artisan::call('route:clear');
            \Artisan::call('route:cache');

            // print success message
            $this->info('The Tabler.io Framework is now updated.');
            $this->newLine();
            $this->line('Please run php artisan migrate before continuing.');    
        } else {
            // print abort message
            $this->error('Update is aborted');
        }
    }

    protected function publishAssets()
    {
        $this->callSilent('vendor:publish', ['--tag' => 'fortify-ui-tabler-resources', '--force' => true]);
    }
}
