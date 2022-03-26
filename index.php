<?php
include("connect.php");
ob_start();
?>

<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RC_Charter2 Company</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/htmleaf-demo.css">
	<style type="text/css">
		/* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
		/* =========
		Get Fonts */
		@import url(http://fonts.googleapis.com/css?family=Quicksand);
		@import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
		/* ================
		   Assign Variables */
		/* ===========================
		   Setup Mixins/Helper Classes */
		.clearfix:after, .container:after, .tab-nav:after {
		  content: ".";
		  display: block;
		  height: 0;
		  clear: both;
		  visibility: hidden;
		}

		/* ==========
		   Setup Page */
		*, *:before, *:after {
		  box-sizing: border-box;
		}

		body {
		  font-family: 'Microsoft JhengHei', sans-serif;
		}

		/* =================
		   Container Styling */
		.container {
		  position: relative;
          padding: 3em;
		}

		/* ===========
		   Tab Styling */
		.tab-group {
		  position: relative;
		  border: 1px solid #eee;
		  margin-top: 2.5em;
		  border-radius: 0 0 10px 10px;
		  background-color: white;
		  opacity:0.9;
		}
		.tab-group section {
		  opacity: 0;
		  height: 0;
		  padding: 0 1em;
		  overflow: hidden;
		  transition: opacity 0.4s ease, height 0.4s ease;
		}
		.tab-group section.active {
		  opacity: 1;
		  height: auto;
		  overflow: visible;
		}

		.tab-nav {
		  list-style: none;
		  margin: -2.5em -1px 0 0;
		  padding: 0;
		  height: 2.5em;
		  overflow: hidden;
		}
		.tab-nav li {
		  display: inline;
		}
		.tab-nav li a {
		  top: 1px;
		  position: relative;
		  display: block;
		  float: left;
		  border-radius: 10px 10px 0 0;
		  background: #eee;
		  line-height: 2em;
		  padding: 0 1em;
		  text-decoration: none;
		  color: grey;
		  margin-top: .5em;
		  margin-right: 1px;
		  transition: background .2s ease, line-height .2s ease, margin .2s ease;
		}
		.tab-nav li.active a {
		  background: #42280F;
		  color: white;
		  line-height: 2.5em;
		  margin-top: 0;
		}



        html {
            height: 100%;
        }

        body {
            background-image: url('https://imgcdn.cna.com.tw/www/WebPhotos/1024/20191103/960x639_096734806532.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }

	</style>
	<script src="js/prefixfree.min.js"></script>
	<!--[if IE]>
		<script src="http://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->
</head>
<body>
	<center>

		<div class="container">
		  <div class="tab-group">
		    <section id="tab1" title="旅行總覽">
		      <h3>
		        旅行總覽
		      </h3>
		      <p>
		        <?php
					$SQL="SELECT * FROM charter_trip";
					$result=mysqli_query($link, $SQL);

					echo "<table border='3'>";
					echo "<tr bgcolor='#CCCC99'>
						  <td><b>旅遊編號</td>
						  <td><b>飛行員編號</td>
						  <td><b>飛機編號</td>
						  <td><b>付費編號</td>
						  <td><b>目的地</td>
						  <td><b>出發日期</td>
						  <td><b>出發時間</td></tr>";

					while( $row = mysqli_fetch_assoc($result)){

							echo "<tr bgcolor='white'><td>"
								 .$row['tnum']."</td><td>"
								 .$row['mnum']."</td><td>"
								 .$row['anum']."</td><td>"
								 .$row['pid']."</td><td>"
								 .$row['destination']."</td><td>"
								 .$row['date']."</td><td>"
								 .$row['time']."</td>";
							echo "</tr>";
					}
					echo "</table>";
					?>
		      </p>
		    </section>
		    <section id="tab2" title="飛行員列表">
		      <h3>
		        飛行員列表
		      </h3>
		      <p>
		        <?php
					$SQL="SELECT * FROM pilot";
					$result=mysqli_query($link, $SQL);

					echo "<table border='3'>";
					echo "<tr bgcolor='#CCCC99'>
							  <td><b>飛行員編號</td>
							  <td><b>飛行員名字</td>
						  </tr>";



					while( $row = mysqli_fetch_assoc($result)){

							echo "<tr bgcolor='white'><td>"
								.$row['mnum']."</td><td>"
								.$row['pname']."</td>";
							echo "</tr>";
					}
					echo "</table>";
					?>
		      </p>
		    </section>
		    <section id="tab3" title="公司員工">
		      <h3>
		        公司員工
		      </h3>
		      <p>
		        <?php
					$SQL="SELECT * FROM crewmember";
					$result=mysqli_query($link, $SQL);

					echo "<table border='3'>";
					echo "<tr bgcolor='#CCCC99'>
							  <td><b>員工編號</td>
							  <td><b>員工名稱</td>
						  </tr>";



					while( $row = mysqli_fetch_assoc($result)){

							echo "<tr bgcolor='white'><td>".$row['num'].
								 "</td><td>".$row['name'].
								 "</td>";
							echo "</tr>";
					}
					echo "</table>";
					?>
		      </p>
		    </section>
		    <section id="tab4" title="飛行員旅行紀錄">
		      <h3>
		        飛行員旅行紀錄
		      </h3>
		      <p>
		        <form action="index.php" method="post">

                選擇飛行員: 
                <select name="Item">
                <?php
                ob_start();
                    $SQL="SELECT * FROM pilot";
                    $result=mysqli_query($link, $SQL);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<option value=".$row['mnum'].">"
                        .$row['mnum']." ".$row['pname']."</option><br/>";     
                    }
				?>
                </select>

                <input type="submit" value="送出"/>
                <?php
                $Item=$_POST["Item"];
    
                $SQL="SELECT * FROM charter_trip WHERE mnum ='$Item'";
                $result=mysqli_query($link,$SQL);

                echo "<table border='3'>";
                echo "<tr bgcolor='#CCCC99'>
                	  <td><b>飛行員編號</td>
                	  <td><b>旅行編號</td>
                	  <td><b>飛機編號</td>
                	  <td><b>目的地</td>
                	  <td><b>出發日期</td>
                	  <td><b>出發時間</td></tr>";

                if($row = mysqli_fetch_assoc($result)){
                    echo "<tr bgcolor='white'><td>"
                    	 .$row['mnum']."</td><td>"
                    	 .$row['tnum']."</td><td>"
                    	 .$row['anum']."</td><td>"
                    	 .$row['destination']."</td><td>"
                    	 .$row['date']."</td><td>"
                    	 .$row['time']."</td>";
                    echo "</tr>";
				}else{
					echo "查無資料";
				}
				echo "</table>";
				?>
		      </p>
		    </section>
		    <section id="tab5" title="關鍵字查詢">
		      <h3>
		        關鍵字查詢
		      </h3>
		      <p>
		      	<?php 
		      	session_start();
		      	?>
		        <form action="index.php" method="post">


				

                查詢員工:
                <input type="text" name="word" placeholder="輸入任意一個英文字母"> 
                <input type="submit" value="送出"/>
                <?php

                	$word=$_POST["word"];
                	if ($word==a) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%a%'";
                	}else if ($word==b) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%b%'";
                	}else if ($word==c) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%c%'";
                	}else if ($word==d) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%d%'";
                	}else if ($word==e) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%e%'";
                	}else if ($word==f) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%f%'";
                	}else if ($word==g) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%g%'";
                	}else if ($word==h) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%h%'";
                	}else if ($word==i) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%i%'";
                	}else if ($word==j) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%j%'";
                	}else if ($word==k) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%k%'";
                	}else if ($word==l) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%l%'";
                	}else if ($word==m) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%m%'";
                	}else if ($word==n) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%n%'";
                	}else if ($word==o) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%o%'";
                	}else if ($word==p) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%p%'";
                	}else if ($word==q) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%q%'";
                	}else if ($word==r) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%r%'";
                	}else if ($word==s) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%s%'";
                	}else if ($word==t) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%t%'";
                	}else if ($word==u) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%u%'";
                	}else if ($word==v) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%v%'";
                	}else if ($word==w) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%w%'";
                	}else if ($word==x) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%x%'";
                	}else if ($word==y) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%y%'";
                	}else if ($word==z) {
                		$SQL="SELECT * FROM crewmember WHERE name LIKE '%z%'";
                	}
					
					$result=mysqli_query($link, $SQL);

					echo "<table border='3'>";
					echo "<tr bgcolor='#CCCC99'>
							  <td><b>員工編號</td>
							  <td><b>員工名稱</td>
						  </tr>";



					while( $row = mysqli_fetch_assoc($result)){

							echo "<tr bgcolor='white'><td>".$row['num'].
								 "</td><td>".$row['name'].
								 "</td>";
							echo "</tr>";
					}
					echo "</table>";
					?>

				<br/><br/><br/><br/><br/>

				查詢旅遊國家紀錄:
                <input type="text" name="word1" placeholder="輸入任意一個英文字母"> 
                <input type="submit" value="送出"/><br/><br/>
                <?php

                	$word1=$_POST["word1"];
                	if ($word1==a) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%a%'";
                	}else if ($word1==b) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%b%'";
                	}else if ($word1==c) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%c%'";
                	}else if ($word1==d) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%d%'";
                	}else if ($word1==e) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%e%'";
                	}else if ($word1==f) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%f%'";
                	}else if ($word1==g) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%g%'";
                	}else if ($word1==h) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%h%'";
                	}else if ($word1==i) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%i%'";
                	}else if ($word1==j) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%j%'";
                	}else if ($word1==k) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%k%'";
                	}else if ($word1==l) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%l%'";
                	}else if ($word1==m) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%m%'";
                	}else if ($word1==n) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%n%'";
                	}else if ($word1==o) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%o%'";
                	}else if ($word1==p) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%p%'";
                	}else if ($word1==q) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%q%'";
                	}else if ($word1==r) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%r%'";
                	}else if ($word1==s) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%s%'";
                	}else if ($word1==t) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%t%'";
                	}else if ($word1==u) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%u%'";
                	}else if ($word1==v) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%v%'";
                	}else if ($word1==w) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%w%'";
                	}else if ($word1==x) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%x%'";
                	}else if ($word1==y) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%y%'";
                	}else if ($word1==z) {
                		$SQL="SELECT * FROM charter_trip WHERE destination LIKE '%z%'";
                	}
					
					$result=mysqli_query($link, $SQL);

					echo "<table border='3'>";
					echo "<tr bgcolor='#CCCC99'><td><b>旅遊編號</td><td><b>飛行員編號</td><td><b>飛機編號</td><td><b>付費編號</td><td><b>目的地</td><td><b>出發日期</td><td><b>出發時間</td></tr>";



					while( $row = mysqli_fetch_assoc($result)){

							echo "<tr bgcolor='white'><td>".$row['tnum']."</td><td>".$row['mnum']."</td><td>".$row['anum']."</td><td>".$row['pid']."</td><td>".$row['destination']."</td><td>".$row['date']."</td><td>".$row['time']."</td>";

					echo "</tr>";
					}
					echo "</table>";
					?>


		      </p>
		    </section>
		  </div>
		</div>

	</div>
	
	<script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
	<script type="text/javascript" src="js/jquery-tab.js"></script>
	<script type="text/javascript">
		$(function(){
			// Calling the plugin
			$('.tab-group').tabify();
		})
	</script>
	</center>
</body>
</html>
