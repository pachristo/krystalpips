<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use App\Models\AccountManagement;
use App\Models\Pricing;
use App\Models\MenPricing;
use App\Models\InvPricing;
use Filament\Resources\Resource;
use App\Models\Transaction;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('password')
                ->password()
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('remember_token')
                ->maxLength(100),
            Forms\Components\TextInput::make('acct_name')
                ->label('Account Name')
                ->maxLength(255),
            Forms\Components\TextInput::make('acct_no')
                ->label('Account Number')
                ->maxLength(255),
                Forms\Components\TextInput::make('acct_bank')
                ->label('Bank name')
                ->maxLength(255),

            Forms\Components\TextInput::make('phone')
                ->tel()
                ->required()
                ->maxLength(20),
            Forms\Components\Toggle::make('is_verified')
                ->label('Is Verified'),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                // Tables\Columns\TextColumn::make('email_verified_at')->dateTime(),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\BooleanColumn::make('is_verified')->label('Verified'),

                Tables\Columns\TextColumn::make('sub_status')->label('Subscription Status'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Created'),
                // Tables\Columns\TextColumn::make('updated_at')->dateTime()->label('Updated'),
            ])
            ->filters([
                //
            ])
            //    'id', 'user_id', 'trans_id', 'sub_id', 'next_due_date', 'sub_date', 'created_at', 'updated_at', 'plan_type', 'roi', 'amount', 'duration'
            // 'name', 'email',
    // 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at', 'is_verified', 'sub_id', 'sub_status', 'sub_count', 'acct_name', 'acct_no', 'telegram_id', 'phone', 'status', 'acct_bank', 'trans_id', 
    // 'men_sub_id', 
    // 'men_sub_status', 
    // 'men_sub_next_due_date', 
    // 'sub_next_due_date', 
    // 'inv_sub_id',
    // 'inv_sub_status', 
    // 'inv_sub_next_due_date',
    // 'telegram','avatar'
            
            ->actions([
                Tables\Actions\EditAction::make(),
                ActionGroup::make([
                    // Upgrade Account Action
                    Action::make('upgradeAccount')
                        ->label('Add to Acct Management')
                        ->action(function ($record, array $data) {
                            // Logic to upgrade account
                            $record->update(['account_plan_id' => $data['account_plan_id']]);
                        })
                        ->form([
                            Forms\Components\Select::make('name')
                                ->label('Select Account Plan')
                                ->options(function () {
                                    $options = [];
                                    $plans = AccountManagement::all();
                                    foreach ($plans as $plan) {
                                        $options[$plan->id] = "{$plan->name} - {$plan->duration} days - $ {$plan->price}";
                                    }
                                    return $options;
                                })
                                ->required(),
                        ])
                        ->icon('heroicon-o-user')     ->visible(fn ($record) => !$record->acct_sub_status),
                        Action::make('upgradetosignal')
                        ->label('Add to Signal  Plan')
                        ->action(function ($record, array $data) {
                            // Logic to upgrade account
                            $record->update(['account_plan_id' => $data['account_plan_id']]);
                        })
                        ->form([
                            Forms\Components\Select::make('name')
                                ->label('Select Signal Plan')
                                ->options(function () {
                                    $options = [];
                                    $plans = Pricing::all();
                                    foreach ($plans as $plan) {
                                        $options[$plan->id] = "{$plan->name} - {$plan->duration} days - $ {$plan->price}";
                                    }
                                    return $options;
                                })
                                ->required(),
                        ])
                        ->icon('heroicon-o-signal'),
                        
                            Action::make('upgradetomentorhip')
                        ->label('Add to Mentorship  Plan')
                        ->action(function ($record, array $data) {
                            // Logic to upgrade account
                            $record->update(['account_plan_id' => $data['account_plan_id']]);
                        })
                        ->form([
                            Forms\Components\Select::make('name')
                                ->label('Select Mentorship Plan')
                                ->options(function () {
                                    $options = [];
                                    $plans = MenPricing::all();
                                    foreach ($plans as $plan) {
                                        $options[$plan->id] = "{$plan->name} - {$plan->duration} days - $ {$plan->price}";
                                    }
                                    return $options;
                                })
                                ->required(),
                        ])
                        ->icon('heroicon-o-video-camera-slash'),
                        
                        
                               Action::make('upgradetoinvestment')
                        ->label('Add to Investment  Plan')
                        ->action(function ($record, array $data) {
                            // Logic to upgrade account
                            $record->update(['account_plan_id' => $data['account_plan_id']]);
                        })
                        ->form([
                            Forms\Components\Select::make('name')
                                ->label('Select Investment Plan')
                                ->options(function () {
                                    $options = [];
                                    $plans = InvPricing::all();
                                    foreach ($plans as $plan) {
                                        $options[$plan->id] = "{$plan->name} - {$plan->duration} days - $ {$plan->price}";
                                    }
                                    return $options;
                                })
                                ->required(),
                                
                                 Forms\Components\TextInput::make('amount')
                                ->label('Enter the amount')
                                
                                ->required(),
                                
                                 Forms\Components\TextInput::make('roi')
                                ->label('Enter the ROI')
                                
                                ->required(),
                                   Forms\Components\TextInput::make('duration')
                                ->label('Enter the Nuombers of Days,Week,Month ')
                                ->numeric()
                                
                                ->required(),
                                
                                  Forms\Components\Select::make('time')
                                ->label('Select Time')
                                ->options([
                                    'days'=>"Days",
                                     'weeks'=>"Weeks",
                                      'month'=>"Months",
                                       'year'=>"Years"
                                    ])
                                ->required(),
                        ])
                        ->icon('heroicon-o-presentation-chart-line'),

                    // Delete Action
                    Action::make('delete')
                        ->label('Delete User')
                        ->action(function ($record) {
                            $record->delete(); // Delete logic
                        })
                        ->icon('heroicon-o-trash')
                        ->color('danger')
                        ->requiresConfirmation(),

                    // Another Custom Action
                    Action::make('sendEmail')
                        ->label('Send Email')
                        ->action(function ($record) {
                            // Email sending logic
                        })
                        ->icon('heroicon-o-envelope'),
                ])->label('Actions') // The label of the dropdown button
                ->icon('heroicon-o-cog') // Icon for the dropdown,
 
              ])
              ->bulkActions([
                  Tables\Actions\BulkActionGroup::make([
                      Tables\Actions\DeleteBulkAction::make(),
                  ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}


