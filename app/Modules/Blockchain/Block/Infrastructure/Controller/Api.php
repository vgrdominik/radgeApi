<?php


namespace App\Modules\Blockchain\Block\Infrastructure\Controller;

use App\Modules\Blockchain\Block\Domain\Block;
use App\Modules\Blockchain\Block\Service\Blockchain;
use Illuminate\Http\JsonResponse;

class Api
{
    /**
     * Test endpoint
     *
     * @return JsonResponse
     */
    public function test()
    {
        $blockchain = new Blockchain();

        $block = new Block(['test']);

        $blockchain->addBlock($block);

        return response()->json(true);
    }
}
