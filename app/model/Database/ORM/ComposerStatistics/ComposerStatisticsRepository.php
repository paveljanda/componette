<?php

namespace App\Model\Database\ORM\ComposerStatistics;

use App\Model\Database\ORM\AbstractRepository;
use Nextras\Orm\Collection\ICollection;

/**
 * @property-read ComposerStatisticsMapper $mapper
 *
 * @method ICollection|ComposerStatistics[] findAll()
 * @method ICollection|ComposerStatistics[] findBy(array $conds)
 * @method ComposerStatistics|NULL getBy(array $conds)
 */
final class ComposerStatisticsRepository extends AbstractRepository
{

	/**
	 * @return array
	 */
	public static function getEntityClassNames()
	{
		return [ComposerStatistics::class];
	}

}
