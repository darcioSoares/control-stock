<?php

namespace App\Http\Controllers;

use App\Models\Batches;
use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('batch.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('batch.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    
       //dd($request->all());   
        $request->validate([
            'lot_number' => 'required|min:13',          
            'production_information' => 'required|max:220',
            'production_information' => 'required|max:220',
            'batch_code' => 'required|max:220',
            'individual_serial_number' => 'required|max:220',
            'supplier' => 'required',              
        ],
        [
            'lot_number.required' => 'Nome Obrigatorio',       
            'production_information.required'=> 'Telefone Obrigatorio',
            'production_information.required'=> 'Origem Obrigatorio' ,
            'batch_code.required'=> 'Nome Obrigatorio',
            'individual_serial_number.required'=> 'Origem Obrigatorio', 
            'supplier.required' => 'Fornecedor Obrigatorio' 
        ]        
    );

    try {            
        DB::beginTransaction();

        $batch = new Batch();
        $batch->lot_number = $request->lot_number;
        $batch->production_information = $request->production_information;
        $batch->batch_code = $request->batch_code;
        $batch->individual_serial_number = $request->individual_serial_number;
        $batch->supplier_id = $request->supplier;
        $batch->due_date = $request->due_date;

        // $supplier->actived = 0;
        // $supplier->in_use = 0;                    
       // $batch->responsible_to_insert_id = Auth::user()->id;
        
        $batch->save();
        
        DB::commit();
                   
        session()->flash('success', 'Registro salvo com sucesso! '. $request->lot_number );
        return redirect()->route('batch.create');
    } catch (\Exception $e) {            
        DB::rollBack();
                  
        Log::debug($e->getMessage());        
        session()->flash('error', 'Erro ao salvar o registro: ' );
        return redirect()->route('batch.create');
        
    }  
    }

    /**
     * Display the specified resource.
     */
    public function show(Batches $batches)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $batch = Batch::find($id);

        if(is_null($batch)){
            session()->flash('error', 'Usuario em questao, não foi encontrado!' );
            return view('batch.index');
        }      

        return view('batch.edit', compact('batch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Batches $batches)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Batches $batches)
    {
        //
    }
}
