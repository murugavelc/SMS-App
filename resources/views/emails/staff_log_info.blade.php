<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Student Managemant System</h2>

<div>
    Welcome {{$name}},

    <p>U can use this credencial to access our <strong>SMS</strong></p><br><br>
    <strong>UserName:  </strong> {{ $email}}<br>

    <strong>Password:  </strong> {{ $password}}<br><br><br>
    <p>
        Regards,<br>
        Admin|SMS.
    </p>
</div>

</body>
</html>