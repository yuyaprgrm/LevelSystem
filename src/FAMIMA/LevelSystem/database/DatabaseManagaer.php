<?php

namespace FAMIMA\LevelSystem\database;

use FAMIMA\LevelSystem\database\SqliteDatabase;
use FAMIMA\LevelSystem\database\MySQLDatabase;
use FAMIMA\LevelSystem\database\YAMLDatabase;

interface DatabaseManagaer
{


	/**
	 * @param string $user
	 *
	 * @return int
	 */
	public function getLevel(string $user);


	/**
	 * @param string $user
	 * @param int $level
	 */
	public function setLevel(string $user, int $level);


	/**
	 * @param string $user
	　*
	　* @return int
	 */
	public function getExp(string $user);


	/**
	 * @param string $user
	 * @param int $exp
	 */
	public function setExp(string $user, int $exp);

	
	/**
	 * @param string $user
	 *
	 * @return bool
	 */
	public function isRegist(string $user);


	/**
	 * @param string $user
	 */
	public function registUser(string $user);


	/**
	 * @param string $user
	 *
	 * @return int
	 */
	public function getKill(string $user);

	/**
	 * @param string $user
	 * @param int $kill
	 */
	public function setKill(string $user, int $kill);

	
	/**
	 * @param string $user
	 *
	 * @return int
	 */
	public function getDeath(string $user);


	/**
	 * @param string $user
	 * @param int $kill
	 */
	public function setDeath(string $user, int $kill);

}