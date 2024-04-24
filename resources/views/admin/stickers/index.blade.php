@include('dash.head')
@include('dash.nav')
@include('dash.header')


<div class="container">
  <div class="row justify-content-center mt-4">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header bg-info text-white">Add New Sticker
              </div>

              <div class="card-body">
            
        

              </div>
          </div>
      </div>
  </div>
</div>





<div class="container mt-4">
    <h2 class="text-center mb-4">Trending Stickers</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th>Sticker Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stickers as $sticker)
                <tr>
                    <td>
                        <img src="{{ $sticker['images']['original']['url'] }}" alt="Sticker Image" style="max-width: 100px;">
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $stickers->links('vendor.pagination.bootstrap-4') }}
    </div>
    
</div>

@include('dash.footer')