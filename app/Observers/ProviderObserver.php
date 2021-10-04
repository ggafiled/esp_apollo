<?php

namespace App\Observers;

use Dirape\Token\Token;
use App\Models\Provider;
use Illuminate\Support\Str;

class ProviderObserver
{
    /**
     * Handle the task "created" event.
     *
     * @param  \App\Task  $task
     * @return void
     */
    public function created(Provider $provider)
    {
        $provider->provider_key = Str::random(10);
        $provider->provider_secret_key = (new Token())->unique('providers', 'id', 32);
        $provider->save();
    }
}