<?php
/**
 * Hook handler base class for MediaWiki hook HtmlPageLinkRendererBegin
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
use MediaWiki\Linker\LinkRenderer;
use MediaWiki\Linker\LinkTarget;

abstract class HtmlPageLinkRendererBegin extends Hook {

	/**
	 *
	 * @var LinkRenderer
	 */
	protected $linkRenderer = null;
	/**
	 *
	 * @var LinkTarget
	 */
	protected $target = null;

	/**
	 *
	 * @var string | \HtmlArmor
	 */
	protected $text = null;

	/**
	 *
	 * @var array
	 */
	protected $extraAttribs = null;

	/**
	 *
	 * @var string
	 */
	protected $query = null;

	/**
	 *
	 * @var mixed
	 */
	protected $ret = null;

	/**
	 * Adds additional data to links generated by the framework. This allows us
	 * to add more functionality to the UI.
	 * @param LinkRenderer $linkRenderer
	 * @param LinkTarget $target
	 * @param string | \HtmlArmor &$text
	 * @param array &$extraAttribs
	 * @param string &$query
	 * @param string &$ret
	 * @return bool Always true to keep hook running
	 */
	public static function callback( LinkRenderer $linkRenderer, LinkTarget $target, &$text,
		&$extraAttribs, &$query, &$ret ) {
		$className = static::class;
		$hookHandler = new $className(
			null,
			null,
			$linkRenderer,
			$target,
			$text,
			$extraAttribs,
			$query,
			$ret
		);
		return $hookHandler->process();
	}

	/**
	 *
	 * @param \IContextSource $context
	 * @param \Config $config
	 * @param LinkRenderer $linkRenderer
	 * @param LinkTarget $target
	 * @param string | \HtmlArmor &$text
	 * @param array &$extraAttribs
	 * @param string &$query
	 * @param string &$ret
	 */
	public function __construct( $context, $config, LinkRenderer $linkRenderer, LinkTarget $target,
		&$text, &$extraAttribs, &$query, &$ret ) {
		parent::__construct( $context, $config );

		$this->linkRenderer = $linkRenderer;
		$this->target = $target;
		$this->text = &$text;
		$this->extraAttribs = &$extraAttribs;
		$this->query = &$query;
		$this->ret = &$ret;
	}
}
