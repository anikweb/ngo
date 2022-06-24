<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@if($volunteer->volunteer_id) {{ $volunteer->volunteer_id.'.pdf' }} @else {{ $volunteer->applicant_id.'.pdf' }} @endif</title>
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }

        h1,h2,h3,h4,h5,h6{
            margin:0px;
            padding: 0px;
        }
        .headline{
            text-align: center;
            margin-bottom: 50;
        }
        .org-name{
            margin:0px;
            padding: 0px;
            text-align: center;
            color: #10783b;
        }
        .office-copy{
            display: inline-block;
            padding: 2px 5px;;
            margin-top: 3px;
            border: 1px dotted #10783b;
        }
      . td{
        /* width: 60px; */
        height: 40px;
        padding: 5px;
      }
      .data-conainer1 table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
    </style>
</head>
<body>
    <div class="container">
       <div class="headline">
            <div>
                <img src="{{ url('images/generalSettings/muktir-bondhon-foundation-icon.png') }}" alt="{{ generalSettings()->icon }}">
                <h2 class="org-name">{{ Str::upper(generalSettings()->site_title) }}</h2>
            </div>
            <h3 class="slogan">{{ Str::upper(generalSettings()->tagline) }}</h3>
            <h5 class="address">Eastern Arzoo, Room No-06-5, Level 6, 61 Bijoy Nagar,Dhaka-1000</h5>
            <h5 class="phone">Phone: +88-8391224</h5>
            <h3 class="office-copy">Office Copy</h3>
        </div>
        <div class="info">
            @if (!$volunteer->volunteer_id)
                <span class="info-1">Applicant Id: <strong>{{ $volunteer->applicant_id }}</strong></span>
            @else
                <span class="info-1">Volunteer Id: <strong>{{ $volunteer->volunteer_id }}</strong></span>
            @endif
        </div>
        <div class="main-data">
           <div class="data-conainer1">
               <table>
                    <tr>
                        <th width="10%">Name</th>
                        <td width="40%">{{ Str::upper($volunteer->name_en) }}</td>
                        <th width="30%">Email</th>
                        <td width="40%">{{ $volunteer->email }}</td>
                        <td  rowspan="3" colspan="2">
                            <img src="{{ asset('images/volunteers/'.$volunteer->image) }}" alt="{{ $volunteer->name_en }}">
                        </td>
                    </tr>
                    <tr>
                        <th width="10%">Name(BN)</th>
                        <td width="40%">{{ $volunteer->name_bn }}</td>
                        <th width="20%">Mobile</th>
                        <td width="40%">{{ $volunteer->mobile }}</td>
                    </tr>
                    <tr>
                        <th width="20%">Father's Name</th>
                        <td width="40%">{{ Str::upper($volunteer->father_name) }}</td>
                        <th width="20%">Blood Group</th>
                        <td width="40%">@if($volunteer->blood_group){{ Str::upper($volunteer->blood_group) }}@else <em>Null</em>@endif</td>
                    </tr>
                    <tr>
                        <th>Mother's Name</th>
                        <td>{{ Str::upper($volunteer->mother_name) }}</td>
                        <th>Sex</th>
                        <td>
                            @if ($volunteer->sex ==1)
                                Male
                            @elseif($volunteer->sex == 2)
                            Female
                            @elseif ($volunteer->sex == 3)
                            3rd Gender
                            @endif
                        </td>
                        <th>Date of Birth</th>
                        <td>{{ date('d-m-y',strtotime($volunteer->date_of_birth)) }}</td>
                    </tr>
                    <tr>
                        <th>NID</th>
                        <td>@if($volunteer->nid){{ $volunteer->nid }}@else <em>Null</em>@endif</td>
                        <th>Birth Registration No</th>
                        <td>@if($volunteer->bcn){{ $volunteer->bcn }}@else <em>Null</em>@endif</td>
                        <th>Nationality</th>
                        <td>{{ Str::title($volunteer->nationality) }}</td>
                    </tr>
                    <tr>
                        <th>Occupation</th>
                        <td>{{ Str::title($volunteer->occupation ) }}</td>
                        <th>Institute</th>
                        <td>@if($volunteer->institute){{ $volunteer->institute }}@else <em>Null</em>@endif</td>
                        <th>Inspired By</th>
                        <td>@if($volunteer->giverFromInspiration){{ $volunteer->giverFromInspiration }}@else <em>Null</em>@endif</td>
                    </tr>
                    <tr>
                        <th colspan="2" style="height:40px;">Present Address</th>
                        <th colspan="4" style="height:40px;">Permanent Address</th>
                    </tr>
                    <tr>
                        <th>Division</th>
                        <td>{{ $volunteer->preDivision->name }}</td>
                        <th>Division</th>
                        <td colspan="3">{{ $volunteer->permDivision->name }}</td>
                    </tr>
                    <tr>
                        <th>District</th>
                        <td>{{ $volunteer->preDistrict->name }}</td>
                        <th>District</th>
                        <td colspan="3">{{ $volunteer->permDistrict->name }}</td>
                    </tr>
                    <tr>
                        <th>Thana</th>
                        <td>{{ $volunteer->preThana->name }}</td>
                        <th>Thana</th>
                        <td colspan="3">{{ $volunteer->permThana->name }}</td>
                    </tr>
                    <tr>
                        <th>Post Office</th>
                        <td>{{ $volunteer->prPostOffice }}</td>
                        <th>Post Office</th>
                        <td colspan="3">{{ $volunteer->pmPostOffice }}</td>
                    </tr>
                    <tr>
                        <th>ZIP</th>
                        <td>@if($volunteer->prZIP){{ $volunteer->prZIP }}@else <em>Null</em>@endif</td>
                        <th>ZIP</th>
                        <td colspan="3">@if($volunteer->pmZIP){{ $volunteer->pmZIP }}@else <em>Null</em>@endif</td>
                    </tr>
                    <tr>
                        <th>Village/Area</th>
                        <td>{{ $volunteer->prVillage }}</td>
                        <th>Village/Area</th>
                        <td colspan="3">{{ $volunteer->pmVillage }}</td>
                    </tr>
                </table>
            </div>
       </div>
       <div>
            @if ($volunteer->facebook_url)
                <h4 style="margin-top: 5px;"> Applicant Facebook: <a href="{{ $volunteer->facebook_url }}">{{ $volunteer->facebook_url }}</a></h4>
            @endif
            <h4 style="margin-top: 5px;"> Application Date: {{ $volunteer->created_at->format('d-M-Y, h:i A') }}</h4>
            <h4 style="margin-top: 5px;"> Last Update: {{ $volunteer->updated_at->format('d-M-Y, h:i A') }}</h4>
            <h4>Status: @if($volunteer->status == 1) <span style="color:coral;"> Application Pending</span> @elseif($volunteer->status == 2)<span style="color:#10783b"> Volunteer </span> @elseif($volunteer->status == 3) <span style="color:red;">Resticted</span><span style="color:blue;">  @endif</h4>
            <a  href="#" type="button" class="down-pdf">Download PDF</a>
            <h3>This is automated mail, do not reply.</h3>
       </div>
    </div>
</body>
</html>
