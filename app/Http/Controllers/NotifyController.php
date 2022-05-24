<?php

namespace App\Http\Controllers;

use App\Events\Notify;
use App\Models\Message;
use App\Models\User;
use App\Notifications\NotifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;

class NotifyController extends Controller
{
    //

    public function __construct()
    {
        $sendMessage = new Message;
        $sendMessage->message = Random::generate(12);
        $sendMessage->save();

        event(new Notify($sendMessage));

        /**
         * In a scenaro where the user calling the event doesn't have to
         * see the broadcast, use the broadcast function to call the event instead
         */

        // =====>>>>> broadcast(new Notify($sendMessage))->toOthers; <<<<<===== \\

    }

}
