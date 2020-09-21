<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\MessageRecipient
 *
 * @property int $id
 * @property int $message_id
 * @property string $recipient_type
 * @property int $recipient_id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Message $message
 * @property-read Model|\Eloquent $recipient
 * @method static \Illuminate\Database\Eloquent\Builder|MessageRecipient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageRecipient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageRecipient query()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageRecipient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageRecipient whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageRecipient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageRecipient whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageRecipient whereRecipientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageRecipient whereRecipientType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageRecipient whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MessageRecipient extends Model
{
    use HasFactory;


    /**
     * Return related message
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    /**
     * Return related recipient.
     * @return
     */
    public function recipient()
    {
        // @TODO Return related morph model Staff, Student or Teacher
    }
}
