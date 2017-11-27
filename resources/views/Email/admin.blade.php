<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <title>Crypto Trading Matrix</title>
</head>
<body>
@if($t == 1)
    <p>Hello Admin,</p>
    <p>Please Kindly Review the Count of BTC Addresses Remaining. </p>
    <p>This Email has not gotten a BTC Address for Entry fees Payment: {{$email}}</p>
    <p>Thank You</p>
@endif
@if($t == 2)
    <p>Hello Admin,</p>
    <p>Please Kindly Review the Count of BTC Addresses Remaining. </p>
    <p>This Email has not gotten a BTC Address for Trading fees Payment: {{$email}}</p>
    <p>Thank You</p>
@endif
</body>
</html>