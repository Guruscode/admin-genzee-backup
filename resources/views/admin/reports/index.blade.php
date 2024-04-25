@include('dash.head')
@include('dash.nav')
@include('dash.header')

<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">Profile Reports (Latest reports)</div>
  
                <div class="card-body">
                  
                </div>
            </div>
        </div>
    </div>
  </div>
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card">
               
  
  @if(session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
  @endif
  <table class="table">
    <thead>
        <tr>
            <th>Messages</th>
            <th>Reason</th>
            <th>Reported Account</th>
            <th>Reporter</th>
            <th>Timestamp</th>
          
        </tr>
    </thead>
    <tbody>
        @foreach ($complaintsPaginated as $complaint)
            <tr>
                <td>{{ $complaint['messages']['stringValue'] }}</td>
                <td>{{ $complaint['reason']['stringValue'] }}</td>
                <td>{{ $complaint['reported account']['stringValue'] }}</td>
                <td>{{ $complaint['reporter']['stringValue'] }}</td>
                <td>{{ $complaint['timestamp']['stringValue'] }}</td>
             
            </tr>
        @endforeach
    </tbody>
</table>

{{ $complaintsPaginated->links() }}
</div>

</div>
</div>
</div>
</div>
</div>

@include('dash.footer')