<?php

namespace FAMIMA\LevelSystem;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use FAMIMA\LevelSystem\EventListener;

class LevelSystem extends PluginBase
{
	/** @var database */
	protected $database;

	/** @var Array */
	protected $cdata;

	/** @var listener*/
	protected $listener;

	public function onEnable()
	{
		$this->getLogger()->info("起動: LevelSystem");
		
		$listener = new EventListener($this);
		
		if(!file_exists($this->getDataFolder()))
		{
			mkdir($this->getDataFolder());
			$this->data = new Config($this->getDataFolder() . "Config.yml", Config::YAML, 
				array(
					"saveData" => "YAML"
					)
				);
		}
		$this->data = new Config($this->getDataFolder() . "Config.yml", Config::YAML);
		if(!$this->data->exists("saveData"))
		{
			$this->data = new Config($this->getDataFolder() . "Config.yml", Config::YAML, 
				array(
					"saveData" => "YAML"
					)
				);

		}
		switch($this->data->get("saveData")){
			case 'YAML':
				$this->database = new YAMLDatabase($this);
				break;
			case 'sqlite':
			case 'MySQL':
			default:
				$this->database = new YAMLDatabase($this);
				break;
		}
	}




	/******API********/
	/**
	 * @param string $user
	 * @param int $lv
	 */
	public function setLevel(string $user, int $lv = 1)
	{
		$this->database->setLevel($user, $lv);
	}


	/** 
	 * @param string $user
	 * 
	 * @return int
	 */
	public function getLevel(string $user)
	{
		return $this->database->getLevel($user);
	}


	/**
	 * @param string $user
	 * @param int $lv
	 */
	public function addLevel(string $user, int $lv)
	{
		$level = $this->database->getLevel($user);
		$level += $lv;
		$this->database->setLevel($user, $level);
	}


	public function setExp(string $user, int $exp = 0)
	{
		$this->database->setExp($user, $exp);
	}


	public function getExp(string $user)
	{
		return $this->database->getExp($user);
	}

	
	public function getLevelUpExp(string $user)
	{
		return $this->getLevelUpExp($user);
	}
	
	
	public function setLevelUpExp(string $user, int $exp)
	{
		$this->database->setLevelUpExp($user, $lv);
	}
	
	
	public function addExp(string $user, int $exp)
	{
		$Lexp = $this->database->getExp($user);
		$Lexp += $exp;
		$this->database->setExp($user, $Lexp);
	}


	public function registUser(string $user)
	{
		$this->database->registUser($user);
	}


	public function hasRegist(string $user)
	{
		return $this->database->isRegist($user);
	}

}
