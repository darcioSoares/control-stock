<div>
        <div class="m-2 flex justify-end mr-8">      
            <input type="text" class="block w-4/12  rounded-lg border-5 text-gray-900  ring-gray-300"   placeholder="Nome ou CNPJ" wire:model.live.debounce.750ms="search"/>
        </div>

    <div class="grid grid-cols-1 py-8 px-8">

                    <div class="overflow-x-auto">

                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b text-left  sm:hidden">ID</th>
                                    <th class="py-2 px-4 border-b text-left">CNPJ</th>
                                    <th class="py-2 px-4 border-b text-left">Name</th>
                                    <th class="py-2 px-4 border-b text-left">Email</th>
                                    <th class="py-2 px-4 border-b text-left">Registro</th>
                                    <th class="py-2 px-4 border-b text-left">Ações</th>
                                </tr>
                            </thead>
                                                      
                            <tbody>                              
                                <!-- Substitua os dados abaixo pelos seus dados reais -->
                                @foreach ( $suppliers as $supplier)                        
                                    <tr class="hover:bg-gray-200 ">
                                        <td class="py-2 px-4 border-b text-left  sm:hidden">{{$supplier->id}}</td>
                                        <td class="py-2 px-4 border-b text-left">{{$supplier->cnpj}}</td>
                                        <td class="py-2 px-4 border-b text-left">{{$supplier->name}}</td>
                                        <td class="py-2 px-4 border-b text-left">{{$supplier->social_reason}}</td>
                                        <td class="py-2 px-4 border-b text-left">{{$supplier->email }}</td>                          
                                        <td class="py-2 px-4 border-b text-left">{{$supplier->created_at}}</td>
                                        <td class="py-2 px-4 border-b text-left">
                                        <a href="{{ route('supplier.edit', ['id' => $supplier->id]) }}" class="btn btn-primary bg-green-500 text-white font-bold py-2 px-4 rounded">Detalhes</i></a>

                                        </td>
                                    </tr>                                    
                                @endforeach
                                               
                            </tbody>
                        </table>
                        {{ $suppliers->links() }}
            </div>
    </div> 
</div>
