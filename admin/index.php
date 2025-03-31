<?php
session_start();
include("connection.php");
//error_reporting(0);
if(isset($_SESSION['admin'])){

 include('header.php'); ?>


            <!-- Page Content Start -->
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page title box -->
                        <div class="page-title-box">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                        <!-- End page title box -->

                        <div class="row">
                            <div class="col-xl-2">

        
                            </div> <!-- end col -->
        
                            <div class="col-xl-8">
                                <div class="card-box">
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>

                                    </div>
                                    <div class="row text-center">
                                        <div class="col-sm-2 mb-12"> </div>
                                        <div class="col-sm-10 mb-12">
                                            <div class="tradingview-widget-container">
                                                <div class="tradingview-widget-container__widget"></div>
                                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/cryptocurrencies/" rel="noopener" target="_blank"><span class="blue-text">Bitcoin and Altcoin Prices</span></a> by TradingView</div>
                                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                                                    {
                                                        "title_raw": "Cryptocurrencies",
                                                        "belowLineFillColorGrowing": "rgba(5, 122, 205, 0.12)",
                                                        "gridLineColor": "rgba(242, 243, 245, 1)",
                                                        "scaleFontColor": "rgba(131, 136, 141, 1)",
                                                        "title": "Cryptocurrencies",
                                                        "tabs": [
                                                        {
                                                            "title_raw": "Overview",
                                                            "symbols": [
                                                                {
                                                                    "s": "BITFINEX:BTCUSD"
                                                                },
                                                                {
                                                                    "s": "BITFINEX:ETHUSD"
                                                                },
                                                                {
                                                                    "s": "BITFINEX:XRPUSD"
                                                                },
                                                                {
                                                                    "s": "COINBASE:BCHUSD"
                                                                },
                                                                {
                                                                    "s": "COINBASE:LTCUSD"
                                                                },
                                                                {
                                                                    "s": "BITFINEX:IOTUSD"
                                                                }
                                                            ],
                                                            "quick_link": {
                                                                "href": "/markets/cryptocurrencies/prices-all/",
                                                                "title": "More Cryptocurrencies"
                                                            },
                                                            "title": "Overview"
                                                        },
                                                        {
                                                            "title_raw": "Bitcoin",
                                                            "symbols": [
                                                                {
                                                                    "s": "BITFINEX:BTCUSD"
                                                                },
                                                                {
                                                                    "s": "COINBASE:BTCEUR"
                                                                },
                                                                {
                                                                    "s": "COINBASE:BTCGBP"
                                                                },
                                                                {
                                                                    "s": "BITFLYER:BTCJPY"
                                                                },
                                                                {
                                                                    "s": "WEX:BTCRUR"
                                                                },
                                                                {
                                                                    "s": "CME:BTC1!"
                                                                }
                                                            ],
                                                            "quick_link": {
                                                                "href": "/markets/cryptocurrencies/prices-bitcoin/",
                                                                "title": "More Bitcoin Pairs"
                                                            },
                                                            "title": "Bitcoin"
                                                        },
                                                        {
                                                            "title_raw": "XRP",
                                                            "symbols": [
                                                                {
                                                                    "s": "BITFINEX:XRPUSD"
                                                                },
                                                                {
                                                                    "s": "KRAKEN:XRPEUR"
                                                                },
                                                                {
                                                                    "s": "KORBIT:XRPKRW"
                                                                },
                                                                {
                                                                    "s": "BITSO:XRPMXN"
                                                                },
                                                                {
                                                                    "s": "BINANCE:XRPBTC"
                                                                },
                                                                {
                                                                    "s": "BITTREX:XRPETH"
                                                                }
                                                            ],
                                                            "quick_link": {
                                                                "href": "/markets/cryptocurrencies/prices-xrp/",
                                                                "title": "More XRP Pairs"
                                                            },
                                                            "title": "XRP"
                                                        },
                                                        {
                                                            "title_raw": "Ethereum",
                                                            "symbols": [
                                                                {
                                                                    "s": "COINBASE:ETHUSD"
                                                                },
                                                                {
                                                                    "s": "KRAKEN:ETHEUR"
                                                                },
                                                                {
                                                                    "s": "KRAKEN:ETHGBP"
                                                                },
                                                                {
                                                                    "s": "KRAKEN:ETHJPY"
                                                                },
                                                                {
                                                                    "s": "POLONIEX:ETHBTC"
                                                                },
                                                                {
                                                                    "s": "WEX:ETHLTC"
                                                                }
                                                            ],
                                                            "quick_link": {
                                                                "href": "/markets/cryptocurrencies/prices-ethereum/",
                                                                "title": "More Ethereum Pairs"
                                                            },
                                                            "title": "Ethereum"
                                                        },
                                                        {
                                                            "title_raw": "Bitcoin Cash",
                                                            "symbols": [
                                                                {
                                                                    "s": "COINBASE:BCHUSD"
                                                                },
                                                                {
                                                                    "s": "BITSTAMP:BCHEUR"
                                                                },
                                                                {
                                                                    "s": "CEXIO:BCHGBP"
                                                                },
                                                                {
                                                                    "s": "POLONIEX:BCHBTC"
                                                                },
                                                                {
                                                                    "s": "HITBTC:BCHETH"
                                                                },
                                                                {
                                                                    "s": "WEX:BCHLTC"
                                                                }
                                                            ],
                                                            "quick_link": {
                                                                "href": "/markets/cryptocurrencies/prices-bitcoin-cash/",
                                                                "title": "More Bitcoin Cash Pairs"
                                                            },
                                                            "title": "Bitcoin Cash"
                                                        }
                                                    ],
                                                        "plotLineColorFalling": "rgba(33, 150, 243, 1)",
                                                        "plotLineColorGrowing": "rgba(33, 150, 243, 1)",
                                                        "showChart": true,
                                                        "title_link": "/markets/cryptocurrencies/prices-all/",
                                                        "locale": "en",
                                                        "symbolActiveColor": "rgba(225, 239, 249, 1)",
                                                        "belowLineFillColorFalling": "rgba(5, 122, 205, 0.12)",
                                                        "height": 660,
                                                        "width": 400
                                                    }
                                                </script>
                                            </div>
                                        </div>

                                    </div>

                                </div> <!-- end card-box-->
                            </div> <!-- end col -->
        
                            <div class="col-xl-2">

                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
        
        

                        <!-- end row -->
        

                        <!-- end row -->            

                    </div>
                </div>
            </div>
            <!-- End Page Content-->


            <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                  <script>document.write(new Date().getFullYear())</script> ©  <?=$sitename?>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->



            <!-- Right Sidebar -->

            <!-- /Right-bar -->

        </div>
        <!-- End #wrapper -->

       <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- KNOB JS -->
        <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <!-- Chart JS -->
        <script src="assets/libs/chart-js/Chart.bundle.min.js"></script>

        <!-- Jvector map -->
        <script src="assets/libs/jqvmap/jquery.vmap.min.js"></script>
        <script src="assets/libs/jqvmap/jquery.vmap.usa.js"></script>
        
        <!-- Datatable js -->
        <script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>
        
        <!-- Dashboard Init JS -->
        <script src="assets/js/pages/dashboard.init.js"></script>
        
        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>
</html>
<?php } else {
    header("location:login.php");
    exit;
}?>