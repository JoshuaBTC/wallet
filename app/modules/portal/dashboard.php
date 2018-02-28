<?php
if(!isset($settings) || !$logged_in['flag'] || $module!='dashboard'){header('location: /');exit;}

#BEGIN etherscan api
if(time()>($user['ethereum_balance_timestamp']+600) && $user['ethereum_address_provided']=='1'){
$data_balance=file_get_contents('https://api.etherscan.io/api?module=account&action=tokenbalance&tag=latest&contractaddress='.$product['smartcontract_address'].'&address='.$user['ethereum_address'].'&apikey='.$product['etherscan_api_key'].'');
if($data_balance!==false){
$array_balance=json_decode($data_balance, true);
if(is_numeric($array_balance['result']) && $user['ethereum_balance']!=$array_balance['result']){
$query = $db->prepare("UPDATE users SET ethereum_balance = ?, ethereum_balance_timestamp = ? WHERE id = ?");
$query->execute(array_values(array(substr($array_balance['result'],0,-$product['token_decimals']),time(),$user['id'])));$user['ethereum_balance']=substr($array_balance['result'],0,-$product['token_decimals']);
}}}
#END etherscan api
?>
	<div class="wrapper">
		<div class="container">
			<form class="form form--portal-big">
				<div class="form__content">
					<div class="form__title"> <span><?=$lng['menu_main']?></span></div>
					<div class="form__black form__full black-data">
						<div class="black-data__text"><?=$lng['token_balance']?></div>
						<div class="black-data__value"><?=round(($user['balance']+$user['balance_bonus']+$user['balance_referrer']),4)?></div>
						<img class="black-data__logo" src="/assets/products/<?=$product['id']?>/logo_white.png" srcset="/assets/products/<?=$product['id']?>/logo_white@2x.png 2x" alt="" />
					</div>
					<div class="clearfix">
						<div class="form__row form__full form__row--grey" style="border-top: 0px;">
							<div class="row">
								<div class="col-sm-8">
									<div class="form__text form__text--sm form__text--grey"><?=$lng['affiliate_link']?></div>
									<div class="form__text"> <a class="link form__link" href="<?=$product['url_main']?>?ref=<?=$user['id']?>" target="_blank"><?=$product['url_main']?>?ref=<?=$user['id']?></a>
									</div>
								</div>
								<div class="col-sm-4 form__right">
									<a class="js-copy btn btn--sm btn--transparent btn--copy" href="#" data-clipboard-text="<?=$product['url_main']?>?ref=<?=$user['id']?>"> <span><?=$lng['button_copy']?></span>
									</a>
								</div>
							</div>
						</div>
						<div class="form__row form__full" style="border-top: 0px;">
							<div class="row">
								<div class="col-sm-8">
									<div class="form__text" style="font-size: 20px;opacity: 0.54;"><?=$lng['invested']?></div>
								</div>
								<div class="col-sm-4 form__right">
									<div class="portal-value"><?=round($user['balance'],4)?></div>
								</div>
							</div>
						</div>
						<div class="form__row form__full">
							<div class="row">
								<div class="col-sm-8">
									<div class="form__text" style="font-size: 20px;opacity: 0.54;"><?=$lng['bonus']?></div>
								</div>
								<div class="col-sm-4 form__right">
									<div class="portal-value"><?=round($user['balance_bonus'],4)?></div>
								</div>
							</div>
						</div>
						<?php if($user['ethereum_balance']>0){?>
						<div class="form__row form__full">
							<div class="row">
								<div class="col-sm-8">
									<div class="form__text" style="font-size: 20px;opacity: 0.54;"><?=$lng['in_ethereum']?></div>
								</div>
								<div class="col-sm-4 form__right">
									<div class="portal-value"><?=round($user['ethereum_balance'],4)?></div>
								</div>
							</div>
						</div>
						<?php }?>
						<div class="form__row form__full">
							<div class="row">
								<div class="col-sm-5">
									<div class="form__text" style="font-size: 20px;"><?=$lng['invested_total']?></div>
								</div>
								<div class="col-sm-7 form__right">
									<div class="portal-value portal-value--other portal-value--usd" style="font-size: 20px;">$<?=number_format($product['usd_raised']+$product['other_raised']+($product['eth_raised_smartcontract']*$currency_to_usd['ETH'])+($product['eth_raised']*$currency_to_usd['ETH']), 0, '.', ',')?></div>
									<!--<div class="portal-value portal-value--other portal-value--eth"><?=number_format($product['eth_raised_smartcontract'], 2, '.', '.')?> ETH</div>-->
								</div>
							</div>
						</div>
					</div>
					<div class="text--center"><a class="btn btn--buy text--center" href="/buy/"><?=$lng['button_buy']?></a></div>
				</div>
			</form>
		</div>

<?php
$query = $db->prepare("SELECT id, transaction_id, time, status, system, currency, tokens_amount, tokens_amount_bonus, amount FROM payments WHERE uid = ? OR wallet_address = ? ORDER BY id DESC");
$query->execute(array($user['id'],$user['ethereum_address']));
if($query->rowCount()==0){echo'<div class="well"><div class="well__title">'.$lng['orders_title'].'</div><div class="text--center"><span class="well__btn well__btn--disabled">'.$lng['no_transactions'].'</span></div></div>';}else{?>
		<div class="well">
			<div class="well__title"><?=$lng['orders_title']?></div>
			<div class="table">
				<table>
					<thead>
						<tr>
							<th><?=$lng['orders_time']?></th>
							<th><?=$lng['orders_id']?></th>
							<th><?=$lng['orders_status']?></th>
							<th><?=$lng['orders_system']?></th>
							<th><?=$product['token_name']?></th>
							<th><?=$lng['orders_price']?></th>
						</tr>
					</thead>
					<tbody>
<?php
while($row=$query->fetch(\PDO::FETCH_ASSOC)){

if($row['status']>=100 || $row['status']==2){
$tx_color='green';$tx_status=$lng['transaction_completed'];
}else if($row['status']<0){
$tx_color='red';$tx_status=$lng['transaction_cancelled'];
}else{
$tx_color='yellow';$tx_status=$lng['transaction_pending'];
}

if($row['system']=='smartcontract'){$tokens_amount='<td><a class="link" href="https://etherscan.io/tx/'.$row['transaction_id'].'" target="_blank" rel="nofollow">'.$lng['view_on_etherscan'].'</a></td>';}else{$tokens_amount='<td><span class="portal-value portal-value--sm">'.$row['tokens_amount'].'</span></td>';}
echo'<tr><td>'.date('d/m/Y H:i',$row['time']).'</td><td><a class="link txinfo" href="#transaction" data-time="'.date('d/m/Y H:i',$row['time']).'" data-system="'.$lng['payment_'.$row['system'].''].'" data-id="#'.$row['id'].'" data-status="'.$tx_status.'" data-color="'.$tx_color.'" data-bonus="'.$row['tokens_amount_bonus'].'" data-tokens="'.$row['tokens_amount'].'" data-amount="'.$row['amount'].' '.$row['currency'].'">#'.$row['id'].'</a></td><td><span class="'.$tx_color.'">'.$tx_status.'</span></td><td>'.$lng['payment_'.$row['system'].''].'</td>'.$tokens_amount.'<td>'.$row['amount'].' '.$row['currency'].'</td></tr>';}
?>				
					</tbody>
				</table>
			</div>
		</div>
<?php }?>

	</div>
		
	<div class="remodal" data-remodal-id="transaction">
		<div class="popup">
			<div class="popup__header">
				<div class="popup__title"><?=$lng['transaction_title']?></div>
				<div class="popup__text text--center" id="tx-time"></div>
			</div>
			<div class="popup__content">
				<div class="popup__row">
					<div class="row">
						<div class="col-md-6"><?=$lng['orders_system']?></div>
						<div class="col-md-6">
							<div class="popup__right" id="tx-system"></div>
						</div>
					</div>
				</div>
				<div class="popup__row">
					<div class="row">
						<div class="col-md-6"><?=$lng['orders_id']?></div>
						<div class="col-md-6">
							<div class="popup__right" id="tx-id"></div>
						</div>
					</div>
				</div>
				<div class="popup__row">
					<div class="row">
						<div class="col-md-6"><?=$lng['orders_status']?></div>
						<div class="col-md-6">
							<div class="popup__right"><div id="tx-status"></div></div>
						</div>
					</div>
				</div>
				<div class="popup__row popup__row--portal" id="tx-bonus-div">
					<div class="row">
						<div class="col-md-6"><?=$lng['bonus_tokens']?></div>
						<div class="col-md-6">
							<div class="popup__right">
								<div class="portal-value" id="tx-bonus"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="popup__row popup__row--portal">
					<div class="row">
						<div class="col-md-6"><?=$product['token_name']?></div>
						<div class="col-md-6">
							<div class="popup__right">
								<div class="portal-value" id="tx-tokens"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="popup__row popup__row--portal">
					<div class="row">
						<div class="col-md-6"><?=$lng['transaction_total']?></div>
						<div class="col-md-6">
							<div class="popup__right">
								<div class="portal-value portal-value--other portal-value--usd" style="font-size: 20px;" id="tx-amount"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="popup__footer text--center">
				<p class="text"><?=$lng['transaction_support']?></p><a class="btn btn--buy" href="/support/"><?=$lng['button_ticket']?></a>
			</div>
		</div>
	</div>
<?php require 'modules/footer.php';?>