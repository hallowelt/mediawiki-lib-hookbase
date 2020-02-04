<?php

namespace HalloWelt\MediaWiki\Lib\HookBase\Hook;

use Config;
use HalloWelt\MediaWiki\Lib\HookBase\Hook;
use IContextSource;
use MediaWiki\MediaWikiServices as Services;

abstract class MediaWikiServices extends Hook {
	/**
	 *
	 * @var Services
	 */
	protected $services;

	/**
	 *
	 * @param Services $services
	 * @return bool
	 */
	public static function callback( $services ) {
		$className = static::class;
		$hookHandler = new $className(
			null,
			null,
			$services
		);
		return $hookHandler->process();
	}

	/**
	 *
	 * @param IContextSource $context
	 * @param Config $config
	 * @param Services $services
	 */
	public function __construct( $context, $config, $services ) {
		parent::__construct( $context, $config );

		$this->services = $services;
	}
}
