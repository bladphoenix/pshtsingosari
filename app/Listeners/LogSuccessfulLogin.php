<?php

namespace App\Listeners;

use App\Notifications\UserLogin;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        if($user->status) {
            if($this->request->ip() != $user->last_login_ip) {
                $user->notify(new UserLogin($user));
            }
            $user->last_login_at = date('Y-m-d H:i:s');
            $user->last_login_ip = $this->request->ip();
            $user->save();
        }
    }
}
