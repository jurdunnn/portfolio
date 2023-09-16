<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ComponentType: string implements HasLabel
{
    case Text = 'text';
    case TextWithImage = 'text-with-image';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
