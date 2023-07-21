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
 }
