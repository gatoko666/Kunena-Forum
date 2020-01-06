<?php
/**
 * @copyright      Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Log\Log;

/**
 * Finder Kunena Plugin
 *
 * @package        Joomla.Plugin
 * @subpackage     Kunena.finder
 * @since          2.5
 */
class plgKunenaFinder extends Joomla\CMS\Plugin\CMSPlugin
{
	/**
	 * Finder after save message method
	 * Message is passed by reference, but after the save, so no changes will be saved.
	 * Method is called right after the Message is saved
	 *
	 * @param   string  $context  The context of the message passed to the plugin (added in 1.6)
	 * @param   object  $table    A Table object containing the message
	 * @param   bool    $isNew    If the message has just been created
	 *
	 * @return  void
	 *
	 * @since   2.5
	 *
	 * @throws  Exception
	 */
	public function onKunenaAfterSave($context, $table, $isNew)
	{
		Log::add('onKunenaAfterSave context: ' . $context, Log::INFO);
		ob_start();
		$table_content = ob_get_contents();
		ob_end_clean();
		Log::add('onKunenaAfterSave table: ' . $table_content, Log::INFO);
		Log::add('onKunenaAfterSave isNew: ' . ($isNew) ? 'Yes' : 'No', Log::INFO);

		Joomla\CMS\Plugin\PluginHelper::importPlugin('finder');

		// Trigger the onFinderAfterSave event.
		Factory::getApplication()->triggerEvent('onFinderAfterSave', [$context, $table, $isNew]);
	}

	/**
	 * Finder before save message method
	 * Method is called right before the content is saved
	 *
	 * @param   string  $context  The context of the content passed to the plugin (added in 1.6)
	 * @param   object  $table    A Table object containing the message
	 * @param   bool    $isNew    If the message is just about to be created
	 *
	 * @return  void
	 *
	 * @since   2.5
	 *
	 * @throws  Exception
	 */
	public function onKunenaBeforeSave($context, $table, $isNew)
	{
		Log::add('onKunenaBeforeSave context: ' . $context, Log::INFO);
		ob_start();
		$table_content = ob_get_contents();
		ob_end_clean();
		Log::add('onKunenaBeforeSave table: ' . $table_content, Log::INFO);
		Log::add('onKunenaBeforeSave isNew: ' . ($isNew) ? 'Yes' : 'No', Log::INFO);

		Joomla\CMS\Plugin\PluginHelper::importPlugin('finder');

		// Trigger the onFinderBeforeSave event.
		Factory::getApplication()->triggerEvent('onFinderBeforeSave', [$context, $table, $isNew]);
	}

	/**
	 * Finder after delete message method
	 *
	 * @param   string  $context  The context of the content passed to the plugin (added in 1.6)
	 * @param   object  $table    A Table object containing the message
	 *
	 * @return  void
	 *
	 * @since   2.5
	 *
	 * @throws  Exception
	 */
	public function onKunenaAfterDelete($context, $table)
	{
		Log::add('onKunenaAfterDelete context: ' . $context, Log::INFO);
		ob_start();
		$table_content = ob_get_contents();
		ob_end_clean();
		Log::add('onKunenaAfterDelete table: ' . $table_content, Log::INFO);

		Joomla\CMS\Plugin\PluginHelper::importPlugin('finder');

		// Trigger the onFinderAfterDelete event.
		Factory::getApplication()->triggerEvent('onFinderAfterDelete', [$context, $table]);
	}

	/**
	 * Finder after delete message method
	 *
	 * @param   string  $context  The context of the content passed to the plugin (added in 1.6)
	 * @param   object  $table    A Table object containing the message
	 *
	 * @return  void
	 *
	 * @since   2.5
	 *
	 * @throws  Exception
	 */
	public function onKunenaBeforeDelete($context, $table)
	{
		Log::add('onKunenaBeforeDelete context: ' . $context, Log::INFO);
		ob_start();
		$table_content = ob_get_contents();
		ob_end_clean();
		Log::add('onKunenaBeforeDelete table: ' . $table_content, Log::INFO);

		Joomla\CMS\Plugin\PluginHelper::importPlugin('finder');

		// Trigger the onFinderAfterDelete event.
		Factory::getApplication()->triggerEvent('onFinderBeforeDelete', [$context, $table]);
	}
}
