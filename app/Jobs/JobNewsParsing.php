<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Services\Contracts\Parser;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class JobNewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $link;
    public int $id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $link, int $id)
    {
        $this->link = $link;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Parser $parser)
    {
        $load = $parser->setLink($this->link)->saveParserData($this->id);
    }
}
