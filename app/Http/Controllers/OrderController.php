<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return array
     */
    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 8);
        $page = $request->query('page', 1);
        $status = $request->query('status', 'published');
        $order_query = Order::query();

        $order_query
            ->select('id', 'client_firstname', 'client_lastname', 'delivery_at')
            ->when($status == 'trashed', function ($query) {
                $query->onlyTrashed();
            })
            ->when($status == 'archived', function ($query) {
                $query->archived();
            })
            ->when($status == 'published', function ($query) {
                $query->published();
            });

        $order_query_paginate = $order_query->paginate($perPage, ['*'], 'page', $page);

        $items_raw = $order_query_paginate->items();
        $items = [];

        foreach ($items_raw as $key => $item) {
            $items[$key]['id'] = $item->id;
            $items[$key]['name'] = $item->client_firstname . ' ' . $item->client_lastname ;
            $items[$key]['payed'] = true;
            $items[$key]['articles'] = $item->items()->count();
            $items[$key]['date'] = $item->delivery_at;
        }

        $pagination = [];
        $pagination['perPage'] = $order_query_paginate->perPage();
        $pagination['page'] = $order_query_paginate->currentPage();
        $pagination['firstItemNumber'] = $order_query_paginate->firstItem();
        $pagination['lastItemNumber'] = $order_query_paginate->lastItem();
        $pagination['totalItems'] = $order_query_paginate->total();
        $pagination['previousPageUrl'] = $order_query_paginate->previousPageUrl() ?? '#';
        $pagination['nextPageUrl'] = $order_query_paginate->nextPageUrl() ?? '#';

        return [
            'items' => $items,
            'navigation' => $pagination
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
