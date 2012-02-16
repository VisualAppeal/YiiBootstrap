<?php
/**
 * LessCompilationBehavior class file.
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */

class LessCompilationBehavior extends CBehavior
{
    /**
     * Declares events and the corresponding event handler methods.
     * @return array events (array keys) and the corresponding event handler methods (array values).
     */
	public function events()
	{
		return array(
			'onBeginRequest'=>'beginRequest',
		);
	}

	/**
	 * Actions to take before doing the request.
	 */
	public function beginRequest()
	{
		if (YII_DEBUG)
			$this->owner->lessCompiler->compile();
	}
}
