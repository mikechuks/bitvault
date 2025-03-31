<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
<title><?=$sitename?> - Finance, Banking, Wallet, Crypto Mobile</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/bootstrap-icons.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@500;600;700&amp;family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet">
<link rel="manifest" href="manifest.webmanifest">
<meta id="theme-check" name="theme-color" content="#efeef3">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png"></head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">


<div id="footer-bar" class="footer-bar-1 footer-bar-detached">
<a href="investments.php"><i class="bi bi-wallet2"></i><span>Investments</span></a>
<a href="market.php"><i class="bi bi-graph-up"></i><span>Market</span></a>
<a href="dashboard.php" class="circle-nav-2"><i class="bi bi-house-fill"></i><span>Home</span></a>
<a href="transactions.php"><i class="bi bi-receipt"></i><span>Transactions</span></a>
<a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-swap"><i class="bi bi-arrow-repeat"></i><span>Swap</span></a>
</div>

<div class="page-content footer-clear">

<div class="pt-3">
<div class="page-title d-flex">
<div class="align-self-center me-auto">
<p class="color-highlight header-date"></p>
<h1>Welcome!</h1>
</div>
<div class="align-self-center ms-auto">
<a href="#" data-bs-toggle="dropdown" class="icon gradient-blue shadow-bg shadow-bg-s rounded-m">
<img src="images/pictures/25s.png" width="45" class="rounded-m" alt="img">
</a>

<div class="dropdown-menu">
<div class="card card-style shadow-m mt-1 me-1">
<div class="list-group list-custom list-group-s list-group-flush rounded-xs px-3 py-1">
<a href="investment.php" class="list-group-item">
<i class="has-bg gradient-green shadow-bg shadow-bg-xs color-white rounded-xs bi bi-credit-card"></i>
<strong class="font-13">Investment</strong>
</a>
<a href="transactions.php" class="list-group-item">
<i class="has-bg gradient-blue shadow-bg shadow-bg-xs color-white rounded-xs bi bi-graph-up"></i>
<strong class="font-13">Activity</strong>
</a>
<a href="profile.php" class="list-group-item">
<i class="has-bg gradient-yellow shadow-bg shadow-bg-xs color-white rounded-xs bi bi-person-circle"></i>
<strong class="font-13">Account</strong>
</a>
<a href="logout.php" class="list-group-item">
<i class="has-bg gradient-red shadow-bg shadow-bg-xs color-white rounded-xs bi bi-power"></i>
<strong class="font-13">Log Out</strong>
</a>

<a href="#" class="list-group-item" data-toggle-theme="" data-trigger-switch="switch-1">
<i class="has-bg gradient-blue shadow-bg shadow-bg-xs color-white rounded-xs bi bi-lightbulb-fill"></i>
<div class="form-switch ios-switch switch-green switch-s me-2">
    <input type="checkbox" data-toggle-theme="" class="ios-input" id="switch-1">
    <label class="custom-control-label" for="switch-1"></label>
</div> 
</a>
</div>
</div>
</div>
</div>
</div>
</div>
 <div class="card card-style">
<div class="content">
                <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
              <div class="tradingview-widget-container__widget"></div>
              
              <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
              {
              "colorTheme": "light",
              "dateRange": "12M",
              "showChart": true,
              "locale": "en",
              "largeChartUrl": "",
              "isTransparent": false,
              "showSymbolLogo": true,
              "showFloatingTooltip": false,
              "width": "400",
              "height": "660",
              "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
              "plotLineColorFalling": "rgba(41, 98, 255, 1)",
              "gridLineColor": "rgba(240, 243, 250, 0)",
              "scaleFontColor": "rgba(106, 109, 120, 1)",
              "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
              "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
              "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
              "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
              "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
              "tabs": [
                {
                  "title": "Futures",
                  "symbols": [
                    {
                      "s": "BINANCE:XRPUSDT",
                      "d": "XRP"
                    },
                    {
                      "s": "COINBASE:BTCUSD",
                      "d": "BTC"
                    },
                    {
                      "s": "BITSTAMP:ETHUSD",
                      "d": "ETH"
                    },
                    {
                      "s": "BINANCE:SOLUSDT",
                      "d": "SOL"
                    },
                    {
                      "s": "BINANCE:LUNCBUSD",
                      "d": "LUNC"
                    },
                    {
                      "s": "BINANCE:ADAUSDT",
                      "d": "ADA"
                    },
                    {
                      "s": "BINANCE:SHIBUSDT",
                      "d": "SHIB"
                    },
                    {
                      "s": "BINANCE:AVAXUSDT",
                      "d": "AVAX"
                    },
                    {
                      "s": "BINANCE:DOGEUSDT",
                      "d": "DOGE"
                    }
                  ],
                  "originalTitle": "Futures"
                },
                {
                  "title": "Bonds",
                  "symbols": [
                    {
                      "s": "CME:GE1!",
                      "d": "Eurodollar"
                    },
                    {
                      "s": "CBOT:ZB1!",
                      "d": "T-Bond"
                    },
                    {
                      "s": "CBOT:UB1!",
                      "d": "Ultra T-Bond"
                    },
                    {
                      "s": "EUREX:FGBL1!",
                      "d": "Euro Bund"
                    },
                    {
                      "s": "EUREX:FBTP1!",
                      "d": "Euro BTP"
                    },
                    {
                      "s": "EUREX:FGBM1!",
                      "d": "Euro BOBL"
                    }
                  ],
                  "originalTitle": "Bonds"
                },
                {
                  "title": "Forex",
                  "symbols": [
                    {
                      "s": "FX:EURUSD",
                      "d": "EUR/USD"
                    },
                    {
                      "s": "FX:GBPUSD",
                      "d": "GBP/USD"
                    },
                    {
                      "s": "FX:USDJPY",
                      "d": "USD/JPY"
                    },
                    {
                      "s": "FX:USDCHF",
                      "d": "USD/CHF"
                    },
                    {
                      "s": "FX:AUDUSD",
                      "d": "AUD/USD"
                    },
                    {
                      "s": "FX:USDCAD",
                      "d": "USD/CAD"
                    }
                  ],
                  "originalTitle": "Forex"
                }
              ]
            }
              </script>
            </div>
            <!-- TradingView Widget END -->
        </div> 
        </div>

<div class="card card-style">
<div class="content">
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
<div class="tradingview-widget-container__widget"></div>
<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
{
"interval": "1m",
"width": "100%",
"isTransparent": false,
"height": "450",
"symbol": "BITSTAMP:BTCUSD",
"showIntervalTabs": true,
"locale": "en",
"colorTheme": "light"
}
</script>
</div>
<!-- TradingView Widget END -->
                                    
</div>
</div>
                    



<!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                    {
                    "symbols": [
                    {
                    "proName": "FOREXCOM:SPXUSD",
                    "title": "S&P 500"
                    },
                    {
                    "proName": "FOREXCOM:NSXUSD",
                    "title": "US 100"
                    },
                    {
                    "proName": "FX_IDC:EURUSD",
                    "title": "EUR to USD"
                    },
                    {
                    "proName": "BITSTAMP:BTCUSD",
                    "title": "Bitcoin"
                    },
                    {
                    "proName": "BITSTAMP:ETHUSD",
                    "title": "Ethereum"
                    }
                    ],
                    "showSymbolLogo": true,
                    "colorTheme": "light",
                    "isTransparent": false,
                    "displayMode": "adaptive",
                    "locale": "en"
                    }
                    </script>
                    </div>
                    <!-- TradingView Widget END -->


</div>




<script src="scripts/bootstrap.min.js"></script>
</body></html>