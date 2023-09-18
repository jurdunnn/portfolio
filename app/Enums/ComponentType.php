<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ComponentType: string implements HasLabel
{
    case Text = 'text';
    case TextWithImage = 'text-with-image';
    case ProblemSolutionValue = 'problem-solution-value';
    case Links = 'links';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
