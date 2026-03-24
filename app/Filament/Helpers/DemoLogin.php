<?php

namespace App\Filament\Helpers;

use App\Models\User;
use Filament\Auth\Pages\Login;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class DemoLogin extends Login
{
    public function form(Schema $schema): Schema
    {
        $user = User::first();

        return $schema
            ->components([
                TextInput::make('email')
                    ->label(__('filament-panels::auth/pages/login.form.email.label'))
                    ->email()
                    ->required()
                    ->autocomplete()
                    ->autofocus()
                    ->default($user->email),
                TextInput::make('password')
                    ->label(__('filament-panels::auth/pages/login.form.password.label'))
                    ->hint(filament()->hasPasswordReset() ? new HtmlString(Blade::render('<x-filament::link :href="filament()->getRequestPasswordResetUrl()" tabindex="-1"> {{ __(\'filament-panels::auth/pages/login.actions.request_password_reset.label\') }}</x-filament::link>')) : null)
                    ->password()
                    ->revealable(filament()->arePasswordsRevealable())
                    ->autocomplete('current-password')
                    ->required()
                    ->default('P@ssw0rd'),
                Checkbox::make('remember')
                    ->label(__('filament-panels::auth/pages/login.form.remember.label')),
            ]);
    }
}
