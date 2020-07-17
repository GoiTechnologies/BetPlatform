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
                money: total_credits,        //STARING CREDIT FOR THE USER
                min_bet: 1,       //MINIMUM BET
                max_bet: 100,      //MAXIMUM BET   
                win_occurrence: 30,//Win occurrence percentage (100 = always win). 
                time_show_dice_result: 3000, //TIME IN MILLISECONDS OF DICE RESULT SHOWING.                    
                casino_cash:400,   //The starting casino cash that is recharged by the money lost by the user
                show_credits:true, //SET THIS VALUE TO FALSE IF YOU DON'T WANT TO SHOW CREDITS BUTTON
                audio_enable_on_startup:false, //ENABLE/DISABLE AUDIO WHEN GAME STARTS 
                fullscreen:true, //SET THIS TO FALSE IF YOU DON'T WANT TO SHOW FULLSCREEN BUTTON
                check_orientation:true,     //SET TO FALSE IF YOU DON'T WANT TO SHOW ORIENTATION ALERT ON MOBILE DEVICES
                num_hand_before_ads:10    //NUMBER OF DICE ROLLING TO COMPLETE, BEFORE TRIGGERING SAVE_SCORE EVENT. USEFUL FOR INTER-LEVEL AD EVENTUALLY.
                //
                //// THIS FUNCTIONALITY IS ACTIVATED ONLY WITH CTL ARCADE PLUGIN.///////////////////////////
                /////////////////// YOU CAN GET IT AT: /////////////////////////////////////////////////////////
                // http://codecanyon.net/item/ctl-arcade-wordpress-plugin/13856421 ///////////
            });

            $(oMain).on("recharge", function(evt) {
                var iMoney = 1000;
                if(s_oGame !== null){
                    s_oGame.onRecharge(iMoney);
                }
            });
            
            $(oMain).on("bet_placed", function (evt, iTotBet) {
                //...ADD YOUR CODE HERE EVENTUALLY
                //sumar a la base de datos
                console.log("bet placed: ", iTotBet);
            });
        
            $(oMain).on("clear_bet", function (evt, iTotBet) {
                //...ADD YOUR CODE HERE EVENTUALLY
                setNewCredits(iTotBet, 5);
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
            
            $(oMain).on("save_score", function(evt,iMoney) {
                if(getParamValue('ctl-arcade') === "true"){
                    parent.__ctlArcadeSaveScore({score:iMoney});
                }
                //...ADD YOUR CODE HERE EVENTUALLY
                getActualCredits().then(r =>{
                    setNewCreditsView(r);
                }).catch(() => {
                    console.log('Algo salió mal');
                });
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