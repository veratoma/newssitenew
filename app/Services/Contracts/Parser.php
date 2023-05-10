<?php

namespace App\Services\Contracts;

use App\QueryBuilders\CategoriesQueryBuilder;

interface Parser
{
    public function setLink(string $link);
    public function saveParserData(int $sourceId);
}
