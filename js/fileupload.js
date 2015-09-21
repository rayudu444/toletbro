var abc = 0; //Declaring and defining global increement variable

var posting_images = new Array();

$(document).ready(function() {

    

  $(document).on("click",".input-add",function(){

    $(this).val(''); 

  });

  $(document).on("change",".input-add", function(e){
	  		
             var files = e.target.files;

             var filesArr = Array.prototype.slice.call(files);

             filesArr.forEach(function(f) {      

              posting_images.push(f);

              if(f.type.match("image.*")) {

                

                var reader = new FileReader();

                reader.onload = function (e) {

                  //var x = $(this).parent().find('#previewimg' + z).remove();  

                  $('.filediv1').before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src='"+e.target.result+"'/><img id='img' data = '"+f.name+"' class='delete' src='images/x.png'/></div>"); 

                 }

              }

              else{

                alert("select image file");

              }

              reader.readAsDataURL(f); 

             });

        });

        $(document).on("click",".delete",function(){

            var file = $(this).attr("data");

           

              for(var i=0;i<posting_images.length;i++) {

                if(posting_images[i].name === file) {

                  posting_images.splice(i,1);

                  break;

                }

              }

            $(this).parent().remove();

        });

       

    







//To preview image     

    function imageIsLoaded(e) {

     $('#previewimg' + abc).attr('src', e.target.result);

		 $('.filediv-total-main').append(

		 $("<div class='filediv1' id='filediv'><input name='file[]' type='file' id='file' class='input-add' multiple/></div>")

		) 

	};



   
    


    

    

});