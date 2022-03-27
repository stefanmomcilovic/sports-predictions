@extends('layouts.main-layout')

@section('title')
    {{ config('app.name') }}
@endsection

@section('content')

<style>
    #prognoze tr.won {
        background-color: rgb(223, 240, 216);
    }
    #prognoze tr.lost {
        background-color: rgb(255, 235, 238);
    }
</style>
    @if(isset($predictionsData))
        <div class="container">
            <div class="row justify-content-center">
                <h1 class="text-center my-5">Današnje Sportske Prognoze</h1>
                <div class="col-lg-2 text-center sekcija-reklama">
                    <div class="bg-light shadow-sm px-3 h-100 reklama-div">
                        <h2 class="reklama-tekst">Vaša reklama ovde!</h2>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table id="prognoze" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Broj Meča</th>
                                    <th scope="col">Domaćin</th>
                                    <th scope="col">Protivnik</th>
                                    <th scope="col">Prognoza</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Dodata</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($predictionsData))
                                    @foreach($predictionsData as $prediction)
                                        <tr class="
                                        @if(( isset($prediction['status']) && !empty($prediction['status']) ))   
                                            @if($prediction['status'] == 'lost')
                                                lost
                                            @elseif($prediction['status'] == 'won')
                                                won
                                            @endif
                                        @elseif(( isset($prediction['match_status']) && !empty($prediction['match_status']) ))
                                            @if($prediction['match_status'] == 'lost')
                                                lost
                                            @elseif($prediction['match_status'] == 'won')
                                                won
                                            @endif
                                        @endif
                                        "> 
                                            <th scope="row">@if(isset($prediction['match_id'])) {{ $prediction['match_id'] }} @else {{ $prediction['id'] }} @endif</th>
                                            <td>{{ $prediction['home_team'] }}</td>
                                            <td>{{ $prediction['away_team'] }}</td>
                                            <td>@if(isset($prediction['game_prediction'])) {{ $prediction['game_prediction'] }} @else {{ $prediction['prediction'] }} @endif</td>
                                            <td>
                                            @if(( isset($prediction['status']) && !empty($prediction['status']) ))   
                                                @if($prediction['status'] == 'lost')
                                                    <span class="text-danger text-capitalize">Gubitan</span>  
                                                @elseif($prediction['status'] == 'won')
                                                    <span class="text-success text-capitalize">Dobitan</span>  
                                                @endif
                                            @elseif(( isset($prediction['match_status']) && !empty($prediction['match_status']) ))
                                                @if($prediction['match_status'] == 'lost')
                                                    <span class="text-danger text-capitalize">Gubitan</span>
                                                @elseif($prediction['match_status'] == 'won')
                                                    <span class="text-success text-capitalize">Dobitan</span>
                                                @endif
                                            @endif
                                            </td>
                                            <td>
                                                @php
                                                    $date = date_create($prediction['modified_on'] ?? $prediction['last_update_at']);
                                                    $date_time = date_format($date, 'd.m.Y H:i:s');
                                                @endphp
                                                {{ $date_time }}
                                            </td>
                                        </tr>
                                    @endforeach   
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-2 text-center sekcija-reklama">
                    <div class="bg-light shadow-sm px-3 h-100 reklama-div">
                        <h2 class="reklama-tekst">Vaša reklama ovde!</h2>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script type="text/javascript">
        $(document).ready(function(){
            $("#prognoze").DataTable({
                "aLengthMenu": [[10, 25, 50, 75, 100, -1], [10, 25, 50, 75, 100, "Sve"]],
                "iDisplayLength": 25,
                "language": {
                    "decimal":        "",
                    "emptyTable":     "Nema nijedne pronđene prognoze",
                    "info":           "Prikaz _START_ do _END_ od _TOTAL_ rezultata",
                    "infoEmpty":      "Prikaz 0 do 0 od 0 rezultata",
                    "infoFiltered":   "(filtrirano od _MAX_ totalnih rezultata)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Prikaz _MENU_ rezultata",
                    "loadingRecords": "Učitavanje podataka...",
                    "processing":     "Obrada podataka...",
                    "search":         "Pretraži:",
                    "zeroRecords":    "Nema pronađenih rezultata",
                    "paginate": {
                        "first":      "Prva",
                        "last":       "Zadnja",
                        "next":       "Sledeća",
                        "previous":   "Prethodna"
                    },
                    "aria": {
                        "sortAscending":  ": aktivirajte da biste sortirali kolonu uzlazno",
                        "sortDescending": ": aktivirajte da biste sortirali kolonu opadajuće"
                    }
                }
            });
        });
    </script>
@endsection