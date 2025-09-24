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

    // 👉 tampilkan form (kalau punya halaman form khusus)
    //    kalau form disisipkan di semua halaman, langkah ini boleh dilewati
    public function create()
    {
        // buat soal aritmatika
        $a = rand(1, 9);
        $b = rand(1, 9);

        // simpan hasil dan angka di session
        session([
            'captcha_result' => $a + $b,
            'captcha_a'      => $a,
            'captcha_b'      => $b,
        ]);

        // kirim variabel ke view (opsional, Blade juga bisa ambil dari session)
        return view('contact.form', compact('a', 'b'));
    }

    // Simpan pesan dari form
    public function input_messege(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'nullable|email',
            'phone'     => 'nullable|string|max:20',
            'kebutuhan' => 'required|in:Informasi Pesona Prima 8,Kunjungan Lokasi,Konsultasi KPR,Lainnya',
            'pesan'     => 'required|string',
            'captcha'   => 'required|numeric', // ✅ validasi captcha
        ]);

        // ✅ cek jawaban captcha dari session
        if ((int)$request->captcha !== (int)session('captcha_result')) {
            // regenerate soal baru supaya tidak bisa brute force
            $newA = rand(1, 9);
            $newB = rand(1, 9);
            session([
                'captcha_result' => $newA + $newB,
                'captcha_a'      => $newA,
                'captcha_b'      => $newB,
            ]);

            return back()
                ->withInput()
                ->withErrors(['captcha' => 'Jawaban captcha salah, silakan coba lagi.']);
        }

        // hapus captcha setelah dipakai
        session()->forget(['captcha_result','captcha_a','captcha_b']);

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
