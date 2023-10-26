<!DOCTYPE html>
<html>
<head>
    <title>QR code Generator</title>
</head>
<body>
<div class="visible-print text-center">


    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')/*->merge(public_path('images/qrcode.png'), 0.001, true)*/
                        ->size(200)->errorCorrection('H')
                        ->generate('37786678687')) !!} ">

</div>
</body>
</html>