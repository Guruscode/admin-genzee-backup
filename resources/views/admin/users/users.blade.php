@include('dash.head')
@include('dash.nav')
@include('dash.header')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">User Data</div>
  
  @if(session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif
  <table class="table mt-4">
      <thead>
          <tr>
              <th>Name</th>
              <th>Email</th>
              <th>age</th>
              <th>Action</th>
            
          </tr>
      </thead>
      <tbody>
          @foreach ($usersData as $userData)
              <tr>
                  <td>{{ $userData['name'] }}</td>
                  <td>{{ $userData['email'] }}</td>
                  <td>{{ $userData['age'] }}</td>
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
</div>

</div>
</div>
</div>
</div>
</div>

@include('dash.footer')