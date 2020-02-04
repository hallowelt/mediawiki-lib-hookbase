<?php
/**
 * Hook handler base class for MediaWiki hook UserSaveSettings
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

use Config;
use HalloWelt\MediaWiki\Lib\HookBase\Hook;
use IContextSource;
use User;

abstract class UserSaveSettings extends Hook {

	/**
	 *
	 * @var User
	 */
	protected $user = null;

	/**
	 * Called directly after user preferences have been saved.
	 * @param User $user
	 * @return bool
	 */
	public static function callback( $user ) {
		$className = static::class;
		$hookHandler = new $className(
			null,
			null,
			$user
		);
		return $hookHandler->process();
	}

	/**
	 *
	 * @param IContextSource $context
	 * @param Config $config
	 * @param User $user
	 */
	public function __construct( $context, $config, $user ) {
		parent::__construct( $context, $config );

		$this->user = $user;
	}
}