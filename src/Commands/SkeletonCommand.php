<?php

namespace Spatie\Skeleton\Commands;

use Illuminate\Console\Command;

/* This original file is a template.  Feel free to copy and rename, as needed.
For each 'Command' in this directory, there should be a corresponding
entry in src/SkeletonServiceProvider.php/boot/this->commands([...


*/

class SkeletonCommand extends Command
{
    public $signature = 'bladeprefix:somecommand'; # Hint: The ':' groups the command under a similiar heading.

    public $description = 'Default description for Spatie/Skeleton command';

    public $help = <<<EOD
    Sample: Your extendended instructions goes here.
    These instructions should be more thurough than the description.
    EOD;
    
    public function handle()
    {
        $this->comment('Spatie/Skeleton/hw/tbd');
    }
}
