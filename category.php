<?php
include('config.php');
?>
<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Σαν Σήμερα-Προφίλ Χρήστη</title>

        <link rel="stylesheet" type="text/css" href="css/theme.css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		
<style type="text/css">


.portlet {
margin-bottom: 15px;
border: none;
background: #fff;
width: 100%;
}
.col-lg-8.col-md-8.col-sm-6.col-xs-12 {
width: 100%;
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
                <!-- END LT_SIDEBAR -->
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
                   <div class="col-md-12">
						<div class="form-horizontal">
			                  <div class="panel panel-default">
			                        <div class="panel-body">
			                              <div class="panel-heading">
                                          <h3 class="panel-title"><strong>Οι</strong> καταχωρήσεις μου!</h3>
                                          </div><!-- END: DIV.PANEL-HEADING -->
								    </div><!-- END: DIV.PANEL-BODY -->

<div class="panel-body">

<?php
if(isset($_GET['id']))
                                        {
	                                    $id = $_GET['id']; 
 $dn = mysql_query('select * from event where CATEGORY="'.$id.'"');  
						            

if(mysql_num_rows($dn)>0) { 
while($dnn = mysql_fetch_array($dn)){ 
	                                  
?>
<div class="latest_shows">
<div class="left">

<?php
$monthNum = $dnn['MONTH'];
$monthName = date("F", mktime(0, 0, 0, $monthNum, 10)) ;

if ($monthName == January){$monthName = 'Ιανουαρίου'; }
if ($monthName == February){$monthName = 'Φεβρουαρίου'; }
if ($monthName == March){$monthName = 'Μαρτίου'; }
if ($monthName == April){$monthName = 'Απριλίου'; }
if ($monthName == May){$monthName = 'Μαϊου'; }
if ($monthName == June){$monthName = 'Ιουνίου'; }
if ($monthName == Jule){$monthName = 'Ιουλίου'; }
if ($monthName == August){$monthName = 'Αυγούστου'; }
if ($monthName == September){$monthName = 'Σεπτεμβρίου'; }
if ($monthName == October){$monthName = 'Οκτωβρίου'; }
if ($monthName == November){$monthName = 'Νοεμβρίου'; }
if ($monthName == December){$monthName = 'Δεκεμβρίου'; }
?>


<span class="show_date"><span class="day"><?php echo $dnn['YEAR']; ?></span>

<span class="month">
<?php echo $dnn['DAY']; ?> <?php  echo $monthName; ?>

</span></span><!-- show_date -->

<a href="event.php?id=<?php echo $dnn['ID_EVENT']; ?>"><img src="<?php echo htmlentities($dnn['IMAGE_SRC'], ENT_QUOTES, 'UTF-8'); ?>" class="show_img" alt="<?php echo htmlentities($dnn['TITLE_EVENT'], ENT_QUOTES, 'UTF-8'); ?>"></a>

</div><!-- left -->

<div class="right">

<h4><a href="event.php?id=<?php echo $dnn['ID_EVENT']; ?>"><?php echo htmlentities($dnn['TITLE_EVENT'], ENT_QUOTES, 'UTF-8'); ?></a></h4>

<span class="show_location"><span>Τοποθεσία: <?php echo htmlentities($dnn['PLACE'], ENT_QUOTES, 'UTF-8'); ?></span></span>

</div><!-- right -->

</div>
                             
 <?php
	                                   }}}
                                    ?>
</div> <!-- panel-body -->
									
								</div><!-- END: DIV.PANEL-PANEL DEFAULT-->
				   </div><!-- END: DIV.FORM HORIZONTAL-->
			     </div><!-- END: DIV.col-md-12-->
			</div><!-- END: DIV.ROW-->
	     </div><!-- END: DIV.PAGE-CONTENT WRAP-->
	
	</div><!-- END: DIV.PAGE-CONTENT-->
</div><!-- END: DIV.PAGE-CONTAINER-->
</body>
</html>
		