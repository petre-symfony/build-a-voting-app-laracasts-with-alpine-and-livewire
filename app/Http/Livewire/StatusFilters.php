<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Route;

class StatusFilters extends Component {
    public $status = 'All';

    public function mount() {
        if (Route::currentRouteName() === 'idea.show') {
            $this->status = null;
            $this->queryString = [];
        }
    }

    public function setStatus($newStatus){
        $this->status = $newStatus;

        /**  if ($this->getPreviousRouteName() === 'idea.show') { */
            return $this->redirect(route('idea.index', [
                'status' => $this->status
            ]));
        /**  } */
    }

    protected $queryString = [
        'status'
    ];

    public function render() {
        return view('livewire.status-filters');
    }

    private function getPreviousRouteName() {
        return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
    }
}
