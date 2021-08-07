<?php
    $cart = session()->has('cart') ? session()->get('cart') : null;
?>
<div class="element-field">
    @if($cart != null)
    @foreach($cart as $item)
    <div class="element-cart">
        <div class="cart-image">
            <img src="{{ $item['image'] }}" alt="">
        </div>
        <div class="element-content">
            <div class="cart-name">
                <p>{{ $item['name'] }}</p>
            </div>
            <div class="cart-price">
                <p>{{ $item['price'] }} Đ</p>
            </div>
        </div>
        <div class="delete-cart">Delete</div>
    </div>
    @endforeach
    @else
    <p>Your cart is empty</p>
    @endif
</div>
<div class="cart-footer">
    <div class="grand-price">
        <p><b>Grand price</b> : 12.000.000 USD</p>
    </div>
    <a href="" class="action view">View cart</a>
    <a href="" class="action">Place order</a>
</div>