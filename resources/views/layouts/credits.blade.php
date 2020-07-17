<div id="floating-credits" class="align-exchange">
    <div class="grid-exchange">
        <div class="credits-font separate-exchange">
            <div>
                <img class="ico-exchange" src="{{ asset('storage/logo/BcBg.webp')}}" alt="">
            </div>
            <div class="text-exchange">
                <span id="goicoin_div" style="float: right;">{{ Auth::user()->total_credits }} $</span>
            </div>
        </div>
        <div class="credits-font separate-exchange">
            <div>
                <img class="ico-exchange" src="{{ asset('storage/logo/MxBg.jpg')}}" alt="">
            </div>
            <div class="text-exchange">
                <span id="mx_div" style="float: right;">{{ Auth::user()->mxCredits() }} $</span>
            </div>
        </div>
        <div class="credits-font separate-exchange">
            <div>
                <img class="ico-exchange" src="{{ asset('storage/logo/UsBg.jpg')}}" alt="">
            </div>
            <div class="text-exchange">
                <span id="us_div" style="float: right;">{{ Auth::user()->usCredits() }} $</span>
            </div>
        </div>
    </div>
</div>