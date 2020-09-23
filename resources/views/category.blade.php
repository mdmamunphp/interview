@extends('master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>category Tables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">category</li>
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
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i
                                                class="fas fa-search"></i></button>
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
                                        
                                             <button type="submit" class="btn btn-success">view</button>
                                             <!-- <input type="button" class="cate_id" value="{{ $value->id }}"> -->
                                             <button type="submit"  class="b" data-id="{{ $value->id }}" class="btn btn-danger">delete</button>

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
                <div>
                    <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">category add:</label>
                            <input type="text" name="name" class="form-control" id="recipient-name">
                        </div>
                        <div class="modal-footer">

                            <input type="submit" class="btn btn-primary" value="submit">

                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->





        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
// $(document).ready(function(){
//   $(".field").change(function(){
//     alert("ok")
//   });
// });

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  $(".b").click(function(){
    var id=$(this).data("id");
   // alert("The paragraph was clicked. -"+id);

    $.ajax({
            url: '{{ url('category/get_details') }}',
            method: 'post',
            data: {
                category_id: id,
               
            },
            dataType: "json",
            success: function(data) {

                console.log(data);
                var html="";
               // alert("Text: " + $("Name:"+data.p_name+" Email:"+data.cate_name).text());
               for(var i=0;i< data.length; i++){
                    html +="product name : " + data[i].p_name;
                   
                   console.log(data[i].p_name);

               }
               swal({
                        title: "Are you sure?",
                        text: html,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {

                        if (willDelete) {
                            $.ajax({
                                    url: '{{ url('category/category_detelete') }}',
                                    method: 'post',
                                    data: { category_id:id,                         
                                    },
                                    dataType: "json",
                                    success: function(data) {

                                        console.log(data);

                                     
                                        //  alert(data.success);


                                    },
                                    error: function(error) {
                                        console.log(error); 

                                    }
                                })
                          //  console.log("ok");

                            swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",

                            

                            });
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                        });

                                    //   alert(html);
// if(confirm(" Category_name:"+data[0].cate_name+"product_name:"+data[0].p_name)){


// }
//              //   $("#customer_details").html("<td> Id:"+data.id+"</td><td> Name:"+data.name+"</td><td> Email:"+data.email+"</td>");
                //  alert(data.success);


            },
            error: function(error) {
                console.log(error); 

            }
        })



  });
});
</script>






@endsection