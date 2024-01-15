@extends('layouts.app')
@section('content')

    @include('Front.alerts.success')
    @include('Front.alerts.errors')
    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>{{__('messages.Cart Product')}} </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <table id="cart" class="table table-hover table-condensed" >
        <thead>
            <tr>
                <th> Name Product</th>
                <th> Photo </th>
                <th> price </th>
                <th> Quantity </th>
                <th> SubTotal </th>
                <th> Options </th>
            </tr>
        </thead>
        <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
        @foreach( session('cart') as $id=>$details)
            @php $total += $details['price'] * $details['quantity']@endphp
            <tr data-id="{{$id}}">
                 <td data-th="product">{{$details['product_name']}}</td>

                <td><img style="width: 70px;height: 70px" src="{{$details['photo']}}"></td>
                <td data-th="price">{{$details['price']}}</td>
                <td data-th="Quantity">
                    <input type="number" value="{{$details['quantity'] }}" style="width: 50px;height: 20px" class="form-control quantity cart_update" min="1"/>
                </td>



                <td data-th="SubTotal">${{$details['price'] * $details['quantity']}}</td>
                <td data-th="" class="actions">
                    <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                </td>
            </tr>
        @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right"><h4><strong>Total:$ {{$total}}</strong> </h4></td>
            </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{route('products')}}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Continue Shopping </a>
                <a href="{{route('cash.order')}}" class="btn btn-success"><i class="fa fa-money"></i> Cash OnDelivery</a>
            </td>
        </tr>
        </tfoot>
    </table>
@endsection

@section('scripts')
<script type="text/javascript">

    $(" .cart_update").change(function (e){
        e.preventDefault();
        var ele = $(this);
        $.ajax({
           url: '{{route('update_cart')}}',
           method: "get",
           data: {
               _token: '{{ csrf_token() }}',
               id: ele.parents("tr").attr("data-id"),
               quantity: ele.parents("tr").find(".quantity").val()
           },
            success: function (response){
               window.location.reload();
            }
        });
    });


    $(" .cart_remove").click(function (e){
       e.preventDefault();
       var ele = $(this);
       if (confirm("Do you really want to remove")){
           $.ajax({
              url:'{{route('remove_cart')}}',
              method: "DELETE",
              data:{
                  _token:'{{csrf_token()}}',
                  id: ele.parents("tr").attr("data-id")
              },
               success: function (response){
                  window.location.reload();
               }
           });
       }
    });
</script>

@endsection
