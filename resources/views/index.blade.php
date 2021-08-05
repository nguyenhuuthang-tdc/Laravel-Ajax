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
                        <label for="survial">{{ $item->cate_name }}</label>
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
            <input type="text" placeholder="Search Everything" class="input">
            <div class="box-result">
            </div>
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
            <div class="card" onclick="openDetail({{ $item->game_id }})">
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
    <div class="detail-background">
        <div class="detail-box">
            <div class="exit-button"><span>X</span></div>
            <div class="detail-game">
                <div class="game-image">
                    <img src="" alt="">
                </div>  
                <div class="game-info">
                    <div class="name">
                        <p></p>
                    </div>
                    <div class="category-name">
                        <p></p>
                    </div>
                    <div class="brand-name">
                        <p></p>
                    </div>
                    <div class="download">
                    <p></p><ion-icon name="download-outline"></ion-icon>
                    </div>
                </div>            
            </div>  
            <div class="description">
                <p></p>
            </div>
            <a class="links" href="">Go to origin page</a>
        </div>
    </div>
</body>
<script>
    //checkbox
    let checkBox = document.querySelectorAll("input[name='checkbox']");
    let category_name = document.querySelector(".category-name");
    let exitBtn = document.querySelector(".exit-button");
    let detail_screen = document.querySelector(".detail-background");
    let cards = document.querySelectorAll(".card");
    let inputField = document.querySelector(".input");
    let box_result = document.querySelector(".box-result");
    let checkCate = [];
    //exit detai-screen
    function closeScreen() {
        detail_screen.style.display = "none";
    }
    //open detail-screen 
    function openDetail(game_id){
        detail_screen.style.display = "flex";
        getDetailByGameId(game_id);
    }
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
    //function get product by cate id
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
                    card += `<div class="card" onclick="openDetail(${game[i].game_id})">
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
    //function get detail game by game id
    async function getDetailByGameId(game_id) {
        let url = "{{ route('detail') }}";
        $.ajax({
            url: url,
            data: {game_id: game_id},
            type: "get",
            success: function(response) {
                const detail_game = response.detail_game;
                let box = `
                <div class="detail-box">
                    <div class="exit-button" onclick="closeScreen()"><span>X</span></div>
                    <div class="detail-game">
                        <div class="game-image">
                            <img src="${ detail_game[0].game_image }" alt="">
                        </div>  
                        <div class="game-info">
                            <div class="name">
                                <p>${ detail_game[0].game_name }</p>
                            </div>
                            <div class="category-name">
                                <p>Category : ${ detail_game[0].cate_name }</p>
                            </div>
                            <div class="brand-name">
                                <p>Producer : ${ detail_game[0].brand_name }</p>
                            </div>
                            <div class="download">
                            <p>${ detail_game[0].dow_quantity }</p><ion-icon name="download-outline"></ion-icon>
                            </div>
                        </div>            
                    </div>  
                    <div class="description">
                        <p>${ detail_game[0].game_des }</p>
                    </div>
                    <a class="links" href="${ detail_game[0].origin_page }">Go to origin page</a>
                </div>`;
                detail_screen.innerHTML = box;
            },
        })
    }
    //search
    inputField.addEventListener('keyup',function() {
        let key = inputField.value;
        if(key !== "") {
            box_result.style.display = "flex";
            getResultByKey(key)
        }
        else {
            box_result.style.display = "none";
        }        
    })
    async function getResultByKey(key) {
        let url = "{{ route('search') }}";
        $.ajax({
            url: url,
            data: {key: key},
            type: "get",
            success: function(response) {
                const result = response.result;
                var element = ''
                for(let i = 0; i < result.length; i++) {
                    let keyRegex = new RegExp(key,"gi")
                    let name = result[i].game_name.replace(keyRegex, `<b>${ key }</b>`)
                    element += `
                    <div class="element-result">
                        <div class="result-image">
                            <img src="${result[i].game_image}" alt="">
                        </div>
                        <div class="result-content">
                            <div class="result-name">
                                <p>${ name }</p>
                            </div>
                            <div class="result-dow">
                                <p>${ result[i].dow_quantity } <ion-icon name="download-outline"></ion-icon></p>
                            </div>
                        </div>
                    </div>`
                }
                box_result.innerHTML = element;
            },
        })
    }
</script>
</html>