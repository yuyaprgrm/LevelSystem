<?php

namespace FAMIMA\LevelSystem\database;

use pocketmine\utils\Config;
use FAMIMA\LevelSystem\LevelSystem;
use FAMIMA\LevelSystem\database\DatabaseManager;

class YAMLDatabase implements DatabaseManager
{

	/** @var Config */
	public $Config;

	/** @var LevelSystem */
	protected $ls;



	public function __construct(LevelSystem $ls)
	{
		$this->ls = $ls;
		$this->ls->getLogger()->info("起動: LevelSystem.YAMLDatabase");
		$this->Config = new Config($this->ls->getDataFolder() . "players.yml", Config::YAML);
	}


	public function getLevel(string $user)
	{

	}


	public function setLevel(string $user, int $level)
	{

	}


	public function getExp(string $user)
	{

	}


	public function setExp(string $user, int $exp)
	{

	}


	public function isRegist(string $user)
	{

	}


	public function registUser(string $user)
	{

	}


	public function getKill(string $user)
	{

	}


	public function setKill(string $user, int $kill)
	{

	}


	public function getDeath(string $user)
	{

	}


	public function setDeath(string $user, int $death)
	{

	}

}