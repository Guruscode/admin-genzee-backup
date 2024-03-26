@include('dash.head')
@include('dash.nav')
@include('dash.header')

<div class="container">
  <h1 class="mt-5">User Data</h1>
  <table class="table mt-4">
      <thead>
          <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Uid</th>
              <th>age</th>
              <th>about</th>
              <th>bodyType</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($usersData as $userData)
              <tr>
                  <td>{{ $userData['name'] }}</td>
                  <td>{{ $userData['email'] }}</td>
                  <td>{{ $userData['uid'] }}</td>
                  <td>{{ $userData['age'] }}</td>
                  <td>{{ $userData['about'] }}</td>
                  <td>{{ $userData['bodyType'] }}</td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>

@include('dash.footer')