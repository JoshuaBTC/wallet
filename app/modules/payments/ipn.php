<?php
set_time_limit(0);
require '../../engine.php';

file_put_contents('post.txt', print_r($_POST,true), FILE_APPEND);
file_put_contents('get.txt', print_r($_GET,true), FILE_APPEND);
file_put_contents('server.txt', print_r($_SERVER,true), FILE_APPEND);
file_put_contents('request.txt', print_r($_REQUEST,true), FILE_APPEND);

if(!isset($_POST['ipn_mode']) || $_POST['ipn_mode'] != 'hmac'){exit;}
if(!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])){exit;}
$request = file_get_contents('php://input');
if($request === FALSE || empty($request)){exit;}
if(!isset($_POST['merchant']) || $_POST['merchant'] != trim($product['coinpayments_merchant_id'])){exit;}
$hmac = hash_hmac("sha512", $request, trim($product['coinpayments_ipn_secret']));
if($hmac!=$_SERVER['HTTP_HMAC']){exit;}
if($_POST['ipn_type']!='deposit'){exit;}

$wallet_address = $_POST['address'];
$transaction_id = $_POST['txn_id'];
$amount = $_POST['amount'];
$amounti = $_POST['amounti'];
$fee = $_POST['fee'];
$feei = $_POST['feei'];
$confirms = $_POST['confirms'];
$currency = $_POST['currency'];
$status = intval($_POST['status']);
$status_text = $_POST['status_text'];

#Расчет стоимости в $ или Ethereum
if($product['token_price_eth']!='0' && $product['token_price_eth']>0){
$currency_to=$currency_to_eth;
$token_price=$product['token_price_eth'];
#Оплачено в Ethereum эквиваленте
$eth_raised=$amount*$currency_to[''.$currency.''];
$usd_raised=0;
$currency_raised=$eth_raised;
$conversion='ETH';

if($eth_raised>=5 && $eth_raised<20){$product['bonus_percent']+=3;}
if($eth_raised>=20 && $eth_raised<50){$product['bonus_percent']+=5;}
if($eth_raised>=50 && $eth_raised<200){$product['bonus_percent']+=7;}
if($eth_raised>=200){$product['bonus_percent']+=10;}
}else{
$currency_to=$currency_to_usd;
$token_price=$product['token_price'];
#Оплачено в долларовом эквиваленте
$usd_raised=$amount*$currency_to[''.$currency.''];
$eth_raised=0;
$currency_raised=$usd_raised;
$conversion='USD';

if($usd_raised>=2250 && $usd_raised<9000){$product['bonus_percent']+=3;}
if($usd_raised>=9000 && $usd_raised<22500){$product['bonus_percent']+=5;}
if($usd_raised>=22500 && $usd_raised<90000){$product['bonus_percent']+=7;}
if($usd_raised>=90000){$product['bonus_percent']+=10;}
}

#Количество токенов - сумма полученного в $ или Ethereum делить на стоимость одного токена
$tokens_amount=$currency_raised/$token_price;

#Количество бонусных токенов в соответствии с текущим бонусом
$tokens_amount_bonus=$tokens_amount*$product['bonus_percent']/100;

#Количество бонусных токенов для реферера
$tokens_amount_referrer=$tokens_amount*$product['referral_percent']/100;

$query = $db->prepare("SELECT uid FROM deposit_wallets WHERE wallet_address = ? AND currency = ? AND product_id = ?");
$query->execute(array($wallet_address,$currency,$product['id']));
if($query->rowCount()==0){exit;}
$user_id=$query->fetch(\PDO::FETCH_ASSOC)['uid'];

$query = $db->prepare("SELECT id, status, complete FROM payments WHERE wallet_address = ? AND currency = ? AND transaction_id = ? AND product_id = ?");
$query->execute(array($wallet_address,$currency,$transaction_id,$product['id']));

#Если платеж уже со статусом 100, но не дошел ранее до IPN
if($query->rowCount()==0 && $status==100){
$query_insert = $db->prepare("INSERT INTO payments (uid, wallet_address, transaction_id, amount, amounti, fee, feei, confirms, currency, status, status_text, exchange_rate, token_price, tokens_amount, system, conversion, time, product_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$query_insert->execute(array($user_id,$wallet_address,$transaction_id,$amount,$amounti,$fee,$feei,$confirms,$currency,($status-1),$status_text,$currency_to[''.$currency.''],$token_price,$tokens_amount,'cryptocurrency',$conversion,time(),$product['id']));

$query = $db->prepare("SELECT id, status, complete FROM payments WHERE wallet_address = ? AND currency = ? AND transaction_id = ? AND product_id = ?");
$query->execute(array($wallet_address,$currency,$transaction_id,$product['id']));
}
	
if($query->rowCount()>0){

$payment_array=$query->fetch(\PDO::FETCH_ASSOC);
$payment_id=$payment_array['id'];
$payment_status=$payment_array['status'];
$payment_complete=$payment_array['complete'];

if($payment_status!=$status && $payment_complete!='1'){
 
if($status==100){$complete='1';}else{$complete='0';}
 
$query = $db->prepare("UPDATE payments SET status = ?, confirms = ?, status_text = ?, exchange_rate = ?, token_price = ?, complete = ?, tokens_amount = ?, tokens_amount_bonus = ? WHERE id = ? AND product_id = ?");
$query->execute(array_values(array($status,$confirms,$status_text,$currency_to[''.$currency.''],$token_price,$complete,$tokens_amount,$tokens_amount_bonus,$payment_id,$product['id'])));

#Транзакция успешна
if($complete=='1'){

#Получаем балансы и id реферера покупателя
$query_user = $db->prepare("SELECT referrer, referral_link, balance FROM users WHERE id = ? AND product_id = ?");
$query_user->execute(array($user_id,$product['id']));
$user_row=$query_user->fetch(\PDO::FETCH_ASSOC);
$referrer_id=$user_row['referrer'];
$referral_link=$user_row['referral_link'];
if($user_row['balance']==0){$referrals_buyers='1';}else{$referrals_buyers='0';}

#Зачислить токены на счет покупателя
$query = $db->prepare("UPDATE users SET balance = (balance + ?), balance_bonus = (balance_bonus + ?) WHERE id = ? AND product_id = ?");
$query->execute(array_values(array($tokens_amount,$tokens_amount_bonus,$user_id,$product['id'])));

#Реферальная система
if($referrer_id!=''){
$query = $db->prepare("SELECT id FROM users WHERE id = ? AND product_id = ?");
$query->execute(array($referrer_id,$product['id']));
if($query->rowCount()>0){

#Зачислить бонусные токены на счет реферера
$query = $db->prepare("UPDATE users SET balance_referrer = (balance_referrer + ?) WHERE id = ? AND product_id = ?");
$query->execute(array_values(array($tokens_amount_referrer,$referrer_id,$product['id'])));

$query = $db->prepare("INSERT INTO payments (uid, referral_transaction, wallet_address, transaction_id, amount, amounti, fee, feei, confirms, currency, status, status_text, exchange_rate, token_price, complete, tokens_amount, system, conversion, time, product_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$query->execute(array($referrer_id,$payment_id,$wallet_address,$transaction_id,$amount,$amounti,$fee,$feei,$confirms,$currency,$status,$status_text,$currency_to[''.$currency.''],$token_price,'1',$tokens_amount_referrer,'referrer',$conversion,time(),$product['id']));
}else{$tokens_amount_referrer=0;}
}else{$tokens_amount_referrer=0;}

#Если пользователь зарегистрирован по созданной реферальной ссылке
if($referral_link!=''){
$query = $db->prepare("SELECT id FROM referral_links WHERE link = ? AND product_id = ?");
$query->execute(array($referral_link,$product['id']));
if($query->rowCount()>0){

if($referrals_buyers>0){
$query = $db->prepare("UPDATE referral_links SET referrals_buyers = (referrals_buyers + ?) WHERE id = ? AND product_id = ?");
$query->execute(array_values(array($referrals_buyers,$referrer_id,$product['id'])));}

$query = $db->prepare("UPDATE payments SET referral_link = ? WHERE id = ? AND product_id = ?");
$query->execute(array_values(array($referral_link,$payment_id,$product['id'])));

}}


#Обновить счетчик сбора USD, количество проданных токенов, бонусных токенов и реферальных токенов
$query = $db->prepare("UPDATE products SET usd_raised = (usd_raised + ?), eth_raised = (eth_raised + ?), tokens_sold = (tokens_sold + ?), tokens_bonus = (tokens_bonus + ?), tokens_referrer = (tokens_referrer + ?) WHERE id = ?");
$query->execute(array_values(array($usd_raised,$eth_raised,$tokens_amount,$tokens_amount_bonus,$tokens_amount_referrer,$product['id'])));

}

exit;}

}

file_put_contents('debug.txt', print_r(array($user_id,$wallet_address,$transaction_id,$amount,$amounti,$fee,$feei,$confirms,$currency,$status,$status_text,$currency_to[''.$currency.''],$token_price,$tokens_amount,'cryptocurrency',$conversion,time(),$product['id']),true), FILE_APPEND);

$query = $db->prepare("INSERT INTO payments (uid, wallet_address, transaction_id, amount, amounti, fee, feei, confirms, currency, status, status_text, exchange_rate, token_price, tokens_amount, system, conversion, time, product_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$query->execute(array($user_id,$wallet_address,$transaction_id,$amount,$amounti,$fee,$feei,$confirms,$currency,$status,$status_text,$currency_to[''.$currency.''],$token_price,$tokens_amount,'cryptocurrency',$conversion,time(),$product['id']));
?>