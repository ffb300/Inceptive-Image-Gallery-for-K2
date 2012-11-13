<?php
/**
 * @version		1.0
 * @package		K2 Image Gallery (K2 plugin)
 * @author              Inceptive - http://www.inceptive.gr
 * @copyright           Copyright (c) 2006 - 2012 Inceptive GP. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 

class K2ImageGalleryHelper {

	// Path overrides for MVC templating
	function getTemplatePath($pluginName,$file,$tmpl){

		$mainframe = &JFactory::getApplication();
		$p = new JObject;
		$pluginGroup = 'k2';

		if(file_exists(JPATH_SITE.DS.'templates'.DS.$mainframe->getTemplate().DS.'html'.DS.$pluginName.DS.$tmpl.DS.str_replace('/',DS,$file))){
			$p->file = JPATH_SITE.DS.'templates'.DS.$mainframe->getTemplate().DS.'html'.DS.$pluginName.DS.$tmpl.DS.$file;
			$p->http = JURI::root(true)."/templates/".$mainframe->getTemplate()."/html/{$pluginName}/{$tmpl}/{$file}";
		} else {
			if(version_compare(JVERSION,'1.6.0','ge')) {
				// Joomla! 1.6
				$p->file = JPATH_SITE.DS.'plugins'.DS.$pluginGroup.DS.$pluginName.DS.$pluginName.DS.'tmpl'.DS.$tmpl.DS.$file;
				$p->http = JURI::root(true)."/plugins/{$pluginGroup}/{$pluginName}/{$pluginName}/tmpl/{$tmpl}/{$file}";
			} else {
				// Joomla! 1.5
				$p->file = JPATH_SITE.DS.'plugins'.DS.$pluginGroup.DS.$pluginName.DS.'tmpl'.DS.$tmpl.DS.$file;
				$p->http = JURI::root(true)."/plugins/{$pluginGroup}/{$pluginName}/tmpl/{$tmpl}/{$file}";
			}
		}
		return $p;
	}

} // end class