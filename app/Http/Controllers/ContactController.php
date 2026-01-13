<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
            'property_id' => 'nullable|exists:properties,id',
        ]);

        ContactMessage::create($validated);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => __('messages.contact_success'),
            ]);
        }

        return back()->with('success', __('messages.contact_success'));
    }
}
