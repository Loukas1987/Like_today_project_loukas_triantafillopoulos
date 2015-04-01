<?php
include('config.php');
?>
<!DOCTYPE html>

<h
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<title>Σαν Σήμερα - Αρχική Σελίδα </title>
       	<link rel="stylesheet" type="text/css" href="css/theme.css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>

         <script src="javascripts/jquery-1.10.2.js"></script>

<?php
echo "<script>\n"; 
echo "\n"; 
echo "$(document).ready(function() {\n"; 
echo "	$(\".x-navigation-control\").click(function(){\n"; 
echo "        $(this).parents(\".x-navigation\").toggleClass(\"x-navigation-open\");\n"; 
echo "        \n";      
echo "    });\n"; 
echo "\n"; 
echo "})\n"; 
echo "\n"; 

echo "</script>\n";
?>

 <style>
.panel-default>.panel-heading {
color: white;
background-color: #33414e;
border-color: #ddd;
}
.panel .panel-title {
color: white;
}
</style>
</head>

<body>


<div class="page-container">
 <div class="page-sidebar">
                <!-- START LT_SIDEBAR -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                    <a href="index.php">Σαν Σήμερα</a>
                    <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                    <div class="profile">
                        <div class="profile-image">
					    <!-- CONDITION FOR PROFILE IMAGE BY REGISTERED-UNREGISTERED USER -->
                              <?php if(!isset($_SESSION['username']))
							  {
							  echo "<img src='upload/default.png' title='Άγνωστος Χρήστης' alt='Άγνωστος Χρήστης'>";
							  } 
							  ?>
							  <?php if(isset($_SESSION['username']))
							  {
							  $user = $_SESSION['username'];
							  $sql = "SELECT image_src FROM users WHERE username='$user'";
                              $result = mysql_query($sql) or die ("Δεν επιτρέπεται η πρόσβαση στην Βάση Δεδομένων: " . mysql_error());
                                        while ($row = mysql_fetch_assoc($result))
							            {echo "<img src='" . $row['image_src'] . "' title='Άγνωστος Χρήστης' alt='Άγνωστος Χρήστης'>";}
						      } 
							  ?>
                        <!-- END:CONDITION FOR PROFILE IMAGE BY REGISTERED-UNREGISTERED USER -->                                
					    </div><!-- END: DIV.PROFILE-IMAGE -->  
                        <div class="profile-data">
                             <div class="profile-data-name">
					         <!-- CONDITION FOR DISPLAY NAME IF REGISTERED USER -->
					           <?php if(isset($_SESSION['username']))
					           {
					           echo ' '.htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8');
							   } 
							   ?>
					         <!-- END:CONDITION FOR DISPLAY NAME IF REGISTERED USER -->
		                     </div><!-- END: DIV.PROFILE-DATA-NAME -->  
                             <div class="profile-data-title">
					         <!-- CONDITION FOR DISPLAY NAME IF UNREGISTERED USER -->
					           <?php if(!isset($_SESSION['username']))
                               {
							   ?>
						       Επισκέπτης / Άγνωστος Χρήστης 
							   <?php
                               }
                               ?> 
                             <!-- END:CONDITION FOR DISPLAY NAME IF UNREGISTERED USER -->	
					         <!-- CONDITION FOR DISPLAY OCCUPATION IF REGISTERED USER -->
                              <?php if(isset($_SESSION['username']))
							  {
							  $user = $_SESSION['username'];
							  $sql = "SELECT occupation FROM users WHERE username='$user'";
                              $result = mysql_query($sql) or die ("Could not access DB: " . mysql_error());
                              while ($row = mysql_fetch_assoc($result))
							  {echo $row['occupation'];}
						      } 
							  ?>
					         <!-- END:CONDITION FOR DISPLAY OCCUPATION IF REGISTERED USER -->
                   
                             </div><!-- END: DIV.PROFILE-DATA-TITLE -->  
                        </div><!-- END: DIV.PROFILE-DATA -->            
                    </div> <!-- END: DIV.PROFILE -->                                                                         
                    </li>
					<!-- START SIDEBAR_MENU_BUTTONS -->
		     <li>
                    <a href="index.php"><span class="fa fa-home"></span> <span class="xn-text">Αρχική Σελίδα</span></a>                        
                    </li>
                    <!-- SIDEBAR_MENU_BUTTONS ONLY FOR REGISTERED USERS-->
					<?php if(isset($_SESSION['username']))
					{
                    ?>
                    <li class="xn-title"><center><span class="fa fa-user"></span> Ενέργειες Χρήστη</center></li>
                    <li><a href="edit_infos.php"><span class="fa fa-pencil"></span> <span class="xn-text">Επεξεργασία Προσωπικών Δεδομένων</span></a></li>
                    <li><a href="add_event.php"><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Καταχώρηση Συμβάντος</span></a></li>
					<li><a href="index_quiz.php"><span class="fa fa-trophy"></span> <span class="xn-text">Quiz Ερωτήσεων</span></a></li>
					<li class="xn-title"><center><span class="fa fa-info-circle"></span>     Πληροφόρηση Χρήστη</center></li>
					<li><a href="my_events.php"><span class="fa fa-database"></span> <span class="xn-text">Οι Καταχωρήσεις μου</span></a></li>
                                        <li><a href="map_search_of_user.php"><span class="fa fa-map-marker"></span> <span class="xn-text">Χαρτογράφηση των καταχωρήσεών μου</span></a></li>
                                        <li class="xn-title"><center><span class="fa fa-info-circle"></span>     Πληροφόρηση κάθε Επισκέπτη</center></li>
                                        
					<li><a href="all_events.php"><span class="fa fa-archive"></span> <span class="xn-text">Αρχείο Καταχωρήσεων</span></a></li>
                                        <li><a href="map_search.php"><span class="fa fa-map-marker"></span> <span class="xn-text">Χαρτογράφηση όλων των Γεγονότων</span></a></li>
                                        <li><a href="best_users.php"><span class="fa fa-users"></span> <span class="xn-text">Δημοφιλέστεροι Χρήστες</span></a></li>
                                        <li><a href="category_events.php"><span class="fa fa-tag"></span> <span class="xn-text">Γεγονόντα ανά Κατηγορία</span></a></li>

					<?php
					}
                    else
                    {
					?>
                   
					<li><a href="all_events.php"><span class="fa fa-archive"></span> <span class="xn-text">Αρχείο Καταχωρήσεων</span></a></li>
                                        <li><a href="map_search.php"><span class="fa fa-map-marker"></span> <span class="xn-text">Χαρτογράφηση όλων των Γεγονότων</span></a></li>
                                        <li><a href="best_users.php"><span class="fa fa-users"></span> <span class="xn-text">Δημοφιλέστεροι Χρήστες</span></a></li>
										<li><a href="category_events.php"><span class="fa fa-tag"></span> <span class="xn-text">Γεγονόντα ανά Κατηγορία</span></a></li>
									
                     <?php
                    }
                    ?>                
                </ul>
              <!-- END X-NAVIGATION -->
    </div><!-- END: DIV.PAGE-SIDEBAR --> 
    <div class="page-content">
			<ul class="x-navigation x-navigation-horizontal x-navigation-panel"> 
	<!-- LOGIN-SIGNUP PANEL -->
    <?php if(isset($_SESSION['username']))
    {
    ?>
	<!-- PANEL IF LOGGED USER -->
    <li class="xn-icon-button pull-right last" style="width: 100px;"><a href="connexion.php">Αποσύνδεση</a></li>
	<li class="xn-icon-button pull-right" style="width: 210px;">
	<a><i class="fa fa-sign-in"></i>
    <?php 
    $user = $_SESSION['username'];
    $sql = "SELECT name FROM users WHERE username='$user'";
    $result = mysql_query($sql) or die ("Δεν επιτρέπεται η πρόσβαση στην Βάση Δεδομένων: " . mysql_error());
     while ($row = mysql_fetch_assoc($result))
     {echo "Καλως ήλθες,".' '.$row['name'];} 
    ?>
	</a>
	</li>
    <?php
    }
    else
    {
    ?>
	<!-- PANEL IF NON-LOGGED USER -->
    <li><a href="sign_up.php">Εγγραφή Μέλους</a></li>
    <li><a href="connexion.php">Σύνδεση</a></li>
    <?php
    }
    ?>                       
    </ul>      
		<div class="page-content-wrap">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
				    <a href="users.php" class="tile-button btn btn-primary">
					<div class="tile-content-wrapper">
		                <i class="fa fa-users"></i>
					    <div class="tile-content">
						<?php 
                        $servername = "localhost";   
                        $username = "user305";  
                        $password = "ebIgeim1";   
                        $dbname = "user305_db3";
 
                        $conn = mysqli_connect($servername, $username, $password,$dbname);
                        $sql = "SELECT COUNT(*) FROM users";
                        $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result)>0)
						{
                            while($row = mysqli_fetch_assoc($result))
							{
							echo $row['COUNT(*)'];
							}
					    }
                        mysqli_close($conn);
                        ?>
					    </div><!-- END: DIV.TITLE-CONTENT --> 
						<small>Εγγεγραμμένοι Χρήστες</small>
					</div><!-- END: DIV.TITLE-CONTENT-WRAPPER --> 
					</a>												
				</div><!-- END: DIV.col-lg-4 col-sm-4 --> 
                <div class="col-lg-4 col-sm-4">
			        <a href="all_events.php" class="tile-button btn btn-primary">
					<div class="tile-content-wrapper">
					<i class="fa fa-calendar"></i>
						<div class="tile-content">
						<?php 
                        $servername = "localhost";   
                        $username = "user305";  
                        $password = "ebIgeim1";   
                        $dbname = "user305_db3";
 
                        $conn = mysqli_connect($servername, $username, $password,$dbname);
                        $sql = "SELECT COUNT(*) FROM event";
                        $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result)>0)
						{
                            while($row = mysqli_fetch_assoc($result))
							{
							echo $row['COUNT(*)'];
							}
					    }
                        mysqli_close($conn);
                        ?>
					    </div><!-- END: DIV.TITLE-CONTENT --> 
						<small>Καταχωρημένα Events</small>
				    </div><!-- END: DIV.TITLE-CONTENT-WRAPPER --> 
				    </a>												
				</div><!-- END: DIV.col-lg-4 col-sm-4 --> 
                <div class="col-lg-4 col-sm-4">
				    <a href="#" class="tile-button btn btn-primary">
					<div class="tile-content-wrapper">
					<i class="fa fa-clock-o"></i>
						<div class="tile-content">
						<?php echo date(" d / n"); ?>
						</div><!-- END: DIV.TITLE-CONTENT --> 
					    <small>Ώρα : <?php echo date('h:iA', time()) . "<br>\n";
date_default_timezone_set('"Europe/Athens"');?></small>
					</div><!-- END: DIV.TITLE-CONTENT-WRAPPER --> 
					</a>												
			    </div><!-- END: DIV.col-lg-4 col-sm-4 -->  
                                </div><!-- END: DIV.ROW --> 
            <div class="row">
				<div class="col-md-12">
						<div class="form-horizontal">
			                   <div class="panel panel-default">
			                         <div class="panel-body">							
                                     <?php 
                                     $servername = "localhost";   
                                     $username = "user305";  
                                     $password = "ebIgeim1";   
                                     $dbname = "user305_db3";
                                     $conn = mysqli_connect($servername, $username, $password,$dbname);
                                     $sql = "SELECT * FROM event ORDER BY YEAR ASC";
                                     $result = mysqli_query($conn,$sql);
                                     echo "<div class='timeline-tab-content' id='Events' style='display: block;'>";
                                         if (mysqli_num_rows($result)>0){
                                               while($row = mysqli_fetch_assoc($result)){
		                                             if (date("n")=== $row["MONTH"] AND date("j")=== $row["DAY"]){
		                                             echo "<div class='timeline-item clearfix'>";
		                                             echo "<div class='timeline-point'><div>".$row["YEAR"]."</div>
			                                         </div><div class='entry clearfix'>";
                                                     echo "<div class='hover-effect rel left'><p><img src='".$row["IMAGE_SRC"]."' width='400px' height='300px'/><br></br>".$row["DESCRIPTION"]."</p></div>";
                                                     echo "</div>";
                                                     echo "</div>";
                                                                                                                  }
                                                                                        }
                                                                        }	
                                          else {
                                          echo "<div class='row'><div class='Cell'> Δεν βρέθηκαν καταχωρήσεις γεγονόντων με βάση τα εισαχθέντα κριτήρια</div></div>";
                                                }
												echo "</div>";
                                     mysqli_close($conn);
									 ?>
									 
									 </div><!-- END: DIV.PANEL-BODY --> 
									 </div><!-- END: DIV.panel panel-default -->  
									 </div><!-- END: DIV.FORM-HORIZONTAL -->  

			  <div class="form-horizontal">
			                   <div class="panel panel-default">
                                                                         <div class="panel-body">
                                                                           
                <h3 class="event-counter">Βρέθηκαν συνολικά για την ημέρα αυτή <?php echo " <script type=\"text/javascript\">document.write($('div.timeline-item.clearfix').length);</script>"; ?> γεγονόντα!</h3>
</div><!-- END: DIV.FORM-HORIZONTAL --> 
                                                                          </div><!-- END: DIV.PANEL PANEL-DEFAULT --> 
                                                                          
                                                                          </div><!-- END: DIV.PANEL-BODY --> 
																		  </div><!-- END: DIV.col-md-12 --> 
																		  </div><!-- END: DIV.ROW -->  
							    
				
	<!-- LAST ACTIVITY OF REGISTERED USERS-->
            <div class="row">
                     <div class="col-md-6"> 
                            <div class="form-horizontal">
                                    <div class="panel panel-default">    
                                               <div class="panel-heading">
                                    <h3 class="panel-title"><i class='fa fa-list-ul'></i> 
                                     Πρόσφατη Δραστηριότητα</h3>
                                               </div>
                                                                     
                                     <?php 
                                     $servername = "localhost";   
                                     $username = "user305";  
                                     $password = "ebIgeim1";   
                                     $dbname = "user305_db3";
                                     $conn = mysqli_connect($servername, $username, $password,$dbname);
                                     $sql = "SELECT name,image_src,unix_timestamp(last_activity) FROM users ORDER BY last_activity DESC ";
                                     $result = mysqli_query($conn,$sql);
  
                                     function time_elapsed_B($secs){
                                     $bit = array(
                                     ' χρόνια'        => $secs / 31556926 % 12,
                                     ' εβδομάδες'     => $secs / 604800 % 52,
                                     ' ημέρες'        => $secs / 86400 % 7,
                                     ' ώρες'          => $secs / 3600 % 24,
                                     ' λεπτα'         => $secs / 60 % 60,
                                     ' δευτερόλεπτα'  => $secs % 60
                                     );
        
                                    foreach($bit as $k => $v){
                                    if($v > 1)$ret[] = $v . $k ;
                                    if($v == 1)$ret[] = $v . $k;
                                                             }
                                    array_splice($ret, count($ret)-1, 0, 'και');
                                    $ret[] = 'πριν.';
                                    return join(' ', $ret);
                                    }    
                                    $nowtime = time();
                                    $conn1 = mysqli_connect($servername, $username, $password,$dbname);
                                    $sql1 = "SELECT name,image_src,unix_timestamp(last_activity) FROM users ORDER BY last_activity DESC ";
                                    $result1 = mysqli_query($conn1,$sql1);
                                    if (mysqli_num_rows($result1)>0){                                  
                                   
                                    echo "<div class='tab-content no-padding no-border-left no-border-right no-border-bottom'>";
                                    echo "<div class='tab-pane active' id='tab14'>";
                                    echo "<ul class='lists'>";
                                           while($row1 = mysqli_fetch_assoc($result1) AND $i<5){ 
$i++;										   
                                           echo "<li>   <img src=".$row1["image_src"]." width='30px' height='30px'> Είσοδος Χρήστη ".$row1["name"]."  <span class='date'>".time_elapsed_B($nowtime-$row1["unix_timestamp(last_activity)"])."</span></li>";
                                                                                      }
													                }
                                    else {
                                    echo "<div class='row'><div class='Cell'> Δεν υπάρχει πρόσφατη δραστηριότητα....</div></div>";
                                         }
                                    echo "</ul>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    mysqli_close($conn);
                                    ?>
                                   </div>
                                    </div><!-- END: DIV.col-md-6 --> 

 <div class="col-md-6">
				     <div class="form-horizontal">
			              <div class="panel panel-default">

                                   <div class="panel-heading">
                                    <h3 class="panel-title">Χαρτογράφηση Σημερινών Γεγονόντων</h3>
                                </div>
			                   <div class="panel-body">
                               <?php
                               mysql_connect('localhost','user305','ebIgeim1') or die(mysql_error());
                               mysql_select_db('user305_db3') or die(mysql_error());    
                               $result = mysql_query('SELECT * FROM event') or die(mysql_error());
                               $count = 0;
                               $row = mysql_fetch_array($result);
                               ?>
                               <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                               <script>
                               google.load('visualization', '1', { 'packages': ['map'] });
                               google.setOnLoadCallback(drawMap);

                               function drawMap() 
							   {
                               var data = google.visualization.arrayToDataTable([
                               ['Country', 'Event'],
                               <?php
                               while($row = mysql_fetch_array($result))
                               if (date("n")=== $row["MONTH"] AND date("j")=== $row["DAY"]){
							   {
                               ?>
                               ['<?php  echo $row['PLACE']; ?>', '<center><a href="event.php?id=<?php echo $row['ID_EVENT']; ?>"><img src="<?php  echo $row['IMAGE_SRC']; ?>" width="150px" height="150px"/></center><b><?php echo $row['YEAR'];  ?></b>: <?php  echo $row['PLACE']; ?>: <?php  echo $row['TITLE_EVENT']; ?></a>'],
                               <?php 
							   }} 
							   ?>
                               ]);

                               var options = { showTip: true , zoomLevel: 4,icons: {
      default: {
        normal: 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Azure-icon.png',
        selected: 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Right-Azure-icon.png'
      }
    } };
                               var map = new google.visualization.Map(document.getElementById('chart_div'));
                               map.draw(data, options);
							   };
                               </script>
                                  <div id="chart_div"></div>
						       </div><!-- END: DIV.PANEL-BODY --> 
      
                        </div><!-- END: DIV.panel panel-default -->  	
				    </div><!-- END: DIV.FORM-HORIZONTAL -->  
				</div><!-- END: DIV.col-md-12 -->   
                                   </div><!-- END: DIV.ROW --> 
            			    
        </div><!-- END: DIV.PAGE-CONTENT-WRAP -->

        	
    </div><!-- END: DIV.PAGE-CONTENT -->  
<div class="footer">
		     <div class="footer-inner">
	               <div class="footer-content">
                   <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">
			       <img alt="Άδεια Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/80x15.png" />
				   </a>
				   <br />
				   Το έργο με τίτλο <span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Like Today</span> από τον δημιουργό<span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">Λουκά Τριανταφυλλόπουλο</span> διατίθεται με την άδεια <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Creative Commons Αναφορά Δημιουργού-Μη Εμπορική Χρήση-Όχι Παράγωγα Έργα 4.0 Διεθνές 
				   </a>.
		           </div><!-- END: DIV.FOOTER-CONTENT -->  
			 </div><!-- END: DIV.FOOTER-INNER -->  
		</div><!-- END: DIV.FOOTER -->  
</div><!-- END: DIV.PAGE-CONTAINER -->  
</body>
</html>
        