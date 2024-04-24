@include('dash.head')
@include('dash.nav')
@include('dash.header')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card">
              
                <div class="card">
                    <div class="card-header bg-info text-white">Total User</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Users</h5>
                                        <p class="card-text">{{ $totalUsers }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Verified Users</h5>
                                        <p class="card-text">{{ $totalVerified }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
  @if(session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif
  <table class="table mt-4">
    <thead>
        <tr>
            <th></th> <!-- Add a new column for checkboxes -->
            <th>Name</th>
            <th>Email</th>
            <th>Age</th> 
            <th>Phone Number</th> 
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usersPaginated as $userData)
            <tr>
                <td>
                    <input type="checkbox" name="selectedUsers[]" value="{{ $userData['uid'] }}">
                </td>
                <td>{{ $userData['name'] }}</td>
                <td>{{ $userData['email'] }}</td>
                <td>{{ $userData['age'] }}</td>
                <td>{{ $userData['phoneNumber'] }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="User Actions">
                        <a href="{{ route('users.edit', $userData['uid']) }}" class="btn btn-primary btn-sm m-2">Edit</a>
                        
                        <form action="{{ route('users.destroy', $userData['uid']) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm m-2">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

  <div class="d-flex justify-content-center">
 
    {{ $usersPaginated->links('vendor.pagination.bootstrap-4') }}
</div>

</div>

</div>
</div>
</div>
</div>
</div>

@include('dash.footer')