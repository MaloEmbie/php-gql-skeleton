<?php

namespace Vertuoza\Usecases\Settings\UnitTypes;

use Vertuoza\Api\Graphql\Context\UserRequestContext;
use Vertuoza\Repositories\RepositoriesFactory;
use Vertuoza\Repositories\Settings\UnitTypes\UnitTypeMutationData;
use Vertuoza\Repositories\Settings\UnitTypes\UnitTypeRepository;

class UnitTypeCreateByName
{
  private UnitTypeRepository $unitTypeRepository;
  private UserRequestContext $userContext;
  public function __construct(
    RepositoriesFactory $repositories,
    UserRequestContext $userContext
  ) {
    $this->unitTypeRepository = $repositories->unitType;
    $this->userContext = $userContext;
  }

  public function handle(string $unitTypeName)
  {
      $newUnitType = new UnitTypeMutationData();
      $newUnitType->name = $unitTypeName;

      $newId = $this->unitTypeRepository->create($newUnitType, $this->userContext->getTenantId());
      return $this->unitTypeRepository->getById($newId, $this->userContext->getTenantId());
  }
}
