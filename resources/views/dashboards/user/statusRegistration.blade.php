<style>
      .bgEllipse{
         padding-top: 80px;
         background-image : url("/storage/payment/ellipseBackground.svg");
         background-size :cover;
         background-repeat: no-repeat;
         background-position: center;
     }
     #conStatus{
          padding: 50px 250px;
     }
     @media(max-width:768px){
          #conStatus{
              padding: 50px 100px; 
          }
     }
     @media(max-width:576px){
          #conStatus{
              padding: 50px 50px; 
          }
          #statusImg{
              transform: scale(0.7);
          }
     }
  </style>
  
  <x-app title="Dashboard">
      <x-slot name="navbarUser"></x-slot>
      <div>
          <div class="text-center bgEllipse">
              <div class="container payStep">
                  <div>
                      <h1 class="fw-bold">Participant Registration</h1>
                  </div>
                  <div class="py-4">
                      <img src="/storage/payment/statusSteps.svg" class="img-fluid" alt="">
                  </div>
              </div>
          </div>
      </div>
      <div id="conStatus" class="container">
            <div class="row border border-secondary rounded ">
                  <div class="p-5 text-center">
                      <div class="fw-bold fs-1">
                          Registration status 
                      </div>
                      <div class="fw-regular fs-5 text-muted pt-2">
                          Please make sure your payment proof is true
                      </div>
                      <div class="pt-4">
                          <img src="/storage/payment/acceptLogo.svg" id="statusImg" class="img-fluid" alt="">
                      </div>
                      <div class="pt-4 fs-5">
                          Your payment has been confirmed by the committee. Don't forget to check<br>further details at your registered email.
                      </div>
                  </div>
            </div>
      </div>
      <div id="conStatus" class="container">
            <div class="row border border-secondary rounded ">
                  <div class="p-md-5 p-sm-3 p-3 text-center">
                      <div class="fw-bold fs-1">
                          Registration status 
                      </div>
                      <div class="fw-regular fs-5 text-muted pt-2">
                          Please make sure your payment proof is true
                      </div>
                      <div class="pt-md-4 p-sm-2 p-2">
                          <img id="statusImg" src="/storage/payment/checkLogo.svg" class="img-fluid" alt="">
                      </div>
                      <div class="pt-md-4 p-sm-2 p-2 fs-5">
                          Your payment is being checked by the committee, please wait patiently and <br>we will inform you in a few days
                      </div>
                      
                  </div>
            </div>
      </div>
      <div id="conStatus" class="container" >
            <div class="row border border-secondary rounded ">
                  <div class="p-md-5 p-sm-3 p-3 text-center">
                      <div class="fw-bold fs-1">
                          Registration status 
                      </div>
                      <div class="fw-regular fs-5 text-muted pt-2">
                          Please make sure your payment proof is true
                      </div>
                      <div class="pt-4">
                          <img id="statusImg" src="/storage/payment/deniedLogo.svg" class="img-fluid" alt="">
                      </div>
                      <div class="pt-md-4 p-sm-2 p-2 fs-5">
                          Your payment is being denied by the committee please edit your payment<br>and make sure the payment proof is true
                      </div>
                      <div class="text-center pt-3">
                          <button type="submit" class="mt-3 py-3 btn btn-primary w-75 border-0 " id="btnSubmit">
                              Edit Payment
                          </button>
                      </div>
                  </div>
            </div>
      </div>
</x-app>