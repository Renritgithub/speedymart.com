

<?php
//include('../includes/connect.php');

// getting products



// Function to validate CSRF token
function validateCsrfToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Function to regenerate a new CSRF token after validation
function regenerateCsrfToken() {
    // Create a new CSRF token and store it in the session
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}


function getproduct(){
   global $con;
   if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
          
         $select_query="select * from `products` order by rand() limit 0,6";
   $result_query=mysqli_query($con,$select_query);
   while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
     $product_title=$row['product_title'];
     $product_description=$row['product_description'];
     $product_price=$row['product_price'];
     $product_image1=$row['product_image1'];
     $category_id=$row['category_id'];
     $brand_id=$row['brand_id'];
     echo "<div class='col-md-4 mb-3'>
             <div class='card' style='width: 18rem;'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                   <div class='card-body'>
                       <h5 class='card-title'>$product_title</h5>
                          <p class='card-text'>$product_description</p>
                          <p class='card-text'>$product_price/=</p>
                           <a href='index.php?add_to_cart=$product_id' class='btn btn-primary bg-info'>Go add to cart</a>
                           <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>view more</a>
                    </div>
             </div>
           </div>";
     
   }
      }
   }
   
}

/* getting all products */

function get_all_product(){
   global $con;
   if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
          
         $select_query="select * from `products` order by rand()";
   $result_query=mysqli_query($con,$select_query);
   while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
     $product_title=$row['product_title'];
     $product_description=$row['product_description'];
     $product_price=$row['product_price'];
     $product_image1=$row['product_image1'];
     $category_id=$row['category_id'];
     $brand_id=$row['brand_id'];
     echo "<div class='col-md-4 mb-3'>
             <div class='card' style='width: 18rem;'>
                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                   <div class='card-body'>
                       <h5 class='card-title'>$product_title</h5>
                          <p class='card-text'>$product_description</p>
                          <p class='card-text'>$product_price/=</p>
                           <a href='index.php?add_to_cart=$product_id' class='btn btn-primary bg-info'>Go add to cart</a>
                           <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>view more</a>
                    </div>
             </div>
           </div>";
     
   }
      }
   }
   
}
//getting unique categories

function get_unique_product(){
   global $con;
   if(isset($_GET['category'])){
      $category_id=$_GET['category'];
   $select_query="select * from `products` where category_id=$category_id";
   $result_query=mysqli_query($con,$select_query);
   $num_rows=mysqli_num_rows($result_query);
   if($num_rows==0){
      echo "<h2 class='text-center text-danger'> No stock in this category</h2> ";
   }
   else{
      while($row=mysqli_fetch_assoc($result_query)){
         $product_id=$row['product_id'];
         $product_title=$row['product_title'];
         $product_description=$row['product_description'];
         $product_price=$row['product_price'];
         $product_image1=$row['product_image1'];
         $category_id=$row['category_id'];
         $brand_id=$row['brand_id'];
         echo "<div class='col-md-4 mb-3'>
                 <div class='card' style='width: 18rem;'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                       <div class='card-body'>
                           <h5 class='card-title'>$product_title</h5>
                              <p class='card-text'>$product_description</p>
                              <p class='card-text'>$product_price/=</p>
                               <a href='index.php?add_to_cart=$product_id'class='btn btn-primary bg-info'>Go add to cart</a>
                               <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>view more</a>
                        </div>
                 </div>
               </div>";
         
       
       }
       
   }
   
   }
   
   
}

//getting unique brands

function get_unique_brands() {
   global $con;

   // Check if 'brand' parameter is set
   if(isset($_GET['brand'])) {
       $brand_id = intval($_GET['brand']);  // Sanitizing input

       // Prepare the SQL query
       $select_query = "SELECT * FROM `products` WHERE brand_id=$brand_id";
       $result_query = mysqli_query($con, $select_query);

       // Error handling for query execution
       if (!$result_query) {
           die("Query Failed: " . mysqli_error($con));
       }

       $numrows = mysqli_num_rows($result_query);

       if($numrows==0) {
           echo "<h2 class='text-center text-danger'>No brand available for service</h2>";
       } else {
           while($row = mysqli_fetch_assoc($result_query)) {
               $product_id=$row['product_id'];
               $product_title = $row['product_title'];
               $product_description = $row['product_description'];
               $product_price = $row['product_price'];
               $product_image1 = $row['product_image1'];

               echo "
               <div class='col-md-4 mb-3'>
                   <div class='card' style='width: 18rem;'>
                       <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                       <div class='card-body'>
                           <h5 class='card-title'>$product_title</h5>
                           <p class='card-text'>$product_description</p>
                           <p class='card-text'>$product_price/=</p>
                           <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                          <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>view more</a>
                       </div>
                   </div>
               </div>";
           }
       }
   } 
}


/* display brands */

function getbrands(){
   global $con;
   $select_brand="select * from `brands`";
   $result_query=mysqli_query($con,$select_brand);
   /* $row_data=mysqli_fetch_assoc($result_query); */
   /* echo $row_data['brand_title']; */
   while($row_data=mysqli_fetch_assoc($result_query)){
     $brand_title=$row_data['brand_title'];
     $brand_id=$row_data['brand_id'];
     echo "</li>
 <li class='nav-item bg'>
   <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
 </li>";


   }
}

//display category

function getcategory(){
   global $con;
   $select_query="select * from `categories`";
      $result_sql=mysqli_query($con,$select_query);
     /*  $row_data=mysqli_fetch_assoc($result_sql); */
      while( $row_data=mysqli_fetch_assoc($result_sql)){
        $category_title=$row_data['category_title'];
        $category_id=$row_data['category_id'];
        echo "<li class='nav-item bg'>
        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
      </li>";
      }
}


// searching products fuunction

function search_product(){
   global $con;
   if(isset($_GET['search_data_product'])){
      $search_data_value=$_GET['search_data'];
      $search_query="select * from `products` where product_keyword like '%$search_data_value%'";
      $result_query=mysqli_query($con,$search_query);
      $num_rows=mysqli_num_rows($result_query);
      if($num_rows==0){
         echo "<h2 class='text-center text-danger'>Sorry this product is not present </h2>";}
         else{
            while($row=mysqli_fetch_assoc($result_query)){
               $product_id=$row['product_id'];
               $product_title=$row['product_title'];
               $product_description=$row['product_description'];
               $product_price=$row['product_price'];
               $product_image1=$row['product_image1'];
               $category_id=$row['category_id'];
               $brand_id=$row['brand_id'];
               echo "<div class='col-md-4 mb-3'>
                       <div class='card' style='width: 18rem;'>
                          <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                             <div class='card-body'>
                                 <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>$product_price/=</p>
                                     <a href='index.php?add_to_cart=product_id' class='btn btn-primary bg-info'>Go add to cart</a>
                                     <a href='product_details.php?product_id=$product_id' class='btn btn-primary bg-secondary'>view more</a>
                              </div>
                       </div>
                     </div>";
               
             }
         }
      
     
   }   
       
      }
      // view details function

      function view_details(){
         global $con;
         if(isset($_GET['product_id'])){
            if(!isset($_GET['category'])){
               if(!isset($_GET['brand'])){
                   $product_id=$_GET['product_id'];
                  $select_query="select * from `products` where product_id='$product_id'";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
               $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              $product_price=$row['product_price'];
              $product_image1=$row['product_image1'];
              $product_image2=$row['product_image2'];
              $product_image3=$row['product_image3'];
              $category_id=$row['category_id'];
              $brand_id=$row['brand_id'];
              echo "<div class='col-md-4'>
             <!-- card -->

             <div class='card' style='width: 18rem;'>
                          <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                             <div class='card-body'>
                                 <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>$product_price/=</p>
                                     <a href='index.php?add_to_cart=product_id' class='btn btn-primary bg-info'>Go add to cart</a>
                                     <a href='index.php' class='btn btn-primary bg-secondary'>Go home</a>
                              </div>
                       </div>
        </div>
        <div class='col-md-8'>
            <!-- related images -->
             <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center text-success mb-5'>Related Products</h4>
                </div>
                </div>
                <div class='row'>
                <div class='col-md-6'>
                    <img src='./admin_area/product_images/$product_image2'  class='card-img-top' alt='$product_title'>
                </div>
                <div class='col-md-6'>
                    <img src='./admin_area/product_images/$product_image3'  class='card-img-top' alt='$product_title'>
                </div>
                </div>
                
             
        </div>";
              
            }
               }
            }
         }
         
      }

      //getting ip address

      function getIPAddress() {  
         //whether ip is from the share internet  
          if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                     $ip = $_SERVER['HTTP_CLIENT_IP'];  
             }  
         //whether ip is from the proxy  
         elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                     $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
          }  
     //whether ip is from the remote address  
         else{  
                  $ip = $_SERVER['REMOTE_ADDR'];  
          }  
          return $ip;  
     }  
     /* $ip = getIPAddress();  
     echo 'User Real IP Address - '.$ip;  
 */
//cart function

function add_cart(){
   if(isset($_GET['add_to_cart'])){
      global $con;
      $get_ip_add= getIPAddress();
      $get_product_id=$_GET['add_to_cart'];
      $select_query="select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
      $result_query=mysqli_query($con,$select_query);
      $num_rows=mysqli_num_rows($result_query);
      if($num_rows>0){
         echo "<script>alert('This item is already present inside cart')</script>";
        echo" <script>
         window.open('index.php', '_self');
       </script>";
       
      }
      else{
         $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',0)";
         $result_query=mysqli_query($con,$insert_query);
         echo "<script>alert('This item is added to cart')</script>";
         echo" <script>
         window.open('index.php', '_self');
       </script>";
      }

   }

}

// getting cart item function
function cart_item(){
   if(isset($_GET['add_to_cart'])){
      global $con;
      $get_ip_add= getIPAddress();

      $select_query="select * from `cart_details` where ip_address='$get_ip_add'";
      $result_query=mysqli_query($con,$select_query);
      $cart_count=mysqli_num_rows($result_query);
      }
      else{
         global $con;
         $get_ip_add= getIPAddress();
   
         $select_query="select * from `cart_details` where ip_address='$get_ip_add'";
         $result_query=mysqli_query($con,$select_query);
         $cart_count=mysqli_num_rows($result_query);
      }
    echo $cart_count;
   }

   //total price function
   function total_cart_price(){
      global $con;
      $total=0;
      $get_ip_add=getIPAddress();
      $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
      $result_query=mysqli_query($con,$cart_query);
      while($row=mysqli_fetch_assoc($result_query)){
         $product_id=$row['product_id'];
         $select_products="select * from `products` where product_id=$product_id";
         $result_products=mysqli_query($con,$select_products);
         while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total+=$product_values;
         }
      }
      echo $total;
   }

   //get user order details

   function get_user_order_details(){
      global $con;
      if(isset($_SESSION['username'])){
         $username=$_SESSION['username'];
         $get_details="select * from `user_table` where username='$username'";
         $result_query=mysqli_query($con,$get_details);
         while($row_query=mysqli_fetch_array($result_query)){
            $user_id=$row_query['user_id'];
         }
            
                  if(!isset($_GET['edit_account'])){
               if(!isset($_GET['my_orders'])){
                  if(!isset($_GET['delete_account'])){
                      $get_orders="select * from `user_orders` where user_id=$user_id and order_status='pending'";
                      $result_orders_query=mysqli_query($con,$get_orders);
                      $row_count=mysqli_num_rows($result_orders_query);
                      if($row_count>0){
                        echo "<h2 class='text-center text-info pt-3'> You have <span class='text-danger'>3</span> pending orders</h2>
                        <p class='text-center'><a href='profile.php?my_orders' class='text-decoration-none text-secondary'>Order Details</a></p>";
                      }else{
                        echo "<h2 class='text-center text-info pt-3'> You have <span class='text-danger'>0</span> pending orders</h2>
                        <p class='text-center'><a href='../index.php' class='text-decoration-none text-secondary'>Explore products</a></p>";
                      }
                  
               }
            }
         }
      }
     
   }

   function sendMockOtp($phoneNumber) {
      // Simulate a successful response as if it were from Airtel's API
      return [
          'status' => 'success',
          'message' => 'OTP sent successfully',
          'otp' => rand(100000, 999999) // Generate a random OTP for testing
      ];
  }
  
  function verifyMockOtp($inputOtp, $correctOtp) {
      // Check if the provided OTP matches the correct OTP
      if ($inputOtp === $correctOtp) {
          return ['status' => 'success', 'message' => 'OTP verified successfully'];
      } else {
          return ['status' => 'error', 'message' => 'Invalid OTP'];
      }
  }
  
?>