<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Flex Layout</title>
</head>
<body>
    <div class="menu-left">
        <div class="container">
            <div class="logo">
                <div class="logo-img">
                    <img src="https://ui8-unity-gaming.herokuapp.com/img/logo.svg" alt="">
                </div>
                <ion-icon class="menu-button" name="menu-outline"></ion-icon>             
            </div>
            <div class="category-game">
                <div class="category-content">
                    <p>Category</p>
                </div>
                <ul class="all-category">
                    @foreach($category as $item)
                    <li>
                        <input type="checkbox" id="{{ $item->name }}" value="{{ $item->cate_id }}" class="cate-check" name="checkbox">
                        <label for="survial">{{ $item->name }}</label>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="menu-navbar">
        <div class="nav-browser">
            <ion-icon class="compass" name="compass-outline"></ion-icon>
            <span>Browser</span>
        </div>
        <div class="nav-search">
            <ion-icon class="glass" name="search-outline"></ion-icon>
            <input type="text" placeholder="Search Everything">
        </div>
        <div class="nav-user-manager">
            <div class="user-add">
                <ion-icon class="add" name="add-circle-outline"></ion-icon>
            </div>
            <div class="user-noti">
                <ion-icon class="noti" name="notifications-outline"></ion-icon>
            </div>
            <div class="user-image">
                <img src="https://ui8-unity-gaming.herokuapp.com/img/avatar.png" alt="">
            </div>            
        </div>
    </div>
    <div class="card-container">
        <div class="category-name">All Stream</div>
        <div class="cards">
            @foreach($game as $item)
            <div class="card">
                <div class="card-image">
                    <img src="{{ $item->game_image }}" alt="">
                </div>
                <div class="card-content">
                    <p>{{ $item->description }}</p>
                </div>
                <div class="card-user">
                    <div class="card-user-image">
                        <img src="{{ $item->player_image }}" alt="">
                    </div>
                    <div class="card-user-content">
                        <div class="card-user-name">
                            <p>{{ $item->player_name }}</p>
                            <ion-icon class="check" name="checkmark-circle"></ion-icon>
                        </div>
                        <div class="game-name">
                            <p>{{ $item->game_name }}</p>
                        </div>
                    </div>
                </div>
                <div class="cart-footer">
                    @if($item->live != 0)
                    <div class="card-live">
                        <ion-icon class="wifi" name="wifi"></ion-icon>
                        <p>Live</p>
                    </div>
                    <div class="card-watching">
                        <ion-icon class="dot" name="ellipse"></ion-icon>
                        <p>{{ $item->watching }} watching</p>
                    </div>
                    @else 
                    <div class="card-watching">
                        <ion-icon class="dot" name="ellipse"></ion-icon>
                        <p>{{ $item->watching }} watching</p>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
<script>
    //checkbox
    let checkBox = document.querySelectorAll("input[name='checkbox']");
    let category_name = document.querySelector(".category-name");
    let checkCate = [];
    //check
    checkBox.forEach(item => item.addEventListener('change',function() {
        if(this.checked) {
            checkCate.push(this.value);
        }
        //uncheck
        else {   
            const valueIndex = checkCate.indexOf(this.value);         
            if(valueIndex !== -1) {
                checkCate.splice(valueIndex,1);
            }
        }  
        getProductByCateId(checkCate);     
    }));
    //function get product bt cate id
    async function getProductByCateId(checkCate) {
        let url = "{{ route('cate_product') }}";
        let cards = document.querySelector('.cards');
        $.ajax({
            url: url,
            data:{checkCate: checkCate},
            type: 'get',
            success: function(response) {
                const game = response.game;
                var card = '';
                for(let i = 0; i < game.length;i++) {
                    card += `<div class="card">
                        <div class="card-image">
                            <img src="${ game[i].game_image }" alt="">
                        </div>
                        <div class="card-content">
                            <p>${ game[i].description }</p>
                        </div>
                        <div class="card-user">
                            <div class="card-user-image">
                                <img src="${ game[i].player_image }" alt="">
                            </div>
                            <div class="card-user-content">
                                <div class="card-user-name">
                                    <p>${ game[i].player_name }</p>
                                    <ion-icon class="check" name="checkmark-circle"></ion-icon>
                                </div>
                                <div class="game-name">
                                    <p>${ game[i].game_name }</p>
                                </div>
                            </div>
                        </div>
                        <div class="cart-footer">
                            <div class="card-live">
                                <ion-icon class="wifi" name="wifi"></ion-icon>
                                <p>Live</p>
                            </div>
                            <div class="card-watching">
                                <ion-icon class="dot" name="ellipse"></ion-icon>
                                <p>${ game[i].watching } watching</p>
                            </div>
                        </div>
                    </div>`
                }
                cards.innerHTML = card;
            },
        })
    }
</script>
</html>