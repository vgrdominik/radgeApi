<?php


namespace App\Modules\Game\Node\Infrastructure\Controller;

use App\Modules\Base\Infrastructure\Controller\ResourceController;
use App\Modules\Game\Node\Transformers\NodeSummary;
use Illuminate\Http\JsonResponse;

class Api extends ResourceController
{
    protected function getModelName(): string
    {
        return 'Game\\Node';
    }

    /**
     * Display a listing of summary resource.
     *
     * @return JsonResponse
     */
    public function nodeSummary()
    {
        return response()->json(NodeSummary::collection(($this->getModelClass())::all()));
    }
}
