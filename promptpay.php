
<?php
$gbToken = '';
$backgroundUrl = 'https://background.url/json_background.php';

$referenceNo = date("Ymdhis");
$detail = 'REF'.$referenceNo;

$amount = ($_REQUEST['amount']) ? $_REQUEST['amount']:1.50;
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.gbprimepay.com/gbp/gateway/qrcode',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array(
        'token' => $gbToken,
        'amount' => $amount,
        'referenceNo' => $referenceNo,
        'detail' => $detail,
        'backgroundUrl' => $backgroundUrl
    ),
));

$response = curl_exec($curl);

curl_close($curl);


?>

<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            body {
                background-color:#00427a;
            }
        </style>
    </head>
    <body>
        <img id="qr" src="data:image/png;base64,<?php echo base64_encode($response); ?>" class="img-responsive center-block" alt="Image">

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
