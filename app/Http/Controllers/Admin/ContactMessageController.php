<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $totalMessages = ContactMessage::count();
        $unreadMessages = ContactMessage::unread()->count();
        $readMessages = ContactMessage::read()->count();
        $repliedMessages = ContactMessage::replied()->count();

        return view('admin.messages.index', compact(
            'totalMessages',
            'unreadMessages',
            'readMessages',
            'repliedMessages'
        ));
    }

    public function getData()
    {
        $messages = ContactMessage::latest();

        return DataTables::of($messages)
            ->addIndexColumn()
            ->addColumn('source_badge', function ($message) {
                $badges = [
                    'contact' => '<span class="badge bg-primary text-dark">Contact</span>',
                    'scholarship' => '<span class="badge bg-warning text-dark">Scholarship</span>'
                ];
                return $badges[$message->source ?? 'contact'] ?? '<span class="badge bg-secondary text-dark">Unknown</span>';
            })
            ->addColumn('status_badge', function ($message) {
                $badges = [
                    'unread' => '<span class="badge bg-danger text-white">Unread</span>',
                    'read' => '<span class="badge bg-info text-dark">Read</span>',
                    'replied' => '<span class="badge bg-success text-white">Replied</span>'
                ];
                return $badges[$message->status] ?? '<span class="badge bg-secondary text-dark">Unknown</span>';
            })
            ->addColumn('formatted_date', function ($message) {
                return $message->created_at->format('M d, Y h:i A');
            })
            ->addColumn('action', function ($message) {
                $actions = '
                    <div class="btn-group" role="group">
                        <a href="'.route('admin.messages.show', $message->id).'" class="btn btn-sm btn-info" title="View">
                            <i class="fas fa-eye"></i>
                        </a>';

                // Show "Mark as Read" only if message is unread
                if ($message->status === 'unread') {
                    $actions .= '
                        <button type="button" class="btn btn-sm btn-warning mark-as-read" data-id="'.$message->id.'" title="Mark as Read">
                            <i class="fas fa-check"></i>
                        </button>';
                }

                // Show "Mark as Unread" only if message is read or replied
                if ($message->status === 'read' || $message->status === 'replied') {
                    $actions .= '
                        <button type="button" class="btn btn-sm btn-secondary mark-as-unread" data-id="'.$message->id.'" title="Mark as Unread">
                            <i class="fas fa-undo"></i>
                        </button>';
                }

                // Show "Mark as Replied" only if message is not already replied
                if ($message->status !== 'replied') {
                    $actions .= '
                        <button type="button" class="btn btn-sm btn-success mark-as-replied" data-id="'.$message->id.'" title="Mark as Replied">
                            <i class="fas fa-reply"></i>
                        </button>';
                }

                $actions .= '
                        <button type="button" class="btn btn-sm btn-danger delete-message" data-id="'.$message->id.'" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                ';

                return $actions;
            })
            ->rawColumns(['source_badge', 'status_badge', 'action'])
            ->make(true);
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);

        // Mark as read if it's unread
        if ($message->status === 'unread') {
            $message->update(['status' => 'read']);
        }

        return view('admin.messages.show', compact('message'));
    }

    public function updateStatus(Request $request, $id)
    {
        $message = ContactMessage::findOrFail($id);

        $request->validate([
            'status' => 'required|in:unread,read,replied'
        ]);

        $message->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Message status updated successfully.'
        ]);
    }

    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return response()->json([
            'success' => true,
            'message' => 'Message deleted successfully.'
        ]);
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:read,unread,replied,delete',
            'message_ids' => 'required|array'
        ]);

        $messageIds = $request->message_ids;

        switch ($request->action) {
            case 'read':
                ContactMessage::whereIn('id', $messageIds)->update(['status' => 'read']);
                break;
            case 'unread':
                ContactMessage::whereIn('id', $messageIds)->update(['status' => 'unread']);
                break;
            case 'replied':
                ContactMessage::whereIn('id', $messageIds)->update(['status' => 'replied']);
                break;
            case 'delete':
                ContactMessage::whereIn('id', $messageIds)->delete();
                break;
        }

        return response()->json([
            'success' => true,
            'message' => 'Bulk action completed successfully.'
        ]);
    }
}
