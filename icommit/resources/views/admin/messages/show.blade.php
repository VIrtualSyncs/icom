@extends('template.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Detail Pesan</h4>
            <div class="row">
                <div class="col-md-6">
                    <h6>Nama:</h6>
                    <p>{{ $message->name }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Email:</h6>
                    <p>{{ $message->email ?: '-' }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6>Telepon:</h6>
                    <p>{{ $message->phone ?: '-' }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Kebutuhan:</h6>
                    <p>{{ $message->kebutuhan ?: '-' }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h6>Pesan:</h6>
                    <p>{{ $message->pesan }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h6>Dikirim pada:</h6>
                    <p>{{ $message->created_at ? $message->created_at->format('d M Y H:i') : '-' }}</p>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('messages.index') }}" class="btn btn-secondary">Kembali</a>
                <form action="{{ route('messages.destroy', $message) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">Hapus Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
