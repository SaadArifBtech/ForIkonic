<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($friendRequests as $request)
        <tr>
            <td>{{ $request->sender->name }}</td>
            <td>{{ $request->sender->email }}</td>
            <td>
                <form action="{{ route('friend-requests.accept', $request->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-success">Accept</button>
                </form>
                <form action="{{ route('friend-requests.reject', $request->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Reject</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
