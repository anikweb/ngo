<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $volunteer->applicant_id }}</title>
</head>
    <body>
        <p>Hello {{ $volunteer->name_en }},<br>Thank you so much for Application to join as a volunteer ‍at Muktir Bondhon Foundation.</p>
        <p>Wait a moment. Our team will review you in depth according to your information. If you are approved as a volunteer, you will be notified by the e-mail address you provided. Until then, stay connected by sharing the program posts on our Facebook page.</p>
        <h5>Your Application Id is  {{ $volunteer->applicant_id }}</h5>
        <p style="margin:0;padding:0;">Warm Regards,</p>
        <p style="text-color:rgb(0, 64, 255);margin:0;padding:0;"><strong>Anik Kumar Nandi</strong></p>
        <p style="margin:0;padding:0;"><em>IT and Program Officer</em></p>
        <p style="margin:0;padding:0;"><strong>Muktirbondhon Foundation</strong></p>
        <br>
        <em>Do not reply, this is automated email!</em>
    </body>
</html>
