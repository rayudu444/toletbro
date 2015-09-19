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



    $('#upload').click(function(e) {
    	
    	var other_data = $('form#image-upload').serializeArray();
    	
        if (document.myForm2.name.value != "")

        {

          if (posting_images.length == 0)

          {

              alert("Please upload property image.");

              e.preventDefault();

          }else{

             var data = new FormData();



             for(var j=0, len=posting_images.length; j<len; j++) {

                  

                 data.append("property_img["+j+"]", posting_images[j]); 

             }

             data.append('city',$("#city").val());

            



                  $.each(other_data,function(key,input){

                      data.append(input.name,input.value);

                  });

                $("#dialog-background").show();

                $(".dialog").show();

               $.ajax({

                   type: 'POST',

                   url : 'addpostanadd.php',

                   data : data,

                   processData: false,

                   contentType: false,

                   statusCode: {

                      200: function(data) {
            	   		var response = JSON.parse(data);
                        if(response.status == 1)

                        {
                        	
                         window.location = "post-add1.php?post="+response.post_id;
                         

                        }else{

                          alert("Error while posting images");

                        }

                      },

                      500: function(){

                        alert("Error while posting please try again");

                      }

                    }



                 });



          }   

        }else{

          alert("Please enter title");

          return false;

        }



        

    });

    

    $('#upload-edit').click(function(e) {

        

       

           var data = new FormData();



           for(var j=0, len=posting_images.length; j<len; j++) {

                

               data.append("posting_images["+j+"]", posting_images[j]); 

           }



           var other_data = $('#image-upload').serializeArray();



                $.each(other_data,function(key,input){

                    data.append(input.name,input.value);

                });

              data.append("showcase_id",showcase_id);

              $("#dialog-background").show();

              $(".dialog").show();

             $.ajax({

                 type: 'POST',

                 url : 'edit-images.php',

                 data : data,

                 processData: false,

                 contentType: false,

                 statusCode: {

                    200 : function(data) {

                      if(data >0)

                      {

                        $(".dialog").empty();

                        $(".dialog").append("<span style='color:green'><h3>Post Updated Successfully..</h3></span>")

                        setInterval(function (){window.location = "showcase.php"},3000);

                      }else{

                        $(".dialog").empty();

                        $(".dialog").append("<span style='color:red'><h3>Sorry error while uploading please try again</h3></span>")

                        setInterval(function (){window.location = ""},3000);

                      }

                    },

                    500: function(){

                      alert("Error while posting please try again");

                    }

                  }



               });



       

    });

    

    

});