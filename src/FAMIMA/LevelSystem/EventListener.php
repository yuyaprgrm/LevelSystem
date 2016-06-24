<?php

namespace FAMIMA\LevelSystem;

use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\utils\TextFormat as TF;

class Eventlistener implements Listener
{

	/** @var LevelSystem */
	private $ls;
	
	/** @var Array */
	public $message = [
			"ls" => "[".TF::BLUE."LevelSystem".TF::WHITE."]"
			];
	
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
		if(!$this->ls->isRegist($name))
		{
			$player->sendMessage($this->message["ls"]."はじめまして, ".$name."さん");
			$player->sendMessage($this->message["ls"].$name."さんのデータを作成しました");
			$this->ls->registUser($name);
		}else{
			$player->sendMessage($this->message["ls"]."ようこそ, ".$name. "さん");
		}
	}


	public function onEntityDeath(PlayerDeathEvent $event)
	{
		$player = $event->getEntity();
		$damage = $player->getLastDamageCause();
		if($damage instanceof EntityDamageByEntityEvent)
		{
			$damager = $damage->getDamager();
			if($damager instanceof Player and $player instanceof Player)
			{
				$dmname = $damager->getName();
				$dename = $player->getName();
				$dmexp = $this->ls->getExp($dmname);
				$dmluexp = $this->ls->getLevelUpExp($dmname);
				$delevel = $this->ls->getLevel($dename);
				$gexp = $delevel*2 + mt_rand(0, 20);
				$ndmexp = $dmexp + $gexp;
				$dmlevel = $this->ls->getLevel($dmname);
				for($pl = 0; $ndmexp >= $dmluexp; $pl++)
				{
					$ndmexp -= $dmluexp;
					$dmluexp += mt_rand(0, 5) + 5;
				}
				$this->ls->addLevel($dmname, $pl);
				$this->ls->setExp($dmname, $ndmexp);
				$this->ls->setLevelUpExp($dmname, $dmluexp);
				$damager->sendMessage($this->message["ls"].$dename."を倒してExpを".$gexp."手に入れた");
				if($pl > 0)
				{
					$level = $dmlevel + $pl;
					$this->ls->getServer()->broadcastMessage($this->message["ls"].$dmname."がLevelUp! ".$dmlevel."→".$level);
				}
			}
		}
	}
}
