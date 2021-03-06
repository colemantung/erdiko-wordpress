<?php
/**
 * Example WordPress Controller
 * An example of how to use wordpress with erdiko
 *
 * @category 	app
 * @package   	Example
 * @copyright	Copyright (c) 2014, Arroyo Labs, www.arroyolabs.com
 * @author 		John Arroyo, john@arroyolabs.com
 */
namespace erdiko\wordpress\controllers;

use Erdiko;
use erdiko\core\Config;

/**
 * Example Controller Class
 */
class Example extends \erdiko\core\Controller
{
	/** Before */
	public function _before()
	{
		$this->setThemeName('bootstrap');
		$this->prepareTheme();
	}

	/**
	 * Get
	 *
	 * @param mixed $var
	 * @return mixed
	 */
	public function get($var = null)
	{
		// error_log("var: $var");
		if(!empty($var))
		{
			// load action based off of naming conventions
			return $this->_autoaction($var, 'get');

		} else {
			return $this->getIndex();
		}
	}

	/**
	 * Wordpredd example
	 */
	public function getIndex()
	{
		$model = new \erdiko\wordpress\Model;

		$post = $model->print_post();
		$content = "<pre>".print_r($post, true)."</pre>";

		$this->setContent( $content );
	}
}
