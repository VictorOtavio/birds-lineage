<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class BirdStatusType extends Enum
{
    const Available   = 'available';
    const Unavailable = 'unavailable';
    const External    = 'external';
}
