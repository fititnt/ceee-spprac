<?php

/**
 * @package		Joomla.Tutorials
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access to this file
defined('_JEXEC') or die;

class JuridicoHelper {

	public static function addSubmenu($submenu) {
		JSubMenuHelper::addEntry(JText::_('COM_JURIDICO_SUBMENU_MESSAGES'), 'index.php?option=com_juridico', $submenu == 'messages');
		JSubMenuHelper::addEntry(JText::_('COM_JURIDICO_SUBMENU_PROCESSO_INCLUIRS'), 'index.php?option=com_juridico&view=processo_incluirs', $submenu == 'Processo_incluir');
		JSubMenuHelper::addEntry(JText::_('COM_JURIDICO_SUBMENU_CATEGORIES'), 'index.php?option=com_categories&view=categories&extension=com_juridico', $submenu == 'categories');
		$document = JFactory::getDocument();
		if ($submenu == 'categories') {
			$document->setTitle(JText::_('COM_JURIDICO_ADMINISTRATION_CATEGORIES'));
		}
	}

	public static function getActions($messageId = 0) {
		$user = JFactory::getUser();
		$result = new JObject;

		if (empty($messageId)) {
			$assetName = 'com_juridico';
		} else {
			$assetName = 'com_juridico.message.' . (int) $messageId;
		}

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}

}
