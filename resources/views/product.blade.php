@extends('master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products Add</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>


                    </div>



                    <form action="{{ route('product.store') }}" method="POST">
                        @csrf
                        @method('post')

                        <div class="card-body row" id="rowAdd">




                            <div class="form-group col-sm-6">
                                <label for="pname">prodcut name</label>
                                <input type="text" id="pname" name="pname" class="form-control">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="qty">qty</label>
                                <input type="text" id="qty" name="qty" class="form-control">
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="category">category Name</label>

                                <select class="form-control custom-select" name="category_id" id="category">
                                    <option selected disabled>Select one</option>
                                    @isset($cate)
                                    @foreach($cate as $key => $sup)
                                    <option value="{{ $sup->id }}">{{ $sup->name }}</option>
                                    @endforeach

                                    @endisset

                                </select>

                            </div>
                            <div class="form-group col-sm-6">
                                <label for="purchase_date">price</label>
                                <input type="text" id="purchase_date" name="price" class="form-control">
                            </div>

                        </div>

                        <div class="modal-footer">

                            <input type="submit" class="btn btn-primary" value="submit">

                        </div>



                </div>

            </div>


            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>product name</th>
                            <th>quantity</th>
                            <th>price</th>
                            <th>sku</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @isset($product)


                        @foreach($product as $value)


                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->quantity }}</td>
                            <td>{{ $value->price }}</td>
                            <td>{{ $value->sku }}</td>
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

            
            <!-- /.card -->
        </div>

        <!-- /.card -->
</div>

</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
 
<script type="text/javascript">
$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    {
        {
            --$('#formRow').click(function() {
                alert("test");
            });
            --
        }
    }



    $("#formRow").click(function() {

        $("#rowAdd").append(
            '<div class="form-group col-sm-3"><label for="pro">product Name</label><select class="form-control custom-select" id="pro"><option selected disabled>Select one</option>@isset($product)  @foreach($product as $key => $pro)<option id="{{ $pro->id }}">{{ $pro->name }}</option>@endforeach   @endisset     </select></div><div class="form-group col-sm-3"><label for="product">product price</label><input type="text" id="product" class="form-control"></div>   <div class="form-group col-sm-3"><label for="quant">quantity</label><input type="text" id="quant" class="form-control"></div><div class="form-group col-sm-3"><button type="button"  value="add row" id="formRow"style="margin-top: 15%" class="btn btn-success">add </button></div>'
        )


    });


    // $(function() {
    //     $('#formRow').onchange(function(e) {
    //       //  alert("test");
    //       var customer = $("#customer_id").val();


    //       console.log();
    //     });
    // });



    $('#createForm').submit(function(e) {

        e.preventDefault();


        var supplier = $("#supplier_id").val();
        var pdate = $("#purchase_date").val();

        var branche = $("#branche_id").val();

        var invoice = $("#invoice").val();
        var due = $("#due").val();
        var paid = $("#paid").val();

        var discount = $("#discount").val();
        var sub_total = $("#sub_total").val();






        console.log(paid);
        console.log(supplier);



        $.ajax({
            url: '{{ url('
            purchases / store ') }}',
            method: 'post',
            data: {
                supplier: supplier,
                pdate: pdate,
                branche: branche,
                invoice: invoice,
                paid: paid,
                due: due,
                discount: discount,
                sub_total: sub_total
            },
            dataType: "json",
            success: function(data) {

                console.log(data);

                //  alert(data.success);


            },
            error: function(error) {
                console.log('not ok'); {
                    {
                        --alert(data.error);
                        location.reload();
                        --
                    }
                }

            }
        })





    })
})
</script>

















<!-- /modal -->









<!-- modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Product add</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" action="{{ url('products/purchase') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- input states -->
                                <div class="form-group">
                                    <label class="col-form-label" for="inputSuccess"> name</label>
                                    <input type="text" class="form-control" id="inputSuccess" name="name"
                                        placeholder="product name">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="inputWarning"> description</label>
                                    <textarea class="form-control" rows="3" name="description"
                                        placeholder="product description"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>category</label>
                                            <select class="form-control" name="categories_id">
                                                @isset($cate)
                                                @foreach($cate as $cat)
                                                <option id="{{ $cat->id }}" value="{{ $cat->id }}">{{ $cat->name }}
                                                </option>
                                                @endforeach

                                                @endisset
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>subcategory</label>
                                            <select class="form-control" name="subcategories_id">
                                                @isset($sub)
                                                @foreach($sub as $su)
                                                <option id="{{ $su->id }}" value="{{ $su->id }}">{{ $su->name }}
                                                </option>
                                                @endforeach

                                                @endisset

                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label for="customFile">Custom File</label>

                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="images"
                                                    id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>unit</label>
                                            <select class="form-control" name="unit_id">
                                                <option>select unit</option>
                                                @isset($unit)
                                                @foreach($unit as $uni)
                                                <option id="{{ $uni->id }}" value="{{ $uni->id }}">{{ $uni->name }}
                                                </option>
                                                @endforeach

                                                @endisset

                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">

                                    <div class="col-sm-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputSuccess"> SKU</label>
                                            <input type="text" class="form-control" name="sku" id="inputSuccess"
                                                placeholder="Enter SKU">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label" for="inputSuccess"> Barcode</label>
                                            <input type="text" class="form-control" name="barcode" id="inputSuccess"
                                                placeholder="Enter Barcode">
                                        </div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="submit">

                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (right) -->




            </div>

        </div>
    </div>
</div>

<!-- /modal -->

@endsection