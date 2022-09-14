<?php

namespace Karo\Support;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class KS
{


    /**
     * Register a Closure based command with the application.
     *
     * @param $key
     * @param $name
     * @param $content
     * @param $payload
     * @return \Illuminate\Http\Client\Response
     * @static
     */
    public function send($key, $name, $content, $payload)
    {


        $api_key = config('karosupport.ks_api_key');
        if (!$api_key){
            abort(403, 'Invalid api key - KS Support');
        }

        return Http::withHeaders([
            'api-key' => $api_key
        ])->post('https://supportapi.karo.studio/api/tickets/new', [
            'key' => $key,
            'name' => $name,
            'content' => $content,
            'payload' => $payload,
        ]);
    }
}
