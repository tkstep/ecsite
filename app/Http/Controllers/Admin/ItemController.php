<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Item;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{
public function index() {
		$items = Item::get();
		return view('admin.item.index', compact('items'));
	}

	public function detail($id) {
		$item = Item::findOrFail($id);
		return view('admin.item.detail', compact('item'));
	}

	public function create() {
		return view('admin.item.create');
	}
	public function store(ItemRequest $request) {
		$item = new Item();
		$item->goods = $request->goods;
		$item->detail = $request->detail;
		$item->price = $request->price;
		$item->stock = $request->stock;
		$item->save();
		return redirect(route('item.index'));
	}
	public function edit(Item $item) {
		return view('admin.item.edit', compact('item'));
	}
	public function update(ItemRequest $request, Item $item) {
		$item->goods = $request->goods;
		$item->detail = $request->detail;
		$item->price = $request->price;
		$item->stock = $request->stock;
		$item->save();
		return redirect(route('item.index'));
	}
}
