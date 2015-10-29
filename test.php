<!-- <script src="js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="js/jquery-1.10.2.min.js"></script> -->
   <!-- <option value="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></option>
    <option value="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></option> -->
        <script src="http://assets.codepen.io/assets/common/everypage-fe91c16ad68ddc390e1f9e23fc9bd268.js" type="text/javascript"></script>


  
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/smoothness/jquery-ui.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>

  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript"></script>

 
<script type="text/javascript">
	jQuery(document).ready(function() {
        
        // An array of dates
        var eventDates = {};
        eventDates[ new Date( '10/10/2015' )] = new Date( '10/20/2015' );
        eventDates[ new Date( '10/16/2015' )] = new Date( '12/06/2014' );
        eventDates[ new Date( '12/20/2014' )] = new Date( '12/20/2014' );
        eventDates[ new Date( '12/25/2014' )] = new Date( '12/25/2014' );
        
        // datepicker
        jQuery('#calendar').datepicker({
            beforeShowDay: function( date ) {
                var highlight = eventDates[date];
                if( highlight ) {
                     return [true, "event", highlight];
                } else {
                     return [true, '', ''];
                }
             }
        });
    });
</script>
<style type="text/css">
	* {
    margin: 0 auto;
    padding: 0;
}

body {
    background-color: #F2F2F2;
}

.container {
    margin: 0 auto;
    width: 920px;
    padding: 50px 20px;
    background-color: #fff;
}

h3 {
    text-align: center;
}

#calendar {
    margin-top: 40px;
}
    
.event a {
    background-color: #42B373 !important;
    background-image :none !important;
    color: #ffffff !important;
}
</style>
<body>
    <div class="container">
        <h3> Highlight Particular Dates in JQuery UI Datepicker </h3>
        
        <div id="calendar" > </div>
    </div>
</body>
