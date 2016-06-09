<?php

namespace FAMIMA\LevelSystem;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityByEntityDamageEvent;

class Eventlistener implements Listener
{

	/** @var LevelSystem */
	private $ls;
	
	
	public function __construct(LevelSystem $plugin)
	{
		$this->ls = $plugin;
		$this->ls->getLogger()->info("起動: LevelSyetem.Listener");
		$this->ls->getServer()->getPluginManager()->registerEvents($this, $this->ls);
	}
	
	public function onJoin(PlayerJoinEvent $event)
	{
		$player = $event->getPlayer();
		$name = $player->getName();
		if(!$this->ls->isRegist($name)){
			$player->sendMessage(TF::BLUE."[LevelSystem]".TF::WHITE."はじめまして, ".$name."さん");
			$player->sendMessage(TF::BLUE."[LevelSystem]".TF::WHITE.$name."さんのデータを作成しました");
			$this->ls->registUser($name);
		}else{
			$player->sendMessage(TF::BLUE."[LevelSystem]".TF::WHITE."ようこそ, ".$name. "さん");
		}
	}

	public function onEntityDamage(EntityDamageEvent $event)
	{
		
	}
}
