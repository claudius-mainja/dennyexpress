<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                Select::make('role')
                    ->label('Role')
                    ->options(User::getRoles())
                    ->required()
                    ->default(User::ROLE_CUSTOMER)
                    ->helperText('Admin: full access. Manager: orders & content. Staff: limited access. Customer: storefront only.'),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->hiddenOn('edit')
                    ->required(),
            ]);
    }
}
