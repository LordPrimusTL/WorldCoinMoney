<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <title>World Coin Crypto-Currency</title>
</head>
<body>
<p>Hello {{$name}}, Thank You For Registering With Us </p>
@if($t==1)
    <p>Please find below your BTC link for School Fees Payment. </p>
    <p> Kindly <a href="{{route('WTDN')}}">Click Here</a> to read instructions on what to do Next. </p>
    <p>BTC Address: {{$btc->address}}</p>
    <p>Kindly use the BTC for payment and upload your pop and hash id in the Kindly <a href="{{route('WTDN')}}">What To Do Next Page.</a></p>
    <p>Kindly Send A Mail To Us At Info@worldcoinmoney.com for More Enquiry.</p>
    <p>Thank you</p>
@endif

@if($t==2)
    <p>Please find below the bank account details you will be making a deposit/transfer to.</p>
    <p> Kindly <a href="{{route('WTDN')}}">Click Here</a> to read instructions on what to do Next. </p>
    <p>Bank Details: </p>
    <p>Kindly use the bank details for payment and upload an image of any evidence of payment in the <a href="{{route('WTDN')}}">What To Do Next Page.</a></p>
    <p>Kindly Send A Mail To Us At Info@worldcoinsmoney.com for More Enquiry.</p>
    <p>Thank you</p>
@endif

</body>
</html>