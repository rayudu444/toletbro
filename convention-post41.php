<?php 
  session_start(); 
  include_once('includes/dbutil.php');
  include_once('includes/convention_header.php');

  ?>
  <script src="js1/jquery-ui1.js"></script>
  <link rel="stylesheet" href="css/jquery-ui.css">

  <script type="text/javascript" src="jquery-ui.multidatespicker.js"></script>
<script type="text/javascript">
    <!--
      var latestMDPver = $.ui.multiDatesPicker.version;
      var lastMDPupdate = '2014-09-19';
      
      $(function() {
        // Version //
        //$('title').append(' v' + latestMDPver);
        $('.mdp-version').text('v' + latestMDPver);
        $('#mdp-title').attr('title', 'last update: ' + lastMDPupdate);
        
        // Documentation //
        $('i:contains(type)').attr('title', '[Optional] accepted values are: "allowed" [default]; "disabled".');
        $('i:contains(format)').attr('title', '[Optional] accepted values are: "string" [default]; "object".');
        $('#how-to h4').each(function () {
          var a = $(this).closest('li').attr('id');
          $(this).wrap('<'+'a href="#'+a+'"></'+'a>');
        });
        $('#demos .demo').each(function () {
          var id = $(this).find('.box').attr('id') + '-demo';
          $(this).attr('id', id)
            .find('h3').wrapInner('<'+'a href="#'+id+'"></'+'a>');
        });
        
        // Run Demos
        $('.demo .code').each(function() {
          eval($(this).attr('title','NEW: edit this code and test it!').text());
          this.contentEditable = true;
        }).focus(function() {
          if(!$(this).next().hasClass('test'))
            $(this)
              .after('<button class="test">test</button>')
              .next('.test').click(function() {
                $(this).closest('.demo').find('.hasDatepicker').multiDatesPicker('destroy');
                eval($(this).prev().text());
                $(this).remove();
              });
        });
      });
    // -->
    </script>
    <link rel="stylesheet" type="text/css" href="cssc/mdp.css">
    <link rel="stylesheet" type="text/css" href="cssc/prettify.css">
    <script type="text/javascript" src="jsc/prettify.js"></script>
    <script type="text/javascript" src="jsc/lang-css.js"></script>
    <script type="text/javascript">
    $(function() {
      prettyPrint();
    });
    </script>



        <div class="container-fluid white-bg1" style="padding:0px"> 
              
                             <div class="col-md-12 div-pad1">
                                  <p style="color:#f2635d;">POST AN AD</p>
                               </div>   
                               <div class="clearfix"></div>           
        	<div class="container">
              <div class="container-sub3">
            	<div class="row"  style="padding-top:10px">

                   <div class="container-post">
                                       <div class="visiable-cal">
                                          
                                          <div class="date-pick3">
                                           <div id="datepicker"></div>
											                     <script>
                                            /*$("#datepicker").datepicker({
        inline: true,
        //nextText: '&rarr;',
        //prevText: '&larr;',
        showOtherMonths: true,
        //dateFormat: 'dd MM yy',
        dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        //showOn: "button",
        //buttonImage: "img/calendar-blue.png",
        //buttonImageOnly: true,
      });*/
                                            

                                           </script>
                                        </div>
                                        <div id="pre-select-dates" class="box"></div>
                                          <div class="mrng-but">
                                             <a href="">Morning</a>
                                             <a href="">Evening</a>
                                             <div class="clearfix"></div>
                                          </div>
                                            
                                           <div class="clearfix"></div> 
                                          </div>
                                       <div class="list-check">
                                        <div class="input-title"><input type="text" id="test1" placeholder="Name"></div>
                                       <div class="input-title"><input type="text" id="test1" placeholder="Mobile No"></div>
                                       <div class="input-title"><input type="text" id="test1" placeholder="Email"></div>
                                       <div class="input-title"><input type="text" id="test1" placeholder="Event"></div>
                                       <div class="list-check">
                                 <h6>Advance paid</h6>
                              <p style="width:100px;">
                                <input type="checkbox" id="test115" />
                                <label for="test115" style="padding-left:40%;">Yes</label>
                              </p>
                               <p style="width:100px;">
                                <input type="checkbox" id="test116" />
                                <label for="test116" style="padding-left:40%;">No</label>
                              </p>
                            <div class="clearfix"></div>   
                           </div>
                           
                                      <div class="input-title"><input type="text" id="test1" placeholder="Rs"></div>
                                      
                                      <div class="input-title"><input type="submit" value="Book"</div></div>
                                    <div class="clearfix"></div>   
                               </div>
                                
                               </div>
                    <div class="clearfix"></div>
                </div>
                  <!-- <div class="class="nex-but"">
                     <a href="postad-last.html" class="ne-but">Next</a>
                     <a href="post-ad3.html" class="bc-but">Back</a>
                  <div class="clear"></div>
                 </div> -->
                </div>
            </div>
        </div>
        
<?php include("includes/footer.php"); ?>
 <!------login-popup--------->
<script src='js/jquery.magnific-popup.min.js'></script>
<script src="js/index.js"></script>
<!------login-popup--------->
</body>
</html>
