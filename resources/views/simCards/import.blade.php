<div class="flex justify-center py-8 px-8">
        <div class=" bg-white p-8 rounded-lg shadow-md w-5/12">
            @error('suppliers')
                        <span class="text-red-600 mr-10">{{ $message }}</span>
            @enderror 
            <div >   
                <label for="suppliers" >Lote *</label>
                <select name="supplier" class="block w-full  p-2 rounded-lg border-5 text-gray-900  ring-gray-300 placeholder:text-gray-400">       
                    <option value="" disabled selected >Selecione um Lote</option>         
                </select>
            </div>  

        </div>
    </div>

<form action="/import-excel" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto">
    @csrf
    <div class="flex items-center justify-center w-3/4 mx-auto mt-6">
        <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.083 4.583c0-1.032.84-1.875 1.875-1.875h4.167l1.667 1.667h5.833c1.035 0 1.875.843 1.875 1.875v7.5c0 1.032-.84 1.875-1.875 1.875h-1.25v1.25c0 1.033-.842 1.875-1.875 1.875h-5c-1.035 0-1.875-.842-1.875-1.875v-1.25h-3.75c-1.035 0-1.875-.843-1.875-1.875v-7.5zm8.333 0c0-.69-.56-1.25-1.25-1.25h-3.333c-.69 0-1.25.56-1.25 1.25v1.25h5v-1.25zm6.25 8.333c0 .69-.56 1.25-1.25 1.25h-3.75v-2.5h3.75c.69 0 1.25.56 1.25 1.25v1.25zm-6.25 2.5v-2.5h-5v2.5h5zm-7.5-6.25v-1.25c0-.69.56-1.25 1.25-1.25h3.333c.69 0 1.25.56 1.25 1.25v1.25h-5zm-1.25 6.25v-7.5c0-.69.56-1.25 1.25-1.25h3.75v2.5h2.5v-2.5h5v7.5h-11.25z"></path></svg>
            <span class="mt-2 text-base leading-normal" id="selectedFileName">Selecionar arquivo Excel</span>
            <input type='file' name="excel_file" class="hidden" accept=".xlsx, .xls" style="display: none;" onchange="updateFileName(this)"/>
        </label>
    </div>
    <button type="submit" class="ml-4 bg-green-500 text-white py-4 px-6 rounded hover:bg-green-700">Importar Excel</button>
</form>

<script>
    function updateFileName(input) {
        var fileName = input.files[0].name;
        document.getElementById('selectedFileName').innerText = fileName;
    }
</script>
