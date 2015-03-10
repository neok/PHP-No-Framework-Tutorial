<?php
namespace Project\Params;

/**
 * Class AbstractParams
 *
 * @package Project\Params
 */
abstract class AbstractParams
{
	/**
	 * @var \ReflectionClass
	 */
	private $reflection;

	/**
	 * @var array
	 */
	private static $filterable = array('bool', 'boolean', 'int', 'integer', 'float', 'string');

	/**
	 * @param array $params
	 */
	public function __construct(array $params = array())
	{
		$this->reflection = new \ReflectionClass($this);

		if (!empty($params)) {
			foreach ($params as $param => $value) {
				$setter = 'set' . ucfirst($param);

				$this->$setter($value);
			}
		}
	}

	/**
	 * @param $name
	 * @param $arguments
	 *
	 * @return bool|mixed|null
	 */
	public function __call($name, $arguments)
	{
		$prefix = substr($name,0, 3);
		$name = lcfirst(substr($name, 3));

		if (in_array($name, array('reflection', 'filterable', 'paramErrors'))) {
			return false;
		}

		if (!property_exists($this, $name)){
			return false;
		} else {
			switch ($prefix) {
				case "get":
					return $this->defaultGetter($name);
					break;
				case "set":
					if (!isset($arguments[0])) {
						return false;
					}
					$this->defaultSetter($name, $arguments[0]);
					break;
				default:

			}
		}
		return null;
	}

	/**
	 * @param $param
	 * @param $value
	 *
	 * @return $this
	 */
	protected  function defaultSetter($param, $value)
	{
		$propery = $this->reflection->getProperty($param);
		$doComment = $propery->getDocComment();
		preg_match("/@var (.*)$/m", $doComment, $type);
		if (2 == count($type) && !empty($type[1])) {
			$type = trim($type[1]);

		}
		if (in_array($type, self::$filterable)) {

			settype($value, $type);
		}
		$this->$param = $value;

		return $this;
	}

	/**
	 * @param $param
	 *
	 * @return mixed
	 */
	protected function defaultGetter($param)
	{
		return $this->$param;
	}


}