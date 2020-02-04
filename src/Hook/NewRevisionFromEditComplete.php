<?php
/**
 * Hook handler base class for MediaWiki hook NewRevisionFromEditComplete
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
 * @author     Dejan Savuljesku <savuljesku@hallowelt.com>
 *
 * @copyright  Copyright (C) 2017 Hallo Welt! GmbH, All rights reserved.
 * @license    http://www.gnu.org/copyleft/gpl.html GPL-3.0-only
 * @filesource
 */
namespace HalloWelt\MediaWiki\Lib\HookBase\Hook;

use HalloWelt\MediaWiki\Lib\HookBase\Hook;

abstract class NewRevisionFromEditComplete extends Hook {

	/**
	 * @var \WikiPage
	 */
	protected $wikiPage;

	/**
	 * @var \Revision
	 */
	protected $rev;

	/**
	 * @var integer
	 */
	protected $baseID;

	/**
	 * @var \User
	 */
	protected $user;

	/**
	 * @param \WikiPage $wikiPage
	 * @param \Revision $rev
	 * @param int $baseID
	 * @param \User $user
	 * @return bool
	 */
	public static function callback( $wikiPage, $rev, $baseID, $user ) {
		$className = static::class;
		$hookHandler = new $className(
			null,
			null,
			$wikiPage,
			$rev,
			$baseID,
			$user
		);
		return $hookHandler->process();
	}

	/**
	 *
	 * @param \IContextSource $context
	 * @param \Config $config
	 * @param \WikiPage $wikiPage
	 * @param \Revision $rev
	 * @param int $baseID
	 * @param \User $user
	 */
	public function __construct( $context, $config, $wikiPage, $rev, $baseID, $user ) {
		parent::__construct( $context, $config );

		$this->wikiPage = $wikiPage;
		$this->rev = $rev;
		$this->baseID = $baseID;
		$this->user = $user;
	}
}
