<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\AdminClient;
// use Illuminate\Support\Facades\App\Client;
use App\Client;
use App\Http\Controllers\AdminCategoryController;
use App\AdminCategory;
use App\ClientProduct;
use Response;
use PDF;

class ClientProductController extends Controller
{
    public function index($id)
    {
        $cname = AdminCategory::get() ;
        $clientproduct = ClientProduct::where('client',$id)->get();
        $client=Client::where('id',$id)->first();
        return view('AdminClientDetail',compact('client','cname','clientproduct'));
    }
    public function store(Request $request)
    {
       $product = new ClientProduct();
       $product->client=$request->input('clientid');
       $product->cname=$request->input('cname');
       $product->pname=$request->input('pname');
       $product->quantity=$request->input('quantity');
       $product->unit=$request->input('unit');
       $product->price=$request->input('price');
       $product->grandtotal=$request->input('grandtotal');
       $product->save();
       return redirect()->back();

    }
    public function edit_products(Request $request,$id)
    {
        $products=ClientProduct::where('id',$id)->first();
        $cname =AdminCategory::get();
        $client=Client::where('id',$id)->first();
        return view('editAdminClientProduct', compact('products','cname','client'));
    }
    public function update(Request $request)
    {
        $product =ClientProduct::find($request->id);
        $product->cname=$request->input('cname');
        $product->pname=$request->input('pname');
        $product->quantity=$request->input('quantity');
        $product->unit=$request->input('unit');
        $product->price=$request->input('price');
        $product->grandtotal=$request->input('grandtotal');
        $product->save();
        return redirect()->back();

    }

    public function delete($id)
    {
        $clientproduct = ClientProduct::where('id',$id)->delete();
        return redirect()->back();
    }
    public function downloadPdf()
    {
        $clientproduct = ClientProduct::where('client',$id)::get();
        $client=Client::where('id',$id)::get();
    }

    public function viewpdf($id)
    {
        $clientproduct = ClientProduct::where('client',$id)->get();
        $client=Client::where('id',$id)->get();

        return view('viewDetail',compact('clientproduct','client'));

    }

     public function pdf($id)
    {
        $clientproduct = ClientProduct::where('client',$id)->get();
        $client=Client::where('id',$id)->get();
        $pdf = PDF::loadview('viewDetail',compact('clientproduct','client'));
        $pdf->setPaper('L');
       $pdf->output();
       $canvas = $pdf->getDomPDF()->getCanvas();
       $height = $canvas->get_height();
       $width = $canvas->get_width();
       $canvas->set_opacity(.2,"Multiply");
       $canvas->page_text($width/3, $height/2, 'Nihir', null,
        70, array(0,0,0),2,2,-30);
        return $pdf->download('list.pdf');
    }

}
