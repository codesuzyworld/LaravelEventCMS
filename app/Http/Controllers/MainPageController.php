<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Type;

class MainPageController extends Controller
{
    public function home()
    {
        //Note: I am making this controller so I can handle Search functionality. 
        $query = Event::query();

        if (request('search')) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }

        if (request('type')) {
            $query->whereHas('type', function($q) {
                $q->where('title', request('type'));
            });
        }

        return view('welcome', [
            'events' => $query->latest()->get(),
        ]);
    }
} 