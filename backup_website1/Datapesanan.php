<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="datastyle.css">

    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital@0;1&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Condensed&family=Roboto:wght@100&family=Source+Serif+Pro:ital,wght@0,200;1,400&display=swap" rel="stylesheet">

    <title>MENU PAGE</title>
</head>

<body>

    <!--sisi kiri-->
    <div class="side-menu">
        <div class="food-name">
            <h1>Kopi Nusantara</h1>
        </div>
        <ul>
            <li><i class='bx bxs-share'></i>&nbsp; HOME PAGE</li>
            <li><i class='bx bxs-dashboard'></i>&nbsp; MENU</li>
            <li><i class='bx bx-user'></i></i>&nbsp; DATA</li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search..">
                    <button type="submit"><i class='bx bx-search'></i>></button>
                </div>
                <div class="user">
                    <div class="img-case">
                        <img src="user.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <!--Table-->
        
</body>
<div class="container">

   <div class="admin-product-form-container">

      <form action="?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new product</h3>
         <input type="text" placeholder="enter product name" name="product_name" class="box">
         <input type="number" placeholder="enter product price" name="product_price" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>

   </div>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Food</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Picture</th>
            <th>Option</th>
         </tr>
         </thead>
         <tr>
            <td><img src="uploaded_img/?php echo $row['image']; ?>" height="100" alt=""></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
               <a href="admin_update.php?edit=?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="admin_page.php?delete=?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      </table>
   </div>

</div>
</html>
