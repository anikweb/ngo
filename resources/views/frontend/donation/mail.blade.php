<!doctype html>
<html lang="en">
  <head>
    <title>Laravel 8 Send Email with PDF Attachment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
<div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-12 m-auto">
                <p>Dear Donor <br>
                    Greetings. Your donation has been successfully received. Donation details are attached. </p>
                <p>Best Regards, <br>
                {{ generalSettings()->site_title }} <br>
                Phone:  +88-02-8391224 <br>
                Address: 61, Bijoynagar, Estern Arzoo, Room No. 06-5, Level 6, Dhaka-1000, Bangladesh
                </p>

            </div>
        </div>
    </div>
  </body>
</html>
