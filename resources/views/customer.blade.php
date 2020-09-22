@extends('master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>customer Tables</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">customer</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">



      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Responsive Hover Table</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Action</th>

                  </tr>
                </thead>
                <tbody>
                    @isset($result)


                    @foreach($result as $value)


                  <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>
                        <a href="">view</a>
                        <a href="">edit</a>
                        <a href="">delete</a>

                    </td>

                  </tr>
                  @endforeach
                  @endisset
                
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
      <h2>customer add<h2>
      <div>
   
        <form action="{{ route('customer.store') }}" method="post">
            @csrf
          <div class="form-group">
            <label for="name-name" class="col-form-label">name:</label>
            <input type="text" name="name"class="form-control" id="name-name">
          </div>
          <div class="form-group">
            <label for="email-name" class="col-form-label">email add:</label>
            <input type="text" name="email"class="form-control" id="email-name">
          </div>
          <div class="form-group">
            <label for="mobile-name" class="col-form-label">mobile add:</label>
            <input type="text" name="mobile"class="form-control" id="mobile-name">
          </div>
          <div class="form-group">
            <label for="images" class="col-form-label">images add:</label>
            <input type="file" name="image"class="form-control" id="images">
          </div>
          <div class="modal-footer">
         
            <input type="submit" class="btn btn-primary" value="submit">
          
          </div>
        </form>
        </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection
