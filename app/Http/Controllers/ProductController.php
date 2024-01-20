<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function product()
    {
        $category=Category::all();
        return view('admin.products',compact('category'));
    }
    public function AddProduct(Request$request)
    {
        $product=new product();
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->category=$request->category;
        $product->discount_price=$request->discount_price;
        $image=$request->image;
        $ImageName=time().'.'.$image->getClientOriginalExtension();
        $image->move('products',$ImageName);
        $product->image=$ImageName;
        $product->save();
        return redirect()->back()->with('message','Product added successfully');
    }
    public function ShowProduct()
    {
        $data=product::all();
        return view('admin.show',compact('data'));
    }
    public function deleteProduct($id)
    {
        if (product::find($id))
        {
            product::where('id', $id)->delete();
            return redirect()->back()->with('message', 'product is deleted');
        }
        return redirect()->back()->with('message', 'product is not found');

    }
    public function EditProduct($id)
    {
        $category=Category::all();
        $product=product::find($id);
        return view('admin.UpdateProduct',compact('product','category'));
    }
    public function updateProduct(Request$request,$id)
    {
        if ( $request->image)
        {
            $image = $request->image;
            $ImageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('products', $ImageName);

            product::where('id', '=', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'category' => $request->category,
                'discount_price' => $request->discount_price,
                'image' => $ImageName

            ]);
            return redirect()->back()->with('message', 'product updated successfully');
        }
        {

            product::where('id', '=', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category' => $request->category,
            'discount_price' => $request->discount_price,
            'image'=>product::find($id)->image

        ]);
            return redirect()->back()->with('message', 'product updated   ');

        }
    }
    public function ProductDetails($id)
    {
        $product=product::find($id);
        return view('home.ProductDetails',compact('product'));
    }
    public function AddCart(Request$request,$id)
    {
        if (Auth::id())
        {
            $user=Auth::user();
            $product=product::find($id);
            $cart=new Cart();
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;
            $cart->product_title=$product->title;
            $cart->product_id=$product->id;
            $cart->image=$product->image;

            if ($product->discount_price!=null)
            {
                $cart->price=$product->discount_price*$request->quantity;
            }
            else
            {
                $cart->price=$product->price*$request->quantity;
            }

            $cart->quantity=-$request->quantity;
            $cart->save();
            return redirect()->back();


        }else
        {
            return redirect('login');
        }
    }
    public function ShowCart()
    {
        if (Auth::id())
        {
            $id=Auth::user()->id;
            $cart=Cart::where('user_id','=',$id)->get();
            return view('home.ShowCart',compact('cart'));

        }else
        {
            return redirect('login');
        }

    }
    public function removeCart($id)
    {
        $cart=Cart::find($id);
        $cart->delete();
        return  redirect()->back();
    }
    public function CashOrder()
    {
        $user=Auth::user();
        $userid=$user->id;
        $data=Cart::where('user_id','=',$userid)->get();
        foreach ($data as $data)
        {
            $order=new Order();
            $order->name=$data->name;
            $order->email=$data->email;
            $order->address=$data->address;
            $order->phone=$data->phone;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->quantity=$data->quantity;
            $order->price=$data->price;
            $order->product_id=$data->product_id;
            $order->Payment_status="Cash On Delivery";
            $order->Delivered_status='processing';
            $order->image=$data->image;
            $order->save();

            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();
        }
          return redirect()->back()->with('message','If Order delivered call  us soon');
    }
    public function stripe($totalPrice)
    {
        return view('home.stripe',compact('totalPrice'));
    }


}
