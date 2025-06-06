<?php

namespace App\Livewire;

use App\Models\Pemesanan;
use Livewire\Component;
use Livewire\WithPagination;

class TabelPemesanan extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap'; // Jika menggunakan Bootstrap
    public $search = '';

    public function mount() {
        $this->search = request()->get('q');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function fillSearch($query_search) {
        $this->search = $query_search;
    }

    public function render()
    {
        $data = Pemesanan::with('pelanggan', 'paket')
        ->where(function ($query) {
            $query->whereHas('pelanggan', function ($subQuery) {
                $subQuery->where('nama_lengkap', 'like', '%' . $this->search . '%');
            })
            ->orWhereHas('paket', function ($subQuery) {
                $subQuery->where('nama_paket', 'like', '%' . $this->search . '%');
            });
        })
        ->orWhere('tanggal_booking', 'like', '%' . $this->search . '%')
        ->paginate(10);
    


        return view('livewire.tabel-pemesanan', compact('data'));
    }
}
