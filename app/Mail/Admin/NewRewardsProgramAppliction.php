<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewRewardsProgramAppliction extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
     public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function via ($notifiable) {
        return ['mail'];
    }

    /**
     * Get the message envelope.
     */
      /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Set subject
        $subject = __('messages.t_new_rewards_program_application');

        return $this->markdown('mail.admin.support.new_reward_application')->subject($subject);
    }
}
