<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h1><h1> <Strong>Import Excel Sim card</Strong></h1></h1>
        </h2>
    </x-slot>
    
    <div class="grid grid-cols-1 py-10">
        <div class="col-span-1 px-2">
            <div class="mx-auto ">                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <!-- <div class="text-center p-6 text-gray-900">
                        <h1 class="">Lista de Companias</h1>
                    </div>   -->

                    @if(session()->has('success'))
                    <div class="flex justify-center bg-green-600 rounded-full mx-80 py-5">
                        <span class="text-white"> {{ session()->get('success') }}</span>
                    </div>            
                    @endif

                    @if(session()->has('error'))
                    <div class="flex justify-center bg-red-600 rounded-full mx-80 py-5">
                        <span class="text-white"> {{ session()->get('error') }}</span>
                    </div> 
                    @endif
                    
                    @include('simCards.import') 
                           
                </div>    
            </div>
        </div> 
    </div>
     
          
</x-app-layout>   

