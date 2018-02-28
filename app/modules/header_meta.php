<?php if(!isset($settings)){header('location: /');exit;}?><!DOCTYPE html>
<html lang="<?=$lng['locale_lng']?>">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
	<title><?=$product['name']?></title>
	<meta name="description" content="<?=$lng['meta_description']?>">
	<meta name="format-detection" content="telephone=no" />
	<link rel="stylesheet" href="/assets/products/<?=$product['id']?>/css.css?<?=time()?>" />
	
	<script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter46696128 = new Ya.Metrika({ id:46696128, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://cdn.jsdelivr.net/npm/yandex-metrica-watch/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/46696128" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	
	<script src="/assets/js/jquery-3.2.1.min.js"></script>
	
<link rel="apple-touch-icon" sizes="180x180" href="/assets/products/<?=$product['id']?>/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/products/<?=$product['id']?>/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="192x192" href="/assets/products/<?=$product['id']?>/favicon/android-chrome-192x192.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/products/<?=$product['id']?>/favicon/favicon-16x16.png">
<link rel="manifest" href="/assets/products/<?=$product['id']?>/favicon/manifest.json">
<link rel="mask-icon" href="/assets/products/<?=$product['id']?>/favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="/assets/products/<?=$product['id']?>/favicon/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="/assets/products/<?=$product['id']?>/favicon/mstile-144x144.png">
<meta name="msapplication-config" content="/assets/products/<?=$product['id']?>/favicon/browserconfig.xml">
<meta name="theme-color" content="#<?=$product['color']?>">
</head>

<body>
	<nav class="top">
		<div class="container">
			<div class="top__right">
				<div class="top__block currency">
					<!--<div class="currency__left">
						<div class="currency__btc">1 BTC</div>
						<div class="currency__portal">= <?=round(($currency_to_usd['BTC']/$product['token_price']),0)?> <?=$product['token_name']?></div>
					</div>
					<div class="currency__right">
						<div class="currency__value currency__value--up">+ 2.4%</div>
						<div class="currency__value currency__value--down">- 8.65 <?=$product['token_name']?></div>
					</div>-->
				</div>
				<ul class="menu top__block">
					<?php if($user['admin']=='1'){echo'<li class="menu__item"><a class="menu__link';if($module=='admin'){echo' menu__link--active';}echo'" href="/admin/">'.$lng['admin_panel'].'</a></li>';}?>
					<li class="menu__item"><a class="menu__link<?php if($module=='dashboard'){echo' menu__link--active';}?>" href="/"><?=$lng['menu_main']?></a></li>
					<li class="menu__item"><a class="menu__link<?php if($module=='profile'){echo' menu__link--active';}?>" href="/profile/"><?=$lng['menu_settings']?></a></li>
				</ul>
				<div class="top__block top__dropdown">
					<div class="login">
						<div class="login__avatar">
							<img src="/assets/products/<?=$product['id']?>/avatar@2x.png" width="31" alt="" />
						</div>
						<div class="menu__item menu__item--mobile"><a class="menu__link" href="/signout/<?=$_SESSION['authID']?>/"><?=$lng['auth_signout']?></a>
						</div><span class="login__email"><?=$user['email']?></span>
					</div>
					<div class="dropdown__content">
						<div class="dropdown__title"><?=$lng['token_balance']?></div>
						<div class="portal-value"><?=round(($user['balance']+$user['balance_bonus']+$user['balance_referrer']),4)?></div>
						<div>
							<?php if($user['admin']=='1'){echo'<div class="dropdown__row"> <a class="dropdown__link dropdown__link--admin" href="/admin/">'.$lng['admin_panel'].'</a></div>';}?>
							<div class="dropdown__row"> <a class="dropdown__link dropdown__link--settings" href="/profile/"><?=$lng['menu_profile']?></a></div>
							<div class="dropdown__row"> <a class="dropdown__link dropdown__link--support" href="/support/"><?=$lng['menu_support']?></a></div>
							<div class="dropdown__row"> <a class="dropdown__link dropdown__link--logout" href="/signout/<?=$_SESSION['authID']?>/"><?=$lng['auth_signout']?></a></div>
						</div>
					</div>
				</div>
				<div class="currency currency--mobile clearfix">
					<!--<div class="currency__left">
						<div class="currency__btc">1 BTC</div>
						<div class="currency__portal">= <?=round(($currency_to_usd['BTC']/$product['token_price']),0)?> <?=$product['token_name']?></div>
					</div>
					<div class="currency__right">
						<div class="currency__value currency__value--up">+ 2.4%</div>
						<div class="currency__value currency__value--down">- 8.65 <?=$product['token_name']?></div>
					</div>-->
				</div>
				<div class="langs top__block"><a class="langs__link langs__link--current" href="/<?=$lng['language_code']?>/"><?=$lng['language_code']?></a>
					<div class="langs__hidden"><a class="langs__link<?php if($lng['language_code']=='en'){echo' langs__link--active';}?>" href="/en/">en</a><a class="langs__link<?php if($lng['language_code']=='ru'){echo' langs__link--active';}?>" href="/ru/">ru</a><a class="langs__link<?php if($lng['language_code']=='ja'){echo' langs__link--active';}?>" href="/ja/">ja</a><a class="langs__link<?php if($lng['language_code']=='ko'){echo' langs__link--active';}?>" href="/ko/">ko</a><a class="langs__link<?php if($lng['language_code']=='cn'){echo' langs__link--active';}?>" href="/cn/">cn</a></div>
				</div>
				<div class="top__copy"><?=$product['footer_copyright']?> <img src="/assets/products/<?=$product['id']?>/logo_small@2x.png" width="69" alt="" /></div>
			</div>
			<a class="logo" href="<?=$product['url_main']?>"><img src="/assets/products/<?=$product['id']?>/logo.png" srcset="/assets/products/<?=$product['id']?>/logo@2x.png 2x" alt="" /></a>
			<div class="login__avatar login__avatar--mobile">
				<img src="/assets/products/<?=$product['id']?>/avatar@2x.png" width="31" alt="" />
			</div><a class="show-menu" href="#"><span></span></a>
		</div>
	</nav>