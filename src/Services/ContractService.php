<?php

namespace ESignatures\Services;

use Requester\Response;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class ContractService
 * @package ESignatures\Services
 */
class ContractService extends BaseService
{
    /**
     * @param $id
     * @param array $data
     * @return Response
     * @throws GuzzleException
     */
    public function getContract($id, array $data = []): Response
    {
        $this->request->reset();

        $this->authenticate();

        return $this->prepareParams($data)->get("contracts/$id");
    }

    /**
     * @param array $data
     * @return Response
     * @throws GuzzleException
     */
    public function signContract(array $data): Response
    {
        $this->request->reset();

        $this->authenticate();

        return $this->prepareParams($data)->post("contracts");
    }

    /**
     * @param $id
     * @param array $data
     * @return Response
     * @throws GuzzleException
     */
    public function withdrawContract($id, array $data = []): Response
    {
        $this->request->reset();

        $this->authenticate();

        return $this->prepareParams($data)->post("contracts/$id/withdraw");
    }
}
