<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ComponentType: string implements HasLabel
{
    case Text = 'text';
    case TextWithImage = 'text-with-image';
    case Image = 'image';
    case ProblemSolutionValue = 'problem-solution-value';
    case Links = 'links';
    case WordCloud = 'word-cloud';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}
