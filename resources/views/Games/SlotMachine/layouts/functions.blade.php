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
                win_occurrence:30,        //WIN PERCENTAGE.SET A VALUE FROM 0 TO 100.
                slot_cash: 100,          //THIS IS THE CURRENT SLOT CASH AMOUNT. THE GAME CHECKS IF THERE IS AVAILABLE CASH FOR WINNINGS.
                min_reel_loop:0,          //NUMBER OF REEL LOOPS BEFORE SLOT STOPS  
                reel_delay: 6,            //NUMBER OF FRAMES TO DELAY THE REELS THAT START AFTER THE FIRST ONE
                time_show_win:2000,       //DURATION IN MILLISECONDS OF THE WINNING COMBO SHOWING
                time_show_all_wins: 2000, //DURATION IN MILLISECONDS OF ALL WINNING COMBO
                money: total_credits,
                //STARING CREDIT FOR THE USER
                
                /***********PAYTABLE********************/
                //EACH SYMBOL PAYTABLE HAS 5 VALUES THAT INDICATES THE MULTIPLIER FOR X1,X2,X3,X4 OR X5 COMBOS
                paytable_symbol_1: [0,0,100,150,200], //PAYTABLE FOR SYMBOL 1
                paytable_symbol_2: [0,0,50,100,150],  //PAYTABLE FOR SYMBOL 2
                paytable_symbol_3: [0,10,25,50,100],  //PAYTABLE FOR SYMBOL 3
                paytable_symbol_4: [0,10,25,50,100],  //PAYTABLE FOR SYMBOL 4
                paytable_symbol_5: [0,5,15,25,50],    //PAYTABLE FOR SYMBOL 5
                paytable_symbol_6: [0,2,10,20,35],    //PAYTABLE FOR SYMBOL 6
                paytable_symbol_7: [0,1,5,10,15],     //PAYTABLE FOR SYMBOL 7
                /*************************************/
                audio_enable_on_startup:false, //ENABLE/DISABLE AUDIO WHEN GAME STARTS 
                fullscreen:true,           //SET THIS TO FALSE IF YOU DON'T WANT TO SHOW FULLSCREEN BUTTON
                check_orientation:true,    //SET TO FALSE IF YOU DON'T WANT TO SHOW ORIENTATION ALERT ON MOBILE DEVICES
                show_credits:true,         //ENABLE/DISABLE CREDITS BUTTON IN THE MAIN SCREEN
                ad_show_counter:3         //NUMBER OF SPIN PLAYED BEFORE AD SHOWING
                // 
                //// THIS FEATURE  IS ACTIVATED ONLY WITH CTL ARCADE PLUGIN./////////////////////////// 
                /////////////////// YOU CAN GET IT AT: ///////////////////////////////////////////////////////// 
                // http://codecanyon.net/item/ctl-arcade-wordpress-plugin/13856421///////////
            });
            $(oMain).on("recharge", function (evt) {
            //INSERT HERE YOUR RECHARGE SCRIPT THAT RETURN MONEY TO RECHARGE
                var iMoney = 100; // cambiar este codigo 
                if(s_oGame !== null){
                    s_oGame.setMoney(iMoney);
                }
            });
        
            $(oMain).on("start_session", function (evt) {
                if(getParamValue('ctl-arcade') === "true"){
                    parent.__ctlArcadeStartSession();
                }
                //...ADD YOUR CODE HERE EVENTUALLY
            });

            $(oMain).on("end_session", function (evt) {
                if(getParamValue('ctl-arcade') === "true"){
                    parent.__ctlArcadeEndSession();
                }
                //...ADD YOUR CODE HERE EVENTUALLY
            });
            

            $(oMain).on("bet_placed", function (evt, oBetInfo) {
                var iBet = oBetInfo.bet;
                var iTotBet = oBetInfo.tot_bet;
                setNewCredits((-oBetInfo.tot_bet), 3);
            });
        
            $(oMain).on("save_score", function (evt, iMoney) {
                if(getParamValue('ctl-arcade') === "true"){
                    parent.__ctlArcadeSaveScore({score:iMoney});
                }
                getActualCredits().then(r =>{
                    setNewCreditsView(r);
                }).catch(() => {
                    console.log('Algo salió mal');
                });
                
                //...ADD YOUR CODE HERE EVENTUALLY
            });
            
            $(oMain).on("show_preroll_ad", function (evt) {
                //...ADD YOUR CODE HERE EVENTUALLY
            });
            
            $(oMain).on("show_interlevel_ad", function (evt) {
                if(getParamValue('ctl-arcade') === "true"){
                    parent.__ctlArcadeShowInterlevelAD();
                }
                //...ADD YOUR CODE HERE EVENTUALLY
            });

            $(oMain).on("share_event", function(evt, iScore) {
                    if(getParamValue('ctl-arcade') === "true"){
                        parent.__ctlArcadeShareEvent({   
                                                        img: TEXT_SHARE_IMAGE,
                                                        title: TEXT_SHARE_TITLE,
                                                        msg: TEXT_SHARE_MSG1 + iScore+ TEXT_SHARE_MSG2,
                                                        msg_share: TEXT_SHARE_SHARE1 + iScore + TEXT_SHARE_SHARE1});
                    }
            });
            return oMain;
        };
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
            //console.log("fin")
        }
   });

</script>