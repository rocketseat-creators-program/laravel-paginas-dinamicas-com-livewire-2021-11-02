<?php

namespace App\Http\Livewire\Paginas;

use App\Models\Tarefa;
use Livewire\Component;

class Tarefas extends Component
{
    public $nome;
    public $buscar;
    public $tarefa;

    public function salvar()
    {
        if (empty($this->tarefa)) {
            Tarefa::create([
                'nome' => $this->nome,
            ]);
        } else {
            $this->tarefa->nome = $this->nome;
            $this->tarefa->save();
            $this->reset('tarefa');
        }

        $this->reset('nome');
    }

    public function editar($id)
    {
        $this->tarefa = Tarefa::find($id);
        $this->nome = $this->tarefa->nome;
    }

    public function excluir($id)
    {
        Tarefa::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.paginas.tarefas', [
            'tarefas' => Tarefa::query()
                ->when('buscar', function ($query) {
                    return $query->where('nome', 'like', '%'.$this->buscar.'%');
                })
                ->get(),
        ]);
    }
}
