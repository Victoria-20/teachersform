<?php

include "db.php";

function get_user_info($username)
{
    $sql = "SELECT sname, fname, email FROM users WHERE account_status=1 AND username='$username'";
    $result = query($sql);
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
        $data[] = $row;
    }
    return $data;
}

//fetch user function
function fetch_users()
{

    $sql = "SELECT user_id,sname,role,fname, email,mobile,gender,account_status, created_by, created_on FROM users ";
    $result = query($sql);
    if (mysqli_num_rows($result) > 0) {

        $output = "";

        $count = 0;

        while ($trailRow = mysqli_fetch_array($result)) {

            $count++;
            $user_id = $trailRow['user_id'];
            $sname = $trailRow['sname'];
            $fname = $trailRow['fname'];
            $role = $trailRow['role'];
            $created_by = $trailRow['created_by'];
            $created_on = $trailRow['created_on'];
            $email = $trailRow['email'];
            $mobile = $trailRow['mobile'];
            $account_status = $trailRow['account_status'];
            $created_on = date_format(date_create($trailRow['created_on']), ' l jS F Y');

            if ($account_status == 1) {

                $accountStatus = "Active";

            } else {

                $accountStatus = "Inactive";
            }



            //role

            if ($role == 1) {

                $role = "Administrator";

            } else {

                $role = "User";
            }


            $output .= "<tr>
               <td>{$count}</td>
               <td>{$sname} {$fname}</td>
               <td>{$email}</td>
               <td>{$mobile}</td>
               <td>{$accountStatus}</td>  
               <td>{$role}</td>         
               <td><a onclick='makeAdmin($user_id)' class='text-info'><i class='fa fa-user'></i>  Admin  </a></td>
               <td><a onclick='revokeAdmin($user_id)' class='text-success'><i class='fa fa-cut'></i> Revoke </a></td>
               <td><a onclick='deactivateAccount($user_id)' class='text-info'><i class='fa fa-times-circle'></i>  Deactivate  </a></td>
               <td><a href='edit_users.php?edit={$user_id}' ><i class='fa fa-edit'></i></a></td>
               <td><a onclick='deleteUser($user_id)' class='text-danger'><i class='fa fa-trash'></i></a></td>

               </tr>";

        }

    }

    return $output;

}

//fetch log function

function fetch_logs()
{

    $sql = "SELECT * FROM system_access_logs ORDER BY id DESC";

    $result = query($sql);

    if (mysqli_num_rows($result) > 0) {

        $output = "";

        $count = 0;

        while ($trailRow = mysqli_fetch_array($result)) {

            $count++;
            $user = $trailRow['username'];
            $activityTime = $trailRow['activity_time'];
            $log_type = $trailRow['log_type'];
            $activity = $trailRow['activity'];

            $output .= "<tr>
           <td>{$count}</td>
           <td>{$user}</td>
           <td>{$activity}</td>
           <td>{$activityTime}</td>
           <td>{$log_type}</td>

           </tr>";

        }

    }

    return $output;
}


//brands
function fetch_brands()
{

    $sql = "SELECT * FROM brands ORDER BY brand_id DESC";

    $result = query($sql);

    if (mysqli_num_rows($result) > 0) {

        $output = "";

        $count = 0;

        while ($trailRow = mysqli_fetch_array($result)) {

            $count++;
            $brand_id = $trailRow['brand_id'];
            $brand_name = $trailRow['brand_name'];
            $brandStatus = $trailRow['brand_status'];
            if($brandStatus == 1){
                $brandStatus = "<i class='fa fa-battery-full'></i> Available";
            }else{
                $brandStatus = "<i class='fa fa-battery-empty'></i> Unavailable";
            }

            $output .= "<tr>
           <td>{$count}</td>
           <td>{$brand_name}</td>
           <td>{$brandStatus}</td>
           <td><a onclick='makeAvailable($brand_id)' class='text-info'><i class='fa fa-battery-full'></i> Available  </a></td>
           <td><a onclick='notAvailable($brand_id)' class='text-success'><i class='fa fa-battery-empty'></i> Not Available  </a></td>
           <td><a href='edit_brands.php?edit={$brand_id}' ><i class='fa fa-edit'></i></a></td>
           <td><a onclick='deleteBrand($brand_id)' class='text-danger'><i class='fa fa-trash'></i></a></td>
           </tr>";

        }

    }

    return $output;
}


//categories 



function fetch_categories()
{

    $sql = "SELECT * FROM categories ORDER BY categories_id DESC";

    $result = query($sql);

    if (mysqli_num_rows($result) > 0) {

        $output = "";

        $count = 0;

        while ($trailRow = mysqli_fetch_array($result)) {

            $count++;
            $categories_id = $trailRow['categories_id'];
            $categories_active = $trailRow['categories_active'];
            $categories_name = $trailRow['categories_name'];
            $categories_status = $trailRow['categories_status'];
            if($categories_status == 1){
                $categories_status = "<i class='fa fa-battery-full'></i> Available";
            }else{
                $categories_status = "<i class='fa fa-battery-empty'></i> Unavailable";
            }

            $output .= "<tr>
           <td>{$count}</td>
           <td>{$categories_name}</td>
           <td>{$categories_status}</td>
           <td><a onclick='makeAvailable($categories_id)' class='text-info'><i class='fa fa-battery-full'></i> Available  </a></td>
           <td><a onclick='notAvailable($categories_id)' class='text-success'><i class='fa fa-battery-empty'></i> Not Available  </a></td>
           <td><a href='edit_categories.php?edit={$categories_id}' ><i class='fa fa-edit'></i></a></td>
           <td><a onclick='deleteBrand($categories_id)' class='text-danger'><i class='fa fa-trash'></i></a></td>
           </tr>";

        }

    }

    return $output;
}

//fetch clients
function fetch_clients()
{

    $sql = "SELECT * FROM clients ORDER BY client_id DESC";

    $result = query($sql);

    if (mysqli_num_rows($result) > 0) {

        $output = "";

        $count = 0;

        while ($trailRow = mysqli_fetch_array($result)) {

            $count++;
            $client_id = $trailRow['client_id'];
            $fullName = $trailRow['fullName'];
            $email = $trailRow['email'];
            $username = $trailRow['username'];
            $mobile = $trailRow['mobile'];
            $location = $trailRow['location'];
           

            $output .= "<tr>
           <td>{$count}</td>
           <td>{$fullName}</td>
           <td>{$email}</td>  
           <td>{$username}</td> 
           <td>{$mobile}</td>       
           <td>{$location}</td>
           <td><a href='edit_clients.php?edit={$client_id}' ><i class='fa fa-edit'></i></a></td>
           <td><a onclick='deleteClient($client_id)' class='text-danger'><i class='fa fa-trash'></i></a></td>
           </tr>";

        }

    }

    return $output;
}


//fetch products 


function fetch_products()
{

    $sql = "SELECT products.product_id, products.product_name, products.product_image, products.brand_id,
    products.categories_id, products.quantity, products.rate, products.active, products.status, 
    brands.brand_name, categories.categories_name FROM products 
   INNER JOIN brands ON products.brand_id = brands.brand_id 
   INNER JOIN categories ON products.categories_id = categories.categories_id  
   WHERE  products.quantity>0";

    $result = query($sql);

    if (mysqli_num_rows($result) > 0) {

        $output = "";

        $count = 0;

        while ($trailRow = mysqli_fetch_array($result)) {

            $count++;
            $product_id = $trailRow[0];
           // $product_image = $trailRow[2];
            $product_image  = substr($trailRow[2], 3);
            $product_brand = $trailRow[10];
            $product_category = $trailRow[9];
            $product_name = $trailRow[1];          
            $quantity = $trailRow[5];
            $status  =  $trailRow[8];

            if ($status == 1) {
                $status = "Available";
            }else{
                $status = "Not Available"; 

            }
           
           

            $output .= "<tr>
           <td>{$count}</td>
           <td><img src='{$product_image}' width='50' height='50' alt='Product Image'></td>
           <td>{$product_name}</td>  
           <td>{$quantity}</td> 
           <td>{$product_brand}</td>       
           <td>{$product_category}</td>
           <td>{$status}</td>
           <td><a onclick='pMakeAvailable($product_id)' class='text-info'><i class='fa fa-battery-full'></i> Available  </a></td>
           <td><a onclick='pNotAvailable($product_id)' class='text-success'><i class='fa fa-battery-empty'></i> Not Available  </a></td>
           <td><a href='edit_products.php?edit={$product_id}' ><i class='fa fa-edit'></i></a></td>
           <td><a onclick='deleteProduct($product_id)' class='text-danger'><i class='fa fa-trash'></i></a></td>
           </tr>";

        }

    }

    echo $output;
}




function fetch_orders()
{

    $sql = "SELECT order_id, order_date, client_name, client_contact, payment_status FROM orders WHERE order_status = 1";    

    $result = query($sql);

    if (mysqli_num_rows($result) > 0) {

        $output = "";

        $count = 0;

        while ($trailRow = mysqli_fetch_array($result)) {

            $count++;
            $order_id =  $trailRow['order_id'];
            $order_date = $trailRow['order_date'];
            $client_name = $trailRow['client_name'];
            $client_contact = $trailRow['client_contact'];

            //payment status
            $payment_status = $trailRow['payment_status'];

            if($payment_status == 1){
                $payment_status = "<span class='badge badge-success'>Full Payment</span>";
            }else if($payment_status == 2){
                $payment_status = "<span class='badge badge-primary'>Advance Payment</span>";
            }else{
                $payment_status = "<span class='badge badge-danger'>No Payment</span>"; 
            }


            //fetching total order items           

            $countOrderItemSql = "SELECT count(*) FROM order_item WHERE order_id = $order_id";
            $itemCountResult = query($countOrderItemSql);
            $itemCountRow = $itemCountResult->fetch_row();
       


             //payment type
            //  $payment_type = $trailRow['payment_status'];

            //  if($payment_status == 1){
            //      $payment_status = "Full Payment";
            //  }else if($payment_status == 2){
            //      $payment_status = "Advance Payment";
            //  }else{
            //      $payment_status = "No Payment"; 
            //  }
 

            $output .= "<tr>
           <td>{$count}</td>
           <td>{$order_date}</td>
           <td>{$client_name}</td>
           <td>{$client_contact}</td>
           <td>{$itemCountRow[0]}</td>           
           <td>$payment_status</td>
           <td><a onclick='edit_order($order_id)' class='text-success'><i class='fa fa-edit'></i></a></td>
           <td><a onclick='deleteOrder($order_id)' class='text-danger'><i class='fa fa-trash '></i></a></td>
           <td><a href='invoice.php?id=$order_id' class='text-dark'><i class='fa fa-eye'></i></a></td>
           <td><a onclick='printOrder($order_id)' class='text-dark'><i class='fa fa-print'></i></a></td>
           <td><a onclick='sendMail($order_id)' class='text-dark'><i class='fa fa-envelope'></i></a></td>
           </tr>";

        }

    }else{

        echo" No orders ";
    }

    return $output;
}




function fetch_out_of_stock()
{

    $sql = "SELECT order_item.total,order_item.quantityTaken,products.product_name,orders.client_name, orders.client_contact,order_item.created_at FROM order_item INNER JOIN products on order_item.product_id = products.product_id  INNER JOIN orders on order_item.order_id = orders.order_id";    

    $result = query($sql);

    if (mysqli_num_rows($result) > 0) {

        $output = "";

        $count = 0;

        while ($trailRow = mysqli_fetch_array($result)) {
         $count++;
           

        
            //fetching total order items           

            // $countOrderItemSql = "SELECT count(*) FROM order_item WHERE order_id = $order_id";
            // $itemCountResult = query($countOrderItemSql);
            // $itemCountRow = $itemCountResult->fetch_row();
       

$created_on = f_date($trailRow[5]);


            $output .= "<tr>
           <td>{$count}</td>
           <td>{$trailRow[0]}</td>
           <td>{$trailRow[1]}</td>
           <td>{$trailRow[2]}</td>
           <td>{$trailRow[3]}</td>           
           <td>{$trailRow[4]}</td>
           <td>{$created_on}</td>
          
           </tr>";

        }

    }else{

        echo" No out stcok ";
    }

    return $output;
}