<!DOCTYPE HTML>
<html>
    <head>
        <title>My poem</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
			@font-face {
			  font-family: "MemphisRiver";
			  src: url(fontz/MemphisRiver.ttf) format("truetype");
			}
			@font-face {
			  font-family: "Roblox";
			  src: url(fontz/Roblox-Font-Regular.ttf) format("truetype");
			  font-weight: normal;
			}
			@font-face {
			  font-family: "RobotoMono";
			  src: url(fontz/RobotoMono-Medium.ttf) format("truetype");
			  font-weight: normal;}
			  
			@font-face {
			font-family: "Julius";
			src: url(fontz/JuliusSansOne-Regular.ttf) format("truetype");
			font-weight: normal;
			}
			  
            body {
				
				  
				  
                background: #1a2980; 
				background: -webkit-linear-gradient(
				to right,
				#51D9D7,
				#0E5050
				
			  ); 
			background: linear-gradient(
				to right,
				#51D9D7,
				#0E5050
			); 
			.centered-content {
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			
			}
            }
			.layout {
        display: flex;
        justify-content: space-around;
        align-items: center;
        height: 100vh;
    }
    .container {
        flex: 2.5;
        max-width: 900px;
        margin: 5vh;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }
    .besidecontainer {
        flex: 1;
        max-width: 500px;
        margin: 5vh;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0);
    }
    .rightcontainer {
        flex: 1;
        max-width: 375px;
        margin: 5vh;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 1);
    }
		h1 {
		  font-size: 6em;
		  font-family: "MemphisRiver", sans-serif;
		  font-weight: bold;
		  color: #fff;}
		h2 {
		  font-family: "MemphisRiver", sans-serif;
		  font-size: 4em;
		  color: #fff;
		}
		
		h3 {
		  font-size: 3em;
		  font-family: "MemphisRiver", sans-serif;
		  font-weight: normal;
		   color: #fff;
		}
		h4 {
		  font-family: RobotoMono, courier;
		  font-size: 0.8em;
		  max-width: 65%;
		  max-height:65%;
		  text-align: left;
		  color: #fff;
		}
		p {
		  font-family: RobotoMono, courier;
		  font-size: 1.2em;
		  max-width: 65%;
		  max-height:65%;
		  text-align: left;
		  color: #fff;
		}
        .error {color: #FF0000;}  
		
        </style>
    </head>
	<body>
<a  href="index.html" style="font-size: 24px; font-family: Roblox; color:#fff; text-decoration: none;">back</a>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "<span style='font-family: RobotoMono;color:red;'>Are you scared im going to stalk you</span>";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "<span style='font-family: RobotoMono;color:red;'>Why didn't you put your email???</span>";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "<span style='font-family: RobotoMono;color:red;'>Why didn't you put your gender???</span>";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Look at this amazing Form</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <h4>Name:</h4> <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  <h4>E-mail:</h4> <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <h4>Website:</h4> <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  <h4>Comment:</h4> <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  <h4>Gender:</h4>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female"><h4>Female</h4>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"><h4>Male</h4>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other"><h4>Other</h4>  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" value="Submit" style="font-family:'RobotoMono'">  
</form>


<?php
echo "<h2>results:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>
<


</body>
</html>