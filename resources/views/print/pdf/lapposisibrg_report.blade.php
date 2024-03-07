<html>

<head>
    <title>Mutasi Barang Jadi</title>
    <style>
        td, th {
            font-size: 50%;
        }
    </style>
</head>

<body class="idr" onload="window.print()">
    <div style="margin-left: 0%; margin-right: 0%;">
        <h5>LAPORAN PERTANGGUNG JAWABAN MUTASI BARANG JADI<br>
            {{-- Nama Companny --}}
            {{ $comp_name }}<br>
            <?php
    if ($datefrForm == NULL AND $datetoForm == NULL) {
    }else{
        $datefr = strtotime($datefrForm);
        $datefrFormat = date('d/m/Y',$datefr);
        $dateto = strtotime($datetoForm);
        $datetoFormat = date('d/m/Y',$dateto);
?>
            PERIODE {{ $datefrFormat }} S.D {{ $datetoFormat }}
        </h5>
        <?php } ?>

        <center>
            <table id="mytable" border="1px" cellspacing="0">
                <thead>
                        <tr align="center" class="" style="font-weight: bold;">
                            <td scope="col" class="border-bottom-0 border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">No</td>
                            <td scope="col" colspan="9" class="border-bottom-0 border-end-0 border-2" align="center" style="width: 105px; word-wrap: break-word;">Dokumen Pemasukan</td>
                            <td scope="col" colspan="9" class="border-bottom-0 border-end-0 border-2" align="center" style="width: 105px; word-wrap: break-word;">Dokumen Pengeluaran</td>
                            <td scope="col" colspan="3" class="border-bottom-0 border-end-0 border-2" align="center" style="width: 105px; word-wrap: break-word;">Saldo</td>
                          </tr>
                          <tr align="center" class="border-top-0 border-bottom-0 border-end-0 border-2">
                            <th scope="col" class="border-top-0 border-bottom-0 border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;"></th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Jenis</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">No</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Tgl</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Tgl Msk</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 50px; word-wrap: break-word;">Kode Brg</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Nama Brg</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Sat.</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Jml</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Nil. Pabean</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Jenis</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">No</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Tgl</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Tgl Msk</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Kode Brg</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Nama Brg</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Sat.</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Jml</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Nil. Pabean</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Jmlh</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Sat.</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2" style="width: 105px; word-wrap: break-word;">Nil. Pabean</th>
                          </tr>
                </thead> 
                @if(count($results) > 0)
                @php 
                $no=0; 
                $codemitem = ""; 
                $iddetail = "";
                $jmlsaldo = 0;
                $jmlsaldo_old = 0;
                $sa = 0;
                @endphp
                @foreach ($results as $key => $item)
                <tbody>
                    <tr>
                        @php $no++ @endphp
                        @if($iddetail == '')
                            @php
                            $jmlsaldo = $item->qty - $item->qty2;
                            @endphp
                            {{-- <td class="border-2">{{ $item->iddetail }}</td> --}}
                            <th scope="row" class="border-2">{{ $no }}</th>
                            <td class="border-2">{{ $item->jenis }}</td>
                            <td class="border-2">{{ $item->nopendaftaran }}</td>
                            <td class="border-2">{{ date("d/m/Y", strtotime($item->tglpendaftaran)) }}</td>
                            <td class="border-2">{{ date("d/m/Y", strtotime($item->tglpendaftaran)) }}</td>
                            <td class="border-2">{{ $item->kode }}</td>
                            <td class="border-2">{{ $item->nama }}</td>
                            <td class="border-2">{{ $item->satuan }}</td>
                            <td class="border-2">{{ number_format($item->qty, 0, '.', '.') }}</td>
                            <td class="border-2">{{ $item->cif }}</td>
                            <td class="border-2">{{ $item->jenis2 }}</td>
                            <td class="border-2">{{ $item->nopendaftaranbc }}</td>
                            <td class="border-2">{{ date("d/m/Y", strtotime($item->tgldaftarbc)) }}</td>
                            <td class="border-2">{{ date("d/m/Y", strtotime($item->tgldaftarbc)) }}</td>
                            <td class="border-2">{{ $item->kode2 }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->nama2 }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->uom }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ number_format($item->qty2, 0, '.', '.') }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ number_format($item->cif2, 0, '.', '.') }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ number_format($jmlsaldo, 0, '.', '.') }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->uom }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ number_format($item->cif2, 0, '.', '.') }}</td>
                            @php 
                            $iddetail = $item->iddetail;
                            $jmlsaldo_old = $jmlsaldo 
                            @endphp
                        @elseif($iddetail != $item->iddetail)
                            @php
                            $iddetail = $item->iddetail;
                            $jmlsaldo = $item->qty - $item->qty2;
                            @endphp
                            {{-- <td class="border-2">{{ $item->iddetail }}</td> --}}
                            <th scope="row" class="border-2" style="width: 105px; word-wrap: break-word;">{{ $no }}</th>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->jenis }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->nopendaftaran }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ date("d/m/Y", strtotime($item->tglpendaftaran)) }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ date("d/m/Y", strtotime($item->tglpendaftaran)) }}</td>
                            <td class="border-2" style="width: 50px; word-wrap: break-word;">{{ $item->kode }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->nama }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->satuan }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ number_format($item->qty, 0, '.', '.') }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ number_format($item->cif, 0, '.', '.') }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->jenis2 }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->nopendaftaranbc }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ date("d/m/Y", strtotime($item->tgldaftarbc)) }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ date("d/m/Y", strtotime($item->tgldaftarbc)) }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->kode2 }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->nama2 }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->uom }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ number_format($item->qty2, 0, '.', '.') }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ number_format($item->cif2, 0, '.', '.') }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ number_format($jmlsaldo, 0, '.', '.') }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->uom }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ number_format($item->cif2, 0, '.', '.') }}</td>
                            <!--<td class="border-2">{{ $iddetail }}</td>-->
                            @php 
                            $jmlsaldo_old = $jmlsaldo
                            @endphp
                        @elseif($iddetail == $item->iddetail)
                            @php 
                            $iddetail = $item->iddetail;
                            $jmlsaldo = $jmlsaldo_old - $item->qty2;
                            $sa++;
                            @endphp
                            {{-- <td class="border-2">{{ $item->iddetail." ".$sa }} jing</td> --}}
                            <th scope="row" class="border-2" style="width: 105px; word-wrap: break-word;">{{ $no }}</th>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->jenis }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->nopendaftaran }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ date("d/m/Y", strtotime($item->tglpendaftaran)) }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ date("d/m/Y", strtotime($item->tglpendaftaran)) }}</td>
                            <td class="border-2" style="width: 50px; word-wrap: break-word;">{{ $item->kode }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->nama }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->satuan }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ number_format($jmlsaldo_old, 0, '.', '.') }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ number_format($item->cif, 0, '.', '.') }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->jenis2 }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->nopendaftaranbc }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ date("d/m/Y", strtotime($item->tgldaftarbc)) }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ date("d/m/Y", strtotime($item->tgldaftarbc)) }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->kode2 }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->nama2 }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->uom }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ number_format($item->qty2, 0, '.', '.') }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ number_format($item->cif2, 0, '.', '.') }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ number_format($jmlsaldo, 0, '.', '.') }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ $item->uom }}</td>
                            <td class="border-2" style="width: 105px; word-wrap: break-word;">{{ number_format($item->cif2, 0, '.', '.') }}</td>
                            <!--<td class="border-2">{{ $iddetail }}</td>-->
                            @php                   
                            $sa++;     
                            $jmlsaldo_old = $jmlsaldo;
                            @endphp
                        @endif
                  </tr>
                </tbody>                
                @endforeach
                @elseif(count($results) == 0)
                <td colspan="13" class="border-2">
                    <label for="noresult" class="form-label">NO DATA RESULTS...</label>
                </td>
                @endif
            </table>
        </center>
        <br><br>
        <p>
        <footer><a href="http://www.swifect.com">~ Swifect Inventory BCC ~</a></footer>
    </div>
</body>

</html>

{{-- <style type="text/css" media="print">
    @page {
        size: landscape;
        margin: 0px auto;
    }
</style>

<style type="text/css" media="print">
    @page {
        margin: 0px auto;
    }
</style> --}}

<style type="text/css" media="print">
    @page { size: landscape; margin: 0px auto; }
  </style>