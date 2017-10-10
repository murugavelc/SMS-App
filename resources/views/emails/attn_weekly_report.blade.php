<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Student Managemant System</h2>

<div>
    Hi, {{$name}},

    <p>This is your last week Attendance report details</p><br><br>
            <table  width="40%" style="font-family: 'Times New Roman' ">
                <thead >
                <tr bgcolor="teal">
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($attn_report as $attn_reports=> $value)
                    <tr style="align-content: center">
                        <td bgcolor="#ee82ee">{{ $value->date }}</td>
                        @if($value->status =='0')
                            <td bgcolor="red">Absent</td>
                        @else
                            <td bgcolor="green">Present</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
           <br><br><br>
        <p>
        Regards,<br>
        Admin|SMS.
    </p>
</div>

</body>
</html>