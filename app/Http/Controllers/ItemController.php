<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ItemController extends Controller
{
    public function index(){
        $items = Item::orderBy('id','desc')->get();
        return view('item.index',compact('items'));
    }//end method

    //store item
    public function storeItem(Request $request){
        //image uplaod
        if($request->image){
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move('upload/', $imageName);

            $imageUrl = 'upload/'.$imageName;
        }

        //data insert
        $item = new Item();

        $item->name = $request->name;
        $item->price = $request->price;
        $item->image = $imageUrl;
        $item->save();
    }//end method

    //edit item
    public function editItem($id){
        $item = Item::find($id);
        return response()->json([
            'item'=>$item
        ]);
    }//end method


    //update item
    public function updateItem(Request $request,$id){
        $item = Item::find($id);

          //image uplaod
          if($request->image){
            if(File::exists( $item->image)){
                unlink($item->image);
            }
            $image = $request->image;
            $imageName = rand().'.'.$image->getClientOriginalName();
            $image->move('upload/', $imageName);

            $imageUrl = 'upload/'.$imageName;

            $item->image =  $imageUrl;
        }

        //data update
        $item->name = $request->name;
        $item->price = $request->price;
        $item->save();
    }//end method

    //delete data
    public function deleteItem($id){
        $item = Item::find($id);

        if(File::exists( $item->image)){
            unlink($item->image);
        }

        $item->delete();
    }//end method
}

