<?php

namespace Vertuoza\Repositories\Settings\Collaborators\Models;

use DateTime;
use stdClass;

class CollaboratorModel
{
  public string $id;
  public ?string $tenant_id;
  public string $name;
  public string $first_name;
  public DateTime $created_at;
  public DateTime $updated_at;
  public ?DateTime $deleted_at;

  public static function fromStdclass(stdClass $data): CollaboratorModel
  {
    $model = new CollaboratorModel();
    $model->id = $data->id;
    $model->tenant_id = $data->tenant_id;
    $model->name = $data->name;
    $model->first_name = $data->first_name;
    $model->created_at = new DateTime($data->created_at);
    $model->updated_at = new DateTime($data->updated_at);
    $model->deleted_at = $data->deleted_at;
    return $model;
  }

  public static function getPkColumnName(): string
  {
    return 'id';
  }

  public static function getTenantColumnName(): string
  {
    return 'tenant_id';
  }
  public static function getNameColumnName(): string
  {
    return 'name';
  }
  public static function getFirstNameColumnName(): string
  {
    return 'first_name';
  }
  public static function getCreatedAtColumnName(): string
  {
    return 'created_at';
  }
  public static function getUpdatedAtColumnName(): string
  {
    return 'updated_at';
  }
  public static function getDeletedAtColumnName(): string
  {
    return 'deleted_at';
  }

  public static function getTableName(): string
  {
    return 'collaborator';
  }
}
