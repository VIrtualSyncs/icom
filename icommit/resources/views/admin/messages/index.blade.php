@extends('template.master')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title">message box</h4>
                <div>
                    <a href="{{ route('messages.trash') }}" class="btn btn-warning">
                        <i class="mdi mdi-delete"></i> Recycle
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Service</th>
                            <th>message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $message)
                        <tr>
                            <td>{{ $messages->firstItem() + $loop->index }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email ?: '-' }}</td>
                            <td>{{ $message->phone ?: '-' }}</td>
                            <td>{{ $message->kebutuhan ?: '-' }}</td>
                            <td>{{ Str::limit($message->pesan, 50) }}</td>
                            <td>{{ $message->created_at ? $message->created_at->format('d M Y') : '-' }}</td>
                            <td>
                                <a href="{{ route('messages.show', $message) }}" class="btn btn-sm btn-info">Details</a>
                                <form action="{{ route('messages.destroy', $message) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin memindahkan pesan ini ke sampah?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">No messages yet</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $messages->links() }}
        </div>
    </div>
</div>
@endsection
