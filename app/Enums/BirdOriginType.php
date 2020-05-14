<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class BirdOriginType extends Enum
{
    const MyBreeding      = 'my_breeding';
    const Imported        = 'imported';
    const AnotherBreeding = 'another_breeding';
    const Other           = 'other';
}
