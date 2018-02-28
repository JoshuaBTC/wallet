-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2018 at 11:58 AM
-- Server version: 5.6.32-78.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bootcap6_vxp`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance_actions`
--

CREATE TABLE IF NOT EXISTS `balance_actions` (
  `id` bigint(11) NOT NULL,
  `admin` bigint(11) NOT NULL,
  `uid` bigint(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `tokens_amount` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `time` varchar(20) NOT NULL,
  `product_id` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bounty`
--

CREATE TABLE IF NOT EXISTS `bounty` (
  `id` bigint(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `time` datetime DEFAULT NULL,
  `comment` text,
  `translation_language` int(3) DEFAULT NULL,
  `translation_type` int(2) DEFAULT NULL,
  `content_type` int(2) DEFAULT NULL,
  `content_url` varchar(200) DEFAULT NULL,
  `signature_rank` varchar(20) DEFAULT NULL,
  `approved` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `currency_settings`
--

CREATE TABLE IF NOT EXISTS `currency_settings` (
  `product_id` bigint(11) NOT NULL,
  `ETH` tinyint(1) NOT NULL DEFAULT '1',
  `BTC` tinyint(1) NOT NULL DEFAULT '1',
  `LTC` tinyint(1) NOT NULL DEFAULT '1',
  `ETC` tinyint(1) NOT NULL DEFAULT '1',
  `BCH` tinyint(1) NOT NULL DEFAULT '1',
  `XRP` tinyint(1) NOT NULL DEFAULT '1',
  `ZEC` tinyint(1) NOT NULL DEFAULT '1',
  `DASH` tinyint(1) NOT NULL DEFAULT '1',
  `WAVES` tinyint(1) NOT NULL DEFAULT '1',
  `DOGE` tinyint(1) NOT NULL DEFAULT '1',
  `XEM` tinyint(1) NOT NULL DEFAULT '1',
  `NMC` tinyint(1) NOT NULL DEFAULT '1',
  `XMR` tinyint(1) NOT NULL DEFAULT '1',
  `DCR` tinyint(1) NOT NULL DEFAULT '1',
  `DGB` tinyint(1) NOT NULL DEFAULT '1',
  `POT` tinyint(1) NOT NULL DEFAULT '1',
  `SIB` tinyint(1) NOT NULL DEFAULT '1',
  `VTC` tinyint(1) NOT NULL DEFAULT '1',
  `GAME` tinyint(1) NOT NULL DEFAULT '1',
  `SBD` tinyint(1) NOT NULL DEFAULT '0',
  `GOLOS` tinyint(1) NOT NULL DEFAULT '0',
  `BTS` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency_settings`
--

INSERT INTO `currency_settings` (`product_id`, `ETH`, `BTC`, `LTC`, `ETC`, `BCH`, `XRP`, `ZEC`, `DASH`, `WAVES`, `DOGE`, `XEM`, `NMC`, `XMR`, `DCR`, `DGB`, `POT`, `SIB`, `VTC`, `GAME`, `SBD`, `GOLOS`, `BTS`) VALUES
(1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `currency_to_eth`
--

CREATE TABLE IF NOT EXISTS `currency_to_eth` (
  `id` bigint(11) NOT NULL,
  `time` varchar(100) DEFAULT NULL,
  `BTC` varchar(100) DEFAULT NULL,
  `ETH` varchar(100) DEFAULT NULL,
  `LTC` varchar(100) DEFAULT NULL,
  `ETC` varchar(100) DEFAULT NULL,
  `BCH` varchar(100) DEFAULT NULL,
  `XRP` varchar(100) DEFAULT NULL,
  `ZEC` varchar(100) DEFAULT NULL,
  `DASH` varchar(100) DEFAULT NULL,
  `WAVES` varchar(100) DEFAULT NULL,
  `DOGE` varchar(100) DEFAULT NULL,
  `XEM` varchar(100) DEFAULT NULL,
  `NMC` varchar(100) DEFAULT NULL,
  `XMR` varchar(100) DEFAULT NULL,
  `SBD` varchar(100) DEFAULT NULL,
  `DCR` varchar(100) DEFAULT NULL,
  `DGB` varchar(100) DEFAULT NULL,
  `POT` varchar(100) DEFAULT NULL,
  `SIB` varchar(100) DEFAULT NULL,
  `VTC` varchar(100) DEFAULT NULL,
  `GAME` varchar(100) DEFAULT NULL,
  `GOLOS` varchar(100) DEFAULT NULL,
  `BTS` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency_to_eth`
--

INSERT INTO `currency_to_eth` (`id`, `time`, `BTC`, `ETH`, `LTC`, `ETC`, `BCH`, `XRP`, `ZEC`, `DASH`, `WAVES`, `DOGE`, `XEM`, `NMC`, `XMR`, `SBD`, `DCR`, `DGB`, `POT`, `SIB`, `VTC`, `GAME`, `GOLOS`, `BTS`) VALUES
(1, '1513863362', '20.05806811', '1', '0.37973924', '0.04939358', '4.21523105', '0.00115000', '0.86797897', '1.82488395', '0.02033743', '0.00000981', '0.00123795', '0.00564375', '0.55401745', '0.01727501', '0.08083702', '0.00006892', '0.00030106', '0.00300001', '0.01131947', '0.00441739', '0.00030187', '0.00146300');

-- --------------------------------------------------------

--
-- Table structure for table `currency_to_usd`
--

CREATE TABLE IF NOT EXISTS `currency_to_usd` (
  `id` bigint(11) NOT NULL,
  `time` varchar(100) DEFAULT NULL,
  `BTC` varchar(100) DEFAULT NULL,
  `ETH` varchar(100) DEFAULT NULL,
  `LTC` varchar(100) DEFAULT NULL,
  `ETC` varchar(100) DEFAULT NULL,
  `BCH` varchar(100) DEFAULT NULL,
  `XRP` varchar(100) DEFAULT NULL,
  `ZEC` varchar(100) DEFAULT NULL,
  `DASH` varchar(100) DEFAULT NULL,
  `WAVES` varchar(100) DEFAULT NULL,
  `DOGE` varchar(100) DEFAULT NULL,
  `XEM` varchar(100) DEFAULT NULL,
  `NMC` varchar(100) DEFAULT NULL,
  `XMR` varchar(100) DEFAULT NULL,
  `SBD` varchar(100) DEFAULT NULL,
  `DCR` varchar(100) DEFAULT NULL,
  `DGB` varchar(100) DEFAULT NULL,
  `POT` varchar(100) DEFAULT NULL,
  `SIB` varchar(100) DEFAULT NULL,
  `VTC` varchar(100) DEFAULT NULL,
  `GAME` varchar(100) DEFAULT NULL,
  `GOLOS` varchar(100) DEFAULT NULL,
  `BTS` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency_to_usd`
--

INSERT INTO `currency_to_usd` (`id`, `time`, `BTC`, `ETH`, `LTC`, `ETC`, `BCH`, `XRP`, `ZEC`, `DASH`, `WAVES`, `DOGE`, `XEM`, `NMC`, `XMR`, `SBD`, `DCR`, `DGB`, `POT`, `SIB`, `VTC`, `GAME`, `GOLOS`, `BTS`) VALUES
(1, '1516468869', '12935.54341464', '1155.13835581', '212.00065374', '35.21001199', '1943.35736650', '1.61044600', '563.88164720', '958.69979063', '9.69809297', '0.00863165', '1.25860275', '4.93893787', '401.99743513', '7.07466034', '116.42936986', '0.06660000', '0.26172288', '3.37460962', '6.30000000', '5.49999997', '0.33125716', '1.34999999');

-- --------------------------------------------------------

--
-- Table structure for table `deposit_wallets`
--

CREATE TABLE IF NOT EXISTS `deposit_wallets` (
  `id` bigint(11) NOT NULL,
  `uid` bigint(11) NOT NULL,
  `product_id` bigint(11) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `wallet_address` varchar(100) NOT NULL,
  `time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(11) NOT NULL,
  `uid` bigint(11) DEFAULT NULL,
  `referral_transaction` varchar(10) DEFAULT NULL,
  `system` varchar(20) DEFAULT NULL,
  `referral_link` varchar(8) DEFAULT NULL,
  `wallet_address` varchar(100) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `amounti` varchar(100) DEFAULT NULL,
  `fee` varchar(100) DEFAULT NULL,
  `feei` varchar(100) DEFAULT NULL,
  `confirms` int(10) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `status_text` varchar(150) DEFAULT NULL,
  `exchange_rate` varchar(100) DEFAULT NULL,
  `token_price` varchar(100) DEFAULT NULL,
  `complete` int(1) DEFAULT '0',
  `tokens_amount` varchar(100) DEFAULT '0',
  `tokens_amount_bonus` varchar(100) DEFAULT '0',
  `conversion` varchar(10) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `product_id` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `smtp_host` varchar(100) DEFAULT NULL,
  `smtp_password` varchar(100) DEFAULT NULL,
  `smtp_security` varchar(10) DEFAULT NULL,
  `smtp_port` bigint(11) DEFAULT NULL,
  `usd_raised` varchar(100) NOT NULL DEFAULT '0',
  `eth_raised` varchar(100) NOT NULL DEFAULT '0',
  `eth_raised_smartcontract` varchar(100) NOT NULL DEFAULT '0',
  `other_raised` varchar(100) NOT NULL DEFAULT '0',
  `tokens_sold` varchar(100) DEFAULT '0',
  `tokens_bonus` varchar(100) NOT NULL DEFAULT '0',
  `tokens_referrer` varchar(100) NOT NULL DEFAULT '0',
  `tokens_signup` varchar(100) NOT NULL DEFAULT '0',
  `ethereum_last_block` varchar(100) NOT NULL DEFAULT '0',
  `ethereum_timestamp` varchar(100) NOT NULL DEFAULT '0',
  `ethereum_field_required` int(1) NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `url` varchar(200) NOT NULL,
  `url_main` varchar(150) DEFAULT NULL,
  `url_referral` varchar(300) DEFAULT NULL,
  `user_agreement` varchar(150) DEFAULT NULL,
  `email_activation` int(1) NOT NULL DEFAULT '0',
  `captcha_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `bonus_percent` varchar(10) NOT NULL DEFAULT '0',
  `signup_tokens` varchar(10) NOT NULL DEFAULT '0',
  `changelly` tinyint(1) NOT NULL DEFAULT '1',
  `support_email` varchar(100) DEFAULT NULL,
  `referral_percent` varchar(10) NOT NULL DEFAULT '0',
  `session_domain` varchar(200) NOT NULL,
  `token_name` varchar(15) NOT NULL,
  `color` varchar(6) NOT NULL DEFAULT 'ffffff',
  `smartcontract_address` varchar(42) DEFAULT NULL,
  `smartcontract_creator` varchar(42) DEFAULT NULL,
  `token_decimals` tinyint(2) NOT NULL DEFAULT '0',
  `withdrawals` varchar(20) DEFAULT NULL,
  `withdrawals_pending` tinyint(1) NOT NULL DEFAULT '0',
  `coinpayments_public_key` varchar(100) DEFAULT NULL,
  `coinpayments_private_key` varchar(100) DEFAULT NULL,
  `coinpayments_ipn_secret` varchar(100) DEFAULT NULL,
  `coinpayments_merchant_id` varchar(100) DEFAULT NULL,
  `etherscan_api_key` varchar(100) DEFAULT NULL,
  `token_price` varchar(20) DEFAULT NULL,
  `token_price_eth` varchar(100) NOT NULL DEFAULT '0',
  `footer_copyright` varchar(200) DEFAULT NULL,
  `twitter_consumer_key` varchar(200) NOT NULL,
  `twitter_consumer_secret` varchar(200) NOT NULL,
  `facebook_app_id` varchar(200) NOT NULL,
  `facebook_app_secret` varchar(200) NOT NULL,
  `yandex_matrika` varchar(20) DEFAULT NULL,
  `recaptcha_site_key` varchar(200) DEFAULT NULL,
  `recaptcha_secret` varchar(200) DEFAULT NULL,
  `google_oauth` tinyint(1) NOT NULL DEFAULT '0',
  `SBD_wallet` varchar(100) DEFAULT NULL,
  `GOLOS_wallet` varchar(100) DEFAULT NULL,
  `BTS_wallet` varchar(100) DEFAULT NULL,
  `bitcointalk` varchar(150) DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `twitter` varchar(150) DEFAULT NULL,
  `telegram` varchar(150) DEFAULT NULL,
  `vk` varchar(150) DEFAULT NULL,
  `youtube` varchar(150) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `domain` varchar(200) NOT NULL,
  `campaign_referral_percent` varchar(10) NOT NULL DEFAULT '0',
  `campaign_referral_url` varchar(200) DEFAULT NULL,
  `campaign_articles` int(1) NOT NULL DEFAULT '0',
  `campaign_translation` int(1) NOT NULL DEFAULT '0',
  `campaign_signature` int(1) NOT NULL DEFAULT '0',
  `signature_full` text,
  `signature_senior` text,
  `signature_hero` text,
  `signature_legendary` text,
  `signature_junior` text,
  `signature_newbie` text,
  `campaign_facebook` varchar(200) DEFAULT NULL,
  `campaign_twitter` varchar(200) DEFAULT NULL,
  `campaign_instagram` varchar(200) DEFAULT NULL,
  `campaign_telegram` varchar(200) DEFAULT NULL,
  `campaign_medium` varchar(200) DEFAULT NULL,
  `campaign_slack` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `email`, `smtp_host`, `smtp_password`, `smtp_security`, `smtp_port`, `usd_raised`, `eth_raised`, `eth_raised_smartcontract`, `other_raised`, `tokens_sold`, `tokens_bonus`, `tokens_referrer`, `tokens_signup`, `ethereum_last_block`, `ethereum_timestamp`, `ethereum_field_required`, `name`, `url`, `url_main`, `url_referral`, `user_agreement`, `email_activation`, `captcha_enabled`, `bonus_percent`, `signup_tokens`, `changelly`, `support_email`, `referral_percent`, `session_domain`, `token_name`, `color`, `smartcontract_address`, `smartcontract_creator`, `token_decimals`, `withdrawals`, `withdrawals_pending`, `coinpayments_public_key`, `coinpayments_private_key`, `coinpayments_ipn_secret`, `coinpayments_merchant_id`, `etherscan_api_key`, `token_price`, `token_price_eth`, `footer_copyright`, `twitter_consumer_key`, `twitter_consumer_secret`, `facebook_app_id`, `facebook_app_secret`, `yandex_matrika`, `recaptcha_site_key`, `recaptcha_secret`, `google_oauth`, `SBD_wallet`, `GOLOS_wallet`, `BTS_wallet`, `bitcointalk`, `facebook`, `twitter`, `telegram`, `vk`, `youtube`, `active`, `domain`, `campaign_referral_percent`, `campaign_referral_url`, `campaign_articles`, `campaign_translation`, `campaign_signature`, `signature_full`, `signature_senior`, `signature_hero`, `signature_legendary`, `signature_junior`, `signature_newbie`, `campaign_facebook`, `campaign_twitter`, `campaign_instagram`, `campaign_telegram`, `campaign_medium`, `campaign_slack`) VALUES
(1, 'support@test.com', 'replace_with_real_server', 'ZOeq8#)r3h2$', 'ssl', 465, '2639.02919407708', '0', '0', '0', '3483.47923960508', '174.173961980254', '0', '50', '0', '2514481302', 1, 'YourCompany Token Sale', 'http://token.lare.io', 'http://lare.io', 'http://token.lare.io/', '', 1, 0, '5', '0', 1, 'support@lare.io', '0', 'token.lare.io', 'LARE', 'ec7700', '0x.......', '0x.......', 18, '', 0, '.......', '.....', '.....', '....', '....', '0.5', '0', 'LARE', '....', '....', '1', '1', '47172615', '6LcqmT4UAAAAAGXY6yD7H3FqqFEcoW-W_xWYQyKp', '6LcqmT4UAAAAAJ66B9E-7S27hKoRN2YBijgmmsxa', 1, '', '', '', 'https://bitcointalk.org/', 'https://www.facebook.com/', 'https://twitter.com/', 'https://t.me/coinplace_eng', 'https://vk.com/', 'https://www.youtube.com/', 1, 'token.lare.io', '0', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `redirects`
--

CREATE TABLE IF NOT EXISTS `redirects` (
  `id` bigint(11) NOT NULL,
  `url` text NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `product_id` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `referral_links`
--

CREATE TABLE IF NOT EXISTS `referral_links` (
  `id` bigint(11) NOT NULL,
  `link` varchar(8) NOT NULL,
  `comment` text NOT NULL,
  `referrals` varchar(20) NOT NULL DEFAULT '0',
  `referrals_buyers` varchar(20) NOT NULL DEFAULT '0',
  `referral_visits` varchar(20) NOT NULL DEFAULT '0',
  `referral_visits_portal` varchar(20) NOT NULL DEFAULT '0',
  `referral_visits_external` varchar(20) NOT NULL DEFAULT '0',
  `referral_visits_wp` varchar(20) NOT NULL DEFAULT '0',
  `time` varchar(20) NOT NULL,
  `product_id` bigint(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `referral_links`
--

INSERT INTO `referral_links` (`id`, `link`, `comment`, `referrals`, `referrals_buyers`, `referral_visits`, `referral_visits_portal`, `referral_visits_external`, `referral_visits_wp`, `time`, `product_id`) VALUES
(1, 'kaDcQjoN', 'Test', '0', '0', '0', '0', '0', '0', '1514026192', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` bigint(11) NOT NULL,
  `uid` bigint(11) NOT NULL,
  `product_id` bigint(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `time` varchar(20) DEFAULT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `uid`, `product_id`, `code`, `time`, `type`) VALUES
(2, 7, 1, '7LfiBlLG14En3E94MhS6', '1514994974', 'reset'),
(3, 21, 1, 'thp6889J5525m54Ci28F', '1516236194', 'activation'),
(8, 26, 1, 'FO6hm506L1pJ595qJp6j', '1516260530', 'activation'),
(13, 31, 1, 'bU5908ilLB24ZSCKZQ8x', '1516274562', 'activation'),
(30, 45, 1, 't01B46o6b44O64e0AGv6', '1516318240', 'activation'),
(36, 51, 1, '29m9KyL07HSe3T7l0c4Z', '1516374456', 'activation');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` bigint(11) NOT NULL,
  `uid` bigint(11) NOT NULL,
  `product_id` bigint(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `time` varchar(20) DEFAULT NULL,
  `ip` varchar(39) DEFAULT NULL,
  `agent` text
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `uid`, `product_id`, `hash`, `time`, `ip`, `agent`) VALUES
(17, 1, 1, 'c367fede99db7274541e0032e4438c276969b0f9', '1514502478', '31.173.82.104', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36'),
(26, 11, 1, '174c744444d370a88d686c804642a5f26eca50f1', '1514871200', '210.5.119.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36'),
(30, 12, 1, 'e7ced30549b69222f6c72d817b133de87ddbbd3b', '1514944733', '120.29.124.103', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36'),
(35, 10, 1, 'f81822ae68daf27b062968da0c519be482060bab', '1515983457', '120.29.124.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36'),
(39, 14, 1, 'aa741ff5d0ec3a7996a4b38bf0f0794152e9db3e', '1515984972', '120.29.124.110', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.0.12335 Safari/537.36'),
(46, 18, 1, 'bfeba6b96a7f0f4a0239f1c66fbbcf8592fa2ca9', '1515994282', '120.29.124.110', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.0.12335 Safari/537.36'),
(58, 19, 1, '7a41d907a5aaf892a5016bc47656b5c8081216a9', '1516081471', '120.29.124.103', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36'),
(66, 20, 1, '50197320da67e665fb80eaf413cb3f2deb5f9253', '1516084933', '120.29.124.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36'),
(70, 22, 1, 'e7b019a7ca377591971aa1df32a22fa129e971f9', '1516237492', '70.214.106.146', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0'),
(72, 23, 1, '63e38c493eb1491d764b13819a74db04df413700', '1516252908', '114.79.174.120', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36'),
(76, 25, 1, '5659012868e26e58eb81a81af07a60787d52291e', '1516258488', '170.248.0.195', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.112 Safari/537.36'),
(79, 29, 1, 'fa0ac276a5832dd70dae5ec7f8b1420b0e5faf75', '1516266234', '110.54.134.106', 'Mozilla/5.0 (Linux; Android 7.1.1; ASUS_X00ID Build/NMF26F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.111 Mobile Safari/537.36'),
(80, 30, 1, 'e3771a03ed3d5961ac089f3201d04cb30e123c09', '1516268350', '66.249.82.101', 'Mozilla/5.0 (Linux; Android 5.1.1; vivo Y21L Build/LMY47V) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.73 Mobile Safari/537.36'),
(81, 32, 1, '069464cb1963ebec86270ffb2d0973ce9683e464', '1516280381', '175.34.189.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36'),
(83, 34, 1, '80262faedbfb2e422047d597d665fca82899d626', '1516282504', '82.0.212.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0'),
(86, 33, 1, '3310fd8c58d785c595ca45d29e4cf13828312a08', '1516299002', '41.212.65.37', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.13; rv:57.0) Gecko/20100101 Firefox/57.0'),
(88, 41, 1, '0d6e9a14894475eb0847e116df5d579d265bf114', '1516303185', '96.52.237.109', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36'),
(89, 28, 1, '0fb4fae30e6ff71a51dd9e024008fe71f9e8103f', '1516303541', '149.210.212.207', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36'),
(96, 36, 1, '07813981c124e3230ee18945803dfae39e797330', '1516315679', '172.56.29.72', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-G550T Build/MMB29K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.91 Mobile Safari/537.36'),
(97, 35, 1, '28accc3dd0b4157d3eb42ed22fb3237abd976afa', '1516318064', '179.43.139.155', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36'),
(112, 39, 1, 'fcdfb7e02e597f2914be0fe1272bc89b89ad9345', '1516337712', '172.58.105.0', 'Mozilla/5.0 (Linux; Android 7.1.1; SM-N950U Build/NMF26X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.111 Mobile Safari/537.36'),
(114, 47, 1, '25db487ae92e241e6092655856d7c72911ba6101', '1516341829', '76.184.71.19', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_1 like Mac OS X) AppleWebKit/604.4.7 (KHTML, like Gecko) Version/11.0 Mobile/15C153 Safari/604.1'),
(123, 9, 1, '37fc5dbc674de80f8931d03fb4405145b752356c', '1516361423', '210.5.119.210', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36'),
(125, 8, 1, '03945dfd0337e5302a489a6c368a9feca17ae5e0', '1516362540', '120.29.124.103', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0'),
(128, 50, 1, '5d223a8045ab8b108d10daef42cfc8a9a08d1bfa', '1516369464', '124.148.94.15', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_2 like Mac OS X) AppleWebKit/604.4.7 (KHTML, like Gecko) Version/11.0 Mobile/15C202 Safari/604.1'),
(132, 37, 1, '857f739a85090cb68b59bcfb51eab3b8d64ac2ae', '1516376393', '178.165.131.204', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36'),
(134, 42, 1, '74d56b3a2257b0fa364ffb42ae6b19d55ee4ed2d', '1516396301', '66.102.212.224', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/604.4.7 (KHTML, like Gecko) Version/11.0.2 Safari/604.4.7'),
(137, 40, 1, '4c1697b14d3bd029715077a8f7ded20829a8daea', '1516400432', '174.7.101.206', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36'),
(138, 49, 1, '1249287a97bc119dc8697dce03d0231e565530d4', '1516400730', '185.225.208.18', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36'),
(140, 48, 1, '46aef354e331658952ea666c8b721a87d1239274', '1516403237', '118.209.41.86', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36'),
(141, 52, 1, '19a26ae860995e029d88e8dbffe30e3c2df6ee02', '1516409634', '67.174.115.180', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_2_2 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) CriOS/63.0.3239.73 Mobile/15C202 Safari/604.1'),
(142, 27, 1, '2d15b02788f1c29ae4c32f776905b7f64aadbe87', '1516441005', '39.44.32.45', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_3 like Mac OS X) AppleWebKit/603.3.8 (KHTML, like Gecko) Version/10.0 Mobile/14G60 Safari/602.1'),
(145, 7, 1, '3e017ca1723e67c7ddb009238cc0f39e1b8fc7fb', '1516467530', '111.125.111.145', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE IF NOT EXISTS `support` (
  `id` bigint(11) NOT NULL,
  `uid` bigint(11) DEFAULT NULL,
  `subject` int(3) DEFAULT NULL,
  `message` text,
  `status` int(1) NOT NULL DEFAULT '0',
  `time` varchar(20) DEFAULT NULL,
  `product_id` bigint(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `uid`, `subject`, `message`, `status`, `time`, `product_id`) VALUES
(1, 40, 1, 'On the buy now it only shows a 5% bonus and not a 50% bonus.  Is that an error on your website?', 0, '1516318806', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `product_id` bigint(11) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `isactive` tinyint(1) DEFAULT '0',
  `time` varchar(20) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `referrer` bigint(11) DEFAULT NULL,
  `referrals` bigint(11) NOT NULL DEFAULT '0',
  `referral_visits` bigint(11) NOT NULL DEFAULT '0',
  `referral_link` varchar(8) DEFAULT NULL,
  `two_factor` varchar(16) DEFAULT NULL,
  `oauth_service` varchar(10) DEFAULT NULL,
  `country_code` varchar(10) DEFAULT NULL,
  `first_name` varchar(500) DEFAULT NULL,
  `last_name` varchar(500) DEFAULT NULL,
  `gender` varchar(500) DEFAULT NULL,
  `google_link` varchar(500) DEFAULT NULL,
  `facebook_birthday` varchar(500) DEFAULT NULL,
  `facebook_website` varchar(500) DEFAULT NULL,
  `facebook_location` varchar(500) DEFAULT NULL,
  `facebook_id` varchar(500) DEFAULT NULL,
  `oauth_email` varchar(500) DEFAULT NULL,
  `oauth_id` varchar(500) DEFAULT NULL,
  `twitter_name` varchar(500) DEFAULT NULL,
  `twitter_username` varchar(500) DEFAULT NULL,
  `twitter_location` varchar(500) DEFAULT NULL,
  `twitter_website` varchar(500) DEFAULT NULL,
  `twitter_followers` varchar(500) DEFAULT NULL,
  `twitter_friends` varchar(500) DEFAULT NULL,
  `twitter_created_at` varchar(500) DEFAULT NULL,
  `twitter_lang` varchar(500) DEFAULT NULL,
  `twitter_time_zone` varchar(500) DEFAULT NULL,
  `twitter_verified` varchar(50) DEFAULT NULL,
  `twitter_image` varchar(500) DEFAULT NULL,
  `oauth_google` varchar(500) DEFAULT NULL,
  `oauth_twitter` varchar(500) DEFAULT NULL,
  `oauth_facebook` varchar(500) DEFAULT NULL,
  `p` varchar(100) DEFAULT NULL,
  `admin` int(1) DEFAULT '0',
  `ETH_address` varchar(50) DEFAULT NULL,
  `ETH_address_provided` varchar(42) DEFAULT NULL,
  `SBD_address_provided` tinyint(1) NOT NULL DEFAULT '0',
  `GOLOS_address_provided` tinyint(1) NOT NULL DEFAULT '0',
  `BTS_address_provided` tinyint(1) NOT NULL DEFAULT '0',
  `ethereum_balance` varchar(100) DEFAULT '0',
  `ethereum_balance_timestamp` varchar(20) DEFAULT '0',
  `balance` varchar(100) DEFAULT '0',
  `balance_bonus` varchar(100) DEFAULT '0',
  `balance_referrer` varchar(100) DEFAULT '0',
  `balance_bounty` varchar(100) NOT NULL DEFAULT '0',
  `bitcointalk_username` varchar(100) DEFAULT NULL,
  `translation_pending` tinyint(1) NOT NULL DEFAULT '0',
  `signature_pending` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_wallets`
--

CREATE TABLE IF NOT EXISTS `user_wallets` (
  `id` bigint(11) NOT NULL,
  `uid` bigint(11) NOT NULL,
  `product_id` bigint(11) NOT NULL,
  `wallet_address` varchar(100) NOT NULL,
  `currency` varchar(20) NOT NULL DEFAULT 'ETH',
  `time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE IF NOT EXISTS `visits` (
  `id` bigint(20) NOT NULL,
  `uid` bigint(11) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `product_id` bigint(11) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE IF NOT EXISTS `withdrawals` (
  `id` bigint(11) NOT NULL,
  `uid` bigint(11) NOT NULL,
  `payment_id` bigint(11) NOT NULL,
  `address` varchar(42) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `complete` tinyint(1) NOT NULL DEFAULT '0',
  `tx` varchar(100) DEFAULT NULL,
  `time` varchar(20) NOT NULL,
  `product_id` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance_actions`
--
ALTER TABLE `balance_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bounty`
--
ALTER TABLE `bounty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_settings`
--
ALTER TABLE `currency_settings`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `currency_to_eth`
--
ALTER TABLE `currency_to_eth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency_to_usd`
--
ALTER TABLE `currency_to_usd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_wallets`
--
ALTER TABLE `deposit_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redirects`
--
ALTER TABLE `redirects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_links`
--
ALTER TABLE `referral_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_wallets`
--
ALTER TABLE `user_wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balance_actions`
--
ALTER TABLE `balance_actions`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bounty`
--
ALTER TABLE `bounty`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `currency_settings`
--
ALTER TABLE `currency_settings`
  MODIFY `product_id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `currency_to_eth`
--
ALTER TABLE `currency_to_eth`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `currency_to_usd`
--
ALTER TABLE `currency_to_usd`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `deposit_wallets`
--
ALTER TABLE `deposit_wallets`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `redirects`
--
ALTER TABLE `redirects`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `referral_links`
--
ALTER TABLE `referral_links`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_wallets`
--
ALTER TABLE `user_wallets`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
