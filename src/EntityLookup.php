<?php

namespace Wikibase\Store;

use Wikibase\DataModel\Entity\Entity;
use Wikibase\DataModel\Entity\EntityId;

/**
 * Service interface for retrieving Entities from storage.
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 * @author Daniel Kinzler
 */
interface EntityLookup {

	/**
	 * Returns the entity with the provided id or null if there is no such
	 * entity.
	 *
	 * @note Implementations of this method may or may not resolve redirects.
	 * Code that needs control over redirect resolution should use an
	 * EntityRevisionLookup instead.
	 *
	 * @param EntityId $entityId
	 *
	 * @throws StorageException
	 * @return Entity|null
	 */
	public function getEntity( EntityId $entityId );

	/**
	 * Returns whether the given entity can bee looked up using
	 * getEntity(). This avoids loading and deserializing entity content
	 * just to check whether the entity exists.
	 *
	 * @note Implementations of this method may or may not resolve redirects.
	 * Code that needs control over redirect resolution should use an
	 * EntityRevisionLookup instead.
	 *
	 * @param EntityId $entityId
	 *
	 * @throws StorageException
	 * @return bool
	 */
	public function hasEntity( EntityId $entityId );

}
