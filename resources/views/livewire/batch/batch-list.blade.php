<div>
        <div class="m-2 flex justify-end mr-8">      
            <input type="text" class="block w-4/12  rounded-lg border-5 text-gray-900  ring-gray-300"   placeholder="Numero do Lote ou Data" wire:model.live.debounce.750ms="search"/>
        </div>

    <div class="grid grid-cols-1 py-8 px-8">

                    <div class="overflow-x-auto">

                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b text-left  sm:hidden">ID</th>
                                    <th class="py-2 px-4 border-b text-left">Numero Lote</th>
                                    <th class="py-2 px-4 border-b text-left">Informaçao Produto</th>
                                    <th class="py-2 px-4 border-b text-left">Codigo Lote</th>
                                    <th class="py-2 px-4 border-b text-left">Data Validade</th>
                                    
                                    <th class="py-2 px-4 border-b text-left">Ações</th>
                                </tr>
                            </thead>
                                                      
                            <tbody>                              
                                <!-- Substitua os dados abaixo pelos seus dados reais -->
                                @foreach ( $batches as $batch)                        
                                    <tr class="hover:bg-gray-200 ">
                                        <td class="py-2 px-4 border-b text-left  sm:hidden">{{$batch->id}}</td>
                                        <td class="py-2 px-4 border-b text-left">{{$batch->lot_number}}</td>
                                        <td class="py-2 px-4 border-b text-left">{{$batch->production_information}}</td>
                                        <td class="py-2 px-4 border-b text-left">{{$batch->individual_serial_number}}</td>
                                        <td class="py-2 px-4 border-b text-left">{{$batch->due_date }}</td>                         
                                        <td>
                                        <a href="{{ route('batch.edit', ['id' => $batch->id]) }}" class="btn btn-primary bg-green-500 text-white font-bold py-2 px-4 rounded">Detalhes</i></a>

                                        </td>
                                    </tr>                                    
                                @endforeach
                                               
                            </tbody>
                        </table>
                        {{ $batches->links() }}
            </div>
    </div> 
</div>
