@extends('layouts.main')

@section('body-config')
ondragstart="return false;" ondrop="return false;" style="width:100%; background: none;"
@endsection

@section('content')
<div class="background-no-game">
    <div class="" style="position: relative; margin: 10px; overflow: auto; padding: 0">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Anterior</th>
                    <th scope="col">Después</th>
                    <th scope="col">Perdidos</th>
                    <th scope="col">Ganados</th>
                    <th scope="col">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($balances as $balance)
                    <tr>
                        <th scope="row"> {{ $balance->id }} </th>
                        <td> {{ $balance->before_credits }} </td>
                        <td> {{ $balance->after_credits }} </td>
                        <td> {{ $balance->lost_credits }} </td>
                        <td> {{ $balance->win_credits }} </td>
                        <td> {{ $balance->created_at }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $balances->links() }}
    </div>
</div>

<script>

</script>

@endsection