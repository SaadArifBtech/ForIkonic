<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($suggestions as $suggestion)
        <tr>
            <td>{{ $suggestion->suggested_user->name }}</td>
            <td>{{ $suggestion->suggested_user->email }}</td>
            <td>
                <form action="{{ route('suggestions.accept', $suggestion->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-success">Accept</button>
                </form>
                <form action="{{ route('suggestions.reject', $suggestion->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Reject</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>