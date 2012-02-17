<?php 

class EBootstrapIcon {
	public static function icon($icon, $white = false) {
		$return = '<i class="icon-'.$icon;
		if ($white)
			$return .= ' icon-white';
		return $return.'"></i>';
	}
}

?>