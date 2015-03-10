<?php
namespace Project\Model;

/**
 * Class Service
 *
 * @package Project\Model
 */
class Service
{
	/**
	 * @var DataMapper
	 */
	private $dataMapper;

	/**
	 * @param DataMapper $mapper
	 */
	public function __construct(DataMapper $mapper)
	{
		$this->dataMapper = $mapper;
	}

	/**
	 * @return array
	 */
	public function findSomething()
	{
		return $this->dataMapper->find();
	}
}