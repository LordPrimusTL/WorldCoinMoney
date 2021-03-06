<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <title>Crypto Trading Matrix</title>
</head>
<body>
<p>Hello {{$name}}, Thank You For Trading With Us </p>
@if($paytype == 1)
    <p>Please find below the bank account details you will be making a deposit/transfer to.</p>
    <p>Kindly <a href="{{route('user_wtdn',['id' => encrypt($id)])}}">Click Here</a> to read instructions on what to do Next. </p>
    <p>Bank Name: EcoBank</p>
    <p>Account Name: World Coin</p>
    <p>Account Number: 0123456789</p>
    <p>Kindly use the bank details for payment and upload an image of any evidence of payment in the <a href="{{route('user_wtdn',['id' => encrypt($id)])}}">What To Do Next Page.</a></p>
    <p>Kindly Send A Mail To Us At info@crytotradingmatrix.com for More Enquiry.</p>
    <p>Thank you</p>
@endif


@if($paytype == 2)

    <p>Please find below your BTC link for Trading Fees Payment. </p>
    <p>Kindly <a href="{{route('user_wtdn',['id' => encrypt($id)])}}">Click Here</a> to read instructions on what to do Next. </p>
    <p>BTC Address: {{$btc->address}}</p>
    <p>Kindly use the BTC for payment and upload your pop and hash id in the Kindly <a href="{{route('user_wtdn',['id' => encrypt($id)])}}">What To Do Next Page.</a></p>
    <p>Kindly Send A Mail To Us At info@cryptotradingmatrix.com for More Enquiry.</p>
    <p>Thank you</p>
@endif



</body>
</html>