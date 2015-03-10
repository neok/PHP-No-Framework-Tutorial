<?php
namespace Project\Params;

/**
 * Class UserParams
 * @method setId(int $id)
 * @method int getId()
 *
 * @method setName(string $name)
 * @method string getName()
 */
class UserParams extends AbstractParams
{
	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var string
	 */
	protected $name;

}