<?php 
  session_start(); 
  include_once('includes/dbutil.php');
  
  if (!isset($_SESSION['cnv_upid']) || $_SESSION['cnv_upid'] == '' )
{
echo "<script>window.alert('Please LogIn....')</script>";
echo "<script>window.location.href='index.php'</script>";
}
include_once('includes/convention_header.php');
?>
                <div class="container-fluid white-bg1" style="padding:0px"> 
              
                             <div class="col-md-12 div-pad1">
                                  <p>POST FOR CONVENTIONS</p>
                               </div> 
           <form method="post" action="dbadd-convention1.php">                                 
        	<div class="container">
              <div class="container-sub3">
            	<div class="row"  style="padding-top:10px">
                              <div class="col-md-12 div-pad2">
                                 <h5 class="facilites-div">facilities</h5>
                               </div>
                                <div class="clearfix"></div>
                   
                    <div class="clearfix"></div>
                </div>

                <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Seating Capacity</p>
                               </div>
                                <div class="clearfix"></div>
                               <div class="container-post">
                                           
                         
                            <div class="list-input">
                              <div class="input-seats">
                                 <label>Minimum</label>
                                <input type="input" name="seating_cap_min" placeholder="100"/>
                             </div>
                               <div class="input-seats">
                                 <label>Maximum</label>
                                <input type="input"  name="seating_cap_max"  placeholder="500"/>
                             </div>
                             <div class="input-seats">
                                 <label>Floating</label>
                                <input type="input"  name="seating_cap_floating" placeholder="800"/>
                             </div>
                             <div class="input-seats">
                                 <label>Dining Capacity</label>
                                <input type="input" name="dining_seating_cap"  placeholder="1000"/>
                             </div>
                            <div class="clearfix"></div>   
                           </div>
                         
                 
                               
                               </div>
                                <div class="clearfix"></div>
                </div>
                  
                  <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Food And Drink</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check">
                              <p>
                                <input type="checkbox" name="food[]" value="Veg" id="test84" />
                                <label for="test84">Veg</label>
                              </p>
                              <p>
                                <input type="checkbox" name="food[]" value="Non veg" id="test85" />
                                <label for="test85">Non Veg</label>
                              </p>
                              <p>
                                <input type="checkbox" name="food[]" value="Alcohol" id="test86" />
                                <label for="test86">Alcohol</label>
                              </p>
                              <p>
                                <input type="checkbox" name="food[]" value="Self Cooking" id="test87" />
                                <label for="test87">Self Cooking</label>
                              </p>
                              <p>
                                <input type="checkbox" name="food[]" value="Outside Catering"  id="test88" />
                                <label for="test88">Outside Catering </label>
                              </p>

                            <div class="clearfix"></div>   
                           </div>
                        
                   </div>
                    <div class="clearfix"></div>
                </div>
                   <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Parking Capacity</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check">
                                 <div class="parking">
                                     <span>Two wheelers</span>
                                      <input type="text" name="twowheeler_parking_cap"  placeholder=""/>
                                     <span>Approx</span>
                                     <div class="clearfix"></div> 
                                 </div> 
                                  <div class="parking">
                                     <span>four wheelers</span>
                                      <input type="text" name="fourwheeler_parking_cap" placeholder=""/>
                                     <span>Approx</span>
                                     <div class="clearfix"></div> 
                                 </div>
                                 <div class="clearfix"></div>  
                                 <p>
                                
                                <input type="checkbox" id="test99" name="vallet_parking" value="Yes" />
                                  <label for="test99">Valet Parking</label>
                              </p>
                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                    <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Hall Ideally suited For</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                         
                            <div class="list-check">
                              <p>
                                <input type="checkbox" name="hall_suitable_for[]" value="Wedding"  id="test101" />
                                <label for="test101">Wedding</label>
                              </p>
                              <p>
                                <input type="checkbox" name="hall_suitable_for[]" value="Receptions" id="test102" />
                                <label for="test102">Receptions</label>
                              </p>
                              <p>
                                <input type="checkbox" name="hall_suitable_for[]" value="Engagement" id="test103" />
                                <label for="test103">Engagement</label>
                              </p>
                              <p>
                                <input type="checkbox" name="hall_suitable_for[]" value="Birthday" id="test104" />
                                <label for="test104">Birthday</label>
                              </p>
                              <p>
                                <input type="checkbox" name="hall_suitable_for[]" value="Anniversary" id="test105" />
                                <label for="test105">Anniversary </label>
                              </p>
                               <p>
                                <input type="checkbox" name="hall_suitable_for[]" value="Baptism" id="test106" />
                                <label for="test106">Baptism </label>
                              </p>
                              
                              <p>
                                <input type="checkbox" name="hall_suitable_for[]" value="Corporate events" id="test999" />
                                <label for="test999">Corporate events </label>
                              </p>
                              
                              <p>
                                <input type="checkbox" name="hall_suitable_for[]" value="Get together" id="test107" />
                                <label for="test107">Get together </label>
                              </p>
                              
                              <p>
                                <input type="checkbox" name="hall_suitable_for[]" value="Bachelor party" id="test108" />
                                <label for="test108">Bachelor party</label>
                              </p>
                              
                              <p>
                                <input type="checkbox" name="hall_suitable_for[]" value="Business purpose" id="test109" />
                                <label for="test109">Business purpose</label>
                              </p>
                              
                              <p>
                                <input type="checkbox" name="hall_suitable_for[]" value="Conference" id="test110" />
                                <label for="test110">Conference </label>
                              </p>
                              
                              <p>
                                <input type="checkbox" name="hall_suitable_for[]" value="Naming ceremonies" id="test111" />
                                <label for="test111">Naming ceremonies</label>
                              </p>
                               <p>
                                <input type="checkbox" name="hall_suitable_for[]" id="test111" />
                                <label for="test111">others</label>
                              </p>
                            <div class="clearfix"></div>   
                           </div>
                        
                   </div>
                    <div class="clearfix"></div>
                </div>
                
                
                  <div class="row">
                              <div class="col-md-12 div-pad2">
                                  <p>Technology & Equipment</p>
                               </div>
                                <div class="clearfix"></div>
                   <div class="container-post">
                       
                            <div class="list-check">
                              <p>
                                <input type="checkbox" id="test91" name="technical_equipment[]" value="Power Backup / Generator" />
                                <label for="test91">Power Backup / Generator</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test92"  name="technical_equipment[]" value="Projector"  />
                                <label for="test92">Projector</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test93"  name="technical_equipment[]" value="Internet & Wi-Fi" />
                                <label for="test93">Internet & Wi-Fi</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test94"  name="technical_equipment[]" value="Sound System" />
                                <label for="test94">Sound System</label>
                              </p>
                              <p>
                                <input type="checkbox" id="test95"  name="technical_equipment[]" value="Mike" />
                                <label for="test95">Mike</label>
                              </p>

                            <div class="clearfix"></div>   
                           </div>
                         
                   </div>
                    <div class="clear-60"></div>
                </div>
                
                
                
                
                
                
                 <div class="class="nex-but"">
                 <input type="hidden" name="convention_post_id" value="<?=$_REQUEST['last_id']?>">
                    <!--  <a href="post-ad3.html" class="ne-but">Next</a> -->
                     <input type="submit" name="submit" class="ne-but" value="NEXT">
                     <a href="convention-post.php?post=<?= @$_GET['post']; ?>" class="bc-but">Back</a>
                  <div class="clear"></div>
                 </div>
                </div>
            </div>
            </form>
        </div>
        
   <?php include_once('includes/footer.php');?>     