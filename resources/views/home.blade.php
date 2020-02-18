@extends('layouts.master')

@section('content')
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Home</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

	     <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
          <div class="row" id="kotak">
          
            <!-- small box -->
            
          </div>
      </div>
      <hr>
        
        <div class="container-fluid" id="product" style="width: 70vh;margin:0 auto;">
            
        </div>


              <!-- end .card -->

  	</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

  $(document).ready(function() {
            loadData();
    });

  function loadData()
  {
    getCategories();
    getProduct();
  }
  
  function getCategories()
  {
            
                    $.ajax({
                
                        url: "http://localhost:8000/api/categories",
                        type: 'GET',
                        dataType: 'JSON',
                        data: {
                            
                        },
                        success:function(data){
                            // console.log(data);
                            data.data.category.forEach(function(item, index) {

                                var row = 
                                    `
                                <div class="col-lg-2 col-3" id="kotak">
                                  <div class="small-box">
                                      <div class="inner">
                                        <img src="`+item.imageUrl+`" width="100%" height="100%">
                                      </div>
                                      
                                      <a href="#" class="small-box-footer bg-info">`+item.name+` <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                    `
                                $("#kotak").append(row);
                            });
                        },
                    });
      }

       // var clicks = 0; 
       function add(id) {
        var newCount = parseInt($(id).text()) + 1;
  
        $(id).text(newCount);
    }

      function getProduct()
              {
              
                    $.ajax({
                
                        url: "http://localhost:8000/api/categories",
                        type: 'GET',
                        dataType: 'JSON',
                        data: {
                            
                        },
                        success:function(data){
                            // console.log(data.data.category);
                            data.data.productPromo.forEach(function(item, index) {
                                newDesc = item.description.replace(/'/g, '');
                                // console.log(item)
                                var row = 
                                    `
                                <div class="row row-md text">
                                    <div class="col-sm-12 col-md-12">
                                     <div class="card card-sm mb-12">
                                       <div class="card-footer">
                                          <h4 class="text-center">`+item.title+`</h4>
                                       </div>
                                        <a href="/detail-product" onClick="getDetailsProduct(`+item.id+`,'`+item.imageUrl+`','`+item.title+`','`+newDesc+`', '`+item.price+`', `+item.loved+`)">
                                          <div class="card-body">
                                              <img src="`+item.imageUrl+`" width="100%" height="100%">
                                          </div>
                                        </a>
                                      <div class="card-footer">
                                        <!-- <span><i class="ya ya-calendar"></i> April 24, 2018</span> -->
                                        <div class="ml-auto" onClick="add('#clicks`+item.id+`')">
                                          <i class="fa fa-heart" style="color:red;"></i> <span id="clicks`+item.id+`">`+item.loved+`</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                    `
                                $("#product").append(row);
                            });
                        },
                    });
             }

      function getDetailsProduct(id,image,title,description,price,loved)
      {
        // var woy = {id,image,title,description,price,loved}
        var detail_id = id;
        var detail_image = image;
        var detail_title = title;
        var detail_description = description;
        var detail_price = price;
        var detail_loved = loved;

        localStorage.setItem("detail_id", JSON.stringify(detail_id));
        localStorage.setItem("detail_image", JSON.stringify(detail_image));
        localStorage.setItem("detail_title", JSON.stringify(detail_title));
        localStorage.setItem("detail_description", JSON.stringify(detail_description));
        localStorage.setItem("detail_price", JSON.stringify(detail_price));
        localStorage.setItem("detail_loved", JSON.stringify(detail_loved));
      }


</script>
@endsection
