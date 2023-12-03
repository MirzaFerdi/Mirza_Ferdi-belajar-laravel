@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                {{ App\Models\Product::count() }}
                            </h3>

                            <p>Jumlah Semua Produk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                {{ App\Models\Category::count() }}
                            </h3>

                            <p>Jumlah Kategori Produk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>
                                Rp.
                                {{ App\Models\Product::sum('price') }}
                            </h3>

                            <p>Jumlah Total Harga Semua Produk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                                {{ App\Models\Product::sum('stock') }}
                            </h3>

                            <p>Jumlah Stok Semua Produk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>


            {{-- <script>
                var Highcarts = require('highcharts');

                require('highcharts/modules/exporting')(Highcharts);

                Highcharts.chart('container', {
                    title: {
                        text: 'Grafik Penjualan'
                    },
                    subtitle: {
                        text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
                    },
                    yAxis: {
                        title: {
                            text: 'Jumlah Produk Per Kategori'
                        }
                    },
                    xAxis: {
                        categories: ['Keyboard', 'Headset', 'Monitor']
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },
                    plotOptions: {
                        series: {
                            allowPointSelect: true
                        }
                    },
                    series: [{
                        name: 'Jumlah Produk',
                        data: $category
                    }],
                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }
                })
            </script> --}}

            <!-- /.row -->
            <!-- Main row -->
        </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->

    <Section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card text-start">
                        <div class="card-body">
                            <div id="columnChart1" style="width:100%; height:400px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card text-start">
                        <div class="card-body">
                            <div id="pieChart1" style="width:100%; height:400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card text-start">
                        <div class="card-body">
                            <div id="columnChart2" style="width:100%; height:400px;"></div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="card text-start">
                        <div class="card-body">
                            <div id="pieChart2" style="width:100%; height:400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card text-start">
                        <div class="card-body">
                            <div id="columnChart3" style="width:100%; height:400px;"></div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="card text-start">
                        <div class="card-body">
                            <div id="pieChart3" style="width:100%; height:400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </Section>
@endsection

@section('script')
<script src="{{asset('libraries/code/highcharts.js')}}"></script>
    <script type="text/javascript">
        function toNumber(item) {
            return parseInt(item);
        }
        var $product = {{ $product }};
        var $price = {{ Js::from($price) }};
        var $stock = {{ Js::from($stock) }};
        var price = $price.map(toNumber);
        var stock = $stock.map(toNumber);

        Highcharts.chart('columnChart1', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Jumlah Produk Perkategori'
            },
            yAxis: {
                title: {
                    text: 'Jumlah '
                }
            },
            xAxis: {
                categories: ['Keyboard', 'Headset', 'Monitor']
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Jumlah Produk',
                data: $product
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
        Highcharts.chart('columnChart2', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Total Harga Produk Perkategori'
            },
            yAxis: {
                title: {
                    text: 'Jumlah '
                }
            },
            xAxis: {
                categories: ['Keyboard', 'Headset', 'Monitor']
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Total Harga',
                data: price,
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
        Highcharts.chart('columnChart3', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Jumlah Stok Produk Perkategori'
            },
            yAxis: {
                title: {
                    text: 'Jumlah '
                }
            },
            xAxis: {
                categories: ['Keyboard', 'Headset', 'Monitor']
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Total Stok',
                data: stock,
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
        Highcharts.chart('pieChart1', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Jumlah Produk Perkategori'
            },
            yAxis: {
                title: {
                    text: 'Jumlah '
                }
            },
            xAxis: {
                categories: ['Keyboard', 'Headset', 'Monitor']
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Persentase',
                colorByPoint: true,
                data: [{
                    name: 'Keyboard',
                    y: $product[0]
                }, {
                    name: 'Headset',
                    y: $product[1]
                }, {
                    name: 'Monitor',
                    y: $product[2]
                }]
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
        Highcharts.chart('pieChart2', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Total Harga Produk Perkategori'
            },
            yAxis: {
                title: {
                    text: 'Jumlah '
                }
            },
            xAxis: {
                categories: ['Keyboard', 'Headset', 'Monitor']
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Total Harga',
                data: [{
                    name: 'Keyboard',
                    y: toNumber($price[0])
                }, {
                    name: 'Headset',
                    y: toNumber($price[1])
                }, {
                    name: 'Monitor',
                    y: toNumber($price[2])
                }]
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
        Highcharts.chart('pieChart3', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Jumlah Stok Produk Perkategori'
            },
            yAxis: {
                title: {
                    text: 'Jumlah '
                }
            },
            xAxis: {
                categories: ['Keyboard', 'Headset', 'Monitor']
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'Total Stok',
                data: [{
                    name: 'Keyboard',
                    y: toNumber($stock[0])
                }, {
                    name: 'Headset',
                    y: toNumber($stock[1])
                }, {
                    name: 'Monitor',
                    y: toNumber($stock[2])
                }]
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>
@endsection
