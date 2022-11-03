<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Item;
use Validator;

class CartController extends Controller
{
protected $redirectTo = '/home';
	public function __construct(Cart $cart)
	{
		$this->cart = $cart;
	}
	public function index(Cart $cart)
	{
		$carts = $cart->show();
		$totals = $this->totals($carts);
		return view('cart.index', compact('carts', 'totals'));
	}

	private function totals($carts)
	{
		$result = 0;
		foreach ($carts as $cart) {
			$result += $cart->total();
		}
		return $result;
	}
	public function add(Request $request, Cart $cart)
	{
		$item_id = $request->item_id;
		$data = Item::where('id', $item_id)->first();
		$stock = $data['stock'];
		$this->validate($request, ['qty' => "integer|required|min:1|max:{$stock}"]);
		$qty = $request->qty;
		//カートに追加の処理
		if ($cart->add($item_id, $qty)) {
			$message = '商品をカートに入れました。';
		} else {
			$message = '在庫がたりません';
		}
		//追加後の情報を取得
		$carts = $cart->show();
		$totals = $this->totals($carts);
		return redirect(route('cart.index'))->with('flash_message', $message);
	}
	public function del(Request $request, Cart $cart)
	{
		$item_id = $request->item_id;
		//カートから削除の処理
		if ($cart->del($item_id)) {
			$message = '商品をカートから削除しました。';
		} else {
			$message = '削除に失敗しました';
		}
		//削除後の情報を取得
		$carts = $cart->show();
		$totals = $this->totals($carts);
		return redirect(route('cart.index'))->with('flash_message', $message);
	}
}
