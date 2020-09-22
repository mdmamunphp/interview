@extends('master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order Add</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order Add</li>
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

                        <!-- <div class="card-tools">
            
              <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">product add</button>
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">branche add</button>
                 <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">supplier add</button>
            </div> -->
                    </div>



                    <form action="{{ url('order/orderadd') }}" method="POST">
                        @csrf
                        @method('post')

                        <div class="card-body row" id="rowAdd">






                            <div class="form-group col-sm-4">
                                <label for="sup">customer Name</label>

                                <select class="form-control custom-select" name="supplier_id" id="supplier_id">
                                    <option selected disabled>Select one</option>
                                    @isset($customer)
                                    @foreach($customer as $key => $sup)
                                    <option <?php if($sup->id==session('supplier_id')){ echo "selected";}?>
                                        value="{{ $sup->id }}">{{ $sup->name }}</option>
                                    @endforeach

                                    @endisset

                                </select>

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="purchase_date">issu date</label>
                                <input type="date" id="purchase_date" name="purchase_date"
                                    value="{{ session('purchase_date') }}" class="form-control">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="sup">supplier Name</label>

                                <select class="form-control custom-select" name="supplier_id" id="supplier_id">
                                    <option selected disabled>Select one</option>
                                    @isset($cate)
                                    @foreach($cate as $key => $sup)
                                    <option  value="{{ $sup->id }}">{{ $sup->name }}</option>
                                    @endforeach

                                    @endisset

                                </select>

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="invoice">invoice id</label>
                                <input type="text" id="invoice" name="invoice_id"  class="form-control">
                            </div>



                            <table class="table">

                                <tr>
                                    <td>


                                        <label for="pro_name">product Name</label>

                                        <select class="form-control custom-select col-sm-6" name="product_id"
                                            id="pro_name">
                                            <option selected disabled>Select one</option>

                                            @isset($product)
                                            @foreach($product as $key => $pro)
                                            <option size="2" value="{{ $pro->id }}">{{ $pro->name }}</option>
                                            @endforeach

                                            @endisset

                                        </select>




                                    </td>
                                    <td>

                                        <label for="qty">quantity</label>
                                        <input type="text" id="qty" size="2" name="quantity" class="form-control">

                                    </td>
                                    <td>

                                        <label for="pur_price">purchase price</label>
                                        <input type="text" id="pur_price" size="2" name="purchase_price"
                                            class="form-control">

                                    </td>


                                    <td>

                                        {{-- <a src="{{ url('products/add-to-cart/'.$product->id) }}"><button
                                            type="button" value="add row" id="formRow" style="margin-top: 15%"
                                            class="btn btn-success">add</button></a> --}}
                                        <button type="submit" style="margin-top: 15%"
                                            class="btn btn-success">add</button>


                                    </td>
                                </tr>
                    </form>
                    </table>
                </div>

            </div>

            <div class="col-sm-12 row">

                <div class="col-sm-6">

                    <table class="table">
                        <tr>
                           
                            <th>name</th>
                            <th>quantity</th>
                            <th>price</th>
                            <th>amount</th>
                            {{-- <td>{{ $cat['price'] }}</td> --}}
                            <th>action</td>
                        </tr>


                        @if(session('cart'))
                        <?php $total = 0 ?>
                        @foreach(session('cart') as $id => $cat)



                        <?php $total +=$cat['price'] * $cat['quantity'];


                  ;?>

                       
                        <td>{{ $cat['name'] }}</td>
                        <td><input type="text" size="5" name="txtQty" value="{{ $cat['quantity'] }}" /></td>
                        <td><input type="text" size="5" name="txtPrice" value="{{ $cat['price'] }}" /></td>
                        <td><input type="text" size="5" value="{{ $cat['price']*$cat['quantity'] }}" /></td>
                        {{-- <td>{{ $cat['price'] }}</td> --}}
                        <!-- <td>
                     <form  action="purchases/{{ $id }}"method="post" class="btn btn-danger">
                            @csrf
                            @method('delete')

                            <input type="hidden" name="product_id" class="re_id" value="{{$id}}" />
                            <button class="btn-danger" style="border:none;"type="submit">Delete</button>
                            </form> | <button class="btn btn-success" style="border:none;"
                                type="submit">Update</button>
                        </td>  -->

                        </tr>



                        @endforeach


                        @endif



                    </table>
                </div>


                <!-- /.card -->
            </div>
            <div class="col-md-12">
                <div class="card card-secondary">

                    <form action="{{url('purchases/store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <table class="table">


                                <tr>
                                    <td>
                                        <label for="sub_total">sub total </label>
                                    </td>
                                    <td>


                                        @isset($total)
                                        <input type="text" id="sub_total" name="sub_total" value="{{  $total }}"
                                            class="form-control">

                                        @endisset

                                        @empty($total)
                                        <input type="text" id="sub_total" name="sub_total" value=""
                                            class="form-control">
                                        @endempty

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="discount">discount</label>
                                    </td>
                                    <td>
                                        <input type="text" id="discount" name="discount" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="grand">grand total</label>
                                    </td>
                                    <td>
                                        <input type="text" id="grand" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="due">due amount</label>

                                    </td>
                                    <td>
                                        <input type="text" id="due" name="due_amount" class="form-control">
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <label for="paid">paid amount</label>
                                    </td>
                                    <td>
                                        <input type="text" id="paid" name="paid_amount" class="form-control">
                                    </td>

                                </tr>

                            </table>

                        </div>
                        <button type="submit" style="margin-top: 15%" id="btn" class="btn btn-success">send</button>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card -->
            </div>

        </div>
        {{-- <div class="row">
      <div class="col-12">
        <a href="#" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="Create new Porject" class="btn btn-success float-right">
      </div>
    </div> --}}
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



 $(function() {
        $('#formRow').onchange(function(e) {
          //  alert("test");
          var customer = $("#customer_id").val();


          console.log();
        });
    });


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