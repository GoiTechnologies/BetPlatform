@extends('layouts.main')

@section('extra-header')

@endsection
@yield('common', View::make('Games.Poker.layouts.header'))
@section('body-config')
ondragstart="return false;" ondrop="return false;" style="width:100%; position: fixed;"
@endsection

@section('content')

<div style="">
    <div style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%"></div>
<!-- Functions -->
@yield('functions', View::make('Games.Poker.layouts.functions'))
<div class="check-fonts">
    <p class="check-font-1">test 1</p>
</div>

<div>
    <canvas id="canvas" class='ani_hack' width="1700" height="768"> </canvas>
</div>


<div data-orientation="landscape" class="orientation-msg-container">
    <p class="orientation-msg-text">Please rotate your device</p>
</div>
<div id="block_game"
    style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%; display:none">
</div>
</div>


@endsection