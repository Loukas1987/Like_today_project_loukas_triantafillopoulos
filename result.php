<?php
include('config.php');
?>
<!DOCTYPE html>
<?php if(isset($_SESSION['username']))
							  {
							  $user = $_SESSION['username'];
							    } 
							  ?>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<title>Σαν Σήμερα</title>
       	<link rel="stylesheet" type="text/css" href="css/theme.css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

<style>
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
i.fa.fa-check {
  color: rgb(6, 245, 45);
}
i.fa.fa-times,i.fa.fa-check,i.fa.fa-question-circle {
  font-size: x-large;
}
i.fa.fa-times {
  color: red;
}

span.result_number {
  font-size: x-large;
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
<?php 

    $right_answer=0;
    $wrong_answer=0;
    $unanswered=0; 

   $keys=array_keys($_POST);
   $order=join(",",$keys);

   // $query="select *  from event where ID_EVENT IN($order) ORDER BY FIELD(ID_EVENT,$order)";

   $response=mysql_query("select ID_EVENT,YEAR from event where ID_EVENT IN($order) ORDER BY FIELD(YEAR,$order)")   or die(mysql_error());

   while($result=mysql_fetch_array($response)){
       if($result['YEAR']==$_POST[$result['ID_EVENT']]){
               $right_answer++;
           }else if($_POST[$result['ID_EVENT']]==5){
               $unanswered++;
           }
           else{
               $wrong_answer++;
           }
   } 
   
      mysql_query("update users set score=score+(5*'$right_answer') where username='$user'");

   ?>
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
                                   <?php
                                      //We check if the users ID is defined
                                      
	                       
	                                 //We check if the user exists
                                     //CONDITION TO COUNT VIEWS WHEN PAGE LOAD
									 $user = $_SESSION['username'];
						
									 $dn = mysql_query("select * from users where username='$user'");
	                                       if(mysql_num_rows($dn)>0)
	                                       {
		                                   $dnn = mysql_fetch_array($dn);
		                                   //We display the user datas
								     ?>							   
                                  <div class="col-lg-3 col-md-3">
                                         <div class="well well-sm white">
										        <div class="profile-pic">
										        <?php
                                                if($dnn['image_src']!='')
                                                {
	                                            echo '<img src="'.htmlentities($dnn['image_src'], ENT_QUOTES, 'UTF-8').'" class="img-responsive" alt="Avatar" />';
                                                }
                                                else
                                                {
	                                            echo '<img src="upload/default.png" class="img-responsive" alt="Avatar" />';
                                                }
                                                ?>
										        </div><!-- END: DIV.PROFILE-PIC -->
									        </div><!-- END: DIV.well well-sm white -->
									      <?php } ?>
								     </div><!-- END: DIV.col-lg-3 col-md-3 -->
									 <div class="col-lg-9 col-md-9">
									       <div class="tc-tabs">
										    <ul class="nav nav-tabs tab-lg-button tab-color-dark background-dark white">
											<li class="active"><a href="#p1" data-toggle="tab"><i class="fa fa-desktop bigger-130"></i> Αποτέλεσμα Quiz - <?php echo htmlentities($dnn['username'], ENT_QUOTES, 'UTF-8'); ?></a></li>
											</ul>
										        <div class="tab-content">
											           <div class="tab-pane fade in active" id="p1">
												              <div class="row">													
													               <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
														                   <div class="portlet no-border">
															                     <div class="portlet-heading">
																                      <div class="portlet-title">
																	                  <h2>Ανάλυση Απαντήσεων</h2>
																                      </div><!-- END: DIV.PORTLET-TITLE -->
																                      <div class="clearfix"></div>
															                     </div><!-- END: DIV.PORTLET-HEADING -->
															                     <div class="portlet-body">
																                      <div class="editable editable-click" id="profile">
																					  <br></br>
																	                   <i class="fa fa-check"></i><span class="result_number"> <?php echo $right_answer;?></span>
                                                                                      <i class="fa fa-times"></i><span class="result_number"><?php echo $wrong_answer;?></span>
                                                                                      <i class="fa fa-question-circle"></i><span class="result_number"> <?php echo $unanswered;?></span>
                                                                    	              </div><!-- END: DIV.editable editable-click -->
																					  <div class="portlet-heading">
																					  <div class="portlet-title"><h2>Κερδισμένοι Πόντοι</h2>
																					  </div></div>
																					  <br /><br />
																					 Συγκεντρώσατε: <span class="result_number"> <?php echo 5*$right_answer.' xp' ?></span>
																					  
																                      <br /><br />
																                      
																                      <ul class="list-inline well well-sm">
																	                  <a href="index_quiz.php" class='btn btn-success'>Κάντε ένα νέο τεστ!!!</a>                   
                    
					</ul>
															                     </div><!-- END: DIV.PORTLET-BODY -->
														                    </div><!-- END: DIV.PORTLET-NO-BORDER -->
													                 </div><!-- END: DIV.col-lg-8 col-md-8 col-sm-6 col-xs-12 -->
												              </div><!-- END: DIV.ROW -->
										                 </div><!-- END: DIV.tab-pane fade in active -->
									            </div><!-- END: DIV.tab-content -->
									        </div><!-- END: DIV.tc-tabs -->
								       </div><!-- END: DIV.col-lg-9 col-md-9 -->
                                     							  
													                </div><!-- END: DIV.ROW -->
										                 </div><!-- END: DIV.tab-pane fade in active -->
									            </div>						
                                             </div><!-- END: DIV.PANEL-BODY--> 
                         </div><!-- END: DIV.panel panel-default -->  
				</div><!-- END: DIV.FORM-HORIZONTAL -->  
		    </div><!-- END: DIV.col-md-12 -->   
	    </div><!-- END: DIV.ROW -->  
      </div><!-- END: DIV.PAGE-CONTENT-WRAP -->  			
    </div><!-- END: DIV.PAGE-CONTENT -->  
</div><!-- END: DIV.PAGE-CONTAINER -->  
</body>
</html>
		