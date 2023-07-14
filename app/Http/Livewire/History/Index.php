<?php

namespace App\Http\Livewire\History;

use App\Models\Gravida;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search'];

    public $search;
    public $sortType;
    public $sortColumn;

    protected $listeners  = [
        'labDeleted'
    ];

    public function sort($column)
    {
        $sort = $this->sortType == 'desc' ? 'asc' : 'desc';
        $this->sortColumn = $column;
        $this->sortType = $sort;
    }

                public function render()
                {
                    $query = Gravida::query()->where('id', 'like', '%' . $this->search . '%');

                    $query->orWhere(function ($query) {
                        $query->whereHas('patient', function ($query) {
                            $query->where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('nik', 'like', '%' . $this->search . '%')
                            ->orWhere('phone_number', 'like', '%' . $this->search . '%')
                            ->orWhere('address', 'like', '%' . $this->search . '%');
                        });
                    });

                    if ($this->sortColumn) {
                        $query->orderBy($this->sortColumn, $this->sortType);
                    } else {
                        $query->latest('id');
                    }

                    $gravida = $query->where("bidan_id", Auth::user()->id)->paginate(10);
                    $gravida->appends(['search' => $this->search]);

                    return view('livewire.history.index', compact('gravida'));
                }

            }
