
<?php
session_start();
require_once 'config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $error = false;
        
    if(isset($_POST['props'])){
        // echo 'rue';
        
        // Add property title
        
        if(empty($_POST['propertytitle'])){
            $_SESSION['propertymsg'] = "Please Add a Title";
            $error = true;
        }else{
            $propertytitle = cleanInputField('propertytitle');
        }

        // Add the author

        if(empty($_POST['author'])){
            $_SESSION['propertymsg'] = "Please Add the author of this property";
            $error = true;
        }else{
            $author = cleanInputField('author');
        }
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
        
        // Add property Description

        if(empty($_POST['desc'])){
            $_SESSION['propertymsg'] = "Please Add a short note about the property";
            $error = true;
            
    }else{
        $desc = cleanCK('desc');
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
   
    
    if(!$error){
      
         // Add event featured image

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
                } else{
                    // echo "File is too big";
                    $_SESSION['propertymsg'] = "File is too big";
                    $error = true;
                }
            } else{
                // echo "There is a problem with this file";
                $_SESSION['propertymsg'] = "There is a problem with this file";
                $error = true;
            }
            
        } else{
            // echo "$fileExtention File type not allowed!";
            $_SESSION['propertymsg'] = "File type not allowed";
            $error = true;
        }
    }
    else{
        $fileDestination = 'no image';
    }
    

    // Check that there is no error

        $propertyid = str_replace(' ', '_', $propertytitle);
        $pid = $propertyid.date("Ymdhis").rand(102021, 192021);
       
        //run SQL here.... 
    
        
        $sql = formQuery("INSERT INTO properties SET productid ='$pid', producttitle ='$propertytitle', productdesc = '$desc', pauthor ='$author', productprice ='$price', dimage='$fileDestination', productsize = '$psize', productaddress='$address', paymentplan='$installment', pcategory='$category'");
        
        if($sql){
            $_SESSION['propertymsg'] = "Record inserted successfully!";
            header('Location:add-property');
            
        }else{
            $_SESSION['propertymsg']= "Oops! try again later"; 
            header('Location:add-property');
            
        }
        echo $_SESSION['propertymsg'];
      
    }else{
        header('Location:add-property');
    }

}

}

// 7:30am - 8:00am
// Preparing the office for the day
// 8:00am to 9am
// Getting Work Station ready, Checking for any necessary update on our live projects
// 9:00am to 11:00am
// Reminding the senior developer of any pending update and developments.
// 11:30am to 3pm:
// Working on, designing, developing, and updating any application that needs work.
// 3:00pm to 5:00pm
// Handling the Web development Training Sessions.
// 5:00pm to 6:00pm
// Rounding off on any pending work for the day. Signing out.

