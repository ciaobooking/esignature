<?php

namespace ESignatures\Services;

use Requester\Response;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class SignerService
 * @package ESignatures\Services
 */
class SignerService extends BaseService
{
    /**
     * @param $id
     * @param $contractId
     * @param array $data
     * @return Response
     * @throws GuzzleException
     */
    public function updateSigner($id, $contractId, array $data = []): Response
    {
        $this->request->reset();

        $this->authenticate();

        return $this->prepareParams($data)->post("contracts/$contractId/signers/$id");
    }

    /**
     * @param $id
     * @param $contractId
     * @param array $data
     * @return Response
     * @throws GuzzleException
     */
    public function resendSigner($id, $contractId, array $data = []): Response
    {
        $this->request->reset();

        $this->authenticate();

        return $this->prepareParams($data)->post("contracts/$contractId/signers/$id/send_contract");
    }
}
