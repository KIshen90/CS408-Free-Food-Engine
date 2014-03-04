
<?php
//echo "test";
require_once '../fbLogin.php';
//echo "test";
require_once "../inc/events.php";
//echo "test";

//error_reporting(E_ALL);
//ini_set('display_errors', '1');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Create event</title>
    
   <!-- Bootstrap core CSS -->
    <script type="text/javascript">//<![CDATA[ 
        window.onload=function(){
        /* 
        Orginal Page: http://thecodeplayer.com/walkthrough/jquery-multi-step-form-with-progress-bar 

        */
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".event-name-input").keypress(function(event) {
                if(event.which == 13) {
                  $( ".mynext" ).trigger( "click" );
                }
        });

        $(".event-time").keypress(function(event) {
                if(event.which == 13) {
                  $( ".mynext" ).trigger( "click" );
                }
        });
        $(".event-detail").keypress(function(event) {
                if(event.which == 13) {
                  $( ".submit" ).trigger( "click" );
                }
        });

        $(".mynext").click(function(){
          if(animating) return false;
          animating = true;
          
          current_fs = $(this).parent();
          next_fs = $(this).parent().next();
          
          //activate next step on progressbar using the index of next_fs
          //$("#myprogressbar li").eq($("fieldset").index(next_fs)).addClass("myactive");
          
          //show the next fieldset
          next_fs.show(); 
          //hide the current fieldset with style
          current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
              //as the opacity of current_fs reduces to 0 - stored in "now"
              //1. scale current_fs down to 80%
              scale = 1 - (1 - now) * 0.2;
              //2. bring next_fs from the right(50%)
              left = (now * 50)+"%";
              //3. increase opacity of next_fs to 1 as it moves in
              opacity = 1 - now;
              current_fs.css({'transform': 'scale('+scale+')'});
              next_fs.css({'left': left, 'opacity': opacity});
            }, 
            duration: 500, 
            complete: function(){
              current_fs.hide();
              animating = false;
            }, 
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
          });
        });

        $(".previous").click(function(){
          if(animating) return false;
          animating = true;
          
          current_fs = $(this).parent();
          previous_fs = $(this).parent().prev();
          
          //de-activate current step on progressbar
          //$("#myprogressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
          
          //show the previous fieldset
          previous_fs.show(); 
          //hide the current fieldset with style
          current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
              //as the opacity of current_fs reduces to 0 - stored in "now"
              //1. scale previous_fs from 80% to 100%
              scale = 0.8 + (1 - now) * 0.2;
              //2. take current_fs to the right(50%) - from 0%
              left = ((1-now) * 50)+"%";
              //3. increase opacity of previous_fs to 1 as it moves in
              opacity = 1 - now;
              current_fs.css({'left': left});
              previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
            }, 
            duration: 500, 
            complete: function(){
              current_fs.hide();
              animating = false;
            }, 
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
          });
        });

        $(".submit").click(function(){
          return false;
        })

        }//]]>  

        </script>
    <link href="../css/datepicker.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/create.css" rel="stylesheet">
   
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
   <!-- <script src='../js/jquery-ui.custom.min.js'></script> -->
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
    <script type ="text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type ="text/javascript"  src ="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
    <script type ="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/trontastic/jquery-ui.css">
     
    <style type="text/css">
      .main-wrapper{
        margin-top: 100px;
        margin-left: auto;
        margin-right: auto;
        width:600px;
      }
      .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
          color: white;
          background-color: #dd6053;
          background-image: none;
          filter: none;
        }
    </style>

    <!-- Custom styles for this template -->
    <?php if ($user): ?>
    <?php else:?>
    <link href="../css/cover.css" rel="stylesheet">
    
    
    <?endif?>
    <link href="../css/nav.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <?php if ($user): ?>

      <div class="navbar navbar-default navbar-fixed-top my-nav">
       <div class="container-fluid">
           
          <div class="navbar-collapse collapse">

             <ul class="nav navbar-nav ">
              <li class="dropdown" id="user-li">

                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <span><img style="width:25px; height:25px; margin:0px; padding:0px; margin-right:4px;" class="img-rounded" src="https://graph.facebook.com/<?php echo $user; ?>/picture"><span><?php echo $user_profile['name']?> </span><b class="caret"></b></span>
                 </a>
                  <ul class="dropdown-menu">
                    <li><a href="../logout.php">Logout</a></li>
                    <li class="create-event-btn"><a href="#">Create a event here</a></li>
                    

                    <li><a href="../index.php">Separated link</a></li>
                  </ul>

              </li>
             
             </ul>

           </div>
          </div>
      </div>

      <div class="container main-wrapper">
            
                            <!-- multistep form -->
        <form id="msform">
          <!-- progressbar -->

          <!-- fieldsets -->
          <fieldset>
            <h2 class="fs-title">Enter the Event Name</h2>
            <h3 class="fs-subtitle">This is step 1</h3>
            <input class="event-name-input" type="text" name="eventname" placeholder="Name" />
   
            <input type="button" name="next" class="mynext action-button" value="Next" />
          </fieldset>
          <fieldset>
            <h2 class="fs-title">Where and when</h2>
            <h3 class="fs-subtitle">Where is the event ?</h3>
            <input class= "event-location" type="text" name="Location" id= "address"placeholder="Where is this event?" list="locations" />
            <h3 class="fs-subtitle">Date and time</h3>
            <input class="event-time" type="datetime-local" name="datetime" id="startDate" min="2013-08-28T00:00:00"/>
            
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="mynext action-button" value="Next" />
          </fieldset>
          <fieldset>
            <h2 class="fs-title">More Details</h2>
            <h3 class="fs-subtitle">Last step, just give us some more info</h3>
            
            <input class="event-poster-url" type="text" name="Posterurl" placeholder="Paste a url for the poster!" />
           
            <textarea class="event-detail" name="Desciption" placeholder="Description of event" ></textarea>
            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="submit" name="submit" class="submit action-button" value="Submit" />
          </fieldset>
        </form>
        <!-- jQuery easing plugin -->
        <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

    </div>
          

    <datalist id="locations-delete">
      <option>ABE</option>
      <option>Agricultural and Biological engineering</option>
      <option>ADDL</option> 
       <option>Animal disease diagnostic lab </option>
  <option>ADM</option>  <option>adm agricultural innovation Center </option>
  <option>AERO</option>  <option>aerospace science laboratory</option>
  <option>AGAD</option>  <option>agricultural administration Building</option>
  <option>AHF</option>  <option>animal Holding Facility</option>
  <option>AQUA</option>  <option>Boilermaker aquatic Center</option>
  <option>AR</option>  <option>armory</option>
  <option>ARMS</option>  <option>armstrong (neil) Hall of engineering</option>
  <option>ASB</option> <option>airport service Building</option>
 <option>ASTL</option> <option>animal sciences teaching laboratory</option>
 <option>BCC</option> <option>Black Cultural Center</option>
 <option>BCHM</option> <option>Biochemistry Building</option>
 <option>BIND</option> <option>Bindley (William e.) Bioscience Center</option>
 <option>BRK</option> <option>Birck nanotechnology Center</option>
 <option>BRNG</option> <option>Beering (steven C.) Hall of liberal arts and education</option>
 <option>BRWN</option> <option>Brown (Herbert C.) laboratory of Chemistry</option>

 <option>BSG</option> <option>Building services and grounds n Car / van rentals & Charter Bus</option>
<option>CHAF</option> <option>Chaffee Hall</option>
 <option>CIVL</option> <option>Civil engineering Building</option>
 <option>CL50</option> <option>Class of 1950 lecture Hall</option>
 <option>COMP</option> <option>Composites laboratory</option>
 <option>CREC</option> <option>France a. Córdova recreational sports Center</option>
<option>DANL</option> <option>daniel (William H.) turfgrass Center</option>
 <option>DAUC</option> <option>dauch (dick and sandy) alumni Center</option>
 <option>DLR</option> <option>Hall for discovery and learning research</option>
 <option>DOYL</option> <option>doyle (leo Philip) laboratory</option>
 <option>DYE</option> <option>Pete dye Clubhouse</option>
 <option>EE</option> <option>electrical engineering Building</option>
 <option>EEL</option> <option>entomology environmental laboratory</option>
 <option>EHSA</option> <option>equine Health sciences annex</option>
 <option>EHSB</option> <option>equine Health sciences Building</option>
 <option>ELLT</option> <option>elliott (edward C.) Hall of music</option>
 <option>ENAD</option> <option>engineering administration Building</option>
 <option>EXPT</option> <option>Exponent</option>
 <option>FOOD</option> <option>Food stores Building</option>
 <option>FOPN</option> <option>Flight operations Building</option>
 <option>FORS</option> <option>Forestry Building</option>
 <option>FPRD</option> <option>Forest Products Building</option>
 <option>FREH</option> <option>Freehafer (lytle J.) Hall of administrative 
services</option>
 <option>FRNY</option> <option>Forney Hall of Chemical engineering</option>
 <option>FWLR</option> <option>Fowler (Harriet o. and James m., Jr.) 
memorial House</option>
 <option>GCMB</option> <option>golf Course maintenance Barn</option>
 <option>GMF</option> <option>grounds maintenance Facility</option>
 <option>GRIS</option> <option>grissom Hall</option>
 <option>GSMB</option> <option>golf storage maintenance Building</option>
 <option>HAAS</option> <option>Haas (Felix) Hall</option>
 <option>HAMP delon and elizabeth Hampton Hall of Civil 
engineering</option>
 <option>HANS</option> <option>Hansen (arthur g.) life sciences research 
Building</option>
 <option>HEAV</option> <option>Heavilon Hall</option>
  <option>HERL</option> <option>Herrick laboratories</option>
 <option>HGR4-6</option> <option>Hangars, numbers 4 through 6</option>
 <option>HGRH</option> <option>Horticulture greenhouses</option>
 <option>HIKS</option> <option>Hicks (John W.) undergraduate library</option>
 <option>HMMT</option> <option>Hazardous materials management trailer</option>
 <option>HNLY</option> <option>Bill and sally Hanley Hall</option>
 <option>HOCK</option> <option>Wayne t. and mary t. Hockmeyer Hall of structural Biology</option>
 <option>HORT</option> <option>Horticulture Building</option>
 <option>HOVD</option> <option>Hovde (Frederick l.) Hall of 
administration</option>
 <option>HPN</option> <option>Heating and Power Plant-north</option>
 <option>IAF</option> <option>intercollegiate athletic Facility</option>
 <option>JNSN</option> <option>Johnson (Helen r.) Hall of nursing</option>
 <option>KCTR</option> <option>Krannert Center for executive education and research</option>
 <option>KNOY</option> <option>Knoy (maurice g.) Hall of technology</option>
 <option>KRAN</option> <option>Krannert Building</option>
 <option>LAMB</option> <option>lambert (Ward l.) Fieldhouse and gymnasium</option>
 <option>LCC</option> <option>latino Cultural Center (600 russell st.) </option>
 <option>LILY</option> <option>lilly Hall of life sciences</option>
 <option>LMSB</option> <option>laboratory materials storage Building</option>
 <option>LMST</option> <option>laboratory materials storage trailer</option> 
 <!-- LSA life science animal Building F8
 LSPS life science Plant and soils laboratory F8
 LSR life science ranges (greenhouse and service 
Building) F8, 9-->
 <option>LWSN</option> <option>lawson (richard and Patricia) Computer science Building</option>
 <option>LYNN</option> <option>lynn (Charles J.) Hall of veterinary medicine</option>
 <option>MACK</option> <option>mackey (guy J.) arena</option>
 <option>MANN</option> <option>mann (gerald d. and edna e.) Hall</option>
 <option>MATH</option> <option>mathematical sciences Building</option>
 <option>ME</option> <option>mechanical engineering Building</option>
 <option>MGL</option> <option>michael golden engineering laboratories 
and shops</option>
<!-- MJIS martin C. Jischke Hall of Biomedical engineering E9
 MMDC materials management and distribution Center F11
 MMS1 materials management storage Building 1 F12
 MOLL mollenkopf athletic Center F3
 MRGN morgan (Burton d.) Center for entrepreneurship E8-->
 <option>MRRT</option> <option>marriott Hall</option>
 <option>MSEE</option> <option>materials and electrical engineering Building</option>
<!-- MTHW matthews (mary l.) Hall F7, 8
 NAECC native american educational and Cultural Center 
(south Campus Courts, Building B) H10
 NLSN Phillip e. nelson Hall of Food science G9
 NISW niswonger aviation technology Building B11
 NUCL nuclear engineering Building H6
 OLMN ollman (melvin l.) golfcart Barn C1
 n Parking Facilities (Purdue West, Building d) B7 -->
 <option>PAO</option> <option>Pao (Yue-Kong) Hall of visual and Performing arts</option>
 <option>PFEN</option> <option>Pfendler Hall (david C.) of agriculture</option>
 <option>PFSB</option> <option>Physical Facilities service Building</option>
 <option>PHYS</option> <option>Physics Building</option>
 <option>PJIS</option> <option>Patty Jischke early Care and education Center</option>
 <option>PMU</option> <option>Purdue memorial union</option> 

 <option>PMUC</option> <option>Purdue memorial union Club</option>
 <option>POAN</option> <option>Poultry science annex</option>
 <option>POTR</option> <option>Potter (a. a.) engineering Center</option>
<!-- POUL Poultry science Building E8
 PRCE Peirce Hall G7
 PRSV Printing services Facility F11
 PSYC Psychological sciences Building G6, 7
 PUSH Purdue university student 
Health Center F, G5
 PVCC Purdue village Community Center C8
 PWD Parking Facilities B7
 RAIL american railway Building H6
 RAWL rawls (Jerry s.) Hall H, I8
 REC recitation Building G7
 RHPH Heine (robert e.) Pharmacy Building F, G5
 SC stanley Coulter Hall G7
 SCCA-E south Campus Courts, Buildings a-e G, H9, 10
 SCHL schleman (Helen B.) Hall of student services G6
 SCHO global Policy research institute (schowe House) F1
 SCPA slayter Center of Performing arts D4
‡ SIML Holleman-niswonger simulator Center
 SMTH smith Hall F8
 SOIL soil erosion laboratory, national E9
 SPUR spurgeon (tom) golf training Center C1
 SSOF state street office Facility A8
 STDM ross-ade stadium (includes ross-ade 
Pavilion [raP]) F3
 <option>STEW</option> <option>stewart Center</option>
 STON stone (Winthrop e.) Hall G7, 8
 n student Health Center (see PusH) F, G5
 TEL telecommunications Building F7
 TERM terminal Building B11
 TERY terry (oliver P.) memorial House E8, 9
 TH1-6 tee-Hangars 1 through 6 A11
 TREC turf recreation exercise Center D6
 TSWF transportation service Wash Facility G12
 UNIV university Hall G7
 UPOB utility Plant office Building H11
 UPOF utility Plant office Facility H10
 UPSB utility Plant storage Building G11
 VA1 veterinary animal isolation Building 1 G10
 VA2 veterinary animal isolation Building 2 G10
 VCPR veterinary Center for Paralysis research G10
 n visitor information Center (now the Welcome 
Center - east end of Pmu) H7
 VLAB veterinary laboratory animal Building G10
 VMIF veterinary medicine isolation Facility G10
 VOIN voinoff (samuel) golf Pavilion C1
 VPRB veterinary Pathobiology research 
Building F, G9, 10
 VPTH veterinary Pathology Building G9
 WADE Wade (Walter W.) utility Plant H11
   n Welcome Center (see Pmu) H7
 WEST Westwood (President’s Home) A5, 6
 WGLR Women’s golf locker room D1
 WSLR Whistler (roy l.) Hall of agricultural research G8
 WTHR Wetherill (richard Benbridge) laboratory of 
Chemistry G, H7
<option>YONG</option> <option>Young (ernest C.) Hall</option>
† ZL1 Combustion research laboratory 
† ZL2 gas dynamics research laboratory 
† ZL3 High Pressure research laboratory 
† ZL4 Propulsion research laboratory 
† ZL5 turbomachinery Fluid dynamics laboratory
Residence Facilities
 CARY Cary (Franklin levering) Quadrangle F4
* DUHM duhme (ophelia) residence Hall E7
 ERHT earhart (amelia) residence Hall D7
 FORD Ford (Fred and mary) dining Court F4
 FST First street towers D7
 HARR Harrison (Benjamin) residence Hall C7
 HAWK Hawkins (george a.) Hall H8
 HILL Hillenbrand residence Hall C7
 HLTP Hilltop apartments E3
 MCUT mcCutcheon (John t.) residence Hall C7
 MRDH meredith (virginia C.) residence Hall D7
 OWEN owen (richard) residence Hall E4
 PVAB Purdue village administration Building D9
 PVCC Purdue village Community Center C8
 PVIL Purdue village B, C, D8, 9, 10
 PVP Purdue village Preschool C9
* SHLY shealy (Frances m.) residence Hall E7
 SHRV shreve (eleanor B.) residence Hall D6, 7
 SMLY smalley (John C.) Center for Housing and Food 
services administration D6, 7
 TARK tarkington (newton Booth) 
residence Hall E5
* VAWT vawter (everett B.) residence Hall E6
* WARN Warren (martha e. and eugene K.) residence Hall 
E7
 WDCT Wiley dining Court E6
 WILY Wiley (Harvey W.) residence Hall E5, 6
* WOOD Wood (elizabeth g. and William r.) 
residence Hall E7
Northwest Athletic Complex (C2-3 inset)
 ALEX John and anna margaret ross alexander Field
 SOCC soccer Complex
 SCHW dennis J. and mary lou schwartz tennis Center
Parking Garages
 PGG Parking garage, grant street H, I7
 PGW Parking garage, Wood street H8
 PGM Parking garage, marsteller street G, H8
 PGMD Parking garage, mcCutcheon drive C6, 7
 PGNW Parking garage, northwestern avenue (includes 
visitor information Center and Parking services) 
H5
 PGU Parking garage, university street F6, 7
-->

    </datalist>
    <?php else: ?>

    <?php endif?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script>
    $(document).ready(function() {
        var cur_user = "<?php echo $user_profile['name'] ?>";
        var cur_user_avatar = "https://graph.facebook.com/<?php echo $user; ?>/picture";

        var input = (document.getElementById('address'));
        var autocomplete = new google.maps.places.Autocomplete(input);

        $(function() {
            //$('.event-time').datepicker();
            //$('.event-time').datepicker("bounce",$(this).val());
        });
  

      
        function addEvent(user_id, event_name, event_time, event_location, event_detail, event_poster_url){

                  jQuery.ajax({
                       type: "POST",
                       url: "../inc/events.php",
                       data: { user_id: user_id, event_name: event_name, event_time: event_time, event_location: event_location, event_detail: event_detail, event_poster_url: event_poster_url},
                       cache: false,
                       success: function(response){
                        alert("Event create successfully!");
                        $(".event-name-input").val("");
                        $(".event-location").val("");
                        $(".event-time").val("");
                        $(".event-poster-url").val("");
                        $(".event-detail").val("");
                        window.location.replace("http://freefood-weiqing.rhcloud.com");
                      
                      }
                    });
            }


        $('.submit').click(function(){
            if($(".event-name-input").val()!="" && $(".event-location").val()!="" && $(".event-time").val()!=""){
                      var event_name = $(".event-name-input").val();
                      console.log(event_name);
                      var event_location = $(".event-location").val();
                      console.log(event_location);
                      var event_time = $(".event-time").val();
                      console.log(event_time);
                      var event_poster_url = $(".event-poster-url").val();
                      console.log(event_poster_url);
                      var event_detail = $(".event-detail").val();
                      console.log(event_detail);

                      addEvent(<?php echo $user?>,event_name,event_time,event_location,event_detail,event_poster_url);
                      
            }

        });

      });
    </script>
   
  </body>
  
   
</html>


