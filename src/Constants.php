<?php

namespace ESignatures;

/**
 * Class Constants
 * @package ESignatures
 */
class Constants
{
    /**
     * Sandbox environment
     */
    const ENV_SANDBOX = 'development';

    /**
     * Production environment
     */
    const ENV_PRODUCTION = 'production';

    /**
     * Base Url
     */
    const BASE_URL = 'https://esignatures.io/api/';

    /**
     * Hooks
     */
    const HOOK_ERROR = 'error';
    const HOOK_SIGNER_SIGNED = 'signer-signed';
    const HOOK_SIGNER_DECLINED = 'signer-declined';
    const HOOK_CONTRACT_SIGNED = 'contract-signed';
    const HOOK_CONTRACT_WITHDRAWN = 'contract-withdrawn';
    const HOOK_CONTRACT_SENT_TO_SIGNER = 'contract-sent-to-signer';
    const HOOK_SIGNER_VIEWED_THE_CONTRACT = 'signer-viewed-the-contract';
    const HOOK_SIGNER_MOBILE_UPDATE_REQUEST = 'signer-mobile-update-request';
}
