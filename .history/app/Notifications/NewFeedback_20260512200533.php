<?php

namespace App\Notifications;

use App\Models\Complaint;
use App\Models\Feedback;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewFeedback extends Notification
{
    use Queueable;

    protected $complaint;
    protected $feedback;

    public function __construct(Complaint $complaint, Feedback $feedback)
    {
        $this->complaint = $complaint;
        $this->feedback = $feedback;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'type' => 'new_feedback',
            'complaint_id' => $this->complaint->id,
            'complaint_title' => $this->complaint->judul,
            'feedback_id' => $this->feedback->id,
            'feedback_message' => $this->feedback->pesan,
            'message' => "Admin memberikan balasan pada pengaduan '{$this->complaint->judul}'",
            'url' => route('complaint.index') . '#histori'
        ];
    }
}