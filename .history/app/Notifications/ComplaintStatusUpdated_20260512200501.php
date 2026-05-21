<?php

namespace App\Notifications;

use App\Models\Complaint;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ComplaintStatusUpdated extends Notification
{
    use Queueable;

    protected $complaint;
    protected $oldStatus;

    public function __construct(Complaint $complaint, $oldStatus)
    {
        $this->complaint = $complaint;
        $this->oldStatus = $oldStatus;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        $statusText = [
            'pending' => 'Menunggu',
            'diproses' => 'Diproses',
            'selesai' => 'Selesai',
            'ditolak' => 'Ditolak'
        ];

        $oldStatusText = $statusText[$this->oldStatus] ?? $this->oldStatus;
        $newStatusText = $statusText[$this->complaint->status] ?? $this->complaint->status;

        return [
            'type' => 'status_update',
            'complaint_id' => $this->complaint->id,
            'complaint_title' => $this->complaint->judul,
            'old_status' => $this->oldStatus,
            'old_status_text' => $oldStatusText,
            'new_status' => $this->complaint->status,
            'new_status_text' => $newStatusText,
            'message' => "Status pengaduan '{$this->complaint->judul}' berubah dari {$oldStatusText} menjadi {$newStatusText}",
            'url' => route('complaint.index') . '#histori'
        ];
    }
}