<div class="element-field">
    @if($cart != null)
    <?php $grand_price = 0; ?>
    @foreach($cart as $key => $item)
    <?php $grand_price += $item['price'] ?>
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
        <div class="delete-cart" onclick="deleteCart({{ $key }})">Delete</div>
    </div>
    @endforeach
    @else
    <p>Your cart is empty</p>
    @endif
</div>
<div class="cart-footer">
    <div class="grand-price">
        <p><b>Grand price</b> : <span class="grand">{{ ($cart != null) ? number_format($grand_price,0) : "0" }}</span> Đ</p>
    </div>
    <a href="" class="action view">View cart</a>
    <a href="" class="action">Place order</a>
</div>