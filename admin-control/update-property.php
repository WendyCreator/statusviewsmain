
<?php
session_start();
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $error = false;
        
    if(isset($_POST['prop'])){
        $id = $_POST['id'];
        $productid = $_POST['productid'];
        
        // Add Event title
        
        if(empty($_POST['producttitle'])){
            $_SESSION['propedit'] = "Please Add a Title";
            $error = true;
        }else{
            $propertytitle = cleanInputField('producttitle');
        }

        // Add the hosting pastor

        if(empty($_POST['pauthor'])){
            $_SESSION['propedit'] = "Please Add the Author";
            $error = true;
        }else{
            $pauthor = cleanInputField('pauthor');
        }
        
        // Add property Description
        if(empty($_POST['ddesc'])){
            $_SESSION['propedit'] = "Please Add a short note about property";
            $error = true;
            
    }else{
        $ddesc = cleanCK('ddesc');
    }

    // //////////////////////////

    // add price...
    if(empty($_POST['price'])){
        $_SESSION['propertymsg'] = "Please Add the price of this property";
        $error = true;
    }else{
        $price = cleanInputField('price');
    }
    // add size

    if(empty($_POST['psize'])){
        $_SESSION['propertymsg'] = "Please Add the size of this property";
        $error = true;
    }else{
        $psize = cleanInputField('psize');
    }
    
 

  // Add the address

  if(empty($_POST['address'])){
    $_SESSION['propertymsg'] = "Please Add Property Address";
    $error = true;
}else{
    $address = cleanInputField('address');
}

  
    // Add property payment plan

    if(empty($_POST['installment'])){
        $installment = "Call us now to discuss the best payment plan for you...";
        
}else{
    $installment = cleanCK('installment');
}

// add category
$category = cleanCK('category');



// Check that there is no error

    // $ddate = $_POST['year'].'/'.$_POST['month'].'/'.$_POST['day'];

    // Add event featured image
   if(!$error){
    if($_FILES['files']['name'] != ''){
        $files = $_FILES['files'];
        $fileName = $_FILES['files']['name'];
        $fileType = $_FILES['files']['type'];
        $fileTemp = $_FILES['files']['tmp_name'];
        $fileSize = $_FILES['files']['size'];
        $fileError = $_FILES['files']['error'];
        
        
        
        $fileExt = explode('.', $fileName);
        $fileExtention = strtolower(end($fileExt));
        $allowed = array("jpg", "png", "jpeg",'gif');
        
        if(in_array($fileExtention, $allowed)){
            
            if($fileError === 0){
                
                if($fileSize < 1000000000){
                    $propertyimage = str_replace(' ', '_', $propertytitle);
                    $fileNewName = $propertyimage.date('ymdhis').rand(1000, 5000).'.'.$fileExtention;
                    $fileDestination = 'properties/'.$fileNewName;
                    move_uploaded_file($fileTemp, $fileDestination);

                    $dfileDestination = $fileDestination;
                  
                } else{
                    echo "File is too big";
            $_SESSION['propedit'] = "File is too big";

                    $error = true;
                }
            } else{
                echo "There is a problem with this file";
            $_SESSION['propedit'] = "There is a problem with this file";

                $error = true;
            }
            
        } else{
            echo "$fileExtention File type not allowed!";
            $_SESSION['propedit'] = "File type is not supported";

            $error = true;
        }
        // echo $fileDestination; 
        $sqlSelect = $conn->query("SELECT * FROM properties WHERE productid = '$productid' AND id ='$id' ");
        $row1=$sqlSelect->fetch_assoc();
        echo $row1['dimage'];
        if($row1['dimage'] !== 'no image' or !empty($row1['dimage'])){
           unlink($row1['dimage']); 
        }
         

    }else{
        $sqlSelect = $conn->query("SELECT * FROM properties WHERE productid = '$productid' AND id ='$id' ");
        $row=$sqlSelect->fetch_assoc();
        $dfileDestination = $row['dimage'];

    }
        
}
    // If no image is added...... replace with the old one

 

    // Check that there is no error

    
    if(!$error){
     
        
        //run SQL here.... 
    
    

        $sql = formQuery("UPDATE properties SET producttitle ='$propertytitle', productdesc = '$ddesc', pauthor ='$pauthor', productprice ='$price', dimage='$dfileDestination', productsize = '$psize', productaddress='$address', paymentplan='$installment', pcategory='$category' WHERE productid = '$productid' AND id ='$id' ");
        
        if($sql){
            $_SESSION['propedit'] = "Record Updated successfully!";
            header("Location:edit-property.php?id=$id&productid=$productid");
            
        }else{
            $_SESSION['propedit']= "Oops! try again later"; 
            header("Location:edit-property.php?id=$id&productid=$productid");
            
        }
        echo $_SESSION['propedit'];
    }

}


}