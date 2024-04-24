@include('dash.head')
@include('dash.nav')
@include('dash.header')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">Verfield Odogwu and Classy</div>
  
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
              <th>phone Number</th>
              <th>Action</th>
            
          </tr>
      </thead>
      <tbody>
        @foreach($usersData as $user)
        <tr>
            <td>{{ $user['name'] }}</td>
            <td>{{ $user['email'] }}</td>
            <td>{{ $user['age'] }}</td>
            <td>{{ $user['phoneNumber'] }}</td>
    
            <td>
              <div class="btn-group" role="group" aria-label="User Actions">
                <a href="{{ route('verifield.edit', $user['uid']) }}" class="btn btn-primary btn-sm m-2">Edit</a>
                <form action="{{ route('verifield.destroy', $user['uid']) }}" method="POST">
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
</div>

</div>
</div>
</div>
</div>
</div>

@include('dash.footer')