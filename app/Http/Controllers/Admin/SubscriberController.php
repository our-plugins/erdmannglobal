<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubscriberController extends Controller
{
    public function index(Request $request)
    {
        $query = NewsletterSubscriber::latest();

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->active();
            } else {
                $query->where('is_active', false);
            }
        }

        $subscribers = $query->paginate(30);

        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function destroy(NewsletterSubscriber $subscriber)
    {
        $subscriber->delete();

        return redirect()->route('admin.subscribers.index')
            ->with('success', 'Subscriber deleted successfully.');
    }

    public function export()
    {
        $subscribers = NewsletterSubscriber::active()->get();

        $csv = "Email,Subscribed At\n";
        foreach ($subscribers as $subscriber) {
            $csv .= "{$subscriber->email},{$subscriber->subscribed_at}\n";
        }

        return response($csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="subscribers.csv"',
        ]);
    }
}
