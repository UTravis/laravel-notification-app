<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Message;

class GetMessage extends Controller
{
    //
    public function getMessage()
    {
        $message = Message::where('is_read', 0)->orderBy('id', 'desc')->get();

        // $message = $message->message;

        return response()->json($message);
    }
}
