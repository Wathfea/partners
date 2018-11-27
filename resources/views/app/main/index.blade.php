@extends('app.layouts.master')

@section('content')
    <h1> Home </h1>

    <div class="jumbotron">
        <p>A rendszer jelenleg a következő funkciók elvégzésére képes:</p>
            <ul>
                <li>- Partnerek listázsa a "Partners" menüpont alatt
                    <ul>
                        <li>- CRUD felület (megtekintés, szerkesztés, törlés)</li>
                        <li>- Lapozó</li>
                    </ul>
                </li>
                <li>- Tulajdonságok listázása a "Properties" menüpont alatt
                    <ul>
                        <li>- CRUD felület (megtekintés, szerkesztés, törlés)</li>
                        <li>- Lapozó</li>
                    </ul>
                </li>
                <li>- Új Partner hozzáadása az Actions->Add new partner oldalon
                    <ul>
                        <li>- Partnerhez való tulajdonság rendelése itt történik meg valamint a Partner szerkesztése felületen</li>
                    </ul>
                </li>
                <li>- Új Tulajdonság hozzáadása az Actions->Add new property oldalon</li>
            </ul>

        <p>További teendők:</p>

        <ul>
            <li>- Validációk hozzáadása a formokhoz</li>
            <li>- Partner megtekintése oldalon, ha nincs az adott partnerhez tulajdonság rendelve, ne jelenlejen meg üresen a Properties szekció, hideoljuk el</li>
            <li>- Partner lista oldalon egy oszlopban lehetne mutatni, hogy adott partnerhez hány db tulajdonság tartozik</li>
            <li>- Filterezés név, pont, tulajdonság alapján</li>
            <li>- CRUD rendezés név, pont, dátum alapján</li>
            <li>- Tulajdonság show oldalán esetleg mutatható lenne, hogy kik azok a partnerek akikhez hozzá van rendelve.</li>
            <li>- Frontend finomítások</li>
        </ul>
    </div>
@endsection