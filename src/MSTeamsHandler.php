<?php

namespace pschocke\MSTeamsNotificationSettings;

use NotificationChannels\MicrosoftTeams\MicrosoftTeamsChannel;
use pschocke\NotificationSettings\Handler\Handler;
use pschocke\NotificationSettings\Handler\HandlerInterface;
use pschocke\NotificationSettings\Models\NotificationSetting;

class MSTeamsHandler extends Handler implements HandlerInterface
{

    protected $request = [
        'webhook' => ['required', 'url'],
    ];

    const via = MicrosoftTeamsChannel::class;

    protected $notificationChannel = 'microsoftTeams';

    public function canSend(string $methodName): bool
    {
        return $methodName === 'microsoftTeams';
    }

    public function getSend(NotificationSetting $notificationSetting)
    {
        return $notificationSetting->meta['webhook'];
    }
}