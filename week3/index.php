<!DOCTYPE HTML>
<html>
    <head>
        <title>My poem</title>
        <meta charset="utf-8">
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
				#a3ffb4
				
			  ); 
			background: linear-gradient(
				to right,
				#51D9D7,
				#a3ffb4
			); 
			 .red {
				position: absolute;
				top: 20px;
				left: 0;
				
				width: 270px;
				height: 7px;
				background-color: red;
				}
			.yellow {
				position: absolute;
				top: 55px;
				left: 0;
		
				width: 270px;
				height: 7px;
				background-color: yellow;
				}	
        .clickme {
            text-align: center;
            font-size: 0.8em;
        }
		p1 {
		  font-family: RobotoMono, courier;
		  font-size: 1.2em;
		  max-width: 65%;
		  max-height:65%;
		  text-align: center;
		  color: #6e57d2;
		}
	</style>
	</head>
    
    <body>
	<div class="red"></div>
	<div class="yellow"></div>
    <table>
        <tr>
            <td><h1 id="ronalds">Ronalds</h1></td>
            <td><h1 id="mcdonalds">Mcdonalds</h1></td>
        </tr>
        <tr>
            <td class="clickme">|<br>Click me</td>
            <td class="clickme">|<br>Click me</td>
        </tr>
    </table>
	
    <p1>Ronald eats Mcdonalds and jumps on ducks named Donald.<br>Mcdonalds has a <em>clown</em> named Ronald that Ronald likes to eat Mcdonalds with.<br> Mcdonalds is Ronalds favorite meal for his parter likes to steal.<br></p1>
	<?php echo "deez nuts";?>
	<?php
	echo "<p style='font-size: 60px; font-family: Roblox; color: #fff; text-decoration: none;'>DEEZ NUTZ</p>";
	?>

    <script>
        let ronalds = document.getElementById("ronalds");
        let mcdonalds = document.getElementById("mcdonalds");

        ronalds.onclick = function() {
            this.style.color = this.style.color == "red" ? "" : "red";
        }

        mcdonalds.onclick = function() {
            this.style.color = this.style.color == "yellow" ? "" : "yellow";
        }
    </script>
    </body>
</html>
