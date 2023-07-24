<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('files')->get();
        return response()->json($product);
    }

    public function program()
    {
        $product = Product::where('name', 'Program')->with('files')->first();
        return response()->json($product);
    }

    public function subscription()
    {
        $product = Product::where('name', 'Monthly Subscription')->with('files')->first();
        return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function productFiles($id)
    {
        $product = Media::where('product_id', $id)->where('type', 'pdf')->get();
        if (!empty($product)) {
            foreach ($product as $file) {
                // $filePath = storage_path("app/" . $file->image);
                // $headers = [
                //     'Content-Type' => 'application/octet-stream', // Change the content type based on the file type
                //     'Content-Disposition' => 'attachment; filename="' . $file->image . '"',
                // ];
                // $removed_pdf_slashes = str_replace(['pdf', '/'], '', $file->image);

                // return response()->download($filePath, $removed_pdf_slashes, $headers);
                // return response()->download(storage_path("app/" . $file->image, 'faraz.pdf'));
                return Storage::download("app/" . $file->image);
            }
        } else {
            $data['message'] = 'Not Have Files';
        }
        $data['status'] = 200;

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->status == true) {
            $status = 1;
        } else {
            $status = 0;
        }
        $product = Product::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'name' => $request->name,
            'price' => $request->price,
            'status' => $status,
            'description' =>  $request->description,
        ]);
        if ($request->has('images')) {
            foreach ($request->images as $image) {
                $file = $image['image'];
                $originalname = $file->getClientOriginalName();
                $path = $file->storeAs('images', $originalname);
                $images = Media::create([
                    'product_id' => $product->id,
                    'image' => $path,
                    'type' => 'image'
                ]);
            }
        }
        if ($request->has('files')) {
            foreach ($request['files'] as $key => $file) {
                $file = $file['file'];
                $originalname = $file->getClientOriginalName();
                $path = $file->storeAs('pdf', $originalname);
                $images = Media::create([
                    'product_id' => $product->id,
                    'image' => $path,
                    'type' => 'pdf'
                ]);
            }
        }
        $data['message'] = 'Product Add Successfully';
        $data['status'] = 200;
        if (!empty($product)) {
            return response()->json($data);
        }
    }

    /**
     * Display the specified resource.
     */
    public function download(string $id)
    {
        $file = Media::findOrfail($id);
        return response()->download(storage_path("app/" . $file->image));
    }

    public function show($id)
    {
        $file = Product::with('files')->where('id', $id)->first();
        return response()->json($file);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Product::with('files')->findorfail($id);
        return response()->json($edit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->status == true) {
            $status = 1;
        } else {
            $status = 0;
        }
        $product = Product::where('id', $id)->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'name' => $request->name,
            'price' => $request->price,
            'status' => $status,
            'description' => $request->description,
        ]);
        $data['message'] = 'Product Update Successfully';
        $data['status'] = 200;
        if (!empty($product)) {
            return response()->json($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delProduct = Product::findorfail($id);
        $delProduct->delete();
        $data['message'] = 'Product Delete Successfully';
        return response()->json($data);
    }
    public function delete(string $id)
    {
        $delFile = Media::findorfail($id);
        $delFile->delete();
        $data['message'] = 'File Delete Successfully';
        return response()->json($data);
    }
}
