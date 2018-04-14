<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use App\Repositories\OrdersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class OrdersController extends AppBaseController
{
    /** @var  OrdersRepository */
    private $ordersRepository;

    public function __construct(OrdersRepository $ordersRepo)
    {
        $this->ordersRepository = $ordersRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Orders.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ordersRepository->pushCriteria(new RequestCriteria($request));
        $orders = $this->ordersRepository->all();

        return view('orders.index')
            ->with('orders', $orders);
    }

    /**
     * Show the form for creating a new Orders.
     *
     * @return Response
     */
    public function create()
    {
        return view('orders.create');
    }
    /**
     * Show user Orders.
     *
     * @return Response
     */
    public function user(){
        $orders = $this->ordersRepository->all();

        if (empty($orders)) {
            Flash::error('Orders not found');

            return redirect(route('orders.index'));
        }
        return view('orders.user_orders')->with('orders', $orders);
    }
    /**
     * Store a newly created Orders in storage.
     *
     * @param CreateOrdersRequest $request
     *
     * @return Response
     */
    public function store(CreateOrdersRequest $request)
    {
        $input = $request->all();

        $orders = $this->ordersRepository->create($input);

        Flash::success('Orders saved successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Display the specified Orders.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            Flash::error('Orders not found');

            return redirect(route('orders.index'));
        }

        return view('orders.show')->with('orders', $orders);
    }


    /**
     * Show the form for editing the specified Orders.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            Flash::error('Orders not found');

            return redirect(route('orders.index'));
        }

        return view('orders.edit')->with('orders', $orders);
    }

    /**
     * Update the specified Orders in storage.
     *
     * @param  int              $id
     * @param UpdateOrdersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrdersRequest $request)
    {
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            Flash::error('Orders not found');

            return redirect(route('orders.index'));
        }

        $orders = $this->ordersRepository->update($request->all(), $id);

        Flash::success('Orders updated successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified Orders from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orders = $this->ordersRepository->findWithoutFail($id);

        if (empty($orders)) {
            Flash::error('Orders not found');

            return redirect(route('orders.user'));
        }

        $this->ordersRepository->delete($id);

        Flash::success('Orders deleted successfully.');

        return redirect(route('orders.user'));
    }
}
