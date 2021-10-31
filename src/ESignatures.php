<?php

namespace ESignatures;

use ESignatures\Exceptions\MethodNotFoundException;
use ESignatures\Services\ContractService;
use ESignatures\Services\SignerService;
use ESignatures\Services\TemplateService;
use Exception;
use Requester\Response;

/**
 * Class ESignatures
 * @package ESignatures
 *
 * @method Response getContract($id, array $data = [])
 * @method Response signContract(array $data)
 * @method Response withdrawContract($id, array $data = [])
 * @method Response updateSigner($id, $contractId, array $data = [])
 * @method Response resendSigner($id, $contractId, array $data = [])
 * @method Response getTemplates(array $data = [])
 * @method Response getTemplate($id, array $data = [])
 */
class ESignatures
{
    /**
     * @var SignerService
     */
    protected SignerService $signerService;

    /**
     * @var ContractService
     */
    protected ContractService $contractService;

    /**
     * @var TemplateService
     */
    protected TemplateService $templateService;

    /**
     * @param SignerService $signerService
     * @param ContractService $contractService
     * @param TemplateService $templateService
     */
    public function __construct(
        SignerService $signerService,
        ContractService $contractService,
        TemplateService $templateService
    )
    {
        $this->signerService = $signerService;
        $this->contractService = $contractService;
        $this->templateService = $templateService;
    }

    /**
     * @param $method
     * @param $arguments
     * @return Response
     * @throws Exception
     */
    public function __call($method, $arguments)
    {
        if (method_exists($this->signerService, $method)) {
            return $this->signerService->{$method}(...$arguments);
        }
        if (method_exists($this->contractService, $method)) {
            return $this->contractService->{$method}(...$arguments);
        }
        if (method_exists($this->templateService, $method)) {
            return $this->templateService->{$method}(...$arguments);
        }

        throw new MethodNotFoundException($method);
    }
}
