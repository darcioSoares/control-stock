<?php

namespace App\Livewire\Batch;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Batch;
use Illuminate\Support\Facades\Auth;

class BatchList extends Component
{
    use WithPagination;

    public ?string $search = null;

    public function render()
    {
        return view('livewire.batch.batch-list', [
            'batches' => Batch::query()
                ->where(function ($query) {
                    $query->where('lot_number', 'like', '%' . $this->search . '%')
                          ->orWhere('due_date', 'like', '%' . $this->search . '%');
                })
                ->paginate(10)
        ]);
    }
}
