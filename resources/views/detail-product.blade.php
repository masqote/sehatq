@extends('layouts.master')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <section class="content" >
      <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-12">
	           
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->
	    					<div class="container-fluid" id="product" style="width: 70vh;margin:0 auto;">
	    						<div class="row row-md text">
                                    <div class="col-sm-12 col-md-12">
                                     <div class="card card-sm mb-12">
                                       <div class="card-footer">
                                          <a href="#" onclick="window.history.go(-1); return false;"><i class="fa fa-arrow-left" ></i></a>
                                          
                                          <a href="https://www.facebook.com/sharer/sharer.php?u=http://infonih.com/search-nama?arti_nama=&jenis_kelamin=Semua&asal=Semua&abjad=Semua&display=popup"><i class="fa fa-share-alt float-right"></i></a>
                                       </div>
                                        <a href="">
                                          <div class="card-body">
                                              <img src="" width="100%" id="detail_image" height="100%">
                                          </div>
                                        </a>
                                      <div class="card-footer">
                                        <!-- <span><i class="ya ya-calendar"></i> April 24, 2018</span> -->
                                        <div class="float-left"><h5 id="detail_title"></h5></div>
                                        <div class="ml-auto">
                                        	<h4 class="m-0 text-dark float-left"></h4>
                                          <a class="ml-1 float-right"  onclick="onClick()"><i class="fa fa-heart" style="color:red;"></i> <span id="detail_loved"></span></a>
                                        </div>
                                      </div>
                                      <div class="card-body" id="detail_description">
                                              
                                      </div>
                                      <div class="card-footer">
                                      		
                                      		<button type="button" onclick="sessionStorage(
                                      		localStorage.getItem('detail_id'),
                                      		localStorage.getItem('detail_title'),
                                      		localStorage.getItem('detail_image'),
                                      		localStorage.getItem('detail_description'),
                                      		localStorage.getItem('detail_price'),
                                      		localStorage.getItem('detail_loved')
                                      		)" class="btn btn-outline-primary float-right" style="margin-left: 20px;">Buy</button>
                                      		<span class="float-right"><h3>Price : <span id="detail_price"></span></h3></span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>

	  </div>
  </section>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
  	// console.log(localStorage.getItem("detail_title"))

  	$(document).ready(function() {
            $('#detail_title').html(localStorage.getItem("detail_title").replace(/"/g, ''));
            $("#detail_image").attr('src', localStorage.getItem('detail_image').replace(/"/g, ''));
            $('#detail_description').html(localStorage.getItem("detail_description").replace(/"/g, ''));
            // $('#detail_title').html(localStorage.getItem("detail_title").replace(/"/g, ''));
            $('#detail_price').html(localStorage.getItem("detail_price").replace(/"/g, ''));
            $('#detail_loved').html(localStorage.getItem("detail_loved").replace(/"/g, ''));

			// console.log(detail_image.src)
    });

	var clicks = 0;    
    function onClick() {
        clicks += 1;
        document.getElementById("detail_loved").innerHTML = clicks;
    };

    function sessionStorage(id,title,image,description,price,loved)
    {
    				$.ajax({
    					headers: {
                    		'X-CSRF-TOKEN': $('meta[name=\'csrf-token\']').attr('content')
		                },
                        url: "http://localhost:8000/api/store-session",
                        type: 'POST',
                        dataType: 'JSON',
                        data: {
                            'id':id,
                            'title':title,
                            'image':image,
                            'description':description,
                            'price':price,
                            'loved':loved
                        },
                        success:function(data){
                            console.log(data)
                            // alert('woy')
                            window.location.href = "/";
                        },
                    });

    }

    </script>
@endsection