@extends('layouts.master')

@section('content')



<section class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-md-offset-1">
          <div class="block">
            <div class="product-list">
              <div class="col-md-12">
                <div class="content">
                  <h1 class="page-name">Cart</h1>
                  <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">cart</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
  </section>




  <div class="page-wrapper">
    <div class="cart shopping">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="block">
              <div class="product-list">



                <table class="table">

                  <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total price</th>
                    <th>Action</th>
                  </thead>



                  <tbody>




                        <tr>
                          <td><img src="" height="100" alt=""></td>
                          <td>product name</td>
                          <td>JOD </td>

                          <td>
                            <form action="" method="post">
                              <input type="hidden" name="update_quantity_id" value="">
                              <input type="number" name="update_quantity" min="1" value="">
                              <input type="submit" class='btn btn-main btn-small btn-round' value="CONFIRM"   style="background-color:black;" name="update_update_btn">


                            </form>

                          </td>


                          <td>JOD /-</td>





                          <td><a href="" onclick="" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>



                        </tr>




                    <tr class="table-bottom">
                      <td><a href='products.php?cat=6' class="btn btn-main " style="margin-top:0;">Continue shopping</a></td>
                      <td colspan="3" style="font-size:20px"><b>Grand Total<b></td>
                      <td style="font-size:20px"><b>JOD /-<b></td>
                      <td><a href="" onclick="return confirm('Are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> Delete all </a></td>
                    </tr>

                  </tbody>



                </table>


           
                <a href="cart.php?name=true" class="btn btn-main pull-right">Checkout</a>







              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




@endsection
