<?php  
  $filename = "Laporan_Posisi_Barang.xls";
  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: application/vnd.ms-excel");
  setlocale(LC_ALL,"US");
?>
<html>

<head>

    <title>Mutasi SCRAP</title>
</head>

<body class="idr" onload="window.print()">
    <div style="margin-left: 0%; margin-right: 0%;">
        <h5>LAPORAN POSISI BARANG<br>
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
                    {{-- <tr align="center" class="" style="font-weight: bold;"> --}}
                        <tr align="center" class="" style="font-weight: bold;">
                            <td scope="col" class="border-bottom-0 border-bottom-0 border-end-0 border-2">No</td>
                            <td scope="col" colspan="9" class="border-bottom-0 border-end-0 border-2" align="center">Dokumen Pemasukan</td>
                            <td scope="col" colspan="9" class="border-bottom-0 border-end-0 border-2" align="center">Dokumen Pengeluaran</td>
                            <td scope="col" colspan="3" class="border-bottom-0 border-end-0 border-2" align="center">Saldo</td>
                          </tr>
                          <tr align="center" class="border-top-0 border-bottom-0 border-end-0 border-2">
                            <th scope="col" class="border-top-0 border-bottom-0 border-bottom-0 border-end-0 border-2"></th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Jenis</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">No</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Tgl</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Tgl Msk</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Kode Brg</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Nama Brg</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Sat.</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Jml</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Nil. Pabean</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Jenis</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">No</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Tgl</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Tgl Msk</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Kode Brg</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Nama Brg</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Sat.</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Jml</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Nil. Pabean</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Jmlh</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Sat.</th>
                            <th scope="col" class="border-top-0 border-bottom-0  border-bottom-0 border-end-0 border-2">Nil. Pabean</th>
                          </tr>
                    {{-- </tr> --}}
                </thead>                
                {{-- <tr>
                    <td align="center" scope="col" class="border-top-0 border-bottom-0  border-2">Nomor</td>
                    <td align="center" scope="col" class="border-top-0 border-bottom-0  border-2">Tanggal</td>
                    <td align="center" scope="col" class="border-top-0 border-bottom-0  border-2">Nomor</td>
                    <td align="center" scope="col" class="border-top-0 border-bottom-0  border-2">Tanggal</td>
                    <td align="center" scope="col" class="border-top-0 border-bottom-0  border-2">USD</td>
                    <td align="center" scope="col" class="border-top-0 border-bottom-0  border-2">Rupiah</td>
                </tr> --}}
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
                            <td class="border-2">{{ $item->nama2 }}</td>
                            <td class="border-2">{{ $item->uom }}</td>
                            <td class="border-2">{{ number_format($item->qty2, 0, '.', '.') }}</td>
                            <td class="border-2">{{ number_format($item->cif2, 0, '.', '.') }}</td>
                            <td class="border-2">{{ number_format($jmlsaldo, 0, '.', '.') }}</td>
                            <td class="border-2">{{ $item->uom }}</td>
                            <td class="border-2">{{ number_format($item->cif2, 0, '.', '.') }}</td>
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
                            <th scope="row" class="border-2">{{ $no }}</th>
                            <td class="border-2">{{ $item->jenis }}</td>
                            <td class="border-2">{{ $item->nopendaftaran }}</td>
                            <td class="border-2">{{ date("d/m/Y", strtotime($item->tglpendaftaran)) }}</td>
                            <td class="border-2">{{ date("d/m/Y", strtotime($item->tglpendaftaran)) }}</td>
                            <td class="border-2">{{ $item->kode }}</td>
                            <td class="border-2">{{ $item->nama }}</td>
                            <td class="border-2">{{ $item->satuan }}</td>
                            <td class="border-2">{{ number_format($item->qty, 0, '.', '.') }}</td>
                            <td class="border-2">{{ number_format($item->cif, 0, '.', '.') }}</td>
                            <td class="border-2">{{ $item->jenis2 }}</td>
                            <td class="border-2">{{ $item->nopendaftaranbc }}</td>
                            <td class="border-2">{{ date("d/m/Y", strtotime($item->tgldaftarbc)) }}</td>
                            <td class="border-2">{{ date("d/m/Y", strtotime($item->tgldaftarbc)) }}</td>
                            <td class="border-2">{{ $item->kode2 }}</td>
                            <td class="border-2">{{ $item->nama2 }}</td>
                            <td class="border-2">{{ $item->uom }}</td>
                            <td class="border-2">{{ number_format($item->qty2, 0, '.', '.') }}</td>
                            <td class="border-2">{{ number_format($item->cif2, 0, '.', '.') }}</td>
                            <td class="border-2">{{ number_format($jmlsaldo, 0, '.', '.') }}</td>
                            <td class="border-2">{{ $item->uom }}</td>
                            <td class="border-2">{{ number_format($item->cif2, 0, '.', '.') }}</td>
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
                            <th scope="row" class="border-2">{{ $no }}</th>
                            <td class="border-2">{{ $item->jenis }}</td>
                            <td class="border-2">{{ $item->nopendaftaran }}</td>
                            <td class="border-2">{{ date("d/m/Y", strtotime($item->tglpendaftaran)) }}</td>
                            <td class="border-2">{{ date("d/m/Y", strtotime($item->tglpendaftaran)) }}</td>
                            <td class="border-2">{{ $item->kode }}</td>
                            <td class="border-2">{{ $item->nama }}</td>
                            <td class="border-2">{{ $item->satuan }}</td>
                            <td class="border-2">{{ number_format($jmlsaldo_old, 0, '.', '.') }}</td>
                            <td class="border-2">{{ number_format($item->cif, 0, '.', '.') }}</td>
                            <td class="border-2">{{ $item->jenis2 }}</td>
                            <td class="border-2">{{ $item->nopendaftaranbc }}</td>
                            <td class="border-2">{{ date("d/m/Y", strtotime($item->tgldaftarbc)) }}</td>
                            <td class="border-2">{{ date("d/m/Y", strtotime($item->tgldaftarbc)) }}</td>
                            <td class="border-2">{{ $item->kode2 }}</td>
                            <td class="border-2">{{ $item->nama2 }}</td>
                            <td class="border-2">{{ $item->uom }}</td>
                            <td class="border-2">{{ number_format($item->qty2, 0, '.', '.') }}</td>
                            <td class="border-2">{{ number_format($item->cif2, 0, '.', '.') }}</td>
                            <td class="border-2">{{ number_format($jmlsaldo, 0, '.', '.') }}</td>
                            <td class="border-2">{{ $item->uom }}</td>
                            <td class="border-2">{{ number_format($item->cif2, 0, '.', '.') }}</td>
                            <!--<td class="border-2">{{ $iddetail }}</td>-->
                            @php                   
                            $sa++;     
                            $jmlsaldo_old = $jmlsaldo;
                            @endphp
                        @endif
                            {{-- <td class="border-2">{{ $item->iddetail }}</td>
                            <th scope="row" class="border-2">{{ $no }}</th>
                            <td class="border-2">{{ $item->jenis }}</td>
                            <td class="border-2">{{ $item->nopendaftaran }}</td>
                            <td class="border-2">{{ date("d/m/Y", strtotime($item->tglpendaftaran)) }}</td>
                            <td class="border-2">{{ date("d/m/Y", strtotime($item->tglpendaftaran)) }}</td>
                            <td class="border-2">{{ $item->kode }}</td>
                            <td class="border-2">{{ $item->nama }}</td>
                            <td class="border-2">{{ $item->satuan }}</td>
                            <td class="border-2">{{ number_format($item->qty, 2, '.', '.') }}</td>
                            <td class="border-2">{{ number_format($item->cif, 2, '.', '.')}}</td>
                            <td class="border-2">{{ $item->jenis2 }}</td>
                            <td class="border-2">{{ $item->nopendaftaranbc }}</td>
                            <td class="border-2">{{ date("d/m/Y", strtotime($item->tgldaftarbc)) }}</td>
                            <td class="border-2">{{ date("d/m/Y", strtotime($item->tgldaftarbc)) }}</td>
                            <td class="border-2">{{ $item->kode2 }}</td>
                            <td class="border-2">{{ $item->nama2 }}</td>
                            <td class="border-2">{{ $item->uom }}</td>
                            <td class="border-2">{{ number_format($item->qty2, 2, '.', '.') }}</td>
                            <td class="border-2">{{ number_format($item->cif2, 2, '.', '.') }}</td>
                            <td class="border-2">{{ number_format($item->cif2, 2, '.', '.') }}</td>
                            <td class="border-2">{{ $item->uom }}</td>
                            <td class="border-2">{{ number_format($item->cif2, 2, '.', '.') }}</td> --}}
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
        <footer><a href="http://www.swifect.com">~ Swifect Inventory BC ~</a></footer>
    </div>
</body>

</html>

<style type="text/css" media="print">
    @page {
        size: landscape;
        margin: 0px auto;
    }
</style>

<style type="text/css" media="print">
    @page {
        margin: 0px auto;
    }
</style>