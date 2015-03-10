<?php
namespace Project\Model;

/**
 * Class DataMapper
 *
 * @package Project\Model
 */
class DataMapper
{
	/**
	 * @var \PDO
	 */
	private $pdo;

	/**
	 * @param \PDO $pdo
	 */
	public function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	/**
	 * just an example
	 *
	 * @return array
	 */
	public function find()
	{
		$stmt = $this->pdo->prepare('SELECT * FROM test');
		$stmt->execute();
		$res = [];
		while($row = $stmt->fetch()) {
			$res[] = $row;
		}

		return $res;
	}
}