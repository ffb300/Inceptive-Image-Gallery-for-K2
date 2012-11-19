<?php
/**
 * @version		1.1
 * @package		Inceptive Image Gallery for K2(K2 plugin)
 * @author              Inceptive - http://www.inceptive.gr
 * @copyright           Copyright (c) 2006 - 2012 Inceptive GP. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' ); 

if(version_compare(JVERSION,'1.6.0','ge')) {
	jimport('joomla.form.formfield');
	class JFormFieldHeader extends JFormField {

		var	$type = 'header';

		function getInput(){
			$document = & JFactory::getDocument();
			$document->addStyleDeclaration('
				.jwHeaderClr { clear:both; height:0; line-height:0; border:none; float:none; background:none; padding:0; margin:0; }
				.jwHeaderContainer { clear:both; font-weight:bold; font-size:12px; color:#369; margin:12px 0 4px; padding:0; background:#d5e7fa; border-bottom:2px solid #96b0cb; float:left; width:100%; }
				.jwHeaderContainer15 { clear:both; font-weight:bold; font-size:12px; color:#369; margin:0; padding:0; background:#d5e7fa; border-bottom:2px solid #96b0cb; float:left; width:100%; }
				.jwHeaderContent { padding:6px 8px; }
			');
			return '<div class="jwHeaderContainer"><div class="jwHeaderContent">'.JText::_($this->value).'</div><div class="jwHeaderClr"></div></div>';
		}

		function getLabel(){
			return '';
		}

	}
}

if(version_compare(JVERSION,'1.6.0','le')) {

	jimport('joomla.html.parameter.element');

	class JElementHeader extends JElement {

		var	$_name = 'header';

		function fetchElement($name, $value, &$node, $control_name){
			$document = & JFactory::getDocument();
			$document->addStyleDeclaration('
				.jwHeaderClr { clear:both; height:0; line-height:0; border:none; float:none; background:none; padding:0; margin:0; }
				.jwHeaderContainer { clear:both; font-weight:bold; font-size:12px; color:#369; margin:12px 0 4px; padding:0; background:#d5e7fa; border-bottom:2px solid #96b0cb; float:left; width:100%; }
				.jwHeaderContainer15 { clear:both; font-weight:bold; font-size:12px; color:#369; margin:0; padding:0; background:#d5e7fa; border-bottom:2px solid #96b0cb; float:left; width:100%; }
				.jwHeaderContent { padding:6px 8px; }
			');
			return '<div class="jwHeaderContainer15"><div class="jwHeaderContent">'.JText::_($value).'</div><div class="jwHeaderClr"></div></div>';
		}

		function fetchTooltip($label, $description, &$node, $control_name, $name){
			return NULL;
		}
	}
}
