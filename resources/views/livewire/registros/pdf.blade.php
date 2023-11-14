<link href="https://fonts.cdnfonts.com/css/frutiger" rel="stylesheet">


<style>
    table {
   
    }

    th {
        font-family: 'Frutiger', sans-serif;
        background-color: #A50021;
        color: white;
        font-size: 8;
     
    }

    td {
        font-family: Arial, Helvetica, sans-serif;
        font-size:8;
    }
</style>

<img src="{{ public_path('img/homologado.png') }}" width="600">

<table class="w-full text-left text-sm text-gray-500">

    <thead class="bg-red-500">
        <tr>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">FOLIO</TH>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">FECHA DE RECEPCIÓN</TH>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">HORA DE RECEPCIÓN</TH>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">TIPO DE DOCUMENTO</TH>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">NÚMERO DE DOCUMENTO</TH>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">DEPENDENCIA</TH>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">SIGNADO</TH>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">CARGO</TH>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">ASUNTO</TH>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">DIRIGIDO</TH>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">ANEXOS</TH>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">SEGUIMIENTO</TH>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">RESGUARDO</TH>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">HIPERVINCULO</TH>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">NOMBRE DEL EXPEDIENTE</TH>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">SECCION</TH>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">UBICACIÓN FÍSICA</TH>
            <TH SCOPE="COL" CLASS="PX-6 PY-4 FONT-MEDIUM TEXT-GRAY-900">OBSERVACIONES</TH>


        </tr>
    </thead>
    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
        @foreach ($registros as $r)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4"> {{ $r->id }}</td>
                <td class="px-6 py-4"> {{ $r->fecha_recepcion }}</td>
                <td class="px-6 py-4"> {{ $r->hora_recepcion }}</td>
                <td class="px-6 py-4"> {{ $r->documento->tipo }}</td>
                <td class="px-6 py-4"> {{ $r->num_documento }}</td>
                <td class="px-6 py-4"> {{ $r->dependencia }}</td>
                <td class="px-6 py-4"> {{ $r->signado }}</td>
                <td class="px-6 py-4"> {{ $r->cargo }}</td>
                <td class="px-6 py-4"> {{ $r->asunto }}</td>
                <td class="px-6 py-4"> {{ $r->dirigido->nombre }}</td>
                <td class="px-6 py-4"> {{ $r->anexo->anexos }}</td>
                <td class="px-6 py-4"> {{ $r->seguimiento }}</td>
                <td class="px-6 py-4"> {{ $r->resguardo }}</td>
                <td class="px-6 py-4"> {{ $r->hipervinculo }}</td>
                <td class="px-6 py-4"> {{ $r->nombre_expediente }}</td>
                <td class="px-6 py-4"> {{ $r->seccion }}</td>
                <td class="px-6 py-4"> {{ $r->ubicacion_fisica }}</td>
                <td class="px-6 py-4"> {{ $r->observaciones }}</td>


                </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
