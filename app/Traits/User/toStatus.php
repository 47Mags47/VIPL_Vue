<?php

namespace App\Traits\User;

use App\Models\UserStatus;

trait toStatus
{
    public function setStatus(string|UserStatus $status)
    {
        if ($status instanceof UserStatus)
            $this->update(['status_id' => $status->id]);

        if (is_string($status))
            $this->update(['status_id' => UserStatus::byCode($status)->id]);

        return $this;
    }
}
