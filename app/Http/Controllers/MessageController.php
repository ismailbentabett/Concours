<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Show all messages (Admin Inbox)
    public function index()
    {
        $messages = Message::latest()->paginate(10);

        return view('admin.inbox.index', compact('messages'));
    }

    // Show the details of a specific message
    public function show($id)
    {
        $message = Message::findOrFail($id);

        return view('admin.inbox.show', compact('message'));
    }

    // Delete a message
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.inbox.index')
            ->with('success', 'Message deleted successfully.');
    }

    //create
    public function create()
    {
        return view('admin.inbox.create');
    }

    //store
    public function store(Request $request)
    {


        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:255 ',
        ]);

        $message = new Message();
        $message->firstName = $request->input('firstName');
        $message->lastName = $request->input('lastName');
        $message->email = $request->input('email');
        $message->phone = $request->input('phone');
        $message->subject = $request->input('subject');
        $message->message = $request->input('message');
        $message->save();

        return redirect()->back()->with('success', 'Message sent successfully.');
    }
}
