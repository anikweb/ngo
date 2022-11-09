<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donation for Muktir Bondhon Foundation</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        .th{
            background: #10783b;
            color:white;
        }
        .td{
            background: #10783b6d;
            color:#000;
            text-align: center;
        }
        table{
            font-size: x-small;
        }
        .gray {
            background-color: lightgray
        }
        h1,h3,pre,p{
            margin: 0px;
            padding: 0px;
        }
    </style>
</head>
<body>

  <table width="100%">
    <tr>
        <td align="right">
            <h1>Donation Receipt</h1>
            <pre>
                <h3>{{ generalSettings()->site_title }}</h3>
                Address: 61, Bijoynagar, Estern Arzoo, Room No. 06-5,
                Level 6, Dhaka-1000, Bangladesh.
                Cell: +88-02-8391224.
                email: <a href="mailto:info@muktirbondhon.org">info@muktirbondhon.org</a>
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td>
            <pre>
                <strong>Transaction Id:</strong> {{ $userDonation->transaction_id }}
                <strong>Payment Date:</strong> {{ $userDonation->created_at->format('d-M-Y, h:i A') }}
            </pre>
        </td>
    </tr>

  </table>

  <br/>

  <table class="table" width="100%">
    <thead>
      <tr>
        <th class="th" >Name of Donor</th>
        <th class="th">Email</th>
        <th class="th" >Phone</th>
        <th class="th">Address</th>
        @if ($userDonation->project_id)
            <th class="th" >Project</th>
        @else
            <th class="th" >Project (Custom)</th>
        @endif
        <th class="th">Type</th>
        <th class="th" >Amount  ({{ $userDonation->currency }})</th>
        <th class="th">Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="td" scope="row" >{{ $userDonation->name }}</td>
        <td class="td">{{ $userDonation->email }}</td>
        <td class="td" align="right" >{{ $userDonation->phone }}</td>
        <td class="td" align="right">{{ $userDonation->address }}</td>
        @if ($userDonation->project_id)
            <td class="td" class="text-left" >{{ $userDonation->project->title }}</td>
        @else
            <td class="td" class="text-left" >{{ $userDonation->custom_project }}</td>
        @endif
        <td class="td" align="right">
            @if ($userDonation->type == 1)
                One time Donation
            @else
                Recurring
            @endif
        </td>
        <td class="td" align="right">{{ $userDonation->amount }}</td>
        <td class="td" align="right">Paid</td>
      </tr>
    </tbody>
  </table>
    <p style="text-align:center;margin-top:20px;"><i class="fa fa-lock text-success"></i>-Secured payment by <a target="_blank" href="https://www.sslcommerz.com/">SSL Commerz Payment Gateway</a>-</p>
</body>
</html>
