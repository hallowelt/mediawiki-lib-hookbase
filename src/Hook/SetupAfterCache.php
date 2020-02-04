<?php
/**
 * Hook handler base class for MediaWiki hook SetupAfterCache
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
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

abstract class SetupAfterCache extends Hook {

	/**
	 *
	 * @return bool
	 */
	public static function callback() {
		$className = static::class;
		$hookHandler = new $className(
			null,
			null
		);
		return $hookHandler->process();
	}
}
