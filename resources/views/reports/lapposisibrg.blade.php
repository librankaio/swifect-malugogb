@extends('layouts.main')
@section('content')
<!-- Form -->
<form action="/lapposisibrg" method="get" class="container-fluid px-5 py-2" id="myform">
  <div class="head-form">
    <div class="row">
      <div class="container col-md-4 bg-white px-4 pt-3"
        style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
        <div class="row">
          <div class="col-md-6 bg-white">
            <div class="mb-1">
              <h5>LAPORAN POSISI BARANG</h5>
            </div>
          </div>
          <div class="col-md-6 bg-white">
            <div class="mb-3">
            </div>
          </div>
        </div>
      </div>
      <div class="container col-md-4 px-4 py-4"></div>
      <div class="container col-md-4 px-4 py-4"></div>
    </div>
    <div class="row">
      <div class="container col-md-4 bg-white px-4 py-4"
        style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
        <div class="row">
          <div class="col-md-6 bg-white">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tanggal Dari</label>
              <div class="input-group date" id="dtfrom">
                <input type="text" class="form-control"
                  value="@php if(request('dtfrom')==NULL){ echo date('d/m/Y');} else{ echo $_GET['dtfrom']; } @endphp"
                  name="dtfrom">
                <span class="input-group-append">
                  <span class="input-group-text bg-white d-block">
                    <i class="fa fa-calendar"></i>
                  </span>
                </span>
              </div>
              <br>
              <button type="submit" class="btn btn-primary px-5" onclick="show_loading()"><span> View</span></button>
            </div>
          </div>
          <div class="col-md-6 bg-white">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Sampai Tanggal</label>
              <div class="input-group date" id="dtto">
                <input type="text" class="form-control"
                  value="@php if(request('dtto')==NULL){ echo date('d/m/Y');} else{ echo $_GET['dtto']; } @endphp"
                  name="dtto">
                <span class="input-group-append">
                  <span class="input-group-text bg-white d-block">
                    <i class="fa fa-calendar"></i>
                  </span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container col-md-4 px-4 py-4" style="border-bottom-right-radius: 10px;">
      </div>
      <div class="container col-md-4 px-4 py-4">
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="container col-md-12 bg-white ps-4 pe-3 py-4" style="border-radius: 10px;">
      <div class="nav-table px-1">
        <div class="row d-flex">
          <div class="col-md-6"></div>
          <div class="col-md-6 text-end">
            <button type="submit" formaction="exportpdflapposisibrg" formtarget="_blank" class="btn btn-danger"><i
                class="fa-regular fa-file-pdf"></i><span> Export PDF</span></button>
            <button type="submit" formaction="exportexcellapposisibrg" class="btn btn-success"><i
                class="far fa-file-excel"></i><span> Export Excel</span></button>
          </div>
        </div>
      </div>
      <div class="nav-table py-2 px-1">
        <div class="row d-flex">
          <div class="col-md-6"></div>
          <div class="col-md-2"></div>
          <div class="col-md-2">
            <div class="row">
              <div class="col-md-6"></div>
              <div class="col-md-6 text-end">
                {{-- <label for="searchtext" class="form-label py-2">Search :</label> --}}
              </div>
            </div>
          </div>
          <div class="col-md-2">
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-hover" style="padding-right: 1rem;" id="datatable">

            <thead>
              <tr align="center" class="" style="font-weight: bold;">
                <tr align="center" class="" style="font-weight: bold;">
                    <td scope="col" class="border-bottom-0 border-2">No</td>
                    <td scope="col" colspan="9" class="border-2" align="center">Dokumen Pemasukan</td>
                    <td scope="col" colspan="9" class="border-2" align="center">Dokumen Pengeluaran</td>
                    <td scope="col" colspan="3" class="border-2" align="center">Saldo</td>
                  </tr>
                  <tr align="center" class="border-top-0 border-2">
                    <th scope="col" class="border-top-0 border-bottom-0 border-2"></th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Jenis</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">No</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Tgl</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Tgl Msk</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Kode Brg</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Nama Brg</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Sat.</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Jml</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Nil. Pabean</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Jenis</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">No</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Tgl</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Tgl Msk</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Kode Brg</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Nama Brg</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Sat.</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Jml</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Nil. Pabean</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Jmlh</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Sat.</th>
                    <th scope="col" class="border-top-0 border-bottom-0  border-2">Nil. Pabean</th>
                  </tr>
              </tr>
            </thead>
            <tbody>
              @php
              $no=0;
              $codemitem = ""; 
              $iddetail = "";
              $jmlsaldo = 0;
              $jmlsaldo_old = 0;
              $sa = 0;
              @endphp
              @isset($results)
              {{-- @if(count($results) > 0) --}}
              @if($no == 0)
              @foreach ($results as $key => $item)
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
              @endforeach
              @elseif(count($results) == 0)
              <td colspan="13" class="border-2">
                <label for="noresult" class="form-label">NO DATA RESULTS...</label>
              </td>
              @endif
            </tbody>
          </table>
      </div>
      <div class="row">
        <div class="col-md-6 py-3">
          {{-- <div class="d-flex justify-content-start">
            Showing
            {{ $results->firstItem() }}
            to
            {{ $results->lastItem() }}
            of
            {{ $results->total() }}
            Entries
          </div> --}}
        </div>
        <div class="col-md-6">
          {{-- <div class="d-flex justify-content-end">
            {{ $results->appends(request()->input())->links() }}
          </div> --}}
        </div>
        @endisset
      </div>
    </div>
</form>
<!-- END Form -->
<script type="text/javascript">
  $(document).ready(function() {
    // $('#datatable').dataTable(
    //         {"ordering":false});

    $('#datatable').DataTable();
  });
</script>
@endsection