<?php

namespace App\Traits;

trait HasNotifications
{
    protected function notify(string $type, string $header, string $message): void
    {
        $this->dispatch('notif', type: $type, header: $header, message: $message);
    }

    protected function notifySuccess(string $message, string $header = 'Success!'): void
    {
        $this->notify('success', $header, $message);
    }

    protected function notifyError(string $message, string $header = 'Error'): void
    {
        $this->notify('error', $header, $message);
    }
}
