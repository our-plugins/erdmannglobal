<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactMessage::with('property')->latest();

        if ($request->filled('status')) {
            if ($request->status === 'unread') {
                $query->unread();
            } else {
                $query->read();
            }
        }

        $messages = $query->paginate(20);

        return view('admin.messages.index', compact('messages'));
    }

    public function show(ContactMessage $message)
    {
        $message->markAsRead();
        $message->load('property');

        return view('admin.messages.show', compact('message'));
    }

    public function markAsRead(ContactMessage $message)
    {
        $message->markAsRead();

        return back()->with('success', 'Message marked as read.');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')
            ->with('success', 'Message deleted successfully.');
    }
}
