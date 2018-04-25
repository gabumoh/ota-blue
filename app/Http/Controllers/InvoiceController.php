<?php

namespace App\Http\Controllers;
use App\Invoice;
use Illuminate\Http\Request;
class InvoiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showAllInvoices()
    {
       $invoices = Invoice::all();

       return response()->json($invoices, 200);
    }

    public function showOneInvoice(Request $request, $id)
    {
            $invoice = Invoice::findOrFail($id);
            
            if ($invoice) {
                return response()->json($invoice, 200);
            }else{
                return response()->json('Not Found', 400);            
            }
    }

    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);

        $invoice->update($request->all());

        return response()->json($invoice,200);
    }

    public function create(Request $request)
    {
        $res = Invoice::create($request->all());

        return response()->json($res, 201);
    }

    public function delete(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        if ($invoice) {
            $invoice->delete();

            return response()->json('Deleted successfully', 200);
        }
        else{
            return response()->json('Invoice does not exist', 400);
        }
    }   
}
