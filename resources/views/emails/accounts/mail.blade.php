<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Account Mail | {{$participant->name}}</title>
      @vite('resources/js/app.js' , 'vendor/courier/build')

      <style type="text/css">
            /* general settings */
            * {
                  margin:0;
                  padding:0
            }
            body {
                  /*  */
            }

            /* text */
            .name {
                  font-family: sans-serif;
            }
            
            .head_email{

            }
            .body_email{
                  /* text */
                  color: black;
                  font-size: 15px;
                  
                  /* position */
                  margin-top: 2rem;
            }
            .foot_email{
                  /* text */
                  color: black;
                  font-size: 15px;
            }
            .signature{
                  /* text */
                  color: black;
                  font-size: 15px;
            }
    </style>

</head>
<body>
      <h1 class="head_email"># Dear {{ $participant->name }},</h1>
      
      <div class="body_email">
            <p>Thank you for registering for the National English Olympics 2023.</p>
            <br>
            <p>To access your <a target="_blank"
            href="https://www.neo.mybnec.org/participant/login">participant account</a>, please use the username and password
            below:</p>
            <br>
            <p style="font-weight: bold; padding-left:50px;">
                  
                  Username : {{ $participant->username }} <br>
                  Password : P{{ str_pad($participant->id, 3, '0', STR_PAD_LEFT) }}
                  
            </p>
            <br>
            <p>Please also join the
                  {{ $participant->registrationDetail->competition->name }}
                  participant group and big group using following links:</p>
            <br>      
            <p style="font-weight: bold; padding-left:50px;">
                  
                        Competition group :
                        <a target="_blank" href="{{ $participant->registrationDetail->competition->link_group_whatsapp }}">
                        {{ $participant->registrationDetail->competition->link_group_whatsapp }}
                        </a>
                  
            </p>
                  
            <p style="font-weight: bold; padding-left:50px;">
                  Big group :
                  <a target="_blank" href="https://chat.whatsapp.com/JBJ7hPAHRwC3sHYSr9CGIm">
                        https://chat.whatsapp.com/JBJ7hPAHRwC3sHYSr9CGIm
                  </a>
                  
            </p>
            <br>
      </div>
      <p class="foot_email">
            If you have the further question, please contact us at our LINE Official @816tzkes or email neo.bnec@gmail.com
      </p>
      <br><br>
      <p class="signature">
            --<br>
            <p style="padding: 0px 50px;color:black">
                  Best Regards,<br>
                  The 2023 National English Olympics Committee<br>
                  Email : neo.bnec@gmail.com<br>
                  Line  : @816tzkes<br>
                  <img src="https://neo.mybnec.org/storage/logo/NEO-FULL/Colored.png" width="200px" style="padding: 30px 0;">
            </p>
</body>

</html>