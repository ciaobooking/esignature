<?php

namespace ESignatures\Http\Controllers;

use Exception;
use ESignatures\Services\HooksService;
use Illuminate\Http\Request;

/**
 * Class HooksController
 * @package ESignatures\Http\Controllers
 */
class HooksController extends BaseController
{
    /**
     * @var HooksService
     */
    protected HooksService $service;

    /**
     * HooksController constructor.
     * @param HooksService $service
     */
    public function __construct(HooksService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return array
     * @throws Exception
     */
    public function received(Request $request): array
    {
        return $this->service->received($request->all());
    }
}
