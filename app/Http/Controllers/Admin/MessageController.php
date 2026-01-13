<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latestFirst()->paginate(20);
        $unreadCount = ContactMessage::unread()->count();
        return view('admin.messages.index', compact('messages', 'unreadCount'));
    }

    public function show(ContactMessage $message)
    {
        // Mark as read when viewing
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }
        
        return view('admin.messages.show', compact('message'));
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'বার্তা সফলভাবে মুছে ফেলা হয়েছে!');
    }

    public function markAsRead(ContactMessage $message)
    {
        $message->update(['is_read' => true]);
        return redirect()->back()->with('success', 'বার্তা পঠিত হিসেবে চিহ্নিত করা হয়েছে!');
    }

    public function markAllAsRead()
    {
        ContactMessage::unread()->update(['is_read' => true]);
        return redirect()->back()->with('success', 'সব বার্তা পঠিত হিসেবে চিহ্নিত করা হয়েছে!');
    }

    public function exportCsv()
    {
        $messages = ContactMessage::latestFirst()->get();
        
        $filename = 'messages_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($messages) {
            $file = fopen('php://output', 'w');
            
            // Add BOM for UTF-8 Excel compatibility
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // Header row
            fputcsv($file, ['আইডি', 'নাম', 'ইমেইল', 'ফোন', 'বিষয়', 'বার্তা', 'স্ট্যাটাস', 'তারিখ']);
            
            foreach ($messages as $message) {
                $subject = match($message->subject) {
                    'general' => 'সাধারণ অনুসন্ধান',
                    'support' => 'সহায়তা অনুরোধ',
                    'feedback' => 'মতামত ও পরামর্শ',
                    'volunteer' => 'স্বেচ্ছাসেবক হতে চাই',
                    'other' => 'অন্যান্য',
                    default => $message->subject ?? '-'
                };
                
                fputcsv($file, [
                    $message->id,
                    $message->name,
                    $message->email ?? '-',
                    $message->phone ?? '-',
                    $subject,
                    $message->message,
                    $message->is_read ? 'পঠিত' : 'অপঠিত',
                    $message->created_at->format('d/m/Y h:i A')
                ]);
            }
            
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function exportPdf()
    {
        $messages = ContactMessage::latestFirst()->get();
        
        $html = view('admin.messages.pdf', compact('messages'))->render();
        
        return response($html)
            ->header('Content-Type', 'text/html')
            ->header('Content-Disposition', 'inline; filename="messages_' . date('Y-m-d') . '.html"');
    }
}
