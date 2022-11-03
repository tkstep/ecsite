<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\facades\Auth;
use App\Item;

class Cart extends Model
{
use SoftDeletes;
   protected $fillable = ['user_id', 'item_id', 'quantity'];
   protected $table = 'carts';
 
 
   public function item() {
   return $this->belongsTo('App\Item', 'item_id');
   }
 
   public function show()
   {
   $user_id = Auth::id();
   return $this->where('user_id', $user_id)->get();
   }
 
   public function add($item_id, $qty) {
   $item = (new item)->findOrFail($item_id);
   $stock = $item->stock;
   if ($stock <= 0) {
   return false;
   }
   $cart = $this->firstOrCreate(['user_id' => Auth::id(), 'item_id' => $item_id], ['quantity' => 0]);
   \DB::beginTransaction();
   try {
   $cart->increment('quantity', $qty);
   $item->decrement('stock', $qty);
   \DB::commit();
   return true;
   } catch (\Exception $e) {
   \DB::rollback();
   return false;
   }
    }
public function del($item_id)
   {
   $cart = $this->firstOrNew(['user_id' => Auth::id(), 'item_id' => $item_id]);
   $qty = $cart['quantity'];
   $item = (new item)->findOrFail($item_id);
   if ($qty) {
   \DB::beginTransaction();
   try {
   $cart->delete();
   $item->increment('stock', $qty);
   $cart->decrement('quantity', $qty);
   \DB::commit();
   return true;
   } catch (\Exception $e) {
   \DB::rollback();
   }
   return false;
   }
   }
   public function total() {
   $result = $this->item->price * $this->quantity;
   return $result;
       }
}
