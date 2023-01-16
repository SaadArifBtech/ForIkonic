


 <!---- OLD CODE -->
<!--- <div class="my-2 shadow  text-white bg-dark p-1" id="">
  <div class="d-flex justify-content-between">
    <table class="ms-1">
      <td class="align-middle">Name</td>
      <td class="align-middle"> - </td>
      <td class="align-middle">Email</td>
      <td class="align-middle"> 
    </table>
    <div>
      <button id="create_request_btn_" class="btn btn-primary me-1">Connect</button>
    </div>
  </div>
</div>
--->
<!--- My Implementation -->
<div class="card">
    <div class="card-header">Suggested Users</div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
              @if(count(array($suggestedUsers))>0)
                @foreach($suggestedUsers as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('connections.connect', $user->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-success">Connect</button>
                        </form>
                    </td>
                </tr>
                @endforeach
              @else
              <tr>
                No records
              </tr>
              @endif
            </tbody>
        </table>
    </div>
</div>