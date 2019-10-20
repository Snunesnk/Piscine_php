#!/usr/bin/php
<?php

function create_user()
{
	$pwdroot = hash("whirlpool","root");
	$arr = array();
	$new_user['login'] = "avanhers";
	$new_user['passwd'] = hash("whirlpool","root");
	$new_user['su'] = 1;
	$arr[]=$new_user;
	$new_user['login'] = "snunes";
	$new_user['passwd'] = hash("whirlpool","root");
	$new_user['su'] = 1;
	$arr[]=$new_user;
	$str_user = serialize($arr);
	file_put_contents("private/users",$str_user);
}

function create_categorie()
{

	$femme['nom']="femme";
	$femme['image']="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ82IeeD8T4t8HFdVZhMr14ye8gad_HSnJyGrqo4PWRdxCyEyHZ";
	$enfant['nom']="enfant";
	$enfant['image'] = 	"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9C5mdr4Jk0uXHduIaPKmSG5irOE-UydJeAa0wtcrCg5ad-gn4";	
	$homme['nom']="homme";
	$homme['image']= "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiD43x5ng4iumwPfLlsAt6ei5qeyeym8HrERP8IG4TjkkecFU4";
	$categ[]=$femme;
	$categ[]=$homme;
	$categ[]=$enfant;
	$str_categ=serialize($categ);	
	file_put_contents("private/categorie",$str_categ);
}

function create_article()
{
	$sombrero['id'] = 1;
	$sombrero['categorie']['homme'] = "O";
	$sombrero['categorie']['femme'] = "N";
	$sombrero['categorie']['enfant'] = "N";
	$sombrero['type'] = "sombrero";
	$sombrero['price'] = 15;
	$sombrero['image'] = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9ZKEtw7g8_jF7UKGb_uIpqP7_d0we5oeFLn6k2hSy_thYv2-s";

	$bonnet['id'] = 2;
	$bonnet['categorie']['homme'] = "O";
	$bonnet['categorie']['femme'] = "O";
	$bonnet['categorie']['enfant'] = "N";
	$bonnet['type'] = "bonnet";
	$bonnet['price'] = 5;
	$bonnet['image'] = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeY4dgHyt5aYAqFUAq-V9bWZ2J-S5xYX4YJQS1-c4V-OseVFZA";

	$cowboy['id'] = 3;
	$cowboy['categorie']['homme'] = "O";
	$cowboy['categorie']['femme'] = "N";
	$cowboy['categorie']['enfant'] = "N";
	$cowboy['type'] = "cowboy";
	$cowboy['price'] = 10;
	$cowboy['image'] = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdEiq1BPjerK7qXvFNc9QDzSvwojaR14y5McI-u2uN44uRJ_vA";
	
	$mariage['id'] = 4;
	$mariage['categorie']['femme'] = "O";
	$mariage['categorie']['homme'] = "N";
	$mariage['categorie']['enfant'] = "N";
	$mariage['type'] = "Chapeau de mariage";
	$mariage['price'] = 100;
	$mariage['image'] = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT4KJLi6tpJUmCKOFfsP7PLVvMGyGR7nIGuiw-vFJ2lVq8NN2VV";
	
	$paille['id'] = 5;
	$paille['categorie']['femme'] = "O";
	$paille['categorie']['homme'] = "N";
	$paille['categorie']['enfant'] = "N";
	$paille['type'] = "Chapeau de paille";
	$paille['price'] = 15;
	$paille['image'] = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRShd2nNkfT6-zYnAWtWVGMk37ROCcJ6y16ITflcyaeDv-MtjwJ";

	$bob['id']= 6;
	$bob['categorie']['enfant'] = "O";
	$bob['categorie']['femme'] = "N";
	$bob['categorie']['homme'] = "N";
	$bob['type'] = "Bob";
	$bob['price'] = 1;
	$bob['image'] = "https://www.petit-bateau.be/dw/image/v2/BCKL_PRD/on/demandware.static/-/Sites-PB_master/default/dw3e9aaa72/PB/5133902.jpg?sw=366&sh=428&sm=fit";

	$plage['id']= 7;
	$plage['categorie']['enfant'] = "O";
	$plage['categorie']['femme'] = "N";
	$plage['categorie']['homme'] = "N";
	$plage['type'] = "plage-rose";
	$plage['price'] = 899;
	$plage['image'] = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyXwj5BtXhRIqQ0upnV0JuZsiXHMlDUspYA0SkEyN3X__rlREU";

	$chap[]=$bonnet;
	$chap[]=$sombrero;
	$chap[]=$cowboy;
	$chap[]=$mariage;
	$chap[]=$paille;
	$chap[]=$bob;
	$chap[]=$plage;
	$str_chap = serialize($chap);
	file_put_contents("private/article",$str_chap);
}

if (!file_exists("private"))
	mkdir("private");
create_user();
create_article();
create_categorie();
?>
