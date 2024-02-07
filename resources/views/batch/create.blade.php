<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h1> <Strong>Criar Lote</Strong></h1>
        </h2>
    </x-slot>

    
    <div class="grid grid-cols-1 py-10">
        <div class="col-span-1 px-2">
            <div class="mx-auto ">                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <!-- <div class="text-center p-6 text-gray-900">
                        <h1 class="">Cadastro de Empresas</h1>
                    </div>    -->
               
                    @include('batch.comp-create')     
    
                </div>    
            </div>
        </div> 
    </div>
     
          
</x-app-layout>   

