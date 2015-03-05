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

<style type="text/css">
input[type=submit] {
-webkit-appearance: button;
cursor: pointer;
background-color: #33414e;
border-color: #33414e;
font-size: 12px;
padding: 4px 15px;
line-height: 20px;
font-weight: 400;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
-webkit-transition: all 200ms ease;
-moz-transition: all 200ms ease;
-ms-transition: all 200ms ease;
-o-transition: all 200ms ease;
transition: all 200ms ease;
color: white;
float: right;
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
			<ul class="x-navigation x-navigation-horizontal x-navigation-panel"></ul>
			 <div class="page-content-wrap">
                   <div class="row">
                      <div class="col-md-12">
						   <div class="form-horizontal">
			                    <div class="panel panel-default">
			                           <div class="panel-body">
			                                <div class="panel-heading">
                                            <h3 class="panel-title"><strong>Εγγραφή </strong> νέου Μέλους!</h3>
                                            </div><!-- END: DIV.PANEL-HEADING -->
                                        </div> <!-- END: DIV.PANEL-BODY -->  											
									    <div class="panel-body">
                                        <p>
										<!-- START FORM TO REGISTER NEW MEMBER -->  
									     <?php
                                         //WE CHECK IF THE FORM HAS BEEN SENT
                                         if(isset($_POST['name'],$_POST['lastname'],$_POST['occupation'],$_POST['bio'],$_POST['username'], $_POST['password'], $_POST['passverif'], $_POST['email'],$_POST['image_src'] ) and $_POST['username']!='')
                                        {
	                                       if(get_magic_quotes_gpc())
	                                       {
		                                    $_POST['name'] = stripslashes($_POST['name']);
		                                    $_POST['lastname'] = stripslashes($_POST['lastname']);
		                                    $_POST['occupation'] = stripslashes($_POST['occupation']);
		                                    $_POST['bio'] = stripslashes($_POST['bio']);
		                                    $_POST['username'] = stripslashes($_POST['username']);
		                                    $_POST['password'] = stripslashes($_POST['password']);
		                                    $_POST['passverif'] = stripslashes($_POST['passverif']);
		                                    $_POST['email'] = stripslashes($_POST['email']);
		                                    $_POST['image_src'] = stripslashes($_POST['image_src']);
											}
	                                        //WE CHECK IF THE TWO PASSWORDS ARE IDENTICAL
	                                        if($_POST['password']==$_POST['passverif'])
	                                       {
		                                   //WE CHECK IF THE PASSWORD HAS 6 OR MORE CHARACTERS
		                                      if(strlen($_POST['password'])>=6)
		                                      {
			                                    //WE CHECK IF THE EMAIL FORM IS VALID
			                                    if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
			                                    { 
				                                 //WE PROTECT THE VARIABLES
				                                  $name = mysql_real_escape_string($_POST['name']);
				                                  $lastname = mysql_real_escape_string($_POST['lastname']);
				                                  $occupation = mysql_real_escape_string($_POST['occupation']);
				                                  $bio = mysql_real_escape_string($_POST['bio']);
				                                  $username = mysql_real_escape_string($_POST['username']);
				                                  $password = mysql_real_escape_string($_POST['password']);
				                                  $email = mysql_real_escape_string($_POST['email']);
			                                      $image_src = mysql_real_escape_string($_POST['image_src']);

				                                  //WE CHECK IF THERE IS NO OTHER USER USING THE SAME USERNAME
				                                  $dn = mysql_num_rows(mysql_query('select id from users where username="'.$username.'"'));
				                                  if($dn==0)
				                                  {
					                              //WE COUNT THE NUMBER OF USERS TO GIVE AN ID TO THIS ONE
					                              $dn2 = mysql_num_rows(mysql_query('select id from users'));
					                              $id = $dn2+1;
					                              //WE SAVE THE INFORMATIONS TO THE DATABASE 
					                                  if(mysql_query('insert into users(id,name,lastname,occupation,bio,username, password, email, signup_date,image_src) values ('.$id.', "'.$name.'","'.$lastname.'","'.$occupation.'","'.$bio.'","'.$username.'", "'.$password.'", "'.$email.'", "'.time().'","'.$image_src.'")'))
					                                 {
						                             //WE DONT DISPLAY THE FORM
						                             $form = false;
											?>
                                                 <div class="message">Έχετε εγγραφεί επιτυχώς. Μπορείτε πλέον να συνδεθείτε.<br />
                                                 <a href="connexion.php">Σύνδεση</a>
												 </div><!-- END: DIV.MESSAGE -->
                                            <?php
					                        }
					                                 else
					                                 {
						                              //OTHERWISE,WE SAY THAT AN ERROR OCCURED
						                              $form = true;
						                              $message = 'Ένα σφάλμα συνέβη κατά την εγγραφή σας';
					                                 }
				                                  }
				                                else
				                                        {
					                                    //OTHERWISE, SEEMS THAT USERNAME IS NOT AVAILABLE
					                                    $form = true;
					                                   $message = 'Το Όνομα Χρήστη το οποίο θέλετε να χρησιμοποιήσετε δεν είναι διαθέσιμο, παρακαλώ επιλέξτε διαφορετικό.';
				                                       }
			                                    }
			                                    else
			                                    {
				                                 //OTHERWISE, WE SAY THAT THE EMAIL IS NOT VALID
				                                $form = true;
				                                $message = 'Το email που έχετε εισάγει δεν είναι έγκυρο.';
			                                    }
		                                    }
		                                    else
		                                   {
			                                //OTHERWISE, WE SAY THAT THE PASSWORD IS TOO SHORT
			                                $form = true;
			                                $message = 'Ο κωδικός πρόσβασης πρέπει να αποτελείται τουλάχιστον από 6 χαρακτήρες.';
		                                   }
	                                    }
	                                    else
	                                    {
		                                //OTHERWISE, WE SAY THAT THA PASSWORDS ARE NOT IDENTICAL
		                                 $form = true;
		                                 $message = 'O κωδικός πρόσβασης και ο κωδικός επιβεβαίωσης διαφέρουν. Προσπαθήστε πάλι';
	                                     }
                                        }
                                     else
                                     {
	                                  $form = true;
                                     }
                                     if($form)
                                     {
	                                 //We display a message if necessary
	                                 if(isset($message))
	                                 {
		                             echo '<div class="message">'.$message.'</div>';
	                                 }
	                                 //We display the form
                                     ?>
									 
                                     <form action="sign_up.php" method="post">
                                      Παρακαλούμε συμπληρώστε τα ακόλουθα στοιχεία για να συνδεθείτε:<br /><br />
                                          <div class="form-horizontal">
	                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label" for="name">Όνομα</label>
			                                           <div class="col-md-6 col-xs-12">
			                                                <div class="input-group">
                                                            <input type="text" name="name" class="form-control" value="<?php if(isset($_POST['name'])){echo htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8');} ?>" />
			                                                </div><!-- END: DIV.INPUT-GROUP -->
			                                            </div><!-- END: DIV.col-md-6 col-xs-12 -->
			                                    </div><!-- END: DIV.FORM-GROUP-->
			                                    <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label" for="lastname">Επώνυμο</label>
												        <div class="col-md-6 col-xs-12">
			                                                <div class="input-group">
                                                            <input type="text" name="lastname" class="form-control" value="<?php if(isset($_POST['lastname'])){echo htmlentities($_POST['lastname'], ENT_QUOTES, 'UTF-8');} ?>" />
			                                                </div><!-- END: DIV.INPUT-GROUP -->
			                                            </div><!-- END: DIV.col-md-6 col-xs-12 -->
			                                    </div><!-- END: DIV.FORM-GROUP-->
												<div class="form-group">
												<label class="col-md-3 col-xs-12 control-label" for="occupation">Επάγγελμα</label>
												        <div class="col-md-6 col-xs-12">
			                                                <div class="input-group">
															<input type="text" name="occupation" class="form-control" value="<?php if(isset($_POST['occupation'])){echo htmlentities($_POST['occupation'], ENT_QUOTES, 'UTF-8');} ?>" />
			                                                </div><!-- END: DIV.INPUT-GROUP -->
			                                            </div><!-- END: DIV.col-md-6 col-xs-12 -->
			                                    </div><!-- END: DIV.FORM-GROUP-->
												<div class="form-group">
												<label class="col-md-3 col-xs-12 control-label" for="bio">Βιογραφικό Χρήστη</label>
			                                            <div class="col-md-6 col-xs-12">
			                                                <div class="input-group">
			                                                <input type="text" name="bio" class="form-control" value="<?php if(isset($_POST['bio'])){echo htmlentities($_POST['bio'], ENT_QUOTES, 'UTF-8');} ?>" />
			                                                </div><!-- END: DIV.INPUT-GROUP -->
			                                            </div><!-- END: DIV.col-md-6 col-xs-12 -->
			                                    </div><!-- END: DIV.FORM-GROUP-->
												<div class="form-group">
												<label class="col-md-3 col-xs-12 control-label" for="username">Όνομα Χρήστη</label>
												        <div class="col-md-6 col-xs-12">
			                                                <div class="input-group">
															<input type="text" name="username" class="form-control" value="<?php if(isset($_POST['username'])){echo htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');} ?>" />
			                                                </div><!-- END: DIV.INPUT-GROUP -->
			                                            </div><!-- END: DIV.col-md-6 col-xs-12 -->
			                                    </div><!-- END: DIV.FORM-GROUP-->
			                                    <div class="form-group">
			                                    <label class="col-md-3 col-xs-12 control-label" for="password">Κωδικός Πρόσβασης<span class="small">(6 χαρακτήρες ελάχιστο)</span></label>
			                                        <div class="col-md-6 col-xs-12">
			                                                <div class="input-group">
	                                                        <input type="password" class="form-control" name="password" />
			                                                </div><!-- END: DIV.INPUT-GROUP -->
			                                            </div><!-- END: DIV.col-md-6 col-xs-12 -->
			                                    </div><!-- END: DIV.FORM-GROUP-->
			                                    <div class="form-group">
			                                    <label class="col-md-3 col-xs-12 control-label" for="password">Κωδικός Πρόσβασης<span class="small">(επιβεβαίωση κωδικού)</span></label>
			                                        <div class="col-md-6 col-xs-12">
			                                               <div class="input-group">
                                                           <input type="password" class="form-control" name="passverif" />
														   </div><!-- END: DIV.INPUT-GROUP -->
			                                            </div><!-- END: DIV.col-md-6 col-xs-12 -->
			                                    </div><!-- END: DIV.FORM-GROUP-->
			                                    <div class="form-group">
												<label class="col-md-3 col-xs-12 control-label" for="email">E-mail</label>
												    <div class="col-md-6 col-xs-12">
			                                               <div class="input-group">
			                                               <input type="text" name="email" class="form-control" value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');} ?>" />
			                                               </div><!-- END: DIV.INPUT-GROUP -->
			                                            </div><!-- END: DIV.col-md-6 col-xs-12 -->
			                                    </div><!-- END: DIV.FORM-GROUP-->
			                                    <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label" for="image_src">Εικόνα Προφίλ<span class="small"> (URL)</span></label>
			                                        <div class="col-md-6 col-xs-12">
			                                              <div class="input-group">
                                                          <input type="text" class="form-control" name="image_src" id="file" />
														  </div><!-- END: DIV.INPUT-GROUP -->
			                                            </div><!-- END: DIV.col-md-6 col-xs-12 -->
			                                    </div><!-- END: DIV.FORM-GROUP-->
	                                            <div class="panel-footer">
			                                    <input type="submit" value="Αποθήκευση" />
                                                </div><!-- END: DIV.PANEL-FOOTER-->
           		                          </div><!-- END: DIV.FORM-HORIZONTAL-->
										</form>
									  </div><!-- END: DIV.PANEL-BODY-->
	                            </div><!-- END: DIV.PANEL-PANEL DEFAULT-->
                                <?php
                                }
                                ?>
                                </p>
						</div><!-- END: DIV.FORM HORIZONTAL-->
					</div><!-- END: DIV.col-md-12-->
				  </div><!-- END: DIV.ROW-->
			</div><!-- END: DIV.PAGE-CONTENT WRAP-->
	</div><!-- END: DIV.PAGE-CONTENT-->
</div><!-- END: DIV.PAGE-CONTAINER-->
</body>
</html>