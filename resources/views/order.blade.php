@extends('master')
@section('content')
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
// $(document).ready(function(){
//   $(".field").change(function(){
//     alert("ok")
//   });
// });

$(document).ready(function(){
  $(".field").on("change", function(){
    alert("The paragraph was clicked.");
  });
});
</script>
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
                    </div>



                    <form action="{{ url('order/orderadd') }}" method="POST">
                        @csrf
                        @method('post')

                        <div class="card-body row" id="rowAdd">
                            <div class="form-group col-sm-6">
                                
                                <label>customer select:</label>
                                        <select class="form-control" name="customer_id"id="cus">
                                        @isset($customer)
                                        @foreach($customer as $key => $value)
                                        <option   value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach

                                        @endisset
                                        </select>

                                       
                                       <div>
                                            <table class="table" id="customer_details">
                                                <tr>
                                                
                                                </tr>
                                            </table>
                                       </div>
                                      

                              

                            </div>
                            <div class="col-sm-6 row">
                                <div class="form-group col-sm-6">
                                    <label for="purchase_date">issu date</label>
                                    <input type="date" id="purchase_date" name="purchase_date"
                                        value="{{ session('purchase_date') }}" class="form-control">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="category_id">category Name</label>

                                    <select class="form-control custom-select" name="category_id" id="category_id">
                                        <option selected disabled>Select one</option>
                                        @isset($cate)
                                        @foreach($cate as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach

                                        @endisset

                                    </select>

                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="invoice">invoice id</label>
                                    <input type="text" id="invoice" name="invoice_id" class="form-control">
                                </div>
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
                            <th>customer_id</th>
                            <th>Iteam</th>
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

                        <td><input type="text" size="5" name="customer_id" value="{{ $cat['customer_id'] }}" /></td>
                        <td><input type="text" size="5" name="product_id" value="{{ $cat['product_id'] }}" /></td>
                        <td><input type="text" size="5" name="quantity" value="{{ $cat['quantity'] }}" /></td>
                        <td><input type="text" size="5" name="price" value="{{ $cat['price'] }}" /></td>
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

                    <form action="{{url('order/store')}}" id="createForm" method="POST">
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
                                        <input type="text" id="sub_total" name="sub_total" value="" class="form-control">
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
        <p>Click this paragraph.</p>

       
    

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script type="text/javascript">
$(document).ready(function() {


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
   
    $("select.customer_id").Onchange(function(){
        var customer = $(this).children("option:selected").val();
        alert("You have selected the customer - " + customer);
        console.log(customer)
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




alert("ok");

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
<script>

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


  $("#cus").on("change", function(){
    var customer_id = $(this).children("option:selected").val();
  //    alert("You have selected the country - " + customer_id);

   console.log(customer_id)

   $.ajax({
            url: '{{ url('order/customer') }}',
            method: 'post',
            data: {
                customer_id: customer_id,
               
            },
            dataType: "json",
            success: function(data) {

                console.log(data);

                $("#customer_details").html("<td> Id:"+data.id+"</td><td> Name:"+data.name+"</td><td> Email:"+data.email+"</td>");
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


