<?php

namespace NhanChauKP\MomoPayment\Commands;

use Illuminate\Console\Command;

class MomoPaymentCommand extends Command
{
    public $signature = 'momo-payment';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
