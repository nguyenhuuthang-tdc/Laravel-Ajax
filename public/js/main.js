//checkbox
let checkBox = document.querySelectorAll("input[name='checkbox']");
let category_name = document.querySelector(".category-name");
let exitBtn = document.querySelector(".exit-button");
let detail_screen = document.querySelector(".detail-background");
let cards = document.querySelectorAll(".card");
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