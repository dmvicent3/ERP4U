<?php

namespace App\Http\Controllers\Actl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostalCode;
use App\Models\Supplier;
use Illuminate\Support\Carbon;
use Auth;
class SupplierController extends Controller
{
    public function SupplierAll(){
        $suppliers = Supplier::latest()->get();
        return view('backend.supplier.supplier_all', compact('suppliers'));
    }

    public function SupplierAdd(){
        return view('backend.supplier.supplier_add');
    }

    public function SupplierStore(Request $request){
      Supplier::insert([
        'postalCode' => $request-> postalCode,
        'name' => $request-> name,
        'town' => $request-> town,
        'code' => $request-> code,
        'created_by' => Auth::user()->id,
        'created_at' => Carbon::now(),        
      ]);

      $notification = array (
        'message' => 'Supplier Successfully Inserted.',
        'alert-type' => 'success'
      );

      return redirect()->route('supplier.all')->with($notification);
    }

    public function SupplierEdit($id){
        $supplier = Supplier::findOrFail($id);
        return view('backend.supplier.supplier_edit', compact('supplier'));
    }

    public function SupplierUpdate(Request $request){
       $supplier_id = $request->id;

       Supplier::findOrFail($supplier_id)->update([
        'postalCode' => $request->postalCode,
        'name' => $request->name,
        'town' => $request->town,
        'code' => $request->code,
        'updated_by' => Auth::user()->id,
        'updated_at' => Carbon::now()
       ]);

       
      $notification = array (
        'message' => 'Supplier Updated Successfully.',
        'alert-type' => 'success'
      );

      return redirect()->route('supplier.all')->with($notification);
    }

    public function SupplierDelete($id){
      Supplier::findOrFail($id)->delete();

      $notification = array (
        'message' => 'Supplier Deleted Successfully.',
        'alert-type' => 'success'
      );

      return redirect()->back()->with($notification);
  }
}
