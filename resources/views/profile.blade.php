@extends('layouts.master')

@section('content')

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><a href="#" onclick="window.history.go(-1); return false;"><i class="fa fa-arrow-left"></a></i>       Purchased History<i class="fa fa-shopping-cart"></i> 
            	@if(Session::get('cart') == null)
                  
                @else 
            	<span class="badge badge-success">{{Count(Session::get('cart'))}}</span>
            	@endif
            </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


      <hr>
        
        @if(Session::get('cart') == null)
                  
		@else 
        <div class="container-fluid" id="product" style="width: 70vh;margin:0 auto;">
        	@foreach($cart as $row)
	           <div class="card" style="width: 22rem;">
	           	<a href="/detail-product">
				  <img class="card-img-top" onclick="(add({{$row['id']}}, {{$row['title']}}, {{$row['image']}}, {{$row['description']}}, {{$row['price']}}, {{$row['loved']}}))" src='{{str_replace('"',"",$row['image'])}}'alt="Card image cap">
				  </a>
				  <div class="card-body">
				    <h5 class="card-title float-left" id="woy">{{str_replace('"',"",$row['title'])}}</h5>
				    <h5 class="card-title float-right">{{str_replace('"',"",$row['price'])}}</h5>
				  </div>
				</div>
			@endforeach

  		</div>
  		@endif

  		<a href="/logout"><button type="button" class="btn btn-primary btn-lg btn-block">Logout</button></a>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
            
    });

   function add(id,title,image,description,price,loved)
   {
   		localStorage.setItem("detail_id", JSON.stringify(id));
        localStorage.setItem("detail_image", JSON.stringify(image));
        localStorage.setItem("detail_title", JSON.stringify(title));
        localStorage.setItem("detail_description", JSON.stringify(description));
        localStorage.setItem("detail_price", JSON.stringify(price));
        localStorage.setItem("detail_loved", JSON.stringify(loved));
   } 

</script>
@endsection