<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($friends as $friend)
        <tr>
            <td>{{ $friend->name }}</td>
            <td>{{ $friend->email }}</td>
            <td>
                <form action="{{ route('friends.remove', $friend->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Remove</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>