<script>
    
    function getActualCredits(){
        return new Promise(function(resolve, reject) {
            var result = $.ajax({
            type:'POST',
            url:" {{ action('BalanceController@ajaxRequestPost') }} ",
            data:{ user_id:1, "_token": "{{ csrf_token() }}" },
            success:function(data){
                    resolve(data.total_credits)
                }
            });  
        })
    }

    function setNewCredits(update_credits, game_id){
        var result = $.ajax({
            type:'POST',
            url:" {{ action('BalanceController@ajaxRequestInsert') }} ",
            data:{ game_id:game_id, "_token": "{{ csrf_token() }}", update_credits:update_credits },
            success:function(data){
                    console.log(data.success)
                }
            });
    }


    function getUsFromCredits(credits){
        let dollarValue = 20;
        return credits / dollarValue;
    }

    function getMxFromDollar(credits){
        let mxValue = 25;
        return getUsFromCredits(credits) * mxValue;
    }

    function setNewCreditsView(credits){
        var credits_div = document.getElementById("goicoin_div");
        var mx_div = document.getElementById("mx_div");
        var us_div = document.getElementById("us_div");

        credits_div.innerText = credits + " $";
        us_div.innerText = getUsFromCredits(credits).toFixed(2) + " $";
        mx_div.innerText = getMxFromDollar(credits).toFixed(2) + " $";
        
        
    }
</script>