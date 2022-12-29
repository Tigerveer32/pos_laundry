<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Laralink">
    <!-- Site Title -->
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('invoice/css/style.css') }}">
</head>

<body>
    <div class="tm_container">
        <div class="tm_invoice_wrap">
            <div class="tm_invoice tm_style1 tm_type3" id="tm_download_section">
                <div class="tm_shape_1">
                    <svg width="850" height="151" viewBox="0 0 850 151" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M850 0.889398H0V150.889H184.505C216.239 150.889 246.673 141.531 269.113 124.872L359.112 58.0565C381.553 41.3977 411.987 32.0391 443.721 32.0391H850V0.889398Z"
                            fill="#007AFF" fill-opacity="0.1" />
          </svg>
      </div>
          <div class="tm_shape_2">
                    <svg width="850" height="151" viewBox="0 0 850 151" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0 150.889H850V0.889408H665.496C633.762 0.889408 603.327 10.2481 580.887 26.9081L490.888 93.7224C468.447 110.381 438.014 119.74 406.279 119.74H0V150.889Z"
                            fill="#007AFF" fill-opacity="0.1" />
                    </svg>
    </div>
          <div class="tm_invoice_in">
                    <div class="tm_invoice_head tm_align_center tm_mb20">
                        <div class="tm_invoice_left">
                            <div class="tm_logo">
                                {{--  <img src="{{ asset('invoice/img/logo.svg') }}" alt="Logo">  --}}
                               <h3>Laundry</h3>
                            </div>
                        </div>
                        <div class="tm_invoice_right tm_text_right">
                            <div class="tm_primary_color tm_f50 tm_text_uppercase">Invoice</div>
                        </div>
                    </div>
                    <div class="tm_invoice_info tm_mb20">
                        <div class="tm_invoice_seperator">
                            <img src="{{ asset('invoice/img/arrow_bg.svg') }}" alt="">
            </div>
                        <div class="tm_invoice_info_list">
                            <p class="tm_invoice_number tm_m0">Invoice No: <b class="tm_primary_color">{{ $inv->no_order }}</b></p>
                            <p class="tm_invoice_date tm_m0">Date: <b class="tm_primary_color">{{ date('d, M Y') }}</b></p>
                            <div class="tm_invoice_info_list_bg tm_accent_bg_10"></div>
                        </div>
                    </div>
                    <div class="tm_invoice_head tm_mb10">
                        <div class="tm_invoice_left">
                            <p class="tm_mb2"><b class="tm_primary_color">Invoice To:</b></p>
                            <p>
                                @if($inv->nama == null)
                                {{ $inv->Pelanggan->nama_lengkap }} | {{ $inv->Pelanggan->kode_member }}
                                @else
                                {{ $inv->nama }}
                                @endif <br>
                                @if($inv->no_hp == null)
                                {{ $inv->Pelanggan->no_hp }}
                                @else
                                {{ $inv->no_hp }}
                                @endif<br>
                                @if($inv->alamat == null)
                                {{ $inv->Pelanggan->alamat }}
                                @else
                                {{ $inv->alamat }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="tm_table tm_style1 tm_mb30">
                        <div class="tm_table_responsive">
                            <table class="tm_border_bottom">
                                <thead>
                                    <tr class="tm_border_top">
                                        <th class="tm_width_3 tm_semi_bold tm_primary_color tm_accent_bg_10">Layanan</th>
                                        <th class="tm_width_3 tm_semi_bold tm_primary_color tm_accent_bg_10">Harga</th>
                                        <th class="tm_width_3 tm_semi_bold tm_primary_color tm_accent_bg_10">Berat</th>
                                        <th class="tm_width_3 tm_semi_bold tm_primary_color tm_accent_bg_10">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="tm_width_3">{{ $inv->Layanan->nama_layanan }}</td>
                                        <td class="tm_width_4">Rp. {{ number_format($inv->Layanan->harga, 0) }}</td>
                                        <td class="tm_width_2">{{ $inv->berat }} Kg</td>
                                        <td class="tm_width_4">Rp. {{ number_format($inv->total_harga, 0) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tm_padd_15_20">
                        <p class="tm_mb2"><b class="tm_primary_color">Terms & Conditions:</b></p>
                        <ul class="tm_m0 tm_note_list">
                            <li>All claims relating to quantity or shipping errors.</li>
                            <li>Delivery dates are not guaranteed and Seller.</li>
                        </ul>
                    </div><!-- .tm_note -->
                </div>
            </div>
            <div class="tm_invoice_btns tm_hide_print">
                <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
                    <span class="tm_btn_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                            <path
                                d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
                                fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none"

                         stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
                                stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <circle cx="392" cy="184" r="24" fill='currentColor' />
                        </svg>
                    </span>
                    <span class="tm_btn_text">Print</span>
                </a>
            </div>
        </div>
    </div>
    <script src="{{ asset('invoice/js/jquery.min.js') }}"></script>
    <script src="{{ asset('invoice/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('invoice/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('invoice/js/main.js') }}"></script>
</body>

</html>
