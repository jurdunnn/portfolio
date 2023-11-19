<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Str;

enum ComponentType: string implements HasLabel
{
    case Text = 'text';
    case TextWithImage = 'text-with-image';
    case Image = 'image';
    case ProblemSolutionValue = 'problem-solution-value';
    case Links = 'links';
    case WordCloud = 'word-cloud';
    case RepoStats = 'repo-stats';

    public function getLabel(): ?string
    {
        return Str::Headline($this->name);
    }
}
