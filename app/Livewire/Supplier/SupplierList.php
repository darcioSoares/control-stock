<?php

namespace App\Livewire\Supplier;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class SupplierList extends Component
{
    use WithPagination;

    public ?string $search = null;

    public function render()
    {
        return view('livewire.supplier.supplier-list', [
            'suppliers' => Supplier::query()
                ->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                          ->orWhere('cnpj', 'like', '%' . $this->search . '%');
                })
                ->paginate(10)
        ]);        
    }
}

// return view('livewire.supplier.supplier-list', [
//     'vehicles' => Supplier::query()->with('equipmentVehicle')
//         ->where('company_id', Auth::user()->company->id) 
//         ->when($this->search, function ($query) {
//             $query->where('type', 'like', '%' . $this->search . '%')
//                 ->orWhere('description', 'like', '%' . $this->search . '%')
//                 ->orWhere('license_plate', 'like', '%' . $this->search . '%');
//         })
//         ->paginate(10)
// ]); 
