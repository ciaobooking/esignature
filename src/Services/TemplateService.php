<?php

namespace ESignatures\Services;

use Requester\Response;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class TemplateService
 * @package ESignatures\Services
 */
class TemplateService extends BaseService
{
    /**
     * @param array $data
     * @return Response
     * @throws GuzzleException
     */
    public function getTemplates(array $data = []): Response
    {
        $this->request->reset();

        $this->authenticate();

        return $this->prepareParams($data)->get("templates");
    }

    /**
     * @param $id
     * @param array $data
     * @return Response
     * @throws GuzzleException
     */
    public function getTemplate($id, array $data = []): Response
    {
        $this->request->reset();

        $this->authenticate();

        return $this->prepareParams($data)->get("templates/$id");
    }
}
