<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('suppliers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
                'cnpj' => 'required|min:13',
                'email' => 'required|email|max:220',
                'social_reason' => 'required|max:220',
                'fantasy_name' => 'required|max:220',
                'name' => 'required|max:220',
                'last_name' => 'required|max:220',               
            ],
            [
                'name.required' => 'Nome Obrigatorio',
                'email.required'=> 'Email Obrigatorio',
                'social_reason.required'=> 'Telefone Obrigatorio',
                'fantasy_name.required'=> 'Origem Obrigatorio' ,
                'name.required'=> 'Nome Obrigatorio',
                'last_name.required'=> 'Origem Obrigatorio'   
            ]        
        );

        try {            
            DB::beginTransaction();

            $supplier = new Supplier();
            $supplier->cnpj = $request->cnpj;
            $supplier->social_reason = $request->social_reason;
            $supplier->fantasy_name = $request->fantasy_name;
            $supplier->name = $request->name;
            $supplier->last_name = $request->last_name;
            $supplier->email = $request->email;  


            // $supplier->actived = 0;
            // $supplier->in_use = 0;
                        
            $supplier->responsible_to_insert_id = Auth::user()->id;
            
            $supplier->save();
            
            DB::commit();
                       
            session()->flash('success', 'Registro salvo com sucesso! '. $request->cnpj );
            return redirect()->route('supplier.create');
        } catch (\Exception $e) {            
            DB::rollBack();
                      
            Log::debug($e->getMessage());        
            session()->flash('error', 'Erro ao salvar o registro: ' );
            return redirect()->route('supplier.create');
            
        }  
    }

    /**
     * Display the specified resource.
     */
    public function show(Suppliers $suppliers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suppliers $suppliers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suppliers $suppliers)
    {
        //
    }
}
