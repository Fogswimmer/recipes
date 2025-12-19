<?php

namespace App\DataMigration\PostProcessor;

use Doctrine\ORM\EntityManagerInterface;
use Fogswimmer\DataMigration\Contract\AdvancedQueryDataSourceInterface;
use Fogswimmer\DataMigration\Contract\DataMigrationPostProcessorInterface;
use Fogswimmer\DataMigration\Helper\FileMigrationHelper;
use FogswimmerDataMigration\Contract\DataSourceInterface;

final class ExamplePostProcessor implements DataMigrationPostProcessorInterface
{
    public function __construct(
        private EntityManagerInterface $em,
        private FileMigrationHelper $fileMigrationHelper,
    ) {
    }

    public function getName(): string
    {
        return 'example_post_processor';
    }

    public function process(array $oldRow, object $entity, DataSourceInterface $dataSource, mixed $params = null): void
    {
        // use if database source is set
        if (!$dataSource instanceof AdvancedQueryDataSourceInterface) {
            throw new \LogicException('This post processor requires database source');
        }

        // do something before the entity is saved

        // use fileMigrationHelper to make uploaded file
        $imageFile = $this->fileMigrationHelper->makeUploadedFile($oldRow['image'] ?? '');

        $this->em->persist($entity);
        $this->em->flush();
    }
}
