<form action="{{ route('supplier.store') }}" method="POST">
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
           
                @error('cnpj')
                    <span class="text-red-600 mr-10">{{ $message }}</span>
                @enderror                
                <div >     
                    <label for="name"> CNPJ * </label>       
                    <input type="text" name="cnpj" class="block w-full  rounded-lg border-5 text-gray-900  ring-gray-300" value="{{ old('cnpj') }}">
                </div>
                 
                @error('social_reason')
                    <span class="text-red-600 mr-10">{{ $message }}</span>
                @enderror 
                <div >   
                    <label for="social_reason" >Razão Social *</label>         
                    <input type="text" name="social_reason"  class="block w-full  rounded-lg border-5 text-gray-900  ring-gray-300 placeholder:text-gray-400" value="{{ old('social_reason') }}">
                </div>

                @error('fantasy_name')
                    <span class="text-red-600 mr-10">{{ $message }}</span>
                @enderror                
                <div >     
                    <label for="name"> Nome Fantasia </label>       
                    <input type="text" name="fantasy_name" class="block w-full  rounded-lg border-5 text-gray-900  ring-gray-300" value="{{ old('fantasy_name') }}">
                </div>
                 
                @error('name')
                    <span class="text-red-600 mr-10">{{ $message }}</span>
                @enderror                
                <div >     
                    <label for="name"> Nome Fantasia </label>       
                    <input type="text" name="name" class="block w-full  rounded-lg border-5 text-gray-900  ring-gray-300" value="{{ old('name') }}">
                </div>

                @error('last_name')
                    <span class="text-red-600 mr-10">{{ $message }}</span>
                @enderror 
                <div >   
                    <label for="last_name" >Sobrenome*</label>         
                    <input type="text" name="last_name"  class="block w-full  rounded-lg border-5 text-gray-900  ring-gray-300 placeholder:text-gray-400" value="{{ old('last_name') }}">
                </div>

                @error('email')
                    <span class="text-red-600 mr-10">{{ $message }}</span>
                @enderror
                <div >  
                    <label for="name" >Email *</label>           
                    <input type="email" name="email" class="block w-full  rounded-lg border-5 text-gray-900  ring-gray-300 placeholder:text-gray-400" value="{{ old('name') }}">
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
