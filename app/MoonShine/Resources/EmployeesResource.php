<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Database\Eloquent\Model;

use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

class EmployeesResource extends ModelResource
{
    protected string $model = Employee::class;

    protected string $title = 'Employees';

//    public function fields(): array
//    {
//        return [
//            Block::make([
//                ID::make()->sortable(),
//                Text::make('Имя', 'name'),
//                Text::make('Фамилия', 'surname'),
//                Text::make('Отчество', 'lastname'),
//                Text::make('Должность', 'position_id', function (Employee $employee) {
//                    return $employee->position->name;
//                })
//            ]),
//        ];
//    }

    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Image::make('Фото','image'),
            Text::make('Имя','name'),
            Text::make('Должность', 'position', function (Employee $employee) {
                return $employee->position->name;
            })
        ];
    }

    public function formFields(): array
    {
        return [
            ID::make(),
            Text::make('Имя','name'),
            Text::make('Фамилия','surname'),
            Text::make('Отчество','lastname'),
            Text::make('Телефон','phone'),
            BelongsTo::make('Должность', 'position', 'name'),
            Image::make('image')
        ];
    }

    public function detailFields(): array
    {
        return [
            Text::make('Имя','name'),
            Text::make('Фамилия','surname'),
            Text::make('Отчество','lastname'),
            Text::make('Телефон','phone'),
            Text::make('Должность','position_id', function (Employee $employee) {
                return $employee->position->name;
            }),
            Image::make('image')
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'position_id' => ['required', 'exists:positions,id']
        ];
    }
}
