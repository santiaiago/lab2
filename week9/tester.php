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
		  text-align: center;
		  color: #fff;
		}
		p {
		  font-family: RobotoMono, courier;
		  font-size: 1.2em;
		  max-width: 65%;
		  max-height:65%;
		  text-align: center;
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
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
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
    $genderErr = "Gender is required";
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
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
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
<h2>JavaScript Objects</h2>



<p id="demo"></p>

<h2>JavaScript Functions</h2>

<p>Call a function which performs a calculation and returns the result:</p>

<p id="demo2"></p>

<h2>JavaScript Class Methods</h2>
<p>How to define and use a Class method.</p>

<p id="demo3"></p>

<h2>JavaScript Functions</h2>
<h2>Function Sequence</h2>
<p>JavaScript functions are executed in the sequence they are called.</p>

<p id="demo4"></p>

<h2>JavaScript async / await</h2>
<p id="demo5"></p>

<?php echo "deez nuts";?>

<?php
$x = 34;
$y = 35;
echo $x + $y;
?>
<?php
// Check if the type of a variable is float 
$x = 10.365;
var_dump(is_float($x));
?>  

<pre>
<?php
$a = 5;       // Integer
$b = 5.34;    // Float
$c = "hello"; // String
$d = true;    // Boolean
$e = NULL;    // NULL

$a = (string) $a;
$b = (string) $b;
$c = (string) $c;
$d = (string) $d;
$e = (string) $e;

//To verify the type of any object in PHP, use the var_dump() function:
var_dump($a);
var_dump($b);
var_dump($c);
var_dump($d);
var_dump($e);
?> 
</pre>

<p>Note that when casting a Boolean into string it gets the value "1", and when casting NULL into string it is converted into an empty string "".</p>

<?php
echo(rand(1, 10));
?>

<script>

const person = {
  firstName: "Santiago",
  lastName: "Rafael",
  age: 100,
  eyeColor: "yellow"
};


document.getElementById("demo").innerHTML =
person.firstName + " is " + person.age + " years old.";
</script>
<script>
function myFunction(p1, p2) {
  return p1 * p2;
}

let result = myFunction(1020, 12398982);
document.getElementById("demo2").innerHTML = result;
</script>
<script>
class Car {
  constructor(name, year) {
    this.name = name;
    this.year = year;

  }
  age() {
    const date = new Date();
    return date.getFullYear() - this.year;
  }
}

const myCar = new Car("Pagani", 2020);
document.getElementById("demo3").innerHTML =
"My car is " + myCar.age() + " years old.";
</script>
<script>
function myDisplayer(some) {
  document.getElementById("demo4").innerHTML = some;
}

function myFirst() {
  myDisplayer("Hello");
}

function mySecond() {
  myDisplayer("Goodbye");
}

myFirst();
mySecond();
</script>
<script>
async function myDisplay() {
  let myPromise = new Promise(function(resolve, reject) {
    resolve("I love You !!");
  });
  document.getElementById("demo5").innerHTML = await myPromise;
}

myDisplay();
</script>


</body>
</html>