<?php

/**
 * @package		Joomla.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

// Set some global property
$document = JFactory::getDocument();
$document->addStyleDeclaration('.icon-48-juridico {background-image: url(../media/com_juridico/images/tux-48x48.png);}');

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_juridico')) 
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Require helper file
JLoader::register('JuridicoHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'juridico.php');

// Get an instance of the controller prefixed by Juridico
$controller = JController::getInstance('Juridico');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
