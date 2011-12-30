<?php

/**
 * @package		Joomla.Tutorials
 * @subpackage	Component
 * @copyright	Copyright (C) 2005 - 2010 Open Source Matters, Inc. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

class JuridicoViewProcesso_incluirs extends JView
{
	function display($tpl = null) 
	{
		// Get data from the model
		$items = $this->get('Items');
		$pagination = $this->get('Pagination');

		// Assign data to the view
		$this->items = $items;
		$this->pagination = $pagination;

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	protected function addToolBar() 
	{
		$canDo = JuridicoHelper::getActions();
		JToolBarHelper::title(JText::_('COM_JURIDICO_MANAGER_JURIDICOS'), 'generic.png');
		if ($canDo->get('core.create')) 
		{
			JToolBarHelper::addNew('processo_incluir.add', 'JTOOLBAR_NEW');
		}
		if ($canDo->get('core.edit')) 
		{
			JToolBarHelper::editList('processo_incluir.edit', 'JTOOLBAR_EDIT');
		}
		if ($canDo->get('core.delete')) 
		{
			JToolBarHelper::deleteList('', 'processo_incluir.delete', 'JTOOLBAR_DELETE');
		}
		if ($canDo->get('core.admin')) 
		{
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_juridico');
		}
	}

	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_JURIDICO_ADMINISTRATION'));
	}
}
