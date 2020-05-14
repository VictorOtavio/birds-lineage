<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class BirdSubStatusType extends Enum
{
    const Reproduction    = 'reproduction';
    const Rest            = 'rest';
    const ForSale         = 'for_sale';
    const Sold            = 'sold';
    const Exhcanged       = 'exhcanged';
    const Lost            = 'lost';
    const DeceasedOld     = 'deceased_old';
    const DeceasedDisease = 'deceased_disease';
    const DeceasedInjury  = 'deceased_injury';
    const Donated         = 'donated';
    const Other           = 'other';
}
