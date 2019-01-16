@extends('layouts.app')

@section('content')
    <main class="page-trade trade">
        @include('dapp._header')
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="currency_title">
                        <h1>@lang('Stats')</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @include('dapp._stat')
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="show-more">
                        {{--<button class="form__submit form__submit_buy">Show more</button>--}}
                    </div>
                </div>
            </div>
        </div>
        @include('dapp._left-menu')
    </main>
@endsection
@section('highcharts-script')
    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    @foreach($token_pairs as $val)
        <script>
            $.getJSON('/api/0x/v0/chart/{{ $val->maker_symbol }}/{{ $val->taker_symbol }}', function (data) {

                // create the chart
                Highcharts.stockChart('{{ $val->maker_symbol . '-' . $val->taker_symbol }}-highcharts-container', {


                    title: {
                        enabled: false
                    },

                    navigator: {
                        enabled: false
                    },
                    scrollbar: {
                        enabled: false
                    },
                    exporting: { enabled: false },

                    rangeSelector: {
                        enabled: false
                    },

                    tooltip: {
                        enabled: false
                    },

                    series: [{
                        showInLegend: false,
                        name: 'AAPL',
                        data: data,
                        tooltip: {
                            enabled: false
                        },

                    }],
                    plotOptions: {
                        line: {
                            color: '#ffa71a'
                        }
                    }

                });
            });

            Highcharts.theme = {
                chart: {
                    backgroundColor: {
                        linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
                        stops: [
                            [0, '#fff'],
                            [1, '#fff']
                        ]
                    },
                },
                xAxis: {
                    visible: false
                },
                yAxis: {
                    visible: false
                },
                plotOptions: {
                    series: {
                        enableMouseTracking: false,
                        states: {
                            hover: {
                                enabled: false
                            }
                        }
                    }
                },
            }
            Highcharts.setOptions(Highcharts.theme);

            $('.icon-light').click(function () {
                $.getJSON('/api/0x/v0/chart/{{ $val->maker_symbol }}/{{ $val->taker_symbol }}', function (data) {
                    var chart1 = new Highcharts.stockChart('{{ $val->maker_symbol . '-' . $val->taker_symbol }}-highcharts-container', {
                        title: {
                            enabled: false
                        },

                        navigator: {
                            enabled: false
                        },
                        scrollbar: {
                            enabled: false
                        },
                        exporting: { enabled: false },

                        rangeSelector: {
                            enabled: false
                        },

                        tooltip: {
                            enabled: false
                        },

                        series: [{
                            showInLegend: false,
                            name: 'AAPL',
                            data: data,
                            tooltip: {
                                enabled: false
                            },

                        }],
                        plotOptions: {
                            line: {
                                color: '#ffa71a'
                            }
                        },
                        chart: {
                            backgroundColor: {
                                linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
                                stops: [
                                    [0, '#fff'],
                                    [1, '#fff']
                                ]
                            },
                        },
                    });
                    Highcharts.theme = {

                        plotOptions: {
                            line: {
                                color: '#ffa71a'
                            }
                        }
                    };
                    Highcharts.setOptions(Highcharts.theme);
                });
            });
            $('.icon-dark').click(function () {
                $.getJSON('/api/0x/v0/chart/{{ $val->maker_symbol }}/{{ $val->taker_symbol }}', function (data) {
                    var chart1 = new Highcharts.stockChart('{{ $val->maker_symbol . '-' . $val->taker_symbol }}-highcharts-container', {
                        title: {
                            enabled: false
                        },

                        navigator: {
                            enabled: false
                        },
                        scrollbar: {
                            enabled: false
                        },
                        exporting: { enabled: false },

                        rangeSelector: {
                            enabled: false
                        },

                        tooltip: {
                            enabled: false
                        },

                        series: [{
                            showInLegend: false,
                            name: 'AAPL',
                            data: data,
                            tooltip: {
                                enabled: false
                            },

                        }],
                        plotOptions: {
                            line: {
                                color: '#064ab8'
                            }
                        },
                        chart: {
                            backgroundColor: {
                                linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
                                stops: [
                                    [0, '#1a1921'],
                                    [1, '#1a1921']
                                ]
                            },
                        },
                    });
                    Highcharts.theme = {

                        plotOptions: {
                            line: {
                                color: '#064ab8'
                            }
                        }
                    };
                    Highcharts.setOptions(Highcharts.theme);
                });
            });
        </script>
    @endforeach
@endsection
