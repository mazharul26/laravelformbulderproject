<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;
use Notification;
use App\Notifications\OffersNotification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('welcome');
    }

    public function sendOfferNotification() {
        $userSchema = User::first();

        $offerData =  'You received an offer.';


        // Notification::send($userSchema, new OffersNotification($offerData));

        $userSchema->notify(new OffersNotification(Auth::user()->name .$offerData, 12));
        return redirect('dashboard')->with('success','Notification send successfully.');

    }
}
