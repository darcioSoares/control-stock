<form action="{{ route('batch.store') }}" method="POST">
    @csrf

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

        @if ($errors->any())
        <div class="flex justify-center bg-red-600 rounded-full mx-80 py-5">
            <span class="text-white"> {{ $errors->first() }} </span>
        </div> 
        @endif
        
        <div class="flex justify-center py-8 px-8">
        <div class=" bg-white p-8 rounded-lg shadow-md w-5/12"> 

        @error('suppliers')
                    <span class="text-red-600 mr-10">{{ $message }}</span>
        @enderror 
        <div >   
            <label for="suppliers" >Fornecedor *</label>
            <select name="supplier" class="block w-full  p-2 rounded-lg border-5 text-gray-900  ring-gray-300 placeholder:text-gray-400">       
                <option value="" disabled selected >Selecione um Fornecedor</option>         
                @foreach($suppliers as $supplier)                            
                    <option value="{{ $supplier->id }}" >
                        {{ $supplier->name }}
                    </option>
                @endforeach                    
            </select>
        </div>                                       
                
                @error('lot_number')
                    <span class="text-red-600 mr-10">{{ $message }}</span>
                @enderror                
                <div >     
                    <label for="lot_number"> Numero do Lote * </label>       
                    <input type="text" name="lot_number" class="block w-full  rounded-lg border-5 text-gray-900  ring-gray-300" value="{{ old('lot_number') }}">
                </div>
                 
                @error('production_information')
                    <span class="text-red-600 mr-10">{{ $message }}</span>
                @enderror 
                <div >   
                    <label for="production_information" >Informaçao do Produto *</label>         
                    <input type="text" name="production_information"  class="block w-full  rounded-lg border-5 text-gray-900  ring-gray-300 placeholder:text-gray-400" value="{{ old('production_information') }}">
                </div>

                @error('batch_code')
                    <span class="text-red-600 mr-10">{{ $message }}</span>
                @enderror                
                <div >     
                    <label for="batch_code"> Codigo do lote </label>       
                    <input type="text" name="batch_code" class="block w-full  rounded-lg border-5 text-gray-900  ring-gray-300" value="{{ old('batch_code') }}">
                </div>
                 
                @error('individual_serial_number')
                    <span class="text-red-600 mr-10">{{ $message }}</span>
                @enderror                
                <div >     
                    <label for="individual_serial_number"> Individual Numero da Serie </label>       
                    <input type="text" name="individual_serial_number" class="block w-full  rounded-lg border-5 text-gray-900  ring-gray-300" value="{{ old('individual_serial_number') }}">
                </div>

                @error('due_date')
                    <span class="text-red-600 mr-10">{{ $message }}</span>
                @enderror 
                <div >   
                    <label for="due_date" >Data de Vencimento*</label>         
                    <input type="date" name="due_date"  class="block w-full  rounded-lg border-5 text-gray-900  ring-gray-300 placeholder:text-gray-400" value="{{ old('due_date') }}">
                </div>

                                    
 
            <div class="flex justify-start" x-data="{loading:false}">
                <button x-on:click="loading = true" class="btn bg-green-300 w-full rounded-lg h-10 mt-6"
                x-on:click="window.scrollTo(0, 0)" >
                    Enviar
                </button>

                <div class="ml-8 mt-5" x-show="loading">
                    @include('myComponents.loading-cicle')
                </div>
            </div>
        </div>
    </div>
</form>
