<?php
require '../../engine.php';

header('Access-Control-Allow-Origin: *');

$id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
$referral=filter_input(INPUT_GET,'referral',FILTER_SANITIZE_STRING);

if(!is_numeric($id) || $id=='' || $id<=0){header('location: /');}

if((!is_numeric($referral) || $referral=='' || $referral<=0) && $user['referrer']!=''){$referral=$user['referrer'];}

$query=$db->prepare("SELECT * FROM redirects WHERE id=? AND product_id=?");
$query->execute(array($id,$product['id']));
$row=$query->fetch(\PDO::FETCH_ASSOC);

if($query->rowCount()==0){header('location: /');}

if(!isset($_SESSION['visit_'.$id])){

if(is_numeric($referral) && $referral!='' && $referral>0){

$query = $db->prepare("SELECT isactive FROM users WHERE id = ? AND product_id=?");
$query->execute(array($referral,$product['id']));
if($query->rowCount()>0 && $query->fetch(\PDO::FETCH_ASSOC)['isactive']=='1'){

$query=$db->prepare("SELECT * FROM visits WHERE uid=? AND type=? AND ip=? AND country=? AND product_id=?");
$query->execute(array($referral,$row['type'],$user['ip'],$user['country_code'],$product['id']));

if($query->rowCount()==0){

$query=$db->prepare("INSERT INTO visits (uid, type, ip, country, product_id, time) VALUES (?, ?, ?, ?, ?, ?)");
$query->execute(array($referral,$row['type'],$user['ip'],$user['country_code'],$product['id'],time()));

$_SESSION['visit_'.$id]=true;}}

}else{

if(strlen($referral)==8 && strcspn($referral,'0123456789')==strlen($referral)){

$query = $db->prepare("SELECT id FROM referral_links WHERE link = ? AND product_id=?");
$query->execute(array($referral,$product['id']));
if($query->rowCount()>0){

$query=$db->prepare("SELECT * FROM visits WHERE referral_link=? AND type=? AND ip=? AND country=? AND product_id=?");
$query->execute(array($referral,$row['type'],$user['ip'],$user['country_code'],$product['id']));

if($query->rowCount()==0){

$query=$db->prepare("INSERT INTO visits (referral_link, type, ip, country, product_id, time) VALUES (?, ?, ?, ?, ?, ?)");
$query->execute(array($referral,$row['type'],$user['ip'],$user['country_code'],$product['id'],time()));

$set='';
if($row['type']=='main_website'){$set='referral_visits_portal';}
if($row['type']=='buy' || $row['type']=='platform'){$set='referral_visits_external';}
if($row['type']=='wp'){$set='referral_visits_wp';}

$query=$db->prepare("UPDATE referral_links SET {$set}={$set}+? WHERE link=? AND product_id=?");
if(!$query->execute(array_values(array('1',$referral,$product['id']))));

$_SESSION['visit_'.$id]=true;}}

}}}

header('location: '.$row['url']);
?>