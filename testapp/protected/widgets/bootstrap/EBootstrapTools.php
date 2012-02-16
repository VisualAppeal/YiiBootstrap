<?php 

class EBootstrapTools {
	public static function mergeClass(array &$option, array $add) {
		if (isset($option['class']) and (!empty($option['class']))) {
			foreach ($add as $k => $v) {
				$option['class'] .= ' '.$v;
			}
		}
		else
			$option['class'] = implode(' ', $add);
	
	}
}

?>