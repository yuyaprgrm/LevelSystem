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
	}




	/******API********/
	/**
	 * @param string $user
	 * @param int $lv
	 */
	public function setLevel(string $user, int $lv = 1)
	{

	}

	/** 
	 * @param string $user
	 * 
	 * @return int
	 */
	public function getLevel(string $user)
	{

	}

	public function addLevel(string $user, int $lv)
	{

	}

	/** @var string, @var int */
	public function setExp(string $user, int $exp = 0)
	{

	}

	/** @var string */
	public function getExp(string $user)
	{

	}

	/** @var string */
	public function addExp(string $user, int $exp)
	{

	}

	/** @var string */
	public function registUser(string $user)
	{

	}

	public function hasRegist(string $user)
	{
		
	}

}