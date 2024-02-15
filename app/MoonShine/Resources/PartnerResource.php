<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Partner;

use MoonShine\Fields\Image;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class PartnerResource extends ModelResource
{
    protected string $model = Partner::class;

    protected string $title = 'Partners';

    public function indexFields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Имя', 'name'),
                Text::make('Описание', 'description'),
            ]),
        ];
    }

    public function formFields(): array
    {
        return [
            Text::make('Имя', 'name'),
            Textarea::make('Описание', 'description'),
            Image::make('image')
        ];
    }

    public function detailFields(): array
    {
        return [
            Text::make('Имя', 'name'),
            Text::make('Описание', 'description'),
            Image::make('image')
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
        ];
    }
}
