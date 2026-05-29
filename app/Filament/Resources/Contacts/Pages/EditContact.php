<?php

namespace App\Filament\Resources\Contacts\Pages;

use App\Filament\Resources\Contacts\ContactResource;
use App\Mail\ContactReplyMail;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Mail;

class EditContact extends EditRecord
{
    protected static string $resource = ContactResource::class;

    private bool $shouldSendReply = false;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $hasExistingReply = filled($this->record->admin_reply);
        $hasNewReply = filled($data['admin_reply'] ?? null);

        if ($hasNewReply && !$hasExistingReply) {
            $data['replied_at'] = now();
            $this->shouldSendReply = true;
        }

        return $data;
    }

    protected function afterSave(): void
    {
        if ($this->shouldSendReply) {
            try {
                Mail::to($this->record->email)->send(new ContactReplyMail($this->record));
            } catch (\Throwable $e) {
                // Queue failure handled silently
            }
        }
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $this->record->update(['is_read' => true]);

        return $data;
    }
}
