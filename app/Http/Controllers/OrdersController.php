<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use App\Models\Orders;
use App\Models\Services;
use App\Repositories\OrdersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware('auth:admin')->except('create','store','destroy','user');
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
        $services = Services::all(['id','price','format']);
        $json = $services;
        return view('orders.create',compact('services','json'));
    }
    /**
     * Show user Orders.
     *
     * @return Response
     */
    public function user(){
        $orders = Orders::where('u_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        if (empty($orders)) {
            Flash::error('Orders not found');

            return redirect(route('orders.index'));
        }
        $services = Services::all()->keyBy('id');
        return view('orders.user_orders',compact('orders','services'));
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
        $orders = '';
        foreach (json_decode($input['jsonOrders']) as $key => $value){
            $orders .= $key . '|' .$value->quantity .',';
        }
        $orders = rtrim($orders,",");

        $order = new Orders();
        $order->u_id = Auth::user()->id;
        $order->price = (int) $input['summa'];
        $order->services = $orders;
        $order->status = 0;

      $orders = $this->ordersRepository->create($order->toArray());
        Flash::success('Orders saved successfully.');

        return redirect(route('orders.user'));
    //  return $orders . '   ' . $u_id;
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

    public function updateStatus($id, UpdateOrdersRequest $request)
    {
        $orders = $this->ordersRepository->findWithoutFail($id);
        if (empty($orders)) {
            Flash::error('Orders not found');

            return redirect(route('orders.index'));
        }
        $orders->status = 1;
        $orders->save();

        Flash::success('Orders updated successfully.');

        return redirect()->back();
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
