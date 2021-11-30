<?php

namespace ESignatures\Services;

use Illuminate\Support\Arr;
use Requester\Request;
use ESignatures\Constants;

/**
 * Class BaseService
 * @package ESignatures\Services
 */
abstract class BaseService
{
    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @var array
     */
    protected array $config = [];

    /**
     * ESignatures constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->config = config('e-signatures');

        $this->request = $request;
        $this->request->setUrl(Constants::BASE_URL);

        if (Arr::get($this->config, 'logging.active')) {
            $this->request->setChannel('e-signatures');
        }
    }

    /**
     * @return $this
     */
    protected function authenticate(): self
    {
        $this->request->addHeader('Authorization', 'Basic ' . base64_encode($this->config['secret_key']));

        return $this;
    }

    /**
     * @param array $data
     * @return Request
     */
    protected function prepareParams(array $data): Request
    {
        $this->request->setParams($data);

        if (Arr::get($this->config, 'environment') === Constants::ENV_SANDBOX) {
            $this->request->addParam('test', 'yes');
        }

        return $this->request;
    }
}
