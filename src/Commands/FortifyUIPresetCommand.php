<?php

namespace Proxeuse\FortifyUITabler\Commands;

use Illuminate\Console\Command;

class FortifyUITablerCommand extends Command
{
    public $signature = 'fortify-ui:tabler';

    public $description = 'Install Tabler.io with views and resources';

    public function handle()
    {
        $this->publishAssets();

        $this->comment('The Tabler.io Framework is now installed.');
    }

    protected function publishAssets()
    {
        $this->callSilent('vendor:publish', ['--tag' => 'fortify-ui-tabler-resources', '--force' => true]);
    }
}
