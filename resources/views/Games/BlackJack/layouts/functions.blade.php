<script>
    $(document).ready(function(){
        var oMain = getActualCredits().then(r =>{
            console.log(r);
            return new_oMain(r);
        }).catch(() => {
            console.log('Algo salió mal');
        });


        function new_oMain(total_credits){
            var oMain = new CMain({
                                win_occurrence: 40,          //WIN OCCURRENCE PERCENTAGE. VALUES BETWEEN 0-100
                                min_bet: 1,                  //MIN BET PLAYABLE BY USER. DEFAULT IS 0.1$
                                max_bet: 300,                //MAX BET PLAYABLE BY USER. 
                                bet_time: 10000,             //WAITING TIME FOR PLAYER BETTING
                                money: total_credits,        //STARING CREDIT FOR THE USER
                                blackjack_payout: 1.5,       //PAYOUT WHEN USER WINS WITH BLACKJACK (DEFAULT IS 3 TO 2). BLACKJACK OCCURS WHEN USER GET 21 WITH FIRST 2 CARDS
                                game_cash: 500,              //GAME CASH AVAILABLE WHEN GAME STARTS
                                show_credits:true,           //ENABLE/DISABLE CREDITS BUTTON IN THE MAIN SCREEN
                                fullscreen:true,             //SET THIS TO FALSE IF YOU DON'T WANT TO SHOW FULLSCREEN BUTTON
                                check_orientation:true,      //SET TO FALSE IF YOU DON'T WANT TO SHOW ORIENTATION ALERT ON MOBILE DEVICES
                                //////////////////////////////////////////////////////////////////////////////////////////
                                ad_show_counter: 3           //NUMBER OF HANDS PLAYED BEFORE AD SHOWN
                                //
                                //// THIS FUNCTIONALITY IS ACTIVATED ONLY WITH CTL ARCADE PLUGIN.///////////////////////////
                                /////////////////// YOU CAN GET IT AT: /////////////////////////////////////////////////////////
                                // http://codecanyon.net/item/ctl-arcade-wordpress-plugin/13856421 ///////////
                            });
            $(oMain).on("recharge", function(evt) {
                //INSERT HERE YOUR RECHARGE SCRIPT THAT RETURN MONEY TO RECHARGE
                var iMoney = 1000;
                if(s_oGame !== null){
                    s_oGame.setMoney(iMoney);
                }
            });
            
            $(oMain).on("bet_placed", function (evt, iTotBet) {
                //...ADD YOUR CODE HERE EVENTUALLY
            });
        
            $(oMain).on("start_session", function(evt) {
                if(getParamValue('ctl-arcade') === "true"){
                    parent.__ctlArcadeStartSession();
                }
                //...ADD YOUR CODE HERE EVENTUALLY
            });

            $(oMain).on("end_session", function(evt) {
                if(getParamValue('ctl-arcade') === "true"){
                    parent.__ctlArcadeEndSession();
                }
                //...ADD YOUR CODE HERE EVENTUALLY
            });


            $(oMain).on("save_score", function(evt,iScore) {
                if(getParamValue('ctl-arcade') === "true"){
                    parent.__ctlArcadeSaveScore({score:iScore});
                }
                getActualCredits().then(r =>{
                    setNewCreditsView(r);
                }).catch(() => {
                    console.log('Algo salió mal');
                });
                //...ADD YOUR CODE HERE EVENTUALLY
            });

            $(oMain).on("show_interlevel_ad", function(evt) {
                if(getParamValue('ctl-arcade') === "true"){
                    parent.__ctlArcadeShowInterlevelAD();
                }
                //...ADD YOUR CODE HERE EVENTUALLY
            });

            $(oMain).on("share_event", function(evt, iScore) {
                if(getParamValue('ctl-arcade') === "true"){
                    parent.__ctlArcadeShareEvent({   img: TEXT_SHARE_IMAGE,
                                                    title: TEXT_SHARE_TITLE,
                                                    msg: TEXT_SHARE_MSG1 + iScore + TEXT_SHARE_MSG2,
                                                    msg_share: TEXT_SHARE_SHARE1 + iScore + TEXT_SHARE_SHARE1});
                }
            });
            return oMain;
        };
        
        if (isIOS()) {
            setTimeout(function () {
                sizeHandler();
            }, 200);
        } else {
            var checkExist = setInterval(function() {
                if ($('#canvas').length) {
                    sizeHandler();
                    console.log("Exists!");
                    clearInterval(checkExist);
                    
                }else {
                    console.log("Doesn't exist")
                }
            }, 100);
            //sizeHandler();
        }
    });
</script>