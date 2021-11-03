<main class="container mx-auto mx-auto pt-10 pb-12 px-4 lg:pb-16">
    <form wire:submit.prevent='salvar' method='post'>
        <div class="space-y-6">
            <div>
                <h1 class="text-lg leading-6 font-medium text-gray-900">To do</h1>
                <p class="mt-1 text-sm text-gray-500">
                    Não esqueça de nenhuma tarefa hein?
                </p>
            </div>

            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700">
                    Tarefa
                </label>
                <div class="mt-1 flex gap-4">
                    <input wire:model.lazy='nome' type="text"
                        class=" block shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm border-gray-300 rounded-md " />

                    <div>
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Salvar
                        </button>
                    </div>
                </div>
            </div>

            <hr>

            <div>
                <label for="buscar" class="block text-sm font-medium text-gray-700">
                    Buscar Tarefa
                </label>
                <div class="mt-1">
                    <input wire:model.debounce.500ms='buscar' type="text"
                        class=" block w-full shadow-sm focus:ring-sky-500 focus:border-sky-500 sm:text-sm border-gray-300 rounded-md " />
                </div>
            </div>

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class=" py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 ">
                        <div class=" shadow overflow-hidden border-b border-gray-200 sm:rounded-lg ">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class=" px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                            ID
                                        </th>
                                        <th scope="col"
                                            class=" px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                            Tarefa
                                        </th>
                                        <th scope="col"
                                            class=" px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                            Status
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Ações</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($tarefas as $tarefa)
                                        <tr wire:loading.remove wire:target='excluir({{ $tarefa->id }})'>
                                            <td class=" px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 ">
                                                {{ $tarefa->id }}
                                            </td>
                                            <td class=" px-6 py-4 whitespace-nowrap text-sm text-gray-500 ">
                                                {{ $tarefa->nome }}
                                            </td>
                                            <td class=" px-6 py-4 whitespace-nowrap text-sm text-gray-500 ">
                                                {{ $tarefa->concluido ? 'Concluído' : 'Pendente' }}
                                            </td>
                                            <td class=" px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                                <a wire:click='editar({{ $tarefa->id }})' href="#"
                                                    class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                                <a wire:click='excluir({{ $tarefa->id }})' href="#"
                                                    class="ml-4 text-indigo-600 hover:text-indigo-900">Excluir</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div wire:loading wire:target='salvar,editar,excluir'>Processando... aguarde.</div>
</main>
