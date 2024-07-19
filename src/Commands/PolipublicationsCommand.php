<?php

namespace Detit\Polipublications\Commands;

use Illuminate\Console\Command;

class PolipublicationsCommand extends Command
{
    public $signature = 'polipublications';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
