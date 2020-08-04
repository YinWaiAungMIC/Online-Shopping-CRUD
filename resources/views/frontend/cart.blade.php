@extends('frontendtemplate')
@section('title','Item Detail')

@section('content')

<div class="container">
	
	<div class="container cart_container">
    <!-- Example row of columns -->
    <br>
    <br>
    <br>
    <h3>Your Shopping Cart</h3>
    <br>
    <br>
    <div class="col-lg-10">
      <div class="row product_table_row">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody class="product_list">
            
          </tbody>
        </table>
      </div>
      

    </div>

</div>

@endsection


@section('script')

<script type="text/javascript" src="{{asset('frontendtemplate/js/custom.js')}}"></script>
	<script type="text/javascript">
  $(document).ready(function(){
  	showTable();

    function showTable(){
      var my_cart=localStorage.getItem('my_cart');
      if(my_cart){
        var my_cart_obj=JSON.parse(my_cart);
        if(my_cart_obj.product_list){
          if(my_cart_obj.product_list.length){

              var html=''; var j=1;var total=0;
              $(my_cart_obj.product_list).each(function(i,v){
                var id=v.id;
                var name=v.name;
                var photo=v.photo;
                var price=v.price;
                var quantity=v.quantity;
                var subtotal=quantity*price;
                total+=subtotal;
                html=html+`<tr><td>${j}</td>
                <td><img src="${photo}" width=100 height=100></td>
                <td>${name}</td>
                <td>${price}</td>
                <td><i class='fa fa-minus-circle btn_minus' style='font-size:25px;color:blue;' data-id=${id} ></i>${quantity}<i class='fa fa-plus-circle btn_plus' style='font-size:25px;color:red;' data-id=${id}></i></td>
                <td>${subtotal}</td></tr>`;
                j++;
              })
              html=html+`<tr><td colspan=5>Total</td><td>${total}</td></tr>`;
              $(".product_list").html(html);

          }else{
            $(".product_table_row").html('<h3>Your Cart is Empty</h3>');
            $(".btn-order").hide();
          }
        }else{
            $(".product_table_row").html('<h3>Your Cart is Empty</h3>');
            $(".btn-order").hide();
          }
      }else{
            $(".product_table_row").html('<h3>Your Cart is Empty</h3>');
            $(".btn-order").hide();
          }
    }
  })
</script>

	
</script>

@endsection