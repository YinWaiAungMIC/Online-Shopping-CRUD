$(document).ready(function(){
      show_product_count();
    function show_product_count(){
      //get my_cart JSOn from localStorage
      var my_cart=localStorage.getItem('my_cart');
      if(my_cart){
      //pasrse JSON to Obj
      var my_cart_obj=JSON.parse(my_cart);
      //initialize product_count
      var product_count=0;
      if(my_cart_obj.product_list){
      $(my_cart_obj.product_list).each(function(i,v){
        product_count+=v.quantity;
      })
      //show product_count result in Badge
      $(".product_count").html(product_count);
    }
  } 
  }

    function add_to_cart(product){
      //console.log(product);
      //check my _cart json in local storage
      var my_cart=localStorage.getItem('my_cart');
      if(!my_cart){
        //if my_cart is not in the localStorage we create new
         my_cart='{"product_list":[]}';
      }

     
      var my_cart_obj=JSON.parse(my_cart);

        //check product id in product_list
        //if there is product id,we will  increase quantity
        //if there is no sameproduct id,we will push new product to product list
        var has_value=false;
        $(my_cart_obj.product_list).each(function(i,v){
          //console.log(i,v);

          if(product.id==v.id){
            v.quantity++;
            has_value=true;
          }
        })

        if(!has_value){
          my_cart_obj.product_list.push(product);
        }

      //push one product in product list of my_cart_obj 
      //my_cart_obj.product_list.push(product);
      //parse my_cart_obj t JSON string and store to localStorage
      localStorage.setItem('my_cart',JSON.stringify(my_cart_obj));
      console.log(my_cart_obj);
    }
    $(".add_to_cart").click(function(){
      console.log('hi');

      var id=$(this).data('id');
      var name=$(this).data('name');
      var price=$(this).data('price');
      var photo=$(this).data('photo');
      //console.log(id,name,price,photo);
      var product={
        id:id,
        name:name,
        price:price,
        photo:photo,
        quantity:1
      };

      add_to_cart(product);
      show_product_count();
    })

    //Checkout Button
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $('.checkout').click(function(){
      //alert('OK');

      var loStr=localStorage.getItem('my_cart');
      if(loStr){
        $.post("/checkout",{data:loStr},function(res){
          console.log(res)
        })
        localStorage.clear();
        window.location.href="/";
      }
    })
  })


