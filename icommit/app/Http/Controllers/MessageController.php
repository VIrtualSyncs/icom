<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // List semua pesan
    public function index()
    {
        $messages = Message::latest()->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    // Alias untuk listmessages
    public function listmessages()
    {
        return $this->index();
    }

    // Simpan pesan dari form
    public function input_messege(Request $request)
    {
        
        $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'nullable|email',
    'phone' => 'nullable|string|max:20',
    'kebutuhan' => 'required|in:Informasi GreenVilla Premium,Kunjungan Lokasi,Konsultasi KPR,Lainnya',
    'pesan' => 'required|string',
]);


        Message::create($request->only('name', 'email', 'phone', 'kebutuhan', 'pesan'));

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }

    // Detail pesan
    public function show(Message $message)
    {
        return view('admin.messages.show', compact('message'));
    }

    // Soft delete
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('messages.index')->with('success','Pesan dipindahkan ke sampah.');
    }

    // Tampilkan pesan dihapus
    public function trash()
    {
        $messages = Message::onlyTrashed()->latest()->paginate(10);
        return view('admin.messages.trash', compact('messages'));
    }

    // Restore pesan
    public function restore($id)
    {
        $message = Message::withTrashed()->findOrFail($id);
        $message->restore();
        return redirect()->route('messages.trash')->with('success','Pesan berhasil dikembalikan.');
    }

    // Hapus permanen
    public function forceDelete($id)
    {
        $message = Message::withTrashed()->findOrFail($id);
        $message->forceDelete();
        return redirect()->route('messages.trash')->with('success','Pesan dihapus permanen.');
    }
}
