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
                                        {{-- <p class="card-text">{{ $totalUsers }}</p> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Verified Users</h5>
                                        {{-- <p class="card-text">{{ $totalVerified }}</p> --}}
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


  <table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>age</th>
            <th>phone Number</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usersPaginated as $user)
        <tr>
            <td>{{ $user['name']['stringValue'] }}</td>
            <td>{{ $user['email']['stringValue'] }}</td>
            <td>{{ $user['age']['stringValue'] }}</td>
            <td>{{ $user['phoneNumber']['stringValue'] }}</td>
        
            <td>
                <div class="btn-group" role="group" aria-label="User Actions">
                    <a href="{{ route('users.edit', $user['uid']['stringValue']) }}" class="btn btn-primary btn-sm m-2">Edit</a>
                    <form action="{{ route('users.destroy', $user['uid']['stringValue']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm m-2" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
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











{{-- <table class="table mt-4">
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
                <input type="checkbox" name="selectedUsers[]" value="{{ implode(',', $userData['uid']) }}">
            </td>
              <td>{{ $userData['name']['stringValue'] }}</td> <!-- Assuming 'name' field is represented as a string -->
                        <td>{{ $userData['email']['stringValue'] }}</td> <!-- Assuming 'email' field is represented as a string -->
                        <td>{{ $userData['age']['stringValue'] }}</td> <!-- Assuming 'age' field is represented as a string -->
                        <td>{{ $userData['phoneNumber']['stringValue'] }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="User Actions">
                    <a href="{{ route('users.edit', $userData['uid']['stringValue']) }}" class="btn btn-primary btn-sm m-2">Edit</a>
                    <form action="{{ route('users.destroy', $userData['uid']['stringValue']) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
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
</div> --}}