<?php 
// define variables and set to empty values
$nameERR=$emailERR=$websiteERR=$commentERR=$genderERR="";
$name=$email=$website=$comment=$gender="";


if($_SERVER['REQUEST_METHOD']=='POST')
{
  if(empty($_POST['name']))
  {
    $nameERR = "Please add your name";
  }
  else
     { 
      $name = test_input($_POST['name']);
       if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
       $nameERR = "Only letters and white space allowed";
    }
    }
  if(empty($_POST['email']))
    {
      $emailERR= "Please Add Your Email";
    }
    else
       { 
        $email = test_input($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailERR = "Invalid email format";
    }
       }

  if(empty($_POST['website']))
    {
      $websiteERR="enter a website link";
    } 
     else
         {
          $website = test_input($_POST['website']);
          if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteERR = "Invalid URL";
    }
            }
    if(empty($_POST['comment']))
      {
        $commentERR = "You must add your Comment";
      }
        else
          {
            $comment = test_input($_POST['comment']);
          }

      
    if(empty($_POST['gender']))
      {
       $genderERR = "choose Your Gender"; 
      }
      else
        {
          $gender = test_input($_POST['gender']);
        }
}
function test_input($data)
{
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE HTML>  
<html>
<head>
</head>
<body> 
<h2>Our Form Validation....</h2>  
<form method='post' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  Name : <input type="text" name="name" value="<?php echo $name; ?>">
<span class="error" style="color:red"> <?php echo  "*".$nameERR; ?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
  <span class="error" style="color:red"> <?php echo "*".$emailERR; ?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website; ?>">
  <span class="error" style="color:red"> <?php echo  "*".$websiteERR; ?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40">
    <?php echo $comment; ?>
  </textarea>
  <span class="error" style="color:red"> <?php echo "*".$commentERR; ?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female" 
   <?php if(isset($gender) && $gender=='female') echo "checked"; ?> >Female
  <input type="radio" name="gender" value="male" 
  <?php if(isset($gender) && $gender=='male') echo "checked"; ?>
   >Male
  <input type="radio" name="gender" value="other"
  <?php if(isset($gender) && $gender=='other') echo "checked"; ?>
  >Other
  <span class="error" style="color:red"> <?php echo "*".$genderERR; ?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
<h3>RESULTS     
</h3>
<?php 
echo $name ;
echo '<br>';
echo $email;
echo '<br>';
echo $website;
echo '<br>';
echo $comment;
echo '<br>';
echo $gender;
?>
</body>
</html>