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
                money: total_credits,       //STARING CREDIT FOR THE USER
                min_bet: 0.1,      //MINIMUM BET
                max_bet: 1000,     //MAXIMUM BET
                time_bet: 0,       //TIME TO WAIT FOR A BET IN MILLISECONDS. SET 0 IF YOU DON'T WANT BET LIMIT
                time_winner: 3000, //TIME FOR WINNER SHOWING IN MILLISECONDS    
                win_occurrence: 30, //Win occurrence percentage (100 = always win). 
                                    //SET THIS VALUE TO -1 IF YOU WANT WIN OCCURRENCE STRICTLY RELATED TO PLAYER BET ( SEE DOCUMENTATION)
                casino_cash:4000,    //The starting casino cash that is recharged by the money lost by the user
                fullscreen:true,     //SET THIS TO FALSE IF YOU DON'T WANT TO SHOW FULLSCREEN BUTTON
                audio_enable_on_startup:false, //ENABLE/DISABLE AUDIO WHEN GAME STARTS 
                check_orientation:true, //SET TO FALSE IF YOU DON'T WANT TO SHOW ORIENTATION ALERT ON MOBILE DEVICES
                show_credits:true,           //SET THIS VALUE TO FALSE IF YOU DON'T TO SHOW CREDITS BUTTON
                num_hand_before_ads:10  //NUMBER OF HANDS TO COMPLETE, BEFORE TRIGGERING SAVE_SCORE EVENT. USEFUL FOR INTER-LEVEL AD EVENTUALLY.
            });
            $(oMain).on("recharge", function(evt) {
                //INSERT HERE YOUR RECHARGE SCRIPT THAT RETURN MONEY TO RECHARGE
                var iMoney = 1000;
                if(s_oGame !== null){
                    s_oGame.setMoney(iMoney);
                }
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
                
            $(oMain).on("bet_placed", function (evt, iTotBet) {
                //...ADD YOUR CODE HERE EVENTUALLY
            });
                
            $(oMain).on("save_score", function(evt,iMoney,iWin) {
                if(getParamValue('ctl-arcade') === "true"){
                    parent.__ctlArcadeSaveScore({score:iMoney});
                }
                //...ADD YOUR CODE HERE EVENTUALLY
                setNewCreditsView(iMoney);
            });
                
            $(oMain).on("show_interlevel_ad", function(evt) {
                if(getParamValue('ctl-arcade') === "true"){
                    parent.__ctlArcadeShowInterlevelAD();
                }
                //...ADD YOUR CODE HERE EVENTUALLY
            });
                
            $(oMain).on("share_event", function(evt,iMoney) {
                if(getParamValue('ctl-arcade') === "true"){
                    parent.__ctlArcadeShareEvent({ img:"200x200.jpg",
                                                    title:TEXT_CONGRATULATIONS,
                                                    msg:TEXT_SHARE_1 + iMoney + TEXT_SHARE_2,
                                                    msg_share:TEXT_SHARE_3 + iMoney + TEXT_SHARE_4
                                                });
                }
                //...ADD YOUR CODE HERE EVENTUALLY
            });
            return oMain;
        }
             
        if(isIOS()){
            setTimeout(function(){sizeHandler();},200);
        }else{
            var checkExist = setInterval(function() {
                if ($('#canvas').length) {
                    sizeHandler();
                    console.log("Exists!");
                    clearInterval(checkExist);
                    
                }else {
                    console.log("Doesn't exist")
                }
            }, 100);
        }
   });

</script>