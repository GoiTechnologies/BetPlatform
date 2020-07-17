function getBalanceAjax(){
    
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".btn-submit").click(function(e){

    e.preventDefault();

    var name = "Hola";
    var password = "Mundo";
    var email = "This is ajax request";

    $.ajax({
       type:'POST',
       url:"{{ action('BalanceController@ajaxRequestPost') }}",
       data:{name:name, password:password, email:email},
       success:function(data){
          alert(data.success);
       }
    });

});

function GameState(win, paid, credits, bet, tiles, highlight_tiles, show_highlight_tiles) {
    this.win = win;
    this.paid = paid;
    this.credits = credits;
    this.bet = bet;
    this.tiles = tiles;
    this.highlight_tiles = highlight_tiles;
    this.show_highlight_tiles = show_highlight_tiles;
    this.current_highlight_tiles = 0;
    this.current_highlight_tiles_counter = 0;
    this.rotate_highlight_loop = null;
    this.spin_click_shield = false;
    this.show_lines = true;
    this.current_line_winnings_map = [];
    this.transfer_win_to_credits = function () {
        var i = this.win;
        var counter = 0;
        while (i > 0) {
            i -= 1;
            counter += 50;
            setTimeout(function () {
                coin_sound.currentTime = 0;
                coin_sound.play();
                game_state.paid += 1;
                game_state.credits += 1;
                if (game_state.win == game_state.paid) {
                    game_state.spin_click_shield = false;
                }
            }, counter);
        }
    }
}
var game_state = new GameState(0, 0, 999, 0, [], [], true);