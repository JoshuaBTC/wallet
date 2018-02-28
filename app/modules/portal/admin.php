<?php
if(!isset($settings) || $module!='admin' || !$logged_in['flag'] || $user['admin']!='1'){header('location: /');exit;}
?>
<style type="text/css">
body {
  overflow-x: auto !important;
}
</style>

	<div class="form form--portal-big form--lg" style="max-width:none;">
		<div class="form__content">
			<div class="form__title form__title--2"><?=$lng['admin_panel']?></div>
					<div class="message message--error message--form" id="admin-error" style="display: none;"></div>
					<div class="message message--success message--form" id="admin-success" style="display: none;"></div>
			<ul class="tabs js-calc-tabs">
				<li class="tabs__item active"><a class="tabs__link" href="#main" data-toggle="tab"><?=$lng['admin_tab_main']?></a></li>
				<li class="tabs__item"><a class="tabs__link" href="#settings" data-toggle="tab"><?=$lng['admin_tab_settings']?></a></li>
				<!--<li class="tabs__item"><a class="tabs__link" href="#payments" data-toggle="tab"><?=$lng['admin_tab_payments']?></a></li>-->
				<li class="tabs__item"><a class="tabs__link" href="#users" data-toggle="tab"><?=$lng['admin_tab_users']?></a></li>
				<li class="tabs__item"><a class="tabs__link" href="#tokens" data-toggle="tab"><?=$lng['admin_tab_tokens']?></a></li>
				<li class="tabs__item"><a class="tabs__link" href="#referral" data-toggle="tab"><?=$lng['admin_tab_referral']?></a></li>
				<li class="tabs__item"><a class="tabs__link" href="#support" data-toggle="tab"><?=$lng['admin_tab_support']?></a></li>
				<li class="tabs__item"><a class="tabs__link" href="#stats" data-toggle="tab"><?=$lng['admin_tab_stats']?></a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane js-calc-tab fade in active" id="main">
				<form class="form" id="admin_main-form" method="post" action="" novalidate="novalidate">
				<input type="hidden" name="do" value="admin_main">
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_name']?></label>
						<input class="form__input" name="name" value="<?=$product['name']?>" placeholder="<?=$lng['admin_name']?>" />
						<span id="admin-name-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_short_name']?></label>
						<input class="form__input" name="short_name" value="<?=$product['short_name']?>" placeholder="<?=$lng['admin_short_name']?>" />
						<span id="admin-short_name-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_url']?></label>
						<input class="form__input" name="url" value="<?=$product['url']?>" placeholder="<?=$lng['admin_placeholder_url']?>" />
						<span id="admin-url-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_url_main']?></label>
						<input class="form__input" name="url_main" value="<?=$product['url_main']?>" placeholder="<?=$lng['admin_placeholder_url']?>" />
						<span id="admin-url_main-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_user_agreement']?></label>
						<input class="form__input" name="user_agreement" value="<?=$product['user_agreement']?>" placeholder="<?=$lng['admin_placeholder_url']?>" />
						<span id="admin-user_agreement-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_footer_copyright']?></label>
						<input class="form__input" name="footer_copyright" value="<?=$product['footer_copyright']?>" placeholder="<?=$lng['admin_footer_copyright']?>" />
						<span id="admin-footer_copyright-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_token_name']?></label>
						<input class="form__input" name="token_name" value="<?=$product['token_name']?>" placeholder="<?=$lng['admin_token_name']?>" />
						<span id="admin-token_name-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_smtp_host']?></label>
						<input class="form__input" name="smtp_host" value="<?=$product['smtp_host']?>" placeholder="<?=$lng['admin_smtp_host']?>" />
						<span id="admin-smtp_host-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_email']?></label>
						<input class="form__input" name="email" value="<?=$product['email']?>" placeholder="<?=$lng['admin_placeholder_email']?>" />
						<span id="admin-email-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_smtp_password']?></label>
						<input class="form__input" name="smtp_password" value="<?=$product['smtp_password']?>" placeholder="<?=$lng['admin_smtp_password']?>" />
						<span id="admin-smtp_password-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_smtp_security']?></label>
						<div class="select"><select class="form__input" name="smtp_security"><option value="ssl"<?php if($product['smtp_security']=='ssl'){echo' selected="selected"';}?>>SSL</option><option value="tls"<?php if($product['smtp_security']=='tls'){echo' selected="selected"';}?>>TLS</option></select></div>
						<span id="admin-smtp_security-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_smtp_port']?></label>
						<input class="form__input" name="smtp_port" value="<?=$product['smtp_port']?>" placeholder="<?=$lng['admin_smtp_port']?>" />
						<span id="admin-smtp_port-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_smartcontract_address']?></label>
						<input class="form__input" name="smartcontract_address" value="<?=$product['smartcontract_address']?>" placeholder="<?=$lng['admin_placeholder_ethereum']?>" />
						<span id="admin-smartcontract_address-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_smartcontract_creator']?></label>
						<input class="form__input" name="smartcontract_creator" value="<?=$product['smartcontract_creator']?>" placeholder="<?=$lng['admin_placeholder_ethereum']?>" />
						<span id="admin-smartcontract_creator-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_token_decimals']?></label>
						<input class="form__input" name="token_decimals" value="<?=$product['token_decimals']?>" placeholder="<?=$lng['admin_token_decimals']?>" />
						<span id="admin-token_decimals-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_coinpayments_public_key']?></label>
						<input class="form__input" name="coinpayments_public_key" value="<?=$product['coinpayments_public_key']?>" placeholder="<?=$lng['admin_coinpayments_public_key']?>" />
						<span id="admin-coinpayments_public_key-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_coinpayments_private_key']?></label>
						<input class="form__input" name="coinpayments_private_key" value="<?=$product['coinpayments_private_key']?>" placeholder="<?=$lng['admin_coinpayments_private_key']?>" />
						<span id="admin-coinpayments_private_key-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_coinpayments_ipn_secret']?></label>
						<input class="form__input" name="coinpayments_ipn_secret" value="<?=$product['coinpayments_ipn_secret']?>" placeholder="<?=$lng['admin_coinpayments_ipn_secret']?>" />
						<span id="admin-coinpayments_ipn_secret-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_coinpayments_merchant_id']?></label>
						<input class="form__input" name="coinpayments_merchant_id" value="<?=$product['coinpayments_merchant_id']?>" placeholder="<?=$lng['admin_coinpayments_merchant_id']?>" />
						<span id="admin-coinpayments_merchant_id-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_etherscan_api_key']?></label>
						<input class="form__input" name="etherscan_api_key" value="<?=$product['etherscan_api_key']?>" placeholder="<?=$lng['admin_etherscan_api_key']?>" />
						<span id="admin-etherscan_api_key-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_twitter_consumer_key']?></label>
						<input class="form__input" name="twitter_consumer_key" value="<?=$product['twitter_consumer_key']?>" placeholder="<?=$lng['admin_twitter_consumer_key']?>" />
						<span id="admin-twitter_consumer_key-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_twitter_consumer_secret']?></label>
						<input class="form__input" name="twitter_consumer_secret" value="<?=$product['twitter_consumer_secret']?>" placeholder="<?=$lng['admin_twitter_consumer_secret']?>" />
						<span id="admin-twitter_consumer_secret-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_facebook_app_id']?></label>
						<input class="form__input" name="facebook_app_id" value="<?=$product['facebook_app_id']?>" placeholder="<?=$lng['admin_facebook_app_id']?>" />
						<span id="admin-facebook_app_id-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_facebook_app_secret']?></label>
						<input class="form__input" name="facebook_app_secret" value="<?=$product['facebook_app_secret']?>" placeholder="<?=$lng['admin_facebook_app_secret']?>" />
						<span id="admin-facebook_app_secret-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"></label>
						<label class="form__checkbox" style="text-align: start;"><input type="checkbox" name="google_oauth" value="1"<?php if($product['google_oauth']=='1'){echo' checked="checked"';}?>><span></span><?=$lng['admin_google_oauth']?></label>
						<span id="admin-google_oauth-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_recaptcha_site_key']?></label>
						<input class="form__input" name="recaptcha_site_key" value="<?=$product['recaptcha_site_key']?>" placeholder="<?=$lng['admin_recaptcha_site_key']?>" />
						<span id="admin-recaptcha_site_key-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_recaptcha_secret']?></label>
						<input class="form__input" name="recaptcha_secret" value="<?=$product['recaptcha_secret']?>" placeholder="<?=$lng['admin_recaptcha_secret']?>" />
						<span id="admin-recaptcha_secret-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"></label>
						<label class="form__checkbox" style="text-align: start;"><input type="checkbox" name="captcha_enabled" value="1"<?php if($product['captcha_enabled']=='1'){echo' checked="checked"';}?>><span></span><?=$lng['admin_captcha_enabled']?></label>
						<span id="admin-captcha_enabled-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label">Bitcointalk</label>
						<input class="form__input" name="bitcointalk" value="<?=$product['bitcointalk']?>" placeholder="<?=$lng['admin_placeholder_url']?>" />
						<span id="admin-bitcointalk-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label">Facebook</label>
						<input class="form__input" name="facebook" value="<?=$product['facebook']?>" placeholder="<?=$lng['admin_placeholder_url']?>" />
						<span id="admin-facebook-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label">Twitter</label>
						<input class="form__input" name="twitter" value="<?=$product['twitter']?>" placeholder="<?=$lng['admin_placeholder_url']?>" />
						<span id="admin-twitter-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label">Telegram</label>
						<input class="form__input" name="telegram" value="<?=$product['telegram']?>" placeholder="<?=$lng['admin_placeholder_url']?>" />
						<span id="admin-telegram-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label">VK</label>
						<input class="form__input" name="vk" value="<?=$product['vk']?>" placeholder="<?=$lng['admin_placeholder_url']?>" />
						<span id="admin-vk-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label">Youtube</label>
						<input class="form__input" name="youtube" value="<?=$product['youtube']?>" placeholder="<?=$lng['admin_placeholder_url']?>" />
						<span id="admin-youtube-error" class="form__error" style="display: none;"></span>
					</div>
				<div class="text--center">
					<div class="m-spinner m-spinner--auth m-spinner--lg" id="admin_main-loading" style="display: none;"></div>
					<button class="btn" type="button" id="admin_main-button"><?=$lng['button_save']?></button>
				</div>
				</form>
				</div>
				<div class="tab-pane js-calc-tab fade in" id="settings">
				<form class="form" id="admin_settings-form" method="post" action="" novalidate="novalidate">
				<input type="hidden" name="do" value="admin_settings">
					<div class="form__group"></div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_token_price']?></label>
						<input class="form__input" name="token_price" value="<?=$product['token_price']?>" placeholder="<?=$lng['admin_token_price']?>" />
						<span id="admin-token_price-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_token_price_eth']?></label>
						<input class="form__input" name="token_price_eth" value="<?=$product['token_price_eth']?>" placeholder="<?=$lng['admin_placeholder_token_price_eth']?>" />
						<span id="admin-token_price_eth-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_other_raised']?></label>
						<input class="form__input" name="other_raised" value="<?=$product['other_raised']?>" placeholder="<?=$lng['admin_other_raised']?>" />
						<span id="admin-other_raised-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_bonus_percent']?></label>
						<input class="form__input" name="bonus_percent" value="<?=$product['bonus_percent']?>" placeholder="<?=$lng['admin_bonus_percent']?>" />
						<span id="admin-bonus_percent-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_referral_percent']?></label>
						<input class="form__input" name="referral_percent" value="<?=$product['referral_percent']?>" placeholder="<?=$lng['admin_referral_percent']?>" />
						<span id="admin-referral_percent-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_signup_tokens']?></label>
						<input class="form__input" name="signup_tokens" value="<?=$product['signup_tokens']?>" placeholder="<?=$lng['admin_signup_tokens']?>" />
						<span id="admin-signup_tokens-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_support_email']?></label>
						<input class="form__input" name="support_email" value="<?=$product['support_email']?>" placeholder="<?=$lng['admin_placeholder_email']?>" />
						<span id="admin-support_email-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"></label>
						<label class="form__checkbox" style="text-align: start;"><input type="checkbox" name="email_activation" value="1"<?php if($product['email_activation']=='1'){echo' checked="checked"';}?>><span></span><?=$lng['admin_email_activation']?></label>
						<span id="admin-email_activation-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"></label>
						<label class="form__checkbox" style="text-align: start;"><input type="checkbox" name="ethereum_field_required" value="1"<?php if($product['ethereum_field_required']=='1'){echo' checked="checked"';}?>><span></span><?=$lng['admin_ethereum_field_required']?></label>
						<span id="admin-ethereum_field_required-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_currency']?></label>
						<?php foreach($currency_settings as $letters=>$enabled){?>
						<label class="form__checkbox" style="text-align: start;"><input type="checkbox" name="currency_<?=$letters?>" value="1"<?php if($enabled=='1'){echo' checked="checked"';}?>><span></span><?=$currency_names[$letters]?> (<?=$letters?>)</label>
						<?php }?>
						<span id="admin-currency-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_SBD_wallet']?></label>
						<input class="form__input" name="SBD_wallet" value="<?=$product['SBD_wallet']?>" placeholder="<?=$lng['admin_SBD_wallet']?>" />
						<span id="admin-SBD_wallet-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_GOLOS_wallet']?></label>
						<input class="form__input" name="GOLOS_wallet" value="<?=$product['GOLOS_wallet']?>" placeholder="<?=$lng['admin_GOLOS_wallet']?>" />
						<span id="admin-GOLOS_wallet-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_BTS_wallet']?></label>
						<input class="form__input" name="BTS_wallet" value="<?=$product['BTS_wallet']?>" placeholder="<?=$lng['admin_BTS_wallet']?>" />
						<span id="admin-BTS_wallet-error" class="form__error" style="display: none;"></span>
					</div>
				<div class="text--center">
					<div class="m-spinner m-spinner--auth m-spinner--lg" id="admin_settings-loading" style="display: none;"></div>
					<button class="btn" type="button" id="admin_settings-button"><?=$lng['button_save']?></button>
				</div>
				</form>
				</div>
				<div class="tab-pane js-calc-tab fade in" id="payments">
					<div class="form__group"></div>
					На данный момент этот раздел не готов и находится разработке.
				</div>
				<div class="tab-pane js-calc-tab fade in" id="users">
					<div class="form__group"></div>
<?php
$query = $db->prepare("SELECT id, time, email, oauth_email, country_code, ethereum_balance, balance, balance_bonus, balance_referrer, SBD_address_provided, GOLOS_address_provided, BTS_address_provided FROM users WHERE isactive = ? AND admin = ? AND (balance > ? OR balance_bonus > ? OR balance_referrer > ?) AND product_id = ? ORDER BY id DESC");
$query->execute(array('1','0','1','1','1',$product['id']));
if($query->rowCount()==0){echo'<div class="well"><div class="well__title">'.$lng['admin_tab_users'].'</div><div class="text--center"><span class="well__btn well__btn--disabled">'.$lng['userlist_no_users'].'</span></div></div>';}else{?>
		<div class="well">
			<div class="well__title"><?=$lng['admin_tab_users']?> <?=$lng['admin_users_investors']?></div>
			<div class="table">
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th><?=$lng['userlist_time']?></th>
							<th><?=$lng['userlist_email']?></th>
							<th><?=$lng['userlist_country_code']?></th>
							<th><?=$lng['tab_ethereum_address']?></th>
							<?php if($currency_settings['SBD']=='1'){echo'<th>SBD</th>';}?>
							<?php if($currency_settings['GOLOS']=='1'){echo'<th>GOLOS</th>';}?>
							<?php if($currency_settings['BTS']=='1'){echo'<th>BTS</th>';}?>
							<th><?=$lng['userlist_ethereum_balance']?></th>
							<th><?=$lng['userlist_overall_balance']?></th>
							<th>Twitter</th>
							<th>Facebook ID</th>
						</tr>
					</thead>
					<tbody>
<?php
while($row=$query->fetch(\PDO::FETCH_ASSOC)){

#Кошельки пользователя
if($row['ethereum_address_provided']=='0'){$row['ethereum_address']='';}
if($row['SBD_address_provided']=='0'){$row['SBD_address']='';}
if($row['GOLOS_address_provided']=='0'){$row['GOLOS_address']='';}
if($row['BTS_address_provided']=='0'){$row['BTS_address']='';}

#Ссылки на социальные сети
if($row['twitter_username']!=''){$twitter='<a href="https://twitter.com/'.$row['twitter_username'].'" target="_blank" rel="nofollow">'.$row['twitter_username'].'</a>';}
if($row['oauth_facebook']!=''){$facebook='<a href="https://facebook.com/'.$row['oauth_facebook'].'" target="_blank" rel="nofollow">'.$row['oauth_facebook'].'</a>';}

$wallets_add='';

if($row['ethereum_address_provided']=='1'){
$query = $db->prepare("SELECT wallet_address FROM user_wallets WHERE uid = ? AND currency = ? AND product_id = ? ORDER BY id DESC");
$query->execute(array($row['id'],'ETH',$product['id']));
$wallets_add.='<td>'.$query->fetch(\PDO::FETCH_ASSOC)['wallet_address'].'</td>';}else{$wallets_add.='<td></td>';}

if($currency_settings['SBD']=='1'){
if($row['SBD_address_provided']=='1'){
$query = $db->prepare("SELECT wallet_address FROM user_wallets WHERE uid = ? AND currency = ? AND product_id = ? ORDER BY id DESC");
$query->execute(array($row['id'],'SBD',$product['id']));
$wallets_add.='<td>'.$query->fetch(\PDO::FETCH_ASSOC)['wallet_address'].'</td>';}else{$wallets_add.='<td></td>';}
}

if($currency_settings['GOLOS']=='1'){
if($row['GOLOS_address_provided']=='1'){
$query = $db->prepare("SELECT wallet_address FROM user_wallets WHERE uid = ? AND currency = ? AND product_id = ? ORDER BY id DESC");
$query->execute(array($row['id'],'GOLOS',$product['id']));
$wallets_add.='<td>'.$query->fetch(\PDO::FETCH_ASSOC)['wallet_address'].'</td>';}else{$wallets_add.='<td></td>';}
}

if($currency_settings['BTS']=='1'){
if($row['BTS_address_provided']=='1'){
$query = $db->prepare("SELECT wallet_address FROM user_wallets WHERE uid = ? AND currency = ? AND product_id = ? ORDER BY id DESC");
$query->execute(array($row['id'],'BTS',$product['id']));
$wallets_add.='<td>'.$query->fetch(\PDO::FETCH_ASSOC)['wallet_address'].'</td>';}else{$wallets_add.='<td></td>';}
}

if($row['email']==''){$row['email']=$row['oauth_email'];}

echo'<tr><td>'.$row['id'].'</td><td>'.date('d/m/Y H:i',$row['time']).'</td><td>'.$row['email'].'</td><td>'.$row['country_code'].'</td>'.$wallets_add.'<td><span class="portal-value portal-value--sm">'.$row['ethereum_balance'].'</span></td><td><span class="portal-value portal-value--sm">'.round(($row['balance']+$row['balance_bonus']+$row['balance_referrer']),4).'</span></td><td>'.$twitter.'</td><td>'.$facebook.'</td></tr>';}
?>				
					</tbody>
				</table>
			</div>
		</div>
<?php }?>

<?php
$query = $db->prepare("SELECT id, time, email, oauth_email, country_code, ethereum_balance, balance, balance_bonus, balance_referrer, SBD_address_provided, GOLOS_address_provided, BTS_address_provided FROM users WHERE isactive = ? AND admin = ? AND product_id = ? ORDER BY id DESC");
$query->execute(array('1','0',$product['id']));
if($query->rowCount()==0){echo'<div class="well"><div class="well__title">'.$lng['admin_tab_users'].' (all users)</div><div class="text--center"><span class="well__btn well__btn--disabled">'.$lng['userlist_no_users'].'</span></div></div>';}else{?>
		<div class="well">
			<div class="well__title"><?=$lng['admin_tab_users']?> <?=$lng['admin_users_all']?></div>
			<div class="table">
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th><?=$lng['userlist_time']?></th>
							<th><?=$lng['userlist_email']?></th>
							<th><?=$lng['userlist_country_code']?></th>
							<th><?=$lng['tab_ethereum_address']?></th>
							<?php if($currency_settings['SBD']=='1'){echo'<th>SBD</th>';}?>
							<?php if($currency_settings['GOLOS']=='1'){echo'<th>GOLOS</th>';}?>
							<?php if($currency_settings['BTS']=='1'){echo'<th>BTS</th>';}?>
							<th><?=$lng['userlist_ethereum_balance']?></th>
							<th><?=$lng['userlist_overall_balance']?></th>
							<th>Twitter</th>
							<th>Facebook ID</th>
						</tr>
					</thead>
					<tbody>
<?php
while($row=$query->fetch(\PDO::FETCH_ASSOC)){

#Кошельки пользователя
if($row['ethereum_address_provided']=='0'){$row['ethereum_address']='';}
if($row['SBD_address_provided']=='0'){$row['SBD_address']='';}
if($row['GOLOS_address_provided']=='0'){$row['GOLOS_address']='';}
if($row['BTS_address_provided']=='0'){$row['BTS_address']='';}

#Ссылки на социальные сети
if($row['twitter_username']!=''){$twitter='<a href="https://twitter.com/'.$row['twitter_username'].'" target="_blank" rel="nofollow">'.$row['twitter_username'].'</a>';}
if($row['oauth_facebook']!=''){$facebook='<a href="https://facebook.com/'.$row['oauth_facebook'].'" target="_blank" rel="nofollow">'.$row['oauth_facebook'].'</a>';}

$wallets_add='';

if($row['ethereum_address_provided']=='1'){
$query = $db->prepare("SELECT wallet_address FROM user_wallets WHERE uid = ? AND currency = ? AND product_id = ? ORDER BY id DESC");
$query->execute(array($row['id'],'ETH',$product['id']));
$wallets_add.='<td>'.$query->fetch(\PDO::FETCH_ASSOC)['wallet_address'].'</td>';}else{$wallets_add.='<td></td>';}

if($currency_settings['SBD']=='1'){
if($row['SBD_address_provided']=='1'){
$query = $db->prepare("SELECT wallet_address FROM user_wallets WHERE uid = ? AND currency = ? AND product_id = ? ORDER BY id DESC");
$query->execute(array($row['id'],'SBD',$product['id']));
$wallets_add.='<td>'.$query->fetch(\PDO::FETCH_ASSOC)['wallet_address'].'</td>';}else{$wallets_add.='<td></td>';}
}

if($currency_settings['GOLOS']=='1'){
if($row['GOLOS_address_provided']=='1'){
$query = $db->prepare("SELECT wallet_address FROM user_wallets WHERE uid = ? AND currency = ? AND product_id = ? ORDER BY id DESC");
$query->execute(array($row['id'],'GOLOS',$product['id']));
$wallets_add.='<td>'.$query->fetch(\PDO::FETCH_ASSOC)['wallet_address'].'</td>';}else{$wallets_add.='<td></td>';}
}

if($currency_settings['BTS']=='1'){
if($row['BTS_address_provided']=='1'){
$query = $db->prepare("SELECT wallet_address FROM user_wallets WHERE uid = ? AND currency = ? AND product_id = ? ORDER BY id DESC");
$query->execute(array($row['id'],'BTS',$product['id']));
$wallets_add.='<td>'.$query->fetch(\PDO::FETCH_ASSOC)['wallet_address'].'</td>';}else{$wallets_add.='<td></td>';}
}

if($row['email']==''){$row['email']=$row['oauth_email'];}

echo'<tr><td>'.$row['id'].'</td><td>'.date('d/m/Y H:i',$row['time']).'</td><td>'.$row['email'].'</td><td>'.$row['country_code'].'</td>'.$wallets_add.'<td><span class="portal-value portal-value--sm">'.$row['ethereum_balance'].'</span></td><td><span class="portal-value portal-value--sm">'.round(($row['balance']+$row['balance_bonus']+$row['balance_referrer']),4).'</span></td><td>'.$twitter.'</td><td>'.$facebook.'</td></tr>';}
?>				
					</tbody>
				</table>
			</div>
		</div>
<?php }?>

<?php
$query = $db->prepare("SELECT id, time, email, oauth_email, country_code, ethereum_balance, balance, balance_bonus, balance_referrer, SBD_address_provided, GOLOS_address_provided, BTS_address_provided FROM users WHERE isactive = ? AND admin = ? AND product_id = ? ORDER BY id DESC");
$query->execute(array('0','0',$product['id']));
if($query->rowCount()==0){echo'<div class="well"><div class="well__title">'.$lng['admin_tab_users'].' (not activated)</div><div class="text--center"><span class="well__btn well__btn--disabled">'.$lng['userlist_no_users'].'</span></div></div>';}else{?>
		<div class="well">
			<div class="well__title"><?=$lng['admin_tab_users']?> <?=$lng['admin_users_noactive']?></div>
			<div class="table">
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th><?=$lng['userlist_time']?></th>
							<th><?=$lng['userlist_email']?></th>
							<th><?=$lng['userlist_country_code']?></th>
							<th><?=$lng['tab_ethereum_address']?></th>
							<?php if($currency_settings['SBD']=='1'){echo'<th>SBD</th>';}?>
							<?php if($currency_settings['GOLOS']=='1'){echo'<th>GOLOS</th>';}?>
							<?php if($currency_settings['BTS']=='1'){echo'<th>BTS</th>';}?>
							<th><?=$lng['userlist_ethereum_balance']?></th>
							<th><?=$lng['userlist_overall_balance']?></th>
							<th>Twitter</th>
							<th>Facebook ID</th>
						</tr>
					</thead>
					<tbody>
<?php
while($row=$query->fetch(\PDO::FETCH_ASSOC)){

#Кошельки пользователя
if($row['ethereum_address_provided']=='0'){$row['ethereum_address']='';}
if($row['SBD_address_provided']=='0'){$row['SBD_address']='';}
if($row['GOLOS_address_provided']=='0'){$row['GOLOS_address']='';}
if($row['BTS_address_provided']=='0'){$row['BTS_address']='';}

#Ссылки на социальные сети
if($row['twitter_username']!=''){$twitter='<a href="https://twitter.com/'.$row['twitter_username'].'" target="_blank" rel="nofollow">'.$row['twitter_username'].'</a>';}
if($row['oauth_facebook']!=''){$facebook='<a href="https://facebook.com/'.$row['oauth_facebook'].'" target="_blank" rel="nofollow">'.$row['oauth_facebook'].'</a>';}

$wallets_add='';

if($row['ethereum_address_provided']=='1'){
$query = $db->prepare("SELECT wallet_address FROM user_wallets WHERE uid = ? AND currency = ? AND product_id = ? ORDER BY id DESC");
$query->execute(array($row['id'],'ETH',$product['id']));
$wallets_add.='<td>'.$query->fetch(\PDO::FETCH_ASSOC)['wallet_address'].'</td>';}else{$wallets_add.='<td></td>';}

if($currency_settings['SBD']=='1'){
if($row['SBD_address_provided']=='1'){
$query = $db->prepare("SELECT wallet_address FROM user_wallets WHERE uid = ? AND currency = ? AND product_id = ? ORDER BY id DESC");
$query->execute(array($row['id'],'SBD',$product['id']));
$wallets_add.='<td>'.$query->fetch(\PDO::FETCH_ASSOC)['wallet_address'].'</td>';}else{$wallets_add.='<td></td>';}
}

if($currency_settings['GOLOS']=='1'){
if($row['GOLOS_address_provided']=='1'){
$query = $db->prepare("SELECT wallet_address FROM user_wallets WHERE uid = ? AND currency = ? AND product_id = ? ORDER BY id DESC");
$query->execute(array($row['id'],'GOLOS',$product['id']));
$wallets_add.='<td>'.$query->fetch(\PDO::FETCH_ASSOC)['wallet_address'].'</td>';}else{$wallets_add.='<td></td>';}
}

if($currency_settings['BTS']=='1'){
if($row['BTS_address_provided']=='1'){
$query = $db->prepare("SELECT wallet_address FROM user_wallets WHERE uid = ? AND currency = ? AND product_id = ? ORDER BY id DESC");
$query->execute(array($row['id'],'BTS',$product['id']));
$wallets_add.='<td>'.$query->fetch(\PDO::FETCH_ASSOC)['wallet_address'].'</td>';}else{$wallets_add.='<td></td>';}
}

if($row['email']==''){$row['email']=$row['oauth_email'];}

echo'<tr><td>'.$row['id'].'</td><td>'.date('d/m/Y H:i',$row['time']).'</td><td>'.$row['email'].'</td><td>'.$row['country_code'].'</td>'.$wallets_add.'<td><span class="portal-value portal-value--sm">'.$row['ethereum_balance'].'</span></td><td><span class="portal-value portal-value--sm">'.round(($row['balance']+$row['balance_bonus']+$row['balance_referrer']),4).'</span></td><td>'.$twitter.'</td><td>'.$facebook.'</td></tr>';}
?>				
					</tbody>
				</table>
			</div>
		</div>
<?php }?>
				</div>
				<div class="tab-pane js-calc-tab fade in" id="tokens">
				<form class="form" id="admin_search-form" method="post" action="" novalidate="novalidate">
				<input type="hidden" name="do" value="admin_search">
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_search_title']?></label>
						<input class="form__input" id="user_email" name="user_email" value="" placeholder="<?=$lng['admin_placeholder_email']?>" />
						<span id="admin-user_email-error" class="form__error" style="display: none;"></span>
					</div>
				<div class="text--center">
					<div class="m-spinner m-spinner--auth m-spinner--lg" id="admin_search-loading" style="display: none;"></div>
					<button class="btn" type="button" id="admin_search-button"><?=$lng['button_search']?></button>
				</div>
				</form>
				
				<form class="form" id="admin_tokens-form" method="post" action="" novalidate="novalidate">
				<input type="hidden" name="do" value="admin_tokens">
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_tokens_user_id']?></label>
						<input class="form__input" id="user_id" name="user_id" value="" placeholder="<?=$lng['admin_tokens_user_id_placeholder']?>" />
						<span id="admin-user_id-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_tokens_currency']?></label>
						<div class="select"><select class="form__input" id="currency_" name="currency_"><option value=""><?=$lng['admin_tokens_currency_placeholder']?></option><?php foreach($currency_settings as $letters=>$enabled){if($enabled=='1'){echo'<option value="'.$letters.'">'.$currency_names[$letters].' ('.$letters.')</option>';}}?><option value="USD">PayPal (USD)</option></select></div>
						<span id="admin-currency_-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_tokens_amount']?></label>
						<input class="form__input" id="amount" name="amount" value="" placeholder="<?=$lng['admin_tokens_amount_placeholder']?>" />
						<span id="admin-amount-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_tokens_tokens_amount']?></label>
						<input class="form__input" id="tokens_amount" name="tokens_amount" value="" placeholder="<?=$lng['admin_tokens_tokens_amount_placeholder']?>" />
						<span id="admin-tokens_amount-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_tokens_act']?></label>
						<div class="select"><select class="form__input" id="act" name="act"><option value="add"><?=$lng['admin_tokens_act_add']?></option><option value="remove"><?=$lng['admin_tokens_act_remove']?></option></select></div>
						<span id="admin-act-error" class="form__error" style="display: none;"></span>
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_tokens_comment']?></label>
						<input class="form__input" id="comment" name="comment" value="" placeholder="<?=$lng['admin_placeholder_comment']?>" />
						<span id="admin-comment-error" class="form__error" style="display: none;"></span>
					</div>
				<div class="text--center">
					<div class="m-spinner m-spinner--auth m-spinner--lg" id="admin_tokens-loading" style="display: none;"></div>
					<button class="btn" type="button" id="admin_tokens-button"><?=$lng['button_admin_tokens']?></button>
				</div>
				</form>
					<div class="form__group"></div>
<?php
$query = $db->prepare("SELECT * FROM balance_actions WHERE product_id = ? ORDER BY id DESC");
$query->execute(array($product['id']));
if($query->rowCount()==0){echo'<div class="well"><div class="well__title">'.$lng['admin_tokens_history'].'</div><div class="text--center"><span class="well__btn well__btn--disabled">'.$lng['no_transactions'].'</span></div></div>';}else{?>
		<div class="well">
			<div class="well__title"><?=$lng['admin_tokens_history']?></div>
			<div class="table">
				<table>
					<thead>
						<tr>
							<th><?=$lng['admin_tokens_user_id']?></th>
							<th><?=$lng['orders_time']?></th>
							<th><?=$lng['admin_tokens_admin_id']?></th>
							<th><?=$lng['admin_tokens_act']?></th>
							<th><?=$lng['orders_price']?></th>
							<th><?=$lng['admin_tokens_tokens_amount']?></th>
							<th><?=$lng['admin_tokens_comment']?></th>
						</tr>
					</thead>
					<tbody>
<?php
while($row=$query->fetch(\PDO::FETCH_ASSOC)){

if($row['type']=='add'){$type=$lng['admin_tokens_act_added'];}
if($row['type']=='remove'){$type=$lng['admin_tokens_act_removed'];}

echo'<tr><td>'.$row['uid'].'</td><td>'.date('d/m/Y H:i',$row['time']).'</td><td>'.$row['admin'].'</td><td>'.$type.'</td><td>'.$row['amount'].' '.$row['currency'].'</td><td><span class="portal-value portal-value--sm">'.$row['tokens_amount'].'</span></td><td>'.$row['comment'].'</td></tr>';}
?>				
					</tbody>
				</table>
			</div>
		</div>
<?php }?>
				</div>
				<div class="tab-pane js-calc-tab fade in" id="referral">
				<form class="form" id="admin_search_referral_link-form" method="post" action="" novalidate="novalidate">
				<input type="hidden" name="do" value="admin_search_referral_link">
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_referral_link_title']?></label>
						<input class="form__input" id="referral_link" name="referral_link" value="" placeholder="<?=$lng['admin_placeholder_url']?>" />
						<span id="admin-referral_link-error" class="form__error" style="display: none;"></span>
					</div>
				<div class="text--center">
					<div class="m-spinner m-spinner--auth m-spinner--lg" id="admin_search_referral_link-loading" style="display: none;"></div>
					<button class="btn" type="button" id="admin_search_referral_link-button"><?=$lng['button_search']?></button>
				</div>
				</form>
				
		<div class="well form__group" style="display:none;" id="referral_link_info">
			<div class="well__title"><?=$lng['admin_referral_link_title']?></div>
			<div class="table">
				<table>
					<thead>
						<tr>
							<th id="RLI_url_title">URL</th>
							<th id="RLI_comment_title">URL</th>
							<th id="RLI_id_title">ID</th>
							<th id="RLI_time_title"><?=$lng['userlist_time']?></th>
							<th id="RLI_email_title"><?=$lng['userlist_email']?></th>
							<th id="RLI_country_code_title"><?=$lng['userlist_country_code']?></th>
							<th><?=$lng['userlist_referrals']?></th>
							<th><?=$lng['userlist_referrals_buyers']?></th>
							<th><?=$lng['userlist_referral_visits']?></th>
							<th><?=$lng['userlist_referral_visits_portal']?></th>
							<th><?=$lng['userlist_referral_visits_external']?></th>
							<th><?=$lng['userlist_referral_wp']?></th>
							<th id="RLI_referral_balance_title"><?=$lng['userlist_referral_balance']?></th>
							<th><?=$lng['userlist_referral_raised']?></th>
						</tr>
					</thead>
					<tbody>
				<tr><td id="RLI_url"></td><td id="RLI_comment"></td><td id="RLI_id"></td><td id="RLI_time"></td><td id="RLI_email"></td><td id="RLI_country_code"></td><td id="RLI_referrals"></td><td id="RLI_referrals_buyers"></td><td id="RLI_referral_visits"></td><td id="RLI_referral_visits_portal"></td><td id="RLI_referral_visits_external"></td><td id="RLI_referral_wp"></td><td id="RLI_referral_balance"><span class="portal-value portal-value--sm" id="RLI_referral_balance_value"></span></td><td id="RLI_referral_raised"></td></tr>
					</tbody>
				</table>
			</div>
		</div>
				
				<form class="form" id="admin_create_referral_link-form" method="post" action="" novalidate="novalidate">
			<div class="well__title"><?=$lng['admin_referral_link_create']?></div>
				<input type="hidden" name="do" value="admin_create_referral_link">
				<div class="message message--success message--form" id="admin_create_referral_link-success" style="display: none;"></div>
					<div class="form__group">
						<label class="form__label"><?=$lng['admin_referral_comment']?></label>
						<input class="form__input" id="referral_link_comment" name="comment" value="" placeholder="<?=$lng['admin_placeholder_comment']?>" />
						<span id="admin-referral_link_comment-error" class="form__error" style="display: none;"></span>
					</div>
				<div class="text--center">
					<div class="m-spinner m-spinner--auth m-spinner--lg" id="admin_create_referral_link-loading" style="display: none;"></div>
					<button class="btn" type="button" id="admin_create_referral_link-button"><?=$lng['button_create']?></button>
				</div>
				</form>
				
					<div class="form__group"></div>
<?php
$query = $db->prepare("SELECT * FROM users WHERE isactive = ? AND admin = ? AND referrals > ? AND product_id = ? ORDER BY referrals DESC");
$query->execute(array('1','0','0',$product['id']));
if($query->rowCount()==0){echo'<div class="well"><div class="well__title">'.$lng['admin_tab_referral'].'</div><div class="text--center"><span class="well__btn well__btn--disabled">'.$lng['userlist_no_users'].'</span></div></div>';}else{?>
		<div class="well">
			<div class="well__title"><?=$lng['admin_tab_referral']?> <?=$lng['admin_users']?></div>
			<div class="table">
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th><?=$lng['userlist_time']?></th>
							<th><?=$lng['userlist_email']?></th>
							<th><?=$lng['userlist_country_code']?></th>
							<th><?=$lng['userlist_referrals']?></th>
							<th><?=$lng['userlist_referrals_buyers']?></th>
							<th><?=$lng['userlist_referral_visits']?></th>
							<th><?=$lng['userlist_referral_visits_portal']?></th>
							<th><?=$lng['userlist_referral_visits_external']?> (Coinplace.pro)</th>
							<th><?=$lng['userlist_referral_wp']?></th>
							<th><?=$lng['userlist_referral_balance']?></th>
							<th><?=$lng['userlist_referral_raised']?></th>
						</tr>
					</thead>
					<tbody>
<?php
while($row=$query->fetch(\PDO::FETCH_ASSOC)){
	
$query_buyers = $db->prepare("SELECT count(*) FROM users WHERE balance > ? AND referrer = ? AND product_id = ?");
$query_buyers->execute(array('0',$row['id'],$product['id']));
$buyers=$query_buyers->fetchColumn();

$visits_website=$visits_external=$visits_wp=$sum_usd=$sum_eth=$sum=0;

$query_visits = $db->prepare("SELECT * FROM visits WHERE uid = ? AND product_id = ?");
$query_visits->execute(array($row['id'],$product['id']));
while($row_visits=$query_visits->fetch(\PDO::FETCH_ASSOC)){
if($row_visits['type']=='main_website'){$visits_website++;}
if($row_visits['type']=='buy' || $row_visits['type']=='platform'){$visits_external++;}
if($row_visits['type']=='wp'){$visits_wp++;}
}

$query_sum = $db->prepare("SELECT * FROM payments WHERE uid = ? AND referral_transaction > ? AND status = ? AND product_id = ?");
$query_sum->execute(array($row['id'],'0','100',$product['id']));

while($row_sum=$query_sum->fetch(\PDO::FETCH_ASSOC)){
if($row_sum['conversion']=='USD'){$sum_usd+=$row_sum['exchange_rate']*$row_sum['amount'];}
if($row_sum['conversion']=='ETH'){$sum_eth+=$row_sum['exchange_rate']*$row_sum['amount'];}
}

if($sum_usd>0){$sum=$sum_usd.' USD';}
if($sum_eth>0){$sum.=' '.$sum_eth.' ETH';}

unset($sum_usd,$sum_eth);

if($row['email']==''){$row['email']=$row['oauth_email'];}

echo'<tr><td>'.$row['id'].'</td><td>'.date('d/m/Y H:i',$row['time']).'</td><td>'.$row['email'].'</td><td>'.$row['country_code'].'</td><td>'.$row['referrals'].'</td><td>'.$buyers.'</td><td>'.$visits_website.'</td><td>'.$row['referral_visits'].'</td><td>'.$visits_external.'</td><td>'.$visits_wp.'</td><td><span class="portal-value portal-value--sm">'.$row['balance_referrer'].'</span></td><td>'.$sum.'</td></tr>';}
?>				
					</tbody>
				</table>
			</div>
		</div>
<?php }?>
					<div class="form__group"></div>
<?php
$query = $db->prepare("SELECT * FROM referral_links WHERE product_id = ? ORDER BY referrals DESC");
$query->execute(array($product['id']));
if($query->rowCount()==0){echo'<div class="well"><div class="well__title">'.$lng['admin_tab_referral'].'</div><div class="text--center"><span class="well__btn well__btn--disabled">'.$lng['no_referral_links'].'</span></div></div>';}else{?>
		<div class="well">
			<div class="well__title"><?=$lng['admin_tab_referral']?> <?=$lng['admin_referral_links']?></div>
			<div class="table">
				<table>
					<thead>
						<tr>
							<th>URL</th>
							<th><?=$lng['admin_description']?></th>
							<th><?=$lng['userlist_referrals']?></th>
							<th><?=$lng['userlist_referrals_buyers']?></th>
							<th><?=$lng['userlist_referral_visits']?></th>
							<th><?=$lng['userlist_referral_visits_portal']?></th>
							<th><?=$lng['userlist_referral_visits_external']?> (Coinplace.pro)</th>
							<th><?=$lng['userlist_referral_wp']?></th>
							<th><?=$lng['userlist_referral_raised']?></th>
						</tr>
					</thead>
					<tbody>
<?php
while($row=$query->fetch(\PDO::FETCH_ASSOC)){

$sum_usd=$sum_eth=$sum=0;

$query_sum = $db->prepare("SELECT * FROM payments WHERE referral_link = ? AND status = ? AND product_id = ?");
$query_sum->execute(array($row['link'],'100',$product['id']));

while($row_sum=$query_sum->fetch(\PDO::FETCH_ASSOC)){
if($row_sum['conversion']=='USD'){$sum_usd+=$row_sum['exchange_rate']*$row_sum['amount'];}
if($row_sum['conversion']=='ETH'){$sum_eth+=$row_sum['exchange_rate']*$row_sum['amount'];}
}

if($sum_usd>0){$sum=$sum_usd.' USD';}
if($sum_eth>0){if($sum==0){$sum=$sum_eth.' ETH';}else{$sum.=' '.$sum_eth.' ETH';}}

unset($sum_usd,$sum_eth);

echo'<tr><td>'.$product['url_main'].'?link='.$row['link'].'</td><td>'.$row['comment'].'</td><td>'.$row['referrals'].'</td><td>'.$row['referrals_buyers'].'</td><td>'.$row['referral_visits_portal'].'</td><td>'.$row['referral_visits'].'</td><td>'.$row['referral_visits_external'].'</td><td>'.$row['referral_visits_wp'].'</td><td>'.$sum.'</td></tr>';}
?>				
					</tbody>
				</table>
			</div>
		</div>
<?php }?>
				</div>
				<div class="tab-pane js-calc-tab fade in" id="support">
					<div class="form__group"></div>
<?php
$query = $db->prepare("SELECT * FROM support WHERE product_id = ? ORDER BY id DESC");
$query->execute(array($product['id']));
if($query->rowCount()==0){echo'<div class="well"><div class="well__title">'.$lng['admin_tab_support'].'</div><div class="text--center"><span class="well__btn well__btn--disabled">'.$lng['no_support'].'</span></div></div>';}else{?>
		<div class="well">
			<div class="well__title"><?=$lng['admin_tab_support']?></div>
			<div class="table">
				<table>
					<thead>
						<tr>
							<th>Email</th>
							<th><?=$lng['admin_support_time']?></th>
							<th><?=$lng['support_subject']?></th>
							<th><?=$lng['support_message']?></th>
						</tr>
					</thead>
					<tbody>
<?php
while($row=$query->fetch(\PDO::FETCH_ASSOC)){

$query_user = $db->prepare("SELECT email, oauth_email FROM users WHERE id = ? AND product_id = ? ORDER BY id DESC");
$query_user->execute(array($row['uid'],$product['id']));
$row_user=$query_user->fetch(\PDO::FETCH_ASSOC);

if($row_user['email']==''){$row_user['email']=$row_user['oauth_email'];}

if($row['subject']=='1'){$subject=$lng['support_payments'];}else{$subject=$lng['support_tech'];}

echo'<tr><td>'.$row_user['email'].'</td><td>'.date('d/m/Y H:i',$row['time']).'</td><td>'.$subject.'</td><td>'.$row['message'].'</td></tr>';}
?>				
					</tbody>
				</table>
			</div>
		</div>
<?php }?>
				</div>
				<div class="tab-pane js-calc-tab fade in" id="stats">
					<div class="form__group"></div>
		<div class="well">
			<div class="well__title"><?=$lng['admin_tab_stats']?></div>
			<div class="table">
				<table>
					<tbody>
					<tr><td><?=$lng['admin_stats_raised']?> (<?=$lng['trough_portal']?>)</td><td><b><?=$product['usd_raised']?>$</b></td></tr>
					<tr><td><?=$lng['admin_stats_raised']?> (<?=$lng['trough_portal']?>)</td><td><b><?=$product['eth_raised']?> ETH</b></td></tr>
					<tr><td><?=$lng['admin_stats_raised']?> (<?=$lng['smartcontract']?>)</td><td><b><?=$product['eth_raised_smartcontract']?> ETH</b></td></tr>
					<tr><td colspan="2"><b><?=$lng['admin_stats_tokens']?></b></td></tr>
					<tr><td><?=$lng['admin_stats_tokens_sale']?></td><td><b><?=$product['tokens_sold']?></b></td></tr>
					<tr><td><?=$lng['admin_stats_tokens_bonus']?></td><td><b><?=$product['tokens_bonus']?></b></td></tr>
					<tr><td><?=$lng['admin_stats_tokens_referral']?></td><td><b><?=$product['tokens_referrer']?></b></td></tr>
					<tr><td><?=$lng['admin_stats_tokens_signup']?></td><td><b><?=$product['tokens_signup']?></b></td></tr>
					</tbody>
				</table>
			</div>
		</div>
				</div>
			</div>
		</div>
	</div>
<?php require 'modules/footer.php';exit;?>