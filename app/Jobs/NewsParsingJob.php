<?php

namespace App\Jobs;

use App\Services\NewsParser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class NewsParsingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $source;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($source)
    {
        $this->source = $source;
    }

    /**
     * Execute the job.
     *
     * @param NewsParser $parser
     * @return void
     */
    public function handle(NewsParser $parser)
    {
        \Storage::disk('parser_logs')
            ->append('parsing.log', date('Y-m-d ') . $this->source);

        $message = 'success';
        try {
            $data = $parser->run($this->source);

        } catch (\Exception $e) {
            $message = 'error';
        } finally {
            \Storage::disk('parser_logs')
                ->append('parsing.log', $message);

        }

    }


}