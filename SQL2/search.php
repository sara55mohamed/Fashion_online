<html>
            <head>
            <title>Shop</title>
                <link rel="icon" href="../img/favicon.png" sizes="192x192" /> 
                <link rel="stylesheet" href="nav.css" >

        <style>
                    body
                    {
                        margin: 0px;
                        padding: 0px;
                        background-image: url(bg-1.jpg);
                        background-repeat: repeat-y;
                    }
                    span
                    {
                        color:#000080;
                        font-size: 28px;
                        text-transform: capitalize;
                        margin: 18px;

                        
                    }
                    .content
                    {
                        width: 600px;
                        height: 300px;
                        margin: 100px 320px;
                        float: left;
                        font-size: 16px;
                        padding: 70px;
                    }
                    .content label
                    {
                        margin:10px 20px;
                        font-size: 30px;
                        margin-top: 30px;
                        text-transform: capitalize;
                        color:#000080;
                    }
                    .content input[type=text]
                    {
                        margin: 10px 20px;
                        margin-top: 30px;
                        padding: 10px;
                        width: 500px;
                    }
                    .content input[type=submit]
                    {
                        margin: 50px 180px;
                        margin-bottom: 50px;
                        padding: 10px;
                        width: 200px;
                        font-size: 25px;
                        color:#000080;
                    }
                    .content a
                    {
                        text-decoration: none;
                        text-transform: capitalize;
                        font-size: 18px;
                        
                    }
                    .content a:hover
                    {
                        color: #152E99;
                        font-size: 25px;
                    }
                    .content1
                {
                    width: 600px;
                    height: 200px;
                    margin: 100px 320px;
                    margin-top: 5px;
                    float: left;
                    font-size: 16px;
                    padding: 50px;
                }
                </style>
            </head>
            <body>
                
                <div class="content">
                    <span>Name</span>
                    <br>
                    <form method="post" action="search.php">
                        <input type="text" name="name" value="">
                        <input type="submit" value="Search"><br/>
                        <a href="../product.php">back</a>
                    </form>
                    
                </div>
            <div>
            <div class="content1">
        <?php
            // Create connection
            require("connect2.php");
            // $output = '';
            if(isset($_POST['name'])){
                $name=$_POST['name'];
                $getProduct = "SELECT * FROM product WHERE name LIKE '%$name%'";
                $getProductDetails = $connect->prepare($getProduct);
                $getProductDetails -> execute();
                $found = false;
                echo "<center><table border='2' cellspacing='0' cellpadding='50' align='center' style='border:5px solid rgba(0,0,0,.5); background-color:lelaic;'>
                <tr>
                <td style='color:#03a9f4; font-size: 25px;'>Name</td>
                <td style='color:#03a9f4; font-size:25px;'>Price</td>
                <td style='color:#03a9f4; font-size: 25px;'>Image</td>
                <td style='color:#03a9f4; font-size:25px;'>Category</td>
                </tr>";
            while ($row= $getProductDetails->fetch(PDO::FETCH_ASSOC)) {
                # code...
                $found = true;
                $name=$row['name'];
                $price=$row['price'];
                $imageName= '../img/product-images/'.$row['logo'];
                $category=$row['category'];
            
                
                echo'<tr role="row">
                <th class="sorting"style="color:#40739e; font-size: 15px;">'.$name.'</th>
                <th class="sorting"style="color:#40739e; font-size: 15px;">'.$price.'</th>
                <th class="sorting"style="color:#40739e; font-size: 15px;">'.$category.'</th>
                <td><img width="100px" hight="100px" src='.$imageName.'></td>
            </tr>'; 
            }

            if($found==false){
                echo "<html><head><script>alert('Not found');
                window.location='search.php';</script></head><body></body>";
                
            }
        }
        ?>
            </div>
        </tbody>
        </table>
                </div>
            </div>
            </div>
            <!-- //     if(isset($_POST['n'])){
        //         $n=$_POST['n'];

        //         require_once("connect2.php");#new code
        // $r=mysql_query("SELECT * FROM product WHERE name LIKE '%$n%'");#new code
        //     echo "<center><table border='2'  width='200' cellspacing='0' cellpadding='10' align='center' style='border:5px solid rgba(0,0,0,.5); background-color:lelaic;'>
        //     <tr>
        //     <td style='color:#03a9f4; font-size: 30px;'>Name</td>
        //     <td style='color:#03a9f4; font-size:30px;'>price</td>
        //     <td style='color:#03a9f4; font-size:30px;'>logo</td>
        //     </tr>";
        //     while ($row=mysql_fetch_array($r)) {

        //         # code...
        //         $name=$row['name'];
        //         $price=$row['price'];
        //         $logo= '../img/product-images/'.$row['logo'];
        //         echo 
        //         "<tr>
        //         <td style='color:#40739e; font-size: 20px;'>$name</td>
        //         <td style='color:#40739e; font-size: 20px;'>$price</td>
        //         <td style='color:#40739e; font-size: 20px;'><img width='100%' src='$logo'/></td>
        //         </tr>"; 
        //     }


        //     echo "</table></center>";
    
        //     } -->
            </div>
            </body>
        </html>
    

        