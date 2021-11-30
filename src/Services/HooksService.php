<?php

namespace ESignatures\Services;

use ESignatures\Exceptions\HookNotFoundException;
use Exception;
use ESignatures\Constants;
use ESignatures\Events\HookEvent;
use ESignatures\Events\HookFailed;
use ESignatures\Events\HookSucceed;
use Illuminate\Support\Facades\Validator;

/**
 * Class HooksService
 * @package ESignatures\Services
 */
class HooksService extends BaseService
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function received(array $data): array
    {
        Validator::make($data, [
            'status' => 'required',
        ])->validate();

        if (!in_array($data['status'], $this->getStatuses())) {
            throw new HookNotFoundException($data['status']);
        }

        // Application should listen to this event to implement its own business logic
        event(new HookEvent($data));

        if ($data['status'] === Constants::HOOK_ERROR) {
            event(new HookFailed($data));
        } else {
            event(new HookSucceed($data));
        }

        return $data;
    }

    /**
     * @return array
     */
    protected function getStatuses(): array
    {
        return [
            Constants::HOOK_ERROR,
            Constants::HOOK_SIGNER_SIGNED,
            Constants::HOOK_SIGNER_DECLINED,
            Constants::HOOK_CONTRACT_SIGNED,
            Constants::HOOK_CONTRACT_WITHDRAWN,
            Constants::HOOK_CONTRACT_SENT_TO_SIGNER,
            Constants::HOOK_SIGNER_VIEWED_THE_CONTRACT,
            Constants::HOOK_SIGNER_MOBILE_UPDATE_REQUEST,
        ];
    }
}
