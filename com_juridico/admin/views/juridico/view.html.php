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

class JuridicoViewJuridico extends JView
{
	public function display($tpl = null) 
	{
		// get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');

		// Assign the Data
		$this->form = $form;
		$this->item = $item;

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	protected function addToolBar() 
	{
		JRequest::setVar('hidemainmenu', true);
		$isNew = ($this->item->id == 0);
		$user = JFactory::getUser();
		$userId = $user->id;
		$canDo = JuridicoHelper::getActions($this->item->id);
		JToolBarHelper::title($isNew ? JText::_('COM_JURIDICO_MANAGER_JURIDICO_NEW') : JText::_('COM_JURIDICO_MANAGER_JURIDICO_EDIT'), 'generic.png');
		// Built the actions for new and existing records.
		if ($isNew) 
		{
			// For new records, check the create permission.
			if ($canDo->get('core.create')) 
			{
				JToolBarHelper::apply('juridico.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('juridico.save', 'JTOOLBAR_SAVE');
				JToolBarHelper::custom('juridico.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
			}
			JToolBarHelper::cancel('juridico.cancel', 'JTOOLBAR_CANCEL');
		}
		else
		{
			if ($canDo->get('core.edit'))
			{
				// We can save the new record
				JToolBarHelper::apply('juridico.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('juridico.save', 'JTOOLBAR_SAVE');

				// We can save this record, but check the create permission to see if we can return to make a new one.
				if ($canDo->get('core.create')) 
				{
					JToolBarHelper::custom('juridico.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
				}
			}
			if ($canDo->get('core.create')) 
			{
				JToolBarHelper::custom('juridico.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
			}
			JToolBarHelper::cancel('juridico.cancel', 'JTOOLBAR_CLOSE');
		}
	}

	protected function setDocument() 
	{
		$isNew = ($this->item->id < 1);
		$document = JFactory::getDocument();
		$document->setTitle($isNew ? JText::_('COM_JURIDICO_JURIDICO_CREATING') : JText::_('COM_JURIDICO_JURIDICO_EDITING'));
		$document->addScript(JURI::root() . "media/com_juridico/js/juridico.js");
	}
}
