<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 * @filesource
 */
 
// ------------------------------------------------------------------------

/**
 * sg_dayphrase Plugin
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Plugin
 * @author		John Morton
 * @link		http://supergeekery.com
 */

$plugin_info = array(
	'pi_name'		=> 'SuperGeekery Day Phrase',
	'pi_version'	=> '1.1',
	'pi_author'		=> 'John Morton',
	'pi_author_url'	=> 'http://supergeekery.com',
	'pi_description'=> 'Output a phrase based on the day of the week.',
	'pi_usage'		=> Sg_dayphrase::usage()
);


class Sg_dayphrase {

	public $return_data;
    
	/**
	 * Constructor
	 */

	public function __construct()
	{
		$this->EE =& get_instance();
		$day = date("w");
		$default = $this->EE->TMPL->fetch_param('default', '');

		$phrases = array(
			$this->EE->TMPL->fetch_param('sunday', $default),
			$this->EE->TMPL->fetch_param('monday', $default),
			$this->EE->TMPL->fetch_param('tuesday', $default),
			$this->EE->TMPL->fetch_param('wednesday', $default),
			$this->EE->TMPL->fetch_param('thursday', $default),
			$this->EE->TMPL->fetch_param('friday', $default),
			$this->EE->TMPL->fetch_param('saturday', $default)
			);
		$this->return_data .= $phrases[$day];
	}

	// ----------------------------------------------------------------
	
	/**
	 * Plugin Usage
	 */
	public static function usage()
	{
		ob_start();
?>
The single tag {exp:sg_dayphrase} takes any combination of 8 parameters: sunday, monday, tuesday, wednesday, thursday, friday, saturday and default.

Based on the day of the week as determined by your server the matching parameter's value will be rendered in your HTML. If a parameter matching the current day of the week is not specified, the default phrase will be used. If no default phrase is specified, nothing will be returned.

{exp:sg_dayphrase
	sunday="I'm feeling sunny."
	monday= "I'm going cyan."
	tuesday="We're ready to go."
	wednesday="I'm talking turquoise."
	thursday="I'm feeling spooky."
	friday="I'm feeling funky."
	saturday="I'm going green."
	default = "I'm just showing a default message."
}

<?php
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}
}


/* End of file pi.sg_dayphrase.php */
/* Location: /system/expressionengine/third_party/sg_dayphrase/pi.sg_dayphrase.php */