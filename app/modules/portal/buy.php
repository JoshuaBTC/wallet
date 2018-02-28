<?php
if(!isset($settings) || $module!='buy' || !$logged_in['flag']){header('location: /');exit;}
?>
	<form class="form form--portal-big form--lg">
		<div class="form__content">
			<div class="form__title form__title--2"><?=$lng['purchase_title']?></div>
			<ul class="tabs js-calc-tabs">
				<li class="tabs__item active"><a class="tabs__link" href="#alts" data-toggle="tab"><?=$lng['payment_cryptocurrency']?></a></li>
				<!--<li class="tabs__item"><a class="tabs__link" href="#fiat" data-toggle="tab"><?=$lng['payment_fiat']?></a></li>
				<li class="tabs__item"><a class="tabs__link" href="#exchange" data-toggle="tab"><?=$lng['payment_exchange']?></a></li>
				<li class="tabs__item"><a class="tabs__link" href="#card" data-toggle="tab"><?=$lng['payment_card']?></a></li>
				<li class="tabs__item"><a class="tabs__link" href="#paypal" data-toggle="tab"><?=$lng['payment_paypal']?></a></li>-->
			</ul>
			<div class="tab-content">
				<div class="tab-pane js-calc-tab fade in active" id="alts">
					<div class="form__group"></div>
					<div class="form__group">
						<label class="form__label"><?=$lng['deposit_choose']?></label>
						<div class="select">
						<select class="form__input" id="currency" name="currency"><option value=""><?=$lng['deposit_choose']?></option><?php foreach($currency_settings as $letters=>$enabled){if($enabled=='1'){echo'<option value="'.$letters.'">'.$currency_names[$letters].'</option>';}}?></select>
						</div>
					</div>
					<div class="text--center">
					<div class="m-spinner m-spinner--auth m-spinner--lg" id="loading" style="display: none;"></div>
					</div>
					<div id="invest-userwallets" style="display: none;">
					<div class="form__group">
						<label class="form__label"><?=$lng['userwallet_title']?></label>
						<input class="form__input form__input--address" id="userwallet_address" value="" placeholder="<?=$lng['userwallet_placeholder']?>" />
						<span id="userwallet_address-error" class="form__error" style="display: none;"></span>
						<button class="js-copy btn btn--sm btn--transparent btn--copy btn--ininput" id="userwallet_address-button"> <span><?=$lng['userwallet_button']?></span>
						</button>
						<input type="hidden" id="SBD" value="<?=$user['SBD_address']?>">
						<input type="hidden" id="GOLOS" value="<?=$user['GOLOS_address']?>">
						<input type="hidden" id="BTS" value="<?=$user['BTS_address']?>">
						<input type="hidden" id="bonus_percent" value="<?=$product['bonus_percent']/100?>">
					</div>
					</div>
					<div id="invest-purchase" style="display: none;">
					<div class="form__full form__row--grey calc">
						<div class="calc__text text"><?=$lng['deposit_amount']?><b class="red" id="currency_name_amount"></b></div>
						<span class="calc__control calc__control--minus js-calc-minus"></span>
						<input class="calc__input js-calc-input" placeholder="<?=$lng['deposit_enter_amount']?>" data-step="0.01" data-currency="0" autofocus="autofocus" id="currency_calc" type="number" min="0"/>
						<input type="hidden" id="calc_price" value="0">
						<span class="calc__control calc__control--plus js-calc-plus"></span>
						<div class="calc__text__bottom text">1 <span id="currency_name_usd"></span> = <span id="currency_to_usd"></span><?php if($product['token_price_eth']!='0' && $product['token_price_eth']>0){echo' ETH';}else{echo'$';}?>
						<br>1 <?=$product['token_name']?> = <span id="token_price"></span><?php if($product['token_price_eth']!='0' && $product['token_price_eth']>0){echo' ETH';}else{echo'$';}?></div>
					</div>
					<div class="form__black form__full black-data">
						<div class="black-data__text"><?=$lng['deposit_return']?></div>
						<span class="black-data__value js-calc-portal" id="calc_result">0</span>
						
						<div class="calc__text__bottom text" style="color: #fff; margin-top: 0px;"><b>+ <?=$lng['bonus']?> </b> <span class="black-data-bonus__value js-calc-portal-bonus" id="calc_result_bonus">0</span></div>
						<img class="black-data__logo" src="/assets/products/<?=$product['id']?>/logo_white.png" srcset="/assets/products/<?=$product['id']?>/logo_white@2x.png 2x" alt="" />
					</div>
					<div class="qr">
						<img id="deposit_qr" src="https://chart.googleapis.com/chart?chs=225x225&chld=L|2&cht=qr&chl=" width="180" alt="" />
					</div>
					<div class="form__group">
						<label class="form__label"><?=$lng['deposit_address']?></label>
						<input class="form__input form__input--address" id="deposit_address" value="" onclick="this.select();" readonly="readonly" />
						<button class="js-copy btn btn--sm btn--transparent btn--copy btn--ininput" id="deposit_address_clipboard" data-clipboard-text=""> <span><?=$lng['button_copy_wallet']?></span>
						</button>
					</div>
					<div class="form__footer"><?=$lng['deposit_description']?></div>
					</div>
				</div>
				<div class="tab-pane js-calc-tab" id="exchange">
					<div class="form__group"></div>
					<div class="text--center">
<?php
#Получить адрес кошелька Ethereum через Coinpayments API для покупки токенов через Changelly
$currency = 'ETH';

$query = $db->prepare("SELECT wallet_address FROM deposit_wallets WHERE uid = ? AND currency = ? AND product_id = ?");
$query->execute(array($user['id'],$currency,$product['id']));

if($query->rowCount()>0){$data = $query->fetch(\PDO::FETCH_ASSOC);$eth_address=$data['wallet_address'];}else{

while($deposit_address==''){
$deposit_address=getCoinPaymentsWalletAddress($currency,$product['coinpayments_public_key'],$product['coinpayments_private_key']);
}

$query = $db->prepare("INSERT INTO deposit_wallets (uid, currency, wallet_address, product_id, time) VALUES (?, ?, ?, ?, ?)");
if($query->execute(array($user['id'],$currency,$deposit_address,$product['id'],time()))){$eth_address=$deposit_address;}
}
?>
<iframe src="https://changelly.com/widget/v1?auth=email&from=LTC&to=ETH&merchant_id=cbfd025e6b50&address=<?=$eth_address?>&amount=1&ref_id=cbfd025e6b50&color=<?=$product['color']?>" width="600" height="500" class="changelly" scrolling="no" style="overflow-y: hidden; border: none"></iframe>
					</div>
				</div>
				<div class="tab-pane js-calc-tab" id="card">
					<div class="form__group"></div>
					<div class="text--center">
						<button class="btn btn--buy">Buy</button>
					</div>
				</div>
				<div class="tab-pane js-calc-tab" id="paypal">
					<div class="form__group"></div>
					<div class="text--center">
						<button class="btn btn--buy">Buy</button>
					</div>
				</div>
			</div>
		</div>
	</form>
<?php require 'modules/footer.php';?>