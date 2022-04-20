<?php

namespace App\Repositories\Core\QueryBuilder;

use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class QueryBuilderCategoryRepository extends BaseQueryBuilderRepository implements CategoryRepositoryInterface
{
    //Se não fosse criado esta propriedade geraria o erro do resolveTable()
    protected $table = 'categories';
  
}