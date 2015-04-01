<?php
include('config.php');
?>
<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Σαν Σήμερα-Καταχώρηση νέου γεγονόντος</title>

        <link rel="stylesheet" type="text/css" href="css/theme.css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet"/>

		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

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

// autocomplet : this function will be executed every time we change the text
function autocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#country_id').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#country_list_id').show();
				$('#country_list_id').html(data);
			}
		});
	} else {
		$('#country_list_id').hide();
	}
}
 
// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#country_id').val(item);
	// hide proposition list
	$('#country_list_id').hide();
}

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
<li><a href="connexion.php">Σύνδεση</li>
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
                                    <h3 class="panel-title"><strong>Καταχώρηση</strong> νέου Συμβάντος</h3>
                                    </div>
									<div class="panel-body">
                                    <p>Στην Σελίδα αυτή έχετε την δυνατότητα να καταχωρήσετε ένα γεγονός στο site και να γίνετε και εσείς μέλος της ομάδας μας...</p>
                                </div>
								<div class="panel-body">
			  
								
								
<?php
//We check if the user is logged
if(isset($_SESSION['username']))
{
	//We check if the form has been sent
	if(isset($_POST['username'], $_POST['password'], $_POST['passverif'], $_POST['email'], $_POST['avatar']))
	{
		//We remove slashes depending on the configuration
		if(get_magic_quotes_gpc())
		{
			$_POST['username'] = stripslashes($_POST['username']);
			$_POST['password'] = stripslashes($_POST['password']);
			$_POST['passverif'] = stripslashes($_POST['passverif']);
			$_POST['email'] = stripslashes($_POST['email']);
			$_POST['avatar'] = stripslashes($_POST['avatar']);
		}
		//We check if the two passwords are identical
		if($_POST['password']==$_POST['passverif'])
		{
			//We check if the password has 6 or more characters
			if(strlen($_POST['password'])>=6)
			{
				//We check if the email form is valid
				if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
				{
					//We protect the variables
					$username = mysql_real_escape_string($_POST['username']);
					$password = mysql_real_escape_string($_POST['password']);
					$email = mysql_real_escape_string($_POST['email']);
					$avatar = mysql_real_escape_string($_POST['avatar']);
					//We check if there is no other user using the same username
					$dn = mysql_fetch_array(mysql_query('select count(*) as nb from users where username="'.$username.'"'));
					//We check if the username changed and if it is available
					if($dn['nb']==0 or $_POST['username']==$_SESSION['username'])
					{
						//We edit the user informations
						if(mysql_query('update users set username="'.$username.'", password="'.$password.'", email="'.$email.'", avatar="'.$avatar.'" where id="'.mysql_real_escape_string($_SESSION['userid']).'"'))
						{
							//We dont display the form
							$form = false;
							//We delete the old sessions so the user need to log again
							unset($_SESSION['username'], $_SESSION['userid']);
?>
<div class="message"><i>Για να έχετε πρόσβαση στην σελίδα αυτή θα πρέπει να είστε συνδεδεμένοι στον λογαριασμός σας.</i></div><br /><br />
<a href="connexion.php" style="color:green">Σύνδεση τώρα</a>
<?php
						}
						else
						{
							//Otherwise, we say that an error occured
							$form = true;
							$message = 'An error occurred while updating your informations.';
						}
					}
					else
					{
						//Otherwise, we say the username is not available
						$form = true;
						$message = 'The username you want to use is not available, please choose another one.';
					}
				}
				else
				{
					//Otherwise, we say the email is not valid
					$form = true;
					$message = 'The email you entered is not valid.';
				}
			}
			else
			{
				//Otherwise, we say the password is too short
				$form = true;
				$message = 'Your password must contain at least 6 characters.';
			}
		}
		else
		{
			//Otherwise, we say the passwords are not identical
			$form = true;
			$message = 'The passwords you entered are not identical.';
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
			echo '<strong>'.$message.'</strong>';
		}
		//If the form has already been sent, we display the same values
		if(isset($_POST['username'],$_POST['password'],$_POST['email']))
		{
			$pseudo = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
			if($_POST['password']==$_POST['passverif'])
			{
				$password = htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');
			}
			else
			{
				$password = '';
			}
			$email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
			$avatar = htmlentities($_POST['avatar'], ENT_QUOTES, 'UTF-8');
		}
		else
		{
			//otherwise, we display the values of the database
			$dnn = mysql_fetch_array(mysql_query('select username,password,email,avatar from users where username="'.$_SESSION['username'].'"'));
			$username = htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8');
			$password = htmlentities($dnn['password'], ENT_QUOTES, 'UTF-8');
			$email = htmlentities($dnn['email'], ENT_QUOTES, 'UTF-8');
			$avatar = htmlentities($dnn['avatar'], ENT_QUOTES, 'UTF-8');
		}
		//We display the form
?>

<form id="contactform" action="input_event.php" method="post"> 
<div class="form-horizontal">
	    <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label" for="name">Τίτλος Συμβάντος</label>
			<div class="col-md-6 col-xs-12">
			<div class="input-group">
			<input type="text" name="name" placeholder="Δώστε Ονομασία...." size="20" required="" class="form-control" />
			</div>
			</div>
			</div>
			<div class="form-group">
            <label class="col-md-3 col-xs-12 control-label" for="place">Τοποθεσία Διεξαγωγής</label>
			<div class="col-md-6 col-xs-12">
			<div class="input-group">
			<input class="form-control" type="text" name="place" placeholder="Πού έγινε το Συμβάν;" required="" />
			</div></div></div>
            <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Ημερομηνία</label>
			<div class="col-md-6 col-xs-12">
			<div class="input-group">
			<fieldset required="">	
            <input class="birthday" maxlength="2" name="day"  placeholder="Ημέρα" required="">
			<label class="month"> 
                  <select class="select-style" name="month">
                  <option value="">Μήνας</option>
                  <option  value="01">Ιανουάριος</option>
                  <option value="02">Φεβρουάριος</option>
                  <option value="03" >Μάρτιος</option>
                  <option value="04">Απρίλιος</option>
                  <option value="05">Μάιος</option>
                  <option value="06">Ιούνιος</option>
                  <option value="07">Ιούλιος</option>
                  <option value="08">Αύγουστος</option>
                  <option value="09">Σεπτέμβριος</option>
                  <option value="10">Οκτώβριος</option>
                  <option value="11">Νοέμβριος</option>
                  <option value="12" >Δεκέμβριος</option>
				  </select> 
                  </label>
            <input class="birthyear" maxlength="4" name="year" placeholder="Έτος" required="">
             </fieldset></div></div></div>
            <div class="form-group">			 
            <label class="col-md-3 col-xs-12 control-label" for="image_src">Φωτογραφία (URL):</label>
			<div class="col-md-6 col-xs-12">
			<div class="input-group">
			<input type="text" class="form-control" name="image_src" />
			</div></div></div>			 
            <div class="form-group">			 
            <label class="col-md-3 col-xs-12 control-label" for="description">Περιγραφή Γεγονόντος:</label>
			<div class="col-md-6 col-xs-12">
			<div class="input-group">
			<textarea class="form-control" name="description"  cols="74%" placeholder="Λίγα λόγια για το γεγονός..." rows="10" tabindex="4"></textarea>
			</div></div></div>
           <div class="form-group"> 
			<label class="col-md-3 col-xs-12 control-label" for="category">Κατηγορία<span class="small">(optional)</span></label>
			<div class="col-md-6 col-xs-12">
			<div class="input-group">
			<input type="text" class="form-control" onkeyup="autocomplet()" name="category" />
			</div>
			</div>
			</div>
			 <div class="form-group">
			<label class="col-md-3 col-xs-12 control-label" for="author_id">Καταχωρήθηκε από:</label>
			<div class="col-md-6 col-xs-12">
			<div class="input-group">
			<input type="text" class="form-control" name="author_id" value="<?php echo $username; ?>" disabled />
			</div></div></div>
            </div><br></br>
			
			
			<div class="panel-footer">
			<style>input[type=submit] {
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
color: WHITE;
FLOAT: right;
}</style>
                                    <input type="submit" value="Αποθήκευση" />
       </div>
              </div>
    </form>
<?php
	}
}
else
{
?>
<div class="message"><i>Για να έχετε πρόσβαση στην σελίδα αυτή θα πρέπει να είστε συνδεδεμένοι στον λογαριασμός σας.</i></div><br /><br />
<a href="connexion.php" style="color:green">Σύνδεση τώρα</a>
<?php
}
?></div>

				   </div></div></div>
	</div></div></div></div>
	</body>
</html>