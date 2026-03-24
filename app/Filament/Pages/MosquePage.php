<?php

namespace App\Filament\Pages;

use App\Models\Mosque;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\HtmlString;
use UnitEnum;

/**
 * @property-read Schema $form
 */
class MosquePage extends Page
{
    protected string $view = 'filament.pages.mosque-page';

    protected static ?string $title = 'Mosque';

    protected static ?string $navigationLabel = 'Mosque';

    protected static ?string $slug = 'mosque';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMoon;

    protected static string|UnitEnum|null $navigationGroup = 'General';

    protected static ?int $navigationSort = 1;

    /**
     * @var array<string, mixed> | null
     */
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill($this->getRecord()?->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        $methods = [
            0 => '0 - Jafari / Shia Ithna-Ashari',
            1 => '1 - University of Islamic Sciences, Karachi',
            2 => '2 - Islamic Society of North America',
            3 => '3 - Muslim World League',
            4 => '4 - Umm Al-Qura University, Makkah',
            5 => '5 - Egyptian General Authority of Survey',
            7 => '7 - Institute of Geophysics, University of Tehran',
            8 => '8 - Gulf Region',
            9 => '9 - Kuwait',
            10 => '10 - Qatar',
            11 => '11 - Majlis Ugama Islam Singapura, Singapore',
            12 => '12 - Union Organization islamic de France',
            13 => '13 - Diyanet İşleri Başkanlığı, Turkey',
            14 => '14 - Spiritual Administration of Muslims of Russia',
            15 => '15 - Moonsighting Committee Worldwide',
            16 => '16 - Dubai (experimental)',
            17 => '17 - Jabatan Kemajuan Islam Malaysia (JAKIM)',
            18 => '18 - Tunisia',
            19 => '19 - Algeria',
            20 => '20 - KEMENAG - Indonesia',
            21 => '21 - Morocco',
            22 => '22 - Comunidade Islamica de Lisboa',
            23 => '23 - Ministry of Awqaf, Jordan',
        ];

        return $schema
            ->components([
                Form::make([
                    Grid::make()
                        ->columns(2)
                        ->schema([
                            Section::make([
                                Section::make([
                                    Textarea::make('address')
                                        ->placeholder('Kuala Lumpur, Malaysia')
                                        ->required(),
                                    Select::make('timezone')
                                        ->options(array_combine(timezone_identifiers_list(), timezone_identifiers_list()))
                                        ->searchable()
                                        ->required()
                                        ->default('Asia/Kuala_Lumpur'),
                                    Select::make('method')
                                        ->options($methods)
                                        ->searchable()
                                        ->required()
                                        ->default(17),
                                    Select::make('school')
                                        ->options([
                                            0 => '0 - Shafi',
                                            1 => '1 - Hanafi',
                                        ])
                                        ->searchable()
                                        ->required()
                                        ->default(0),
                                    TextInput::make('tune')
                                        ->placeholder('Imsak,Fajr,Sunrise,Dhuhr,Asr,Maghrib,Sunset,Isha,Midnight')
                                        ->default('0,9,0,3,4,2,2,2,0')
                                        ->helperText(fn () => new HtmlString(
                                            '<div class="wrap-break">
                                            Comma separated numbers to offset prayer times in minutes. The order is Imsak, Fajr, Sunrise, Dhuhr, Asr, Maghrib, Sunset, Isha, Midnight.
                                        </div>'
                                        ))
                                        ->required(),
                                ]),
                                Section::make([
                                    TextInput::make('iqamat')
                                        ->numeric()
                                        ->minValue(0)
                                        ->default(10)
                                        ->required(),
                                    TextInput::make('pray')
                                        ->numeric()
                                        ->minValue(0)
                                        ->default(10)
                                        ->required(),
                                ]),
                            ]),
                            Section::make([
                                TextInput::make('name')
                                    ->placeholder('Masjid Al-Sultan Abdullah')
                                    ->required(),
                                SpatieMediaLibraryFileUpload::make('logo')
                                    ->disk('media')
                                    ->nullable(),
                            ]),
                        ]),
                ])
                    ->livewireSubmitHandler('save')
                    ->footer([
                        Actions::make([
                            Action::make('save')
                                ->submit('save')
                                ->keyBindings(['mod+s']),
                        ]),
                    ]),
            ])
            ->record($this->getRecord())
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $record = $this->getRecord();

        if (app()->environment('demo')) {
            Notification::make()
                ->info()
                ->title('Live Demo')
                ->body('Changes will not be saved')
                ->send();

            return;
        }

        if (! $record) {
            $record = new Mosque;
            $record->name = null;
            $record->location = null;
        }

        $record->fill($data);

        if ($record->wasRecentlyCreated) {
            $this->form->record($record)->saveRelationships();
        }

        Notification::make()
            ->success()
            ->title('Saved')
            ->send();

        $record->save();
    }

    public function getRecord(): ?Mosque
    {
        return Mosque::latest()->first();
    }
}
