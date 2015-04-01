<?php
include('config.php');
require_once('config.php');
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

.btn-success:hover, .btn-success:focus, .btn-success.focus, .btn-success:active, .btn-success.active, .open>.dropdown-toggle.btn-success,.btn-success{
-webkit-appearance: button;
cursor: pointer;
background-color: hsl(209, 21%, 25%);
border-color: hsl(209, 21%, 25%);
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
color: hsl(0, 100%, 100%);

}
.portlet {
margin-bottom: 15px;
border: none;
background: #fff;
width: 100%;
}
.col-lg-8.col-md-8.col-sm-6.col-xs-12 {
width: 100%;
}

			.container {
				margin-top: 110px;
			}
			.error {
				color: #B94A48;
			}
			.form-horizontal {
				margin-bottom: 0px;
			}
			.hide{display: none;}
	

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
			                        <!-- //Display result-->
									
									<form class="form-horizontal" role="form" id='login' method="post" action="result.php">
					<?php 
					$category='';  
                    $category=$_POST['category'];

					$res = mysql_query("select * from event where CATEGORY='$category' ORDER BY RAND()") or die(mysql_error());
                    $rows = mysql_num_rows($res);
					$i=1;
					$b=rand(1,4);
                    $c=rand(5,16);
					$d=rand(-40,-1);
					$a=array("0",$b,$c,$d);
$random_keys=array_rand($a,4);


                while($result=mysql_fetch_array($res)){?>

                    <?php if($i==1){?>  
                   <div id='question<?php echo $i;?>' class='cont'>
				   <center><img class='questions' src="<?php echo htmlentities($result['IMAGE_SRC'], ENT_QUOTES, 'UTF-8'); ?>" width="300" height="300">
<br></br>		   
                    <p class='questions' id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo 'Πότε έγινε '.$result['TITLE_EVENT'].';'?></p>
                     <input type="radio" value="1" id='radio1_<?php echo $result['ID_EVENT'];?>' name='<?php echo $result['ID_EVENT'];?>'/><?php echo $result['YEAR']+$a[$random_keys[1]];?>
                    <br/>
                    <input type="radio" value="<?php echo $result['YEAR'];?>" id='radio1_<?php echo $result['ID_EVENT'];?>' name='<?php echo $result['ID_EVENT'];?>'/><?php echo $result['YEAR']+$a[$random_keys[4]];?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['ID_EVENT'];?>' name='<?php echo $result['ID_EVENT'];?>'/><?php echo $result['YEAR']+$a[$random_keys[2]];?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['ID_EVENT'];?>' name='<?php echo $result['ID_EVENT'];?>'/><?php echo $result['YEAR']+$a[$random_keys[3]];?>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['ID_EVENT'];?>' name='<?php echo $result['ID_EVENT'];?>'/>                                                                      
                    <br/>
                    <button id='next<?php echo $i;?>' class='next btn btn-success' type='button'>Επόμενη</button></center>
                    </div>     

                     <?php }elseif($i<1 || $i<$rows){?>
                       <div id='question<?php echo $i;?>' class='cont'>
					   <center><img class='questions' src="<?php echo htmlentities($result['IMAGE_SRC'], ENT_QUOTES, 'UTF-8'); ?>" width="300" height="300">
					   <br></br>
                    <p class='questions' id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo 'Πότε έγινε '.$result['TITLE_EVENT'].';'?></p>
                     <input type="radio" value="1" id='radio1_<?php echo $result['ID_EVENT'];?>' name='<?php echo $result['ID_EVENT'];?>'/><?php echo $result['YEAR']+$a[$random_keys[4]];?>
                    <br/>
                    <input type="radio" value="<?php echo $result['YEAR'];?>" id='radio1_<?php echo $result['ID_EVENT'];?>' name='<?php echo $result['ID_EVENT'];?>'/><?php echo $result['YEAR']+$a[$random_keys[2]];?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['ID_EVENT'];?>' name='<?php echo $result['ID_EVENT'];?>'/><?php echo $result['YEAR']+$a[$random_keys[1]];?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['ID_EVENT'];?>' name='<?php echo $result['ID_EVENT'];?>'/><?php echo $result['YEAR']+$a[$random_keys[3]];?>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['ID_EVENT'];?>' name='<?php echo $result['ID_EVENT'];?>'/>                                                                      
                    <br/>
                    <button id='pre<?php echo $i;?>' class='previous btn btn-success' type='button'>Προηγούμενη</button>                    
                    <button id='next<?php echo $i;?>' class='next btn btn-success' type='button' >Επόμενη</button></center>
                    </div>

                   <?php }elseif($i==$rows){?>
                    <div id='question<?php echo $i;?>' class='cont'>
                    <center><img class='questions' src="<?php echo htmlentities($result['IMAGE_SRC'], ENT_QUOTES, 'UTF-8'); ?>" width="300" height="300">
					   <br></br>
                     <p class='questions' id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo 'Πότε έγινε '.$result['TITLE_EVENT'].';'?></p>
                     <input type="radio" value="1" id='radio1_<?php echo $result['ID_EVENT'];?>' name='<?php echo $result['ID_EVENT'];?>'/><?php echo $result['YEAR']+$a[$random_keys[3]];?>
                    <br/>
                    <input type="radio" value="<?php echo $result['YEAR'];?>" id='radio1_<?php echo $result['ID_EVENT'];?>' name='<?php echo $result['ID_EVENT'];?>'/><?php echo $result['YEAR']+$a[$random_keys[1]];?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $result['ID_EVENT'];?>' name='<?php echo $result['ID_EVENT'];?>'/><?php echo $result['YEAR']+$a[$random_keys[4]];?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $result['ID_EVENT'];?>' name='<?php echo $result['ID_EVENT'];?>'/><?php echo $result['YEAR']+$a[$random_keys[2]];?>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['ID_EVENT'];?>' name='<?php echo $result['ID_EVENT'];?>'/>                                                                      
                    <br/>
             
                    <button id='pre<?php echo $i;?>' class='previous btn btn-success' type='button'>Προηγούμενη</button>                    
                    <button id='next<?php echo $i;?>' class='next btn btn-success' type='submit'>Τέλος</button>
                    </div>
					<?php } $i++;} ?>

				</form>
  						</div><!-- END: DIV.PANEL-PANEL DEFAULT-->
                     </div><!-- END: DIV.FORM HORIZONTAL-->
			     </div><!-- END: DIV.col-md-12-->
			</div><!-- END: DIV.ROW-->
	     </div><!-- END: DIV.PAGE-CONTENT WRAP-->
	</div><!-- END: DIV.PAGE-CONTENT-->
</div><!-- END: DIV.PAGE-CONTAINER-->
<?php

if(isset($_POST[1])){ 
   $keys=array_keys($_POST);
   $order=join(",",$keys);

   $query="select * from event where YEAR IN($order) ORDER BY FIELD(YEAR,$order)";
  // echo $query;exit;

   $response=mysql_query("select * from event where ID_EVENT IN($order) ORDER BY FIELD(YEAR,$order)")   or die(mysql_error());
   $right_answer=0;
   $wrong_answer=0;
   $unanswered=0;
   while($result=mysql_fetch_array($response)){
       if($result['YEAR']==$_POST[$result['ID_EVENT']]){
               $right_answer++;
           }
		   else if($_POST[$result['ID_EVENT']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }

   }

   echo "right_answer : ". $right_answer."<br>";
   echo "wrong_answer : ". $wrong_answer."<br>";
   echo "unanswered : ". $unanswered."<br>";
}
 
?>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="javascripts/bootstrap.min.js"></script>
		<script src="javascripts/jquery.validate.js"></script>

		<script>
		$('.cont').addClass('hide');
		count=$('.questions').length;
		 $('#question'+1).removeClass('hide');

		 $(document).on('click','.next',function(){
		     element=$(this).attr('id');
		     last = parseInt(element.substr(element.length - 1));
		     nex=last+1;
		     $('#question'+last).addClass('hide');

		     $('#question'+nex).removeClass('hide');
		 });

		 $(document).on('click','.previous',function(){
             element=$(this).attr('id');
             last = parseInt(element.substr(element.length - 1));
             pre=last-1;
             $('#question'+last).addClass('hide');

             $('#question'+pre).removeClass('hide');
         });

		</script>
</body>
</html>
		