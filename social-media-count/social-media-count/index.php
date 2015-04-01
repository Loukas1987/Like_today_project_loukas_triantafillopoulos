<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>WebCodo Demo :: Social Media Counts, Facebook + Instagram + Twitter + Youtube + Google plus + Vimeo + Soundcloud + Dribbble + Feedburner</title>

        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/example.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    </head>
 
    <body>
        
     <div class="webcodo-top" >
        <a href="http://www.webcodo.net/facebook-twitter-google-instagram-dribbble-followers-jquery-ajax">
            <div class="wcd wcd-tuto"> < Come back to the tuto page</div>
        </a>
        <a href="http://webcodo.com">
            <div class="wcd wcd-logo">WEBCODO</div>
        </a>
        <div class="wcd"></div>
    </div>

    <script type="text/javascript">

    var count_url = 'social_count.php';
    var social_networks = [
            'wcd_facebook',
            'wcd_youtube',
            'wcd_twitter',
            'wcd_dribbble',
            'wcd_vimeo',
            'wcd_soundcloud',
            'wcd_gplus',
            'wcd_instagram'
        ];
    $(function(){ 
        $.each(social_networks, function(key){
            $('.'+social_networks[key]).html('<img style="margin-left:50px;" src="img/ajax-loader.gif" />');
        });
    
        $.each(social_networks, function(key){
            $.ajax({
                type: "POST",
                url: count_url,
                data: 'act='+social_networks[key],
                error : 'error',
                success:function(html){
                    $('.'+social_networks[key]).html(html);
                }
            });
        });
    });
    
    </script>
    <div class="tuto-cnt">

        <div class="horizontal-cnt">

            <div class="soc-cnt">
                <div class="soc-img facebook-icon"></div>
                <div class="soc-count wcd_facebook"></div>
                <div class="soc-lab">Fans</div>
            </div><!-- facebook container -->

            <div class="soc-cnt">
                <div class="soc-img  youtube-icon"></div>
                <div class="soc-count wcd_youtube"></div>
                <div class="soc-lab">Subscribers</div>
            </div><!-- youtube container -->

            <div class="soc-cnt">
                <div class="soc-img  twitter-icon"></div>
                <div class="soc-count wcd_twitter"></div>
                <div class="soc-lab">Followers</div>
            </div><!-- twitter container -->

            <div class="soc-cnt">
                <div class="soc-img  dribbble-icon"></div>
                <div class="soc-count wcd_dribbble"></div>
                <div class="soc-lab">Followers</div>
            </div><!-- dribbble container -->

            <div class="soc-cnt">
                <div class="soc-img  vimeo-icon"></div>
                <div class="soc-count wcd_vimeo"></div>
                <div class="soc-lab">Followers</div>
            </div><!-- instagram container -->

            <div class="soc-cnt">
                <div class="soc-img  instagram-icon"></div>
                <div class="soc-count wcd_instagram"></div>
                <div class="soc-lab">Followers</div>
            </div><!-- instagram container -->


            <div class="soc-cnt">
                <div class="soc-img  soundcloud-icon"></div>
                <div class="soc-count wcd_soundcloud"></div>
                <div class="soc-lab">Followers</div>
            </div><!-- soundcloud container -->

            <div class="soc-cnt">
                <div class="soc-img  gplus-icon"></div>
                <div class="soc-count wcd_gplus"></div>
                <div class="soc-lab">Followers</div>
            </div><!-- gplus container -->

            

        </div><!-- /horizontal-cnt {horizontal container} -->



        


    </div><!-- /tuto-cnt -->



     


</body>
</html>