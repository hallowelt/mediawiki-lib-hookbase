<?php
/**
 * Hook handler base class for MediaWiki hook EditPageBeforeEditButtons
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, version 3.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 *
 *
 *
 *
 * @author     Patric Wirth
 *
 * @copyright  Copyright (C) 2019 Hallo Welt! GmbH, All rights reserved.
 * @license    http://www.gnu.org/copyleft/gpl.html GPL-3.0-only
 * @filesource
 */
namespace HalloWelt\MediaWiki\Lib\HookBase\Hook;

use Config;
use EditPage;
use HalloWelt\MediaWiki\Lib\HookBase\Hook;
use IContextSource;

abstract class EditPageBeforeEditButtons extends Hook {

	/**
	 *
	 * @var EditPage
	 */
	protected $editpage = null;

	/**
	 *
	 * @var array
	 */
	protected $buttons = null;

	/**
	 *
	 * @var int
	 */
	protected $tabindex = null;

	/**
	 *
	 * @param EditPage &$editpage
	 * @param array &$buttons
	 * @param int &$tabindex
	 * @return bool
	 */
	public static function callback( &$editpage, &$buttons, &$tabindex ) {
		$className = static::class;
		$hookHandler = new $className(
			$editpage->getContext(),
			null,
			$editpage,
			$buttons,
			$tabindex
		);
		return $hookHandler->process();
	}

	/**
	 *
	 * @param IContextSource $context
	 * @param Config $config
	 * @param EditPage &$editpage
	 * @param array &$buttons
	 * @param int &$tabindex
	 */
	public function __construct( $context, $config, &$editpage, &$buttons, &$tabindex ) {
		parent::__construct( $context, $config );

		$this->editpage =& $editpage;
		$this->buttons =& $buttons;
		$this->tabindex =& $tabindex;
	}
}
