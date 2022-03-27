@extends('layouts.main-layout')

@section('title')
    O nama - {{ config('app.name') }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 my-5">
                <h1 class="text-center">O nama</h1>

                <p>
                    Naše sportske prognoze su bazirane na kompijuterskim algoritmima koje analiziraju date timove i generišu prognozu za zadatu utakmicu u tom trenutku. Dobijate sve totalno besplatno na ovom sajtu. <strong>MI SE NE BAVIMO DOJAVAMA!</strong> Budite odgovorni, igranje na sreću je veoma zabavno. Zabavno je dok igrate u okviru svojih mogućnosti. Zato vodite računa na svoje novčane mogućnosti i preuzmite odgovornost za svoju igru.
                </p>

                <p><strong>NEKOLIKO UPUTSTVA ZA ODGOVORNU IGRU:</strong></p>
                <ul>
                    <li>Namenite iznos koji želite da potrošite na zabavu.</li>
                    <li>Ne prelazite granicu koju ste odredili.</li>
                    <li>Ako primetite da imate problem sa igrom potražite pomoć.</li>
                </ul>

                <p><strong>KADA JE KRAJNJE VREME DA ZATRAŽITE POMOĆ:</strong></p>

                <ul>
                    <li>Igrate da pobegnete od zabrinutosti i odgovornosti.</li>
                    <li>Igrate igre na sreću da rešite svoje finansijske probleme.</li>
                    <li>Osećate da ne možete da prestanete sa igrom bez obzira da li pobeđujete ili gubite.</li>
                </ul>

                <p class="text-danger">
                    AKO SVOJA DELA PREPOZNATE U VIŠE TAČAKA SAVETUJEMO VAM DA ZATRAŽITE STRUČNU POMOĆ U NEKOJ OD SERTIFIKOVANIH USTANOVA ZA BORBU PROTIV ZAVISNOSTI!!!
                </p>

                <p>
                    SPECIJALNA BOLNICA ZA BOLESTI ZAVISNOSTI<br>
                    Teodora Drajzera 44, Beograd<br>
                    Radnim danom od 8-13h<br>
                    <a href="tel:011 3671429">011 3671429</a><br>
                    <a href="mailto:zavodzbz@eunet.rs">zavodzbz@eunet.rs</a>
                </p>
                    
                <p> {{ config('app.name') }} nije odgovoran za bilo kakve gubitke i štetu kao posledica odluke zasnovane na informacijama pruženim na ovom sajtu. Kockanje uključuje visoke psihološke i finansijske rizike.</p>
            </div>
        </div>
    </div>
@endsection