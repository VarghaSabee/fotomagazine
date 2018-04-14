@extends('layouts.app')

@section('content')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>

    <style>
        .name{
            float: right;
            font-size: 15px;
            font-weight: 300;
            line-height: 50px;
            margin: 0;
            padding: 0 30px;
        }
        .btnadd{
            background: #53b5aa;
            border: 1px solid #999;
            border-style: none none solid none;
            cursor: pointer;
            display: block;
            color: #fff;
            font-size: 15px;
            font-weight: 300;
            padding: 12px 0;
            width: 150px;
            text-align: center;
            margin-top: 5px;
        }

    </style>
    <header id="site-header">
        <div class="container" >
            <h1>Замовляти</h1>
        </div>
    </header>
    <div class="container" style="min-height: 80vh;">
        <div class="row">
            <div class="col-lg-12">
                <form action="" class="form" data-cesta-feira-form>
                    <div class="form-group">
                        <input type="number" min="1" value="1" class="form-control" name="quantity" data-cesta-feira-attribute placeholder="Quantity">
                    </div>
                    <div class="form-group">
                        <label>Виберіть формат картинки</label>
                        <select class="service form-control" style="height: 2.5em" name="observations" data-cesta-feira-attribute required>
                            @foreach($services as $service)
                                <option value='{!! $service->toJson() !!}'>{{$service->format}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" value="{{$services[0]->format}}" id="product_name" name="product_name" data-cesta-feira-attribute="">
                    <input type="hidden" value="{{$services[0]->price}}" id="unity_price" name="unity_price" data-cesta-feira-attribute>
                    <input type="hidden" value="{{$services[0]->id}}" id="item_id" data-cesta-feira-item-id />
                    <input type="hidden" value="format" name="item_type" data-cesta-feira-attribute>
                    <input type="submit" class="btnadd btn btn-primary" value="Add to Cart"/>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody id="cart-items">
                    </tbody>
                    <tfoot>
                    <tr>
                        <td><a href="javascript:;" class="btn btn-danger" data-cesta-feira-clear-basket>Clear Cart</a></td>
                        <td>  </td>
                        <td>Total</td>
                        <td class="text-right" id="total-value"><strong>0 грн</strong></td>
                        <td>  </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <form id="store" action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <input class="btnadd btn btn-primary" value="Заказати" type="submit">
                </form>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jStorage/0.4.12/jstorage.min.js"></script>
    <script src="{{asset('js/cesta-feira.js')}}"></script>

    <script type="application/javascript">

        function getProducts() {
            var products = $.CestaFeira({
                    debug: false
                }).getItems(),
                totalValueTemp = 0,
                $cartItems = $('#cart-items');
            return products;
        }
        function refresh() {
            setTimeout(function () {
                $('#cart-items').html('');

                $.each(getProducts(), function (index, value) {
                    mountLayout(index, value);
                    updateTotalValue();

                });
            },500);
        }
        function initListaOrcamento() {
            var products = $.CestaFeira({
                    debug: false,
                    onItemAdded: function (item) {
                        //console.log(item);
                        location.reload();
                    },
                    onItemUpdated: function (item) {
                       // console.log(item);
                       location.reload();
                    }
                }).getItems(),
                totalValueTemp = 0,
                $cartItems = $('#cart-items');


            if (!products) {
                console.log("No items in cart!");
                return;
            }

            function updateTotalValue() {

                var totalValue = 0;

                $.each($('[data-item-total-value]'), function (index, item) {
                    totalValue += $(item).data('item-total-value');
                });

                $('#total-value').html("" + parseFloat(totalValue).toFixed(2) + " грн");
                $('#total-value').val(parseFloat(totalValue).toFixed(2));
            }

            function mountLayout(index, data) {
                var totalValueTemp = parseFloat(data.unity_price) * parseInt(data.quantity);

                var $layout = "<tr id='product-"+ index +"'><td class='col-sm-8 col-md-6'><div class='media'>" +
                    "<img class='d-flex align-self-center mr-3' src='http://placehold.it/72x72?text="+index+"' alt=''>" +
                    "<div class='media-body'>" +
                    "<h5 class='mt-0'>"+ data.product_name +"</h5>" +
                    "</div></div></td><td class='col-sm-1 col-md-1' style='text-align: center'>" + data.quantity +
                    "<td class='col-sm-1 col-md-1 text-center'><strong>"+ data.unity_price +" грн</strong></td>" +
                    "<td class='col-sm-1 col-md-1 text-center' data-item-total-value='"+totalValueTemp+"'><strong>"+parseFloat(totalValueTemp).toFixed(2)+" грн</strong></td>" +
                    "<td class='col-sm-1 col-md-1'>" +
                    "<a href='javascript:;' class='btn btn-danger fa fa-trash' data-cesta-feira-delete-item='"+ index +"'><span class='sr-only'>Remove</span></a>" +
                    "</td></tr>";

                $cartItems.append($layout);
            }

            $.each(products, function (index, value) {
                mountLayout(index, value);
            });

            updateTotalValue();

            $(document).on('click', 'a[data-cesta-feira-delete-item]', function(e) {
                e.preventDefault();

                var productId = $(this).data('cesta-feira-delete-item');

                if($(document).on('cesta-feira-item-deleted')){
                    $('#product-'+productId).fadeOut(500, function() {
                        $(this).remove();
                        updateTotalValue();
                    });
                }
            });

            $(document).on('cesta-feira-clear-basket', function (e) {
                $('#cart-items tr').each(function (index, value) {
                    $(value).fadeOut(500, function() {
                        $(this).remove();
                        updateTotalValue();
                    });
                });
            });
        }
        document.addEventListener("DOMContentLoaded", function(event) {
            $(document).ready(function () {
            initListaOrcamento();

            $('.service').val($(".service option:first").val()).change();

            $('.service').on('change',function () {
                var obj = JSON.parse( $(this).val());
                $('#product_name').val(obj.format);
                $('#unity_price').val(obj.price);
                $('#item_id').val(obj.id);
            });

            $('#store').on('submit',function () {
                    var $hidden = $("<input type='hidden' name='jsonOrders'/>");
                    $hidden.val(JSON.stringify(getProducts()));
                    $(this).append($hidden);
                    $(this).append($("<input type='hidden' value='"+ $('#total-value').val() +"' name='summa'/>"));
                    return true;
            });

        });
        });
    </script>
@endsection