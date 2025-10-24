<?php

namespace App\Enum;

enum TrialEnum: string
{
    case JOIN = 'JOIN';
    case PENDING = 'PENDING';
    case ENROLL = 'ENROLL';
    case CANCEL = 'CANCEL';
}
