@extends('layouts.app')
<style>
    #parent4 {
        position: fixed;
        border: 1px solid black;
        border-radius: 0 20px 20px 0;
        background-color: rgba(255, 200, 200, 0.2);
        width: 300px;
        bottom: 50%;
        left: 0;
        right: 0;
    }

    .coin-class {
        margin: auto;
        margin-top: 5px;
        margin-bottom: 5px;
        border: 1px solid black;
        width: 50%;
        min-width: 80px;
        border-radius: 20px;
        padding: 5px;
        background-color: rgba(255, 255, 255, 0.2)
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>


<div id="parent4">
    <div class="coin-class">
        $100
    </div>
    <div class="coin-class">
        $200
    </div>
    <div class="coin-class">
        $300
    </div>
</div>

{{--

<p>
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
        aria-controls="collapseExample">
        Link with href
    </a>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample">
        Button with data-target
    </button>
</p>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim
        keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
    </div>
</div>
--}}


@endsection