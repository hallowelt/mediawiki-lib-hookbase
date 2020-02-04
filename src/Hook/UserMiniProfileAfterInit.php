<?php
/**
 * Hook handler base class for BlueSpice hook UserMiniProfileAfterInit
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
 * @copyright  Copyright (C) 2017 Hallo Welt! GmbH, All rights reserved.
 * @license    http://www.gnu.org/copyleft/gpl.html GPL-3.0-only
 * @filesource
 */
namespace HalloWelt\MediaWiki\Lib\HookBase\Hook;

use HalloWelt\MediaWiki\Lib\HookBase\Hook;

abstract class UserMiniProfileAfterInit extends Hook {

	/**
	 *
	 * @var \ViewUserMiniProfile
	 */
	protected $userMiniProfileView = null;

	/**
	 * This is a BlueSpice hook (missing the BS prefix)
	 * Located in \ViewUserMiniProfile::init. After the user miniprofile was
	 * initialized
	 * @param \ViewUserMiniProfile &$userMiniProfileView
	 * @return bool
	 */
	public static function callback( &$userMiniProfileView ) {
		$className = static::class;
		$hookHandler = new $className(
			null,
			null,
			$userMiniProfileView
		);
		return $hookHandler->process();
	}

	/**
	 * @param \IContextSource $context
	 * @param \Config $config
	 * @param \ViewUserMiniProfile &$userMiniProfileView
	 */
	public function __construct( $context, $config, &$userMiniProfileView ) {
		parent::__construct( $context, $config );

		$this->userMiniProfileView = &$userMiniProfileView;
	}
}
