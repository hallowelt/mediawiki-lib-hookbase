<?php
/**
 * Hook handler base class for MediaWiki hook BeforePageDisplay
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
 * @author     Robert Vogel <vogel@hallowelt.com>
 *
 * @copyright  Copyright (C) 2017 Hallo Welt! GmbH, All rights reserved.
 * @license    http://www.gnu.org/copyleft/gpl.html GPL-3.0-only
 * @filesource
 */
namespace HalloWelt\MediaWiki\Lib\HookBase\Hook;

use HalloWelt\MediaWiki\Lib\HookBase\Hook;

abstract class BeforePageDisplay extends Hook {

	/**
	 *
	 * @var \OutputPage
	 */
	protected $out = null;

	/**
	 *
	 * @var \Skin
	 */
	protected $skin = null;

	/**
	 *
	 * @param \OutputPage &$out
	 * @param \Skin &$skin
	 * @return bool
	 */
	public static function callback( &$out, &$skin ) {
		$className = static::class;
		$hookHandler = new $className(
			null,
			null,
			$out,
			$skin
		);
		return $hookHandler->process();
	}

	/**
	 *
	 * @param \IContextSource $context
	 * @param \Config $config
	 * @param \OutputPage &$out
	 * @param \Skin &$skin
	 */
	public function __construct( $context, $config, &$out, &$skin ) {
		parent::__construct( $context, $config );

		$this->out =& $out;
		$this->skin =& $skin;
	}
}
