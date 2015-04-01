<?php
include('config.php');
?>
<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Σαν Σήμερα-Καταχωρημένα Γεγονότα</title>
        
        <link rel="stylesheet" type="text/css" href="css/theme.css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet"/>

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

<style>
li.category_button {
  font-family: 'Open Sans', sans-serif;
  font-size: 12px;
  text-decoration: none;
  color: #fff;
  position: relative;
  padding: 10px 20px;
  margin-left: 35px;
  background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(37, 40, 40)), color-stop(1, #33414e) );
}
  .category_number{
   content: "1";
  width: 35px;
  /* max-height: 29px; */
  height: 100%;
  position: absolute;
  display: block;
  padding-top: 28px;
  top: 0px;
  left: -36px;
  font-size: 16px;
  font-weight: bold;
  color: #FFFFFF;
  text-shadow: 1px 1px 0px #07526e;
  border-right: solid 1px #07526e;
   background-image: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(37, 40, 40)), color-stop(1, #33414e) );
  text-align: -webkit-center;
  }
  .category_name{  
  font-family: 'Open Sans', sans-serif;
  font-size: 15px;
  text-decoration: none;
  color: #fff;
  position: relative;
  }
  .panel-default .panel-heading {
  margin-bottom: 22px;
}
li.category_button:hover {
  background: #3d4e5d;
}
.latest_shows{width:32%!important}
  
  @media only screen and (max-width: 1024px) {
  .latest_shows{width:100%!important;padding-left: 0px!important;}
  .panel-body {
  padding-left: 0px!important;
}
  }
  

</style>

</head>

<body>
<script>

$(document).ready(function() {
	$(".x-navigation-control").click(function(){
        $(this).parents(".x-navigation").toggleClass("x-navigation-open");
        
        onresize();
        
        return false;
    });

})

$(window).bind('resize orientationchange', function() {
	ww = document.body.clientWidth;
	adjustMenu();
});

</script>
<div class="page-container">
<div class="page-sidebar">
                <!-- START X-NAVIGATION -->
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
					<li class="xn-title"><center><span class="fa fa-info-circle"></span>     Πληροφόρηση Χρήστη</center></li>
					<li><a href="my_events.php"><span class="fa fa-database"></span> <span class="xn-text">Οι Καταχωρήσεις μου</span></a></li>
					<li><a href="index_quiz.php"><span class="fa fa-trophy"></span> <span class="xn-text">Quiz Ερωτήσεων</span></a></li>
					
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
            </div>
<div class="page-content">
			<ul class="x-navigation x-navigation-horizontal x-navigation-panel"> <!-- TOGGLE NAVIGATION -->
			 <?php
//If the user is logged, we display links to edit his infos, to see his pms and to log out
if(isset($_SESSION['username']))
{
?>
<li class="xn-icon-button pull-right last" style="width: 100px;"><a href="connexion.php">Αποσύνδεση</a></li>
<?php
}
else
{
//Otherwise, we display a link to log in and to Sign up
?>
<li><a href="sign_up.php">Εγγραφή Μέλους</a></li>
<li><a href="connexion.php">Σύνδεση</a></li>
<?php
}
?>                       
                    
                    <!-- END POWER OFF -->    
                   </ul>
			  
			  <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
						<div class="form-horizontal">
			  <div class="panel panel-default">
			  <div class="panel-body">
			  <div class="panel-heading">
                                    <h3 class="panel-title">Συνολικές Καταχωρήσεις ανά <strong>Κατηγορία</strong> </h3>
                                    </div>
<div class="panel-body">

<?php
//We get the IDs, usernames and emails of users
$req = mysql_query('SELECT COUNT( * ) AS count,CATEGORY FROM event GROUP BY CATEGORY' );

while($dnn = mysql_fetch_array($req))
{
?>
<div class="latest_shows">

<ul>
      <li class="category_button"><a href="category.php?id=<?php echo $dnn['CATEGORY']; ?>"><div class="category_number"><?php echo $dnn['count']; ?></div><div class="category_name"><?php echo $dnn['CATEGORY']; ?></div></a></li>
 </ul>
</div>
                             
<?php
}
?>
</div> <!-- panel-body -->

              
									</div>
								
				   </div></div></div>
	</div></div></div>
	</body>
</html>