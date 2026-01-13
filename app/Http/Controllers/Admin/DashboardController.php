<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\BlogPost;
use App\Models\ContactMessage;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_properties' => Property::count(),
            'published_properties' => Property::published()->count(),
            'draft_properties' => Property::where('status', 'draft')->count(),
            'total_posts' => BlogPost::count(),
            'published_posts' => BlogPost::published()->count(),
            'unread_messages' => ContactMessage::unread()->count(),
            'total_subscribers' => NewsletterSubscriber::active()->count(),
        ];

        $recentProperties = Property::latest()->take(5)->get();
        $recentMessages = ContactMessage::latest()->take(5)->get();
        $recentPosts = BlogPost::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentProperties', 'recentMessages', 'recentPosts'));
    }
}
