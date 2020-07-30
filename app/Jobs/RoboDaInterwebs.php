<?php

namespace App\Jobs;

use App\Module\Validador\Endpoint;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class roboDaInterwebs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $endpoints = Endpoint::all();

        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_CONNECTTIMEOUT => 120,
            CURLOPT_TIMEOUT => 120,
        ];
        foreach ($endpoints as $endpoint) {

            $ch = curl_init($endpoint->endpoint);
            curl_setopt_array($ch, $options);

            $endpoint->http_body = curl_exec($ch);
            $endpoint->http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $endpoint->checked = true;
            $endpoint->checked_at = new \DateTime();

            $endpoint->save();
            curl_close($ch);
        }
    }
}
