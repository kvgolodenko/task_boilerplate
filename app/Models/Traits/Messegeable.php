<?php

namespace App\Models\Traits;

use App\Models\Message;
use App\Models\MessageRecipient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * Trait Messageable
 * @mixin Model
 */
trait Messegeable
{
    /**
     * Return related recipients.
     * @return MorphMany
     */
    public function recipients()
    {
        // @TODO Return related MessageRecipient models
        return $this->morphMany(MessageRecipient::class, 'recipient');
    }

    /**
     * Return related messages.
     * @return MorphToMany
     */
    public function messages()
    {
        // @TODO Return related Message models
        return $this->morphToMany(Message::class, 'recipient', 'message_recipient');
    }

}
