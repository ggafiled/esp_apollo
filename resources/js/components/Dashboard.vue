<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-info elevation-1"
                            ><i class="fas fa-city"></i
                        ></span>

                        <div class="info-box-content">
                            <h5 class="info-box-text">
                                {{ translate("dashboard.building_managment") }}
                            </h5>
                            <div>
                                <router-link
                                    to="/building"
                                    class="small-box-footer"
                                    >{{ translate("dashboard.actions.click") }}
                                    <i class="fas fa-arrow-circle-right"></i
                                ></router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box shadow mb-3 ">
                        <span class="info-box-icon bg-secondary elevation-1"
                            ><i class="fas fa-border-style"></i
                        ></span>

                        <div class="info-box-content">
                            <h5 class="info-box-text">
                                {{
                                    translate(
                                        "dashboard.constarution_managment"
                                    )
                                }}
                            </h5>
                            <div>
                                <router-link
                                    to="/constitution"
                                    class="small-box-footer"
                                    >{{ translate("dashboard.actions.click") }}
                                    <i class="fas fa-arrow-circle-right"></i
                                ></router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box shadow mb-3">
                        <span class="info-box-icon bg-success elevation-1"
                            ><i class="fas fa-tasks "></i
                        ></span>

                        <div class="info-box-content">
                            <h5 class="info-box-text">
                                {{ translate("dashboard.progress_managment") }}
                            </h5>
                            <div>
                                <router-link
                                    to="/progress"
                                    class="small-box-footer"
                                    >{{ translate("dashboard.actions.click") }}
                                    <i class="fas fa-arrow-circle-right"></i
                                ></router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box shadow mb-3">
                        <span class="info-box-icon bg-warning elevation-1"
                            ><i class="fas fa-users"></i
                        ></span>

                        <div class="info-box-content">
                            <h5 class="info-box-text">
                                {{ translate("dashboard.customer_managment") }}
                            </h5>
                            <router-link to="/customer" class="small-box-footer"
                                >{{ translate("dashboard.actions.click") }}
                                <i class="fas fa-arrow-circle-right"></i
                            ></router-link>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box shadow">
                        <span class="info-box-icon bg-danger elevation-1"
                            ><i class="fas fa-map-marked-alt"></i
                        ></span>

                        <div class="info-box-content">
                            <h5 class="info-box-text">
                                {{ translate("dashboard.planning_managment") }}
                            </h5>
                            <div>
                                <router-link
                                    to="/planing/map"
                                    class="small-box-footer"
                                    >{{ translate("dashboard.actions.click") }}
                                    <i class="fas fa-arrow-circle-right"></i
                                ></router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box shadow mb-3 ">
                        <span class="info-box-icon bg-primary elevation-1"
                            ><i class="fas fa-file-signature"></i
                        ></span>

                        <div class="info-box-content">
                            <h5 class="info-box-text">
                                {{
                                    translate(
                                        "dashboard.contractor_managment"
                                    )
                                }}
                            </h5>
                            <div>
                                <router-link
                                    to="/constitution"
                                    class="small-box-footer"
                                    >{{ translate("dashboard.actions.click") }}
                                    <i class="fas fa-arrow-circle-right"></i
                                ></router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box shadow mb-3">
                        <span class="info-box-icon bg-success elevation-1"
                            ><i class="fas fa-file-invoice-dollar"></i
                        ></span>

                        <div class="info-box-content">
                            <h5 class="info-box-text">
                                {{ translate("dashboard.accountant_managment") }}
                            </h5>
                            <div>
                                <router-link
                                    to="/progress"
                                    class="small-box-footer"
                                    >{{ translate("dashboard.actions.click") }}
                                    <i class="fas fa-arrow-circle-right"></i
                                ></router-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box shadow mb-3">
                        <span class="info-box-icon bg-info elevation-1"
                            ><i class="fas fa-table"></i
                        ></span>

                        <div class="info-box-content">
                            <h5 class="info-box-text">
                                {{ translate("dashboard.table_all") }}
                            </h5>
                            <router-link to="/customer" class="small-box-footer"
                                >{{ translate("dashboard.actions.click") }}
                                <i class="fas fa-arrow-circle-right"></i
                            ></router-link>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>

            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">
                    <!-- MAP & BOX PANE -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="far fa-chart-bar"></i>
                                {{
                                    translate(
                                        "dashboard.charts.group_of_county_area_chart"
                                    )
                                }}
                            </h3>
                            <div class="card-tools">
                                <div class="btn-group">
                                    <button
                                        type="button"
                                        id="btn_county_refresh"
                                        class="btn btn-light btn-sm active"
                                        @click="refreshCountyChart"
                                    >
                                        <div>
                                            <i
                                                class="bi bi-arrow-clockwise"
                                            ></i>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <bar-chart
                                :chartData="chart_dp_groub_of_countyName"
                                :options="options"
                            ></bar-chart>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box bg-info">
                        <span class="info-box-icon"
                            ><i class="far fa-building"></i
                        ></span>

                        <div class="info-box-content">
                            <span class="info-box-text">
                                {{
                                    translate("dashboard.info_box.progress_all")
                                }}
                            </span>
                            <span class="info-box-number">{{
                                dashboardInfo.building
                                    .toString()
                                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",") || 0
                            }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <div class="info-box bg-secondary">
                        <span class="info-box-icon"
                            ><i class="fas fa-car-battery"></i
                        ></span>

                        <div class="info-box-content">
                            <span class="info-box-text">
                                {{
                                    translate("dashboard.info_box.constarution")
                                }}
                            </span>
                            <span class="info-box-number">
                                {{
                                    dashboardInfo.constarution
                                        .toString()
                                        .replace(
                                            /\B(?=(\d{3})+(?!\d))/g,
                                            ","
                                        ) || 0
                                }}</span
                            >
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <div class="info-box bg-success">
                        <span class="info-box-icon"
                            ><i class="fas fa-cog"></i
                        ></span>

                        <div class="info-box-content">
                            <span class="info-box-text">
                                {{ translate("dashboard.info_box.progress") }}
                            </span>
                            <span class="info-box-number">
                                {{
                                    dashboardInfo.progress
                                        .toString()
                                        .replace(
                                            /\B(?=(\d{3})+(?!\d))/g,
                                            ","
                                        ) || 0
                                }}</span
                            >
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <div class="info-box bg-warning">
                        <span class="info-box-icon"
                            ><i class="fas fa-address-card"></i
                        ></span>

                        <div class="info-box-content">
                            <span class="info-box-text">
                                {{ translate("dashboard.info_box.planing") }}
                            </span>
                            <span class="info-box-number">
                                {{
                                    dashboardInfo.planing
                                        .toString()
                                        .replace(
                                            /\B(?=(\d{3})+(?!\d))/g,
                                            ","
                                        ) || 0
                                }}</span
                            >
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <div class="info-box bg-danger">
                        <span class="info-box-icon"
                            ><i class="fas fa-user"></i
                        ></span>

                        <div class="info-box-content">
                            <span class="info-box-text">
                                {{ translate("dashboard.info_box.user") }}
                            </span>
                            <span class="info-box-number">
                                {{
                                    dashboardInfo.user
                                        .toString()
                                        .replace(
                                            /\B(?=(\d{3})+(?!\d))/g,
                                            ","
                                        ) || 0
                                }}</span
                            >
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="mdi mdi-progress-wrench"></i>
                                {{
                                    translate(
                                        "dashboard.charts.progress_status_chart"
                                    )
                                }}
                            </h3>
                            <div class="card-tools">
                                <div class="btn-group">
                                    <button
                                        type="button"
                                        id="btn_progress_refresh"
                                        class="btn btn-light btn-sm active"
                                        @click="refreshProgressChart"
                                    >
                                        <div>
                                            <i
                                                class="bi bi-arrow-clockwise"
                                            ></i>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <horizontal-bar-chart
                                id="progress_chart"
                                ref="progress_chart"
                                :chartData="chart_dp_groub_of_progress"
                                :options="options2"
                            ></horizontal-bar-chart>
                        </div>
                        <!-- /.card-body-->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="mdi mdi-progress-wrench"></i>
                                {{
                                    translate(
                                        "dashboard.charts.progress_polarArea_chart"
                                    )
                                }}
                            </h3>
                            <div class="card-tools">
                                <div class="btn-group">
                                    <button
                                        type="button"
                                        id="btn_progress_doughnut_refresh"
                                        class="btn btn-light btn-sm active"
                                        @click="refreshDoughnutChart"
                                    >
                                        <div>
                                            <i
                                                class="bi bi-arrow-clockwise"
                                            ></i>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <polar-area-chart
                                :chartData="chart_dp_groub_of_progress"
                                :options="options2"
                            ></polar-area-chart>
                        </div>
                        <!-- /.card-body-->
                    </div>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
</template>

<script>
import BarChart from "../partials/BarChart";
import HorizontalBarChart from "../partials/HorizontalBarChart";
import PolarAreaChart from "../partials/PolarAreChart";
import anime from "animejs/lib/anime.es.js";
import pattern from "patternomaly";
export default {
    title: "Dashboard -",
    components: {
        BarChart,
        HorizontalBarChart,
        PolarAreaChart
    },
    data() {
        return {
            dashboardInfo: [],
            chart_dp_groub_of_countyName: {},
            chart_dp_groub_of_progress: {},
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: "index"
                },
                plugins: {
                    legend: {
                        title: {
                            display: true,
                            text: "County Bound Area"
                        }
                    },
                    zoom: {
                        zoom: {
                            wheel: {
                                enabled: true
                            },
                            pinch: {
                                enabled: true
                            },
                            mode: "xy"
                        },
                        animation: {
                            duration: 1000,
                            easing: "easeOutCubic"
                        }
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var label =
                                    data.datasets[tooltipItem.datasetIndex]
                                        .label || "";

                                if (label) {
                                    label += ": ";
                                }
                                label += isNaN(tooltipItem.yLabel)
                                    ? "0"
                                    : tooltipItem.yLabel;
                                return label;
                            }
                        }
                    }
                }
            },
            options2: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {},
                interaction: {
                    intersect: true
                },
                scales: {
                    xAxes: [
                        {
                            stacked: true,
                            gridLines: {
                                offsetGridLines: true
                            }
                        }
                    ],
                    yAxes: [
                        {
                            stacked: true
                        }
                    ]
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var label =
                                data.datasets[tooltipItem.datasetIndex].label ||
                                "";

                            if (label) {
                                label += ": ";
                            }
                            label += isNaN(tooltipItem.xLabel)
                                ? "0"
                                : tooltipItem.xLabel;
                            return label;
                        }
                    }
                }
            }
        };
    },
    methods: {
        async getDashboardInfo() {
            await axios
                .get("/dashboard")
                .then(response => {
                    this.dashboardInfo = response.data.data;
                    this.chart_dp_groub_of_countyName = {
                        labels: response.data.data.chart_dp_groub_of_countyName.map(
                            obj => {
                                return obj["countyName"];
                            }
                        ),
                        datasets: [
                            {
                                label: "County Bound",
                                backgroundColor: "#FF6767",
                                data: response.data.data.chart_dp_groub_of_countyName.map(
                                    obj => {
                                        return obj["total"];
                                    }
                                )
                            }
                        ]
                    };
                    this.chart_dp_groub_of_progress = {
                        labels: Object.keys(
                            response.data.data.chart_dp_groub_of_progress
                        ),
                        datasets: [
                            {
                                label: "กำลังดำเนินการ",
                                backgroundColor: pattern.draw(
                                    "diagonal-right-left",
                                    "#ED602B"
                                ),
                                data: Object.keys(
                                    response.data.data
                                        .chart_dp_groub_of_progress
                                ).map(item => {
                                    return response.data.data.chart_dp_groub_of_progress[
                                        item
                                    ]
                                        .filter(e => {
                                            return e.status == "กำลังดำเนินการ";
                                        })
                                        .map(e => {
                                            return e.total;
                                        })[0];
                                })
                            },
                            {
                                label: "รอเข้าดำเนินการ",
                                backgroundColor: pattern.draw(
                                    "diagonal-right-left",
                                    "#F0802C"
                                ),
                                data: Object.keys(
                                    response.data.data
                                        .chart_dp_groub_of_progress
                                ).map(item => {
                                    return response.data.data.chart_dp_groub_of_progress[
                                        item
                                    ]
                                        .filter(e => {
                                            return e.status == "รอเข้าดำเนินการ";
                                        })
                                        .map(e => {
                                            return e.total;
                                        })[0];
                                })
                            },
                            {
                                label: "วางโครงข่ายแล้ว",
                                backgroundColor: pattern.draw(
                                    "diagonal-right-left",
                                    "#F3E252"
                                ),
                                data: Object.keys(
                                    response.data.data
                                        .chart_dp_groub_of_progress
                                ).map(item => {
                                    return response.data.data.chart_dp_groub_of_progress[
                                        item
                                    ]
                                        .filter(e => {
                                            return e.status == "วางโครงข่ายแล้ว";
                                        })
                                        .map(e => {
                                            return e.total;
                                        })[0];
                                })
                            },
                            {
                                label: "เชื่อมโครงข่ายแล้ว",
                                backgroundColor: pattern.draw(
                                    "diagonal-right-left",
                                    "#059BFF"
                                ),
                                data: Object.keys(
                                    response.data.data
                                        .chart_dp_groub_of_progress
                                ).map(item => {
                                    return response.data.data.chart_dp_groub_of_progress[
                                        item
                                    ]
                                        .filter(e => {
                                            return (
                                                e.status == "เชื่อมโครงข่ายแล้ว"
                                            );
                                        })
                                        .map(e => {
                                            return e.total;
                                        })[0];
                                })
                            }
                        ]
                    };
                })
                .catch(() => console.warn("Oh. Something went wrong"));
        },
        refreshProgressChart() {
            anime({
                targets: "#btn_progress_refresh div",
                keyframes: [{ rotate: "1turn" }, { rotate: "0deg" }],
                duration: 1000,
                easing: "linear"
            });
            this.$emit("updateHorizontalBarChart");
        },
        refreshCountyChart() {
            anime({
                targets: "#btn_county_refresh div",
                keyframes: [{ rotate: "1turn" }, { rotate: "0deg" }],
                duration: 1000,
                easing: "linear"
            });
            this.$emit("updateBarChart");
        },
        refreshDoughnutChart() {
            anime({
                targets: "#btn_progress_doughnut_refresh div",
                keyframes: [{ rotate: "1turn" }, { rotate: "0deg" }],
                duration: 1000,
                easing: "linear"
            });
            this.$emit("updateDoughnutChart");
        }
    },
    async mounted() {
        await this.getDashboardInfo();
    }
};
</script>
