<?php


namespace App\Modules\Game\Node\Infrastructure\Controller;

use App\Modules\Base\Infrastructure\Controller\ResourceController;

class Api extends ResourceController
{
    protected function getModelName(): string
    {
        return 'Game\\Node';
    }
}
