<style>
  .box{
margin-top:20px;
  }
  .a1{
    text-align:center;
    font-size:3vw;
    font-family:Arial;
    
  }
  .a2{
    
    animation: 1.5s anim-popoutin ease infinite;
  }
  @keyframes anim-popoutin {
  100% {
    transform: scale(1);
    opacity: 0;
    text-shadow: 0 0 0 rgba(0, 0, 0, 0);
  }
  40% {
 
    transform: scale(1.3);
    opacity: 1;
    text-shadow: 3px 10px 5px rgba(0, 0, 0, 0.5);
  }
 70% {
    
    transform: scale(1);
    opacity: 1;
    text-shadow: 1px 0 0 rgba(0, 0, 0, 0);
  }
  100% {
    /* animate nothing to add pause at the end of animation */
    transform: scale(1);
    opacity: 1;
    text-shadow: 1px 0 0 rgba(0, 0, 0, 0);
  }
}
  p{
    text-align:justify;
    font-family:Times New Romen,sanserif;
    font-size:24px;
  }
 
  @media screen and (max-width: 600px) {
p{
    font-size:16px;
  }
}
   button{
    border-radius:0.5em;
    
   }

</style>
<div class="container-fluid-0  cont1">
          <img src="https://static.locowiz.com/locomedia/pathkind-labs/banner/1648184356.jpeg?ver=7" alt="Path lab Image" height="auto" width="100%">
          <div class="cont2">
           
          <p class="a1"><b>Book Your <br> Appointment</b></p>
          <center><button type="button" class="btn btn-md btn-success a2"  data-bs-toggle="modal" data-bs-target="#exampleModal">NOW</button></center>

          </div>
        </div>
<div class="body-container">
      <div class="container box">
        <div class="row">
          <div class="col">
            <h1 style="text-align:center;font-family:Times New Romen;border-bottom:1px solid black">About Us</h1>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p>
            A significant part of the operation of any Pathology Lab involves the acquisition, management and timely retrieval of great volumes of information. This information typically involves; patient personal information and medical history, staff information, staff scheduling and various facilities waiting lists. All of this information must be managed in an efficient and cost wise fashion so that an   institution's resources may be effectively utilized this project will automate the management of the Pathology Lab making it more efficient and error free. It aims at standardizing data, consolidating data ensuring data integrity and reducing inconsistencies.            </p>
          </div>
        </div>
      </div>
    </div>
