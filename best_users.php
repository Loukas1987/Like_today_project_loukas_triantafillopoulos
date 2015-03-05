<?php
include('config.php');
?>
<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Σαν Σήμερα-Εγγεγραμμένοι Χρήστες</title>

        <link rel="stylesheet" type="text/css" href="css/theme.css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet"/>

		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<style>
.four, .row .four {
width: 100%;
}
.player_gallery .player_info .number:before {
content: '';
position: absolute;
left: -13px;
top: 0;
border-bottom: 32px solid #3f4851;
border-right: 11px solid transparent;
}
.player_gallery .player_info .number:after {
content: '';
position: absolute;
left: -11px;
top: 0;
border-top: 32px solid #d61919;
border-left: 11px solid transparent;
}
.player_gallery {
list-style: none;
padding: 0;
margin: 0 -10px 40px;
}
.player_gallery li {
float: left;
width: 33%;
padding: 0 10px;
margin: 0 0 20px;
}
.player_gallery .player_image {
position: relative;
margin: 0 0 23px;
}
.player_gallery .player_image > a {
position: relative;
display: block;
}
.player_gallery .player_image img {
display: block;
max-width: 100%;
height: auto;
}
.player_gallery .player_like {
position: absolute;
left: 0;
top: 0;
background: rgba(0,0,0,0.5);
padding: 8px 14px 8px 8px;
}

.player_gallery .player_info {
position: relative;
height: 32px;
line-height: 32px;
}
.player_gallery .player_info .position {
position: relative;
overflow: hidden;
font-size: 15px;
height: 32px;
background: #33414e;
color: #fff;
text-transform: uppercase;
padding: 0 10px;
}
.player_gallery .player_info .number{background: #d61919 !important;position: relative;
float: right;
background: #d61919;
font-size: 15px;
color: #fff;
padding: 0 12px;
font-weight: normal;
margin: 0 0 0 13px;}
.like_button {
color: #fff;
text-decoration: none;
display: inline-block;
vertical-align: middle;
}
.player_gallery h4 {
text-transform: uppercase;
color: #252c33;
font-weight: 400;
font-family: Oswald, Arial, sans-serif;
text-align: center;
}
.player_info1.clearfix {
position: relative;
height: 32px;
line-height: 32px;
text-align: center;
}
.player_gallery .player_info1 .number
{background: #d61919 !important;
position: relative;
/* float: right; */
background: #d61919;
font-size: 15px;
color: #fff;
/* padding: 0 12px; */
font-weight: normal;
/* margin: 0 0 0 13px; */}

.player_gallery .player_info1 .avatar{
position: relative;
overflow: hidden;
font-size: 15px;
/* height: 32px; */
background: rgba(230, 235, 240, 0.26);
color: #fff;
text-transform: uppercase;
padding: 0 10px;}
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
if (isset($_SESSION['username'])) {
?>
<li class="xn-icon-button pull-right last" style="width: 100px;"><a href="connexion.php">Αποσύνδεση</a></li>
<?php
} else {
    //Otherwise, we display a link to log in and to Sign up
?>
<li><a href="sign_up.php">Εγγραφή Μέλους</a></li>
<li><a href="connexion.php">Σύνδεση</a></li>
<?php
}
?>                       
                    
                    <!-- END POWER OFF -->                    
                   
                   </ul>
			                     
                   
                   </ul>
			  
			  <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
						<div class="form-horizontal">
			  <div class="panel panel-default">
			  <div class="panel-body">
			  <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Δημοφιλείς</strong> Χρήστες</h3>
                                    </div>
									<div class="panel-body">
                                    <p>Στην Σελίδα αυτή έχετε την δυνατότητα να δείτε όλους τους χρήστες που είναι εγγεγραμμένοι...</p>
									<p>To avatar εξελίσσεται καθώς γίνεται καταχώρηση περισσότερων γεγονόντων από τον χρήστη....</p>
									<center><img src='default/images/avatars/avatars_promotion.gif' border-style='3px' title='promotion' alt='promotion' width='100px' height='140px'></center> 

									</p>
                                </div>
								<div class="panel-body">
								<div class="col-md-9">
<div id="members-dir-list" class="members dir-list">
                               <div class="search-list twelve"> 
<div>
     <div class="four columns">
<div class="tab-content">
    <div class="tab-pane fade in active" id="tab_2268">
    <div class="sp-template sp-template-player-gallery">
	<div id='sp-player-gallery-2268' class='gallery galleryid-2268 gallery-columns-3 gallery-size-thumbnail'>	
	<ul class="player_gallery clearfix">                           
                             
                                <?php
//We get the IDs, usernames and emails of users
$req = mysql_query('select * from users ORDER BY views DESC');
$i=0;
$req1= mysql_query('SELECT COUNT( * ) AS count,AUTHOR_ID FROM event GROUP BY AUTHOR_ID ORDER BY count DESC');

while ($dnn = mysql_fetch_array($req)) {
if ($dnn1= mysql_fetch_array($req1)){
?>
<li>
    <div class="player_image">
        <a href="profile.php?id=<?php echo $dnn['id']; ?>">
        <img width="640" height="640" src="<?php echo htmlentities($dnn['image_src'], ENT_QUOTES, 'UTF-8'); ?>" class="attachment-player_photo wp-post-image"/>        
        </a>
        <div class="player_like">
		<a href="profile.php?id=<?php echo $dnn['id']; ?>" class="like_button"><i class="fa fa-eye"></i> <span><?php echo htmlentities($dnn['views'], ENT_QUOTES, 'UTF-8'); ?></span>
		</a>
        </div>
    </div>
    <h4><a href="profile.php?id=<?php echo $dnn['id']; ?>"><?php echo htmlentities($dnn['name'], ENT_QUOTES, 'UTF-8'); ?></a></h4>
	<div class="player_info1 clearfix">
        <div class="number"> ΕΞΕΛΙΞΙΜΟΤΗΤΑ AVATAR </div>
        <div class="avatar">
		<?php if ($dnn1['count']<10){ $xp = $dnn1['count']*5; ?>
<img src='default/images/avatars/epipedo_1.jpg' title='Νέος Χρήστης-Ανίδεος' alt='Νέος Χρήστης' width='50px' height='100px'>
<?php } ?>
<?php if ($dnn1['count']>=10 AND $dnn1['count']<30){ $xp = $dnn1['count']*8; ?>
<img src='default/images/avatars/epipedo_2.jpg' title='Μαθητευόμενος' alt='Μαθητευόμενος' width='50px' height='100px'>
<?php } ?>
<?php if ($dnn1['count']>=30 AND $dnn1['count']<50){ $xp = $dnn1['count']*11; ?>
<img src='default/images/avatars/epipedo_3.jpg' title='Γνώστης' alt='Γνώστης' width='50px' height='100px'>
<?php } ?>
<?php if ($dnn1['count']>=50 AND $dnn1['count']<80){ $xp = $dnn1['count']*15; ?>
<img src='default/images/avatars/epipedo_4.jpg' title='Ειδικευόμενος' alt='Ειδικευόμενος' width='50px' height='100px'>
<?php } ?>
<?php if ($dnn1['count']>=80){ $xp = $dnn1['count']*19; ?>
<img src='default/images/avatars/epipedo_5.jpg' title='Μαθουσάλας' alt='Μαθουσάλας' width='50px' height='100px'>
<?php } ?>
</div>
    <div class="player_info clearfix">
        <div class="number"><i class="t-shirt"></i>XP <?php echo $xp; ?></div>
        <div class="position">Δημοσιευσεις: <?php echo $dnn1['count']; ?>
</div>
    </div>
</li>
<?php 
}
else {
?>
<li>
    <div class="player_image">
        <a href="profile.php?id=<?php echo $dnn['id']; ?>">
        <img width="640" height="640" src="<?php echo htmlentities($dnn['image_src'], ENT_QUOTES, 'UTF-8'); ?>" class="attachment-player_photo wp-post-image"/>        
        </a>
        <div class="player_like">
		<a href="profile.php?id=<?php echo $dnn['id']; ?>" class="like_button"><i class="fa fa-eye"></i> <span><?php echo htmlentities($dnn['views'], ENT_QUOTES, 'UTF-8'); ?></span>
		</a>
        </div>
    </div>
    <h4><a href="profile.php?id=<?php echo $dnn['id']; ?>"><?php echo htmlentities($dnn['name'], ENT_QUOTES, 'UTF-8'); ?></a></h4>
	
	<div class="player_info1 clearfix">
        <div class="number"> ΕΞΕΛΙΞΙΜΟΤΗΤΑ AVATAR </div>
        <div class="avatar">
		<?php if ($dnn1['count']<10){ $xp = $dnn1['count']*5; ?>
<img src='default/images/avatars/epipedo_1.jpg' title='Νέος Χρήστης-Ανίδεος' alt='Νέος Χρήστης' width='50px' height='100px'>
<?php } ?>
<?php if ($dnn1['count']>=10 AND $dnn1['count']<30){ $xp = $dnn1['count']*8; ?>
<img src='default/images/avatars/epipedo_2.jpg' title='Μαθητευόμενος' alt='Μαθητευόμενος' width='50px' height='100px'>
<?php } ?>
<?php if ($dnn1['count']>=30 AND $dnn1['count']<50){ $xp = $dnn1['count']*11; ?>
<img src='default/images/avatars/epipedo_3.jpg' title='Γνώστης' alt='Γνώστης' width='50px' height='100px'>
<?php } ?>
<?php if ($dnn1['count']>=50 AND $dnn1['count']<80){ $xp = $dnn1['count']*15; ?>
<img src='default/images/avatars/epipedo_4.jpg' title='Ειδικευόμενος' alt='Ειδικευόμενος' width='50px' height='100px'>
<?php } ?>
<?php if ($dnn1['count']>=80){ $xp = $dnn1['count']*19; ?>
<img src='default/images/avatars/epipedo_5.jpg' title='Μαθουσάλας' alt='Μαθουσάλας' width='50px' height='100px'>
<?php } ?>
</div>
<div class="player_info clearfix">
        <div class="number"> XP : <?php echo $xp; ?></div>
        <div class="position">Δημοσιευσεις: 0
		
</div>
    </div>

	</li>

    <?php
}}
?>
</ul>
</div>    
</div>
</div></div>
	</div></div>	</div>
</div>							
								


</div>

				   </div></div></div>
	</div></div></div></div>
	</body>
</html>

		