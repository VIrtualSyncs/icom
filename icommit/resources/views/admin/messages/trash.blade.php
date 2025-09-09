@extends('template.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Sampah - Pesan Terhapus</h4>
            <p class="card-description">Pesan yang telah dihapus sementara</p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Kebutuhan</th>
                            <th>Pesan</th>
                            <th>Dihapus pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $message)
                        <tr>
                            <td>{{ $message->id }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email ?: '-' }}</td>
                            <td>{{ $message->phone ?: '-' }}</td>
                            <td>{{ $message->kebutuhan ?: '-' }}</td>
                            <td>{{ Str::limit($message->pesan, 50) }}</td>
                            <td>{{ $message->deleted_at ? $message->deleted_at->format('d M Y H:i') : '-' }}</td>
                            <td>
                                <form action="{{ route('messages.restore', $message->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Kembalikan pesan ini?')">Kembalikan</button>
                                </form>
                                <form action="{{ route('messages.force-delete', $message->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus permanen? Data tidak dapat dikembalikan!')">Hapus Permanen</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Sampah kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $messages->links() }}
            <div class="mt-3">
                <a href="{{ route('messages.index') }}" class="btn btn-secondary">Kembali ke Kotak Pesan</a>
            </div>
        </div>
    </div>
</div>

@endsection
