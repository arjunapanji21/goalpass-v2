<template lang="">
    <div>
        <div class="flex m-2 gap-4 items-center">
            <div
                class="text-2xl w-[640px] md:w-[400px] xl:w-[320px] flex gap-2 font-semibold text-center"
            >
                <span>Profile Anggota</span>
            </div>
            <div class="divider w-full"></div>
        </div>
        <div>
            <div class="">
                <div
                    class="flex flex-col-reverse lg:flex-row gap-4 justify-center"
                >
                    <div class="card w-full">
                        <div
                            class="flex mx-4 flex-col lg:flex-row lg:items-end gap-2"
                        >
                            <div
                                class="card-title mt-4 text-2xl lg:text-4xl font-bold text-primary"
                            >
                                {{ master.anggota.nama }}
                            </div>
                            <div
                                class="font-bold lg:text-2xl italic text-primary opacity-50"
                            >
                                {{ master.anggota.klub }} [{{
                                    master.anggota.umur
                                }}]
                            </div>
                        </div>
                        <div class="py-2"></div>
                        <div class="flex flex-row ">
                            <div
                            class="font-bold text-primary-content text-xl bg-primary mx-4 w-max px-4 py-2 rounded"
                        >
                            {{ master.anggota.kd_kartu }}
                        </div>
                        <div
                            class="font-bold  bg-success text-success-content w-max px-4 py-2 rounded"
                        >
                            Kartu Diterima
                        </div>
                        </div>
                        <div class="py-5"></div>
                        <div class="card-body rounded-box bg-base-100 shadow">
                            <div class="block lg:flex">
                                <div>
                                    <div>
                                        <span
                                            class="uppercase font-bold text-primary"
                                            >Lahir Pada:</span
                                        >
                                        {{
                                            moment(
                                                master.anggota.tgl_lahir
                                            ).format("DD MMMM YYYY")
                                        }}
                                    </div>
                                    <div>
                                        <span
                                            class="uppercase font-bold text-primary"
                                            >Kota/Kabupaten:</span
                                        >
                                        {{ master.anggota.kota_kab }}
                                    </div>
                                </div>
                                <div
                                    class="divider lg:divider-horizontal"
                                ></div>
                                <div>
                                    <div>
                                        <span
                                            class="uppercase font-bold text-primary"
                                            >Tinggi Badan:</span
                                        >
                                        n/a
                                    </div>
                                    <div>
                                        <span
                                            class="uppercase font-bold text-primary"
                                            >Berat Badan:</span
                                        >
                                        n/a
                                    </div>
                                </div>
                                <div
                                    class="divider lg:divider-horizontal"
                                ></div>
                                <div>
                                    <div>
                                        <span
                                            class="uppercase font-bold text-primary"
                                            >Kaki Terbaik:</span
                                        >
                                        n/a
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="p-3 mx-auto bg-base-100 rounded-box shadow lg:w-72"
                    >
                        <img
                            :src="
                                '/foto_anggota/' +
                                master.anggota.foto.replace(/’/g, '__')
                            "
                            alt="Foto Anggota"
                            class="rounded-box"
                        />
                    </div>
                </div>
                <div class="card card-compact bg-base-100 my-4 shadow">
                    <div class="card-body">
                        <div
                            class="text-xl font-bold mb-4 text-center text-primary"
                        >
                            Statistik Pemain
                        </div>
                        <div class="lg:flex lg:gap-2 lg:justify-center">
                            <div
                                class="card bg-primary text-primary-content w-full lg:w-52 shadow-xl"
                            >
                                <div class="card-body">
                                    <div class="text-center font-bold text-4xl">
                                        0
                                    </div>
                                    <div class="text-center uppercase">
                                        Goal
                                    </div>
                                </div>
                            </div>
                            <div class="divider lg:divider-horizontal"></div>
                            <div
                                class="card bg-primary text-primary-content w-full lg:w-52 shadow-xl"
                            >
                                <div class="card-body">
                                    <div class="text-center font-bold text-4xl">
                                        0
                                    </div>
                                    <div class="text-center uppercase">
                                        Assist
                                    </div>
                                </div>
                            </div>
                            <div class="divider lg:divider-horizontal"></div>
                            <div
                                class="card bg-primary text-primary-content w-full lg:w-52 shadow-xl"
                            >
                                <div class="card-body">
                                    <div class="text-center font-bold text-4xl">
                                        0
                                    </div>
                                    <div class="text-center uppercase">
                                        Menit Bermain
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="flex justify-center">
                            <div class="flex items-center gap-2">
                                <div class="p-2 font-bold rounded bg-warning">
                                    0
                                </div>
                                <div class="uppercase font-semibold">
                                    Kartu Kuning
                                </div>
                            </div>
                            <div class="divider divider-horizontal"></div>
                            <div class="flex items-center gap-2">
                                <div class="p-2 font-bold rounded bg-error">
                                    0
                                </div>
                                <div class="uppercase font-semibold">
                                    Kartu Merah
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid lg:grid-cols-2 lg:gap-4">
                    <div class="card card-compact bg-base-100 my-4 shadow">
                        <div class="card-body">
                            <div
                                class="text-xl font-bold mb-4 text-center text-primary"
                            >
                                Posisi Bermain
                            </div>
                            <div
                                class="flex flex-col gap-4 mx-auto lg:flex-row"
                            >
                                <div class="w-64 h-80 md:h-64">
                                    <div class="absolute">
                                        <img
                                            src="../../../../public/images/lapangan.png"
                                            alt="lapangan.png"
                                            width="240"
                                        />
                                        <!-- <div
                                            class="btn btn-circle btn-sm text-primary-content rounded-full absolute bg-primary top-10 left-4"
                                        >
                                            SK
                                        </div>
                                        <div
                                            class="btn btn-circle btn-sm text-base-100 rounded-full absolute bg-error top-6 left-20"
                                        >
                                            S
                                        </div>
                                        <div
                                            class="btn btn-circle btn-sm text-primary-content rounded-full absolute bg-primary top-10 right-4"
                                        >
                                            SK
                                        </div> -->
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col gap-5 w-48">
                                        <div>
                                            <div
                                                class="text-primary font-bold capitalize border-b border-b-primary"
                                            >
                                                Posisi Utama
                                            </div>
                                            <div class="flex justify-between">
                                                <div
                                                    class="text-error capitalize font-semibold"
                                                >
                                                    n/a
                                                </div>
                                                <div
                                                    class="text-error capitalize font-semibold"
                                                >
                                                    0%
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div
                                                class="text-primary font-bold capitalize border-b border-b-primary"
                                            >
                                                Posisi Lain
                                            </div>
                                            <div class="flex justify-between">
                                                <div
                                                    class="text-primary capitalize font-semibold"
                                                >
                                                    n/a
                                                </div>
                                                <div
                                                    class="text-primary capitalize font-semibold"
                                                >
                                                    0%
                                                </div>
                                            </div>
                                            <!-- <div class="flex justify-between">
                                                <div
                                                    class="text-primary capitalize font-semibold"
                                                >
                                                    Sayap Kiri
                                                </div>
                                                <div
                                                    class="text-primary capitalize font-semibold"
                                                >
                                                    0%
                                                </div>
                                            </div> -->
                                        </div>
                                        <div>
                                            <div
                                                class="text-primary font-bold capitalize border-b border-b-primary"
                                            >
                                                Posisi Lama
                                            </div>
                                            <div class="flex justify-between">
                                                <div
                                                    class="capitalize font-semibold"
                                                >
                                                    n/a
                                                </div>
                                                <div
                                                    class="capitalize font-semibold"
                                                >
                                                    0%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-compact w-full bg-base-100 my-4 shadow">
                        <div class="card-body">
                            <div
                                class="text-xl font-bold mb-4 text-center text-primary"
                            >
                                Kemampuan Pemain
                            </div>
                            <div class="overflow-auto">
                                <table class="table table-xs">
                                    <tr class="text-center">
                                        <th
                                            class="border border-primary bg-primary"
                                        ></th>
                                        <th
                                            class="border border-primary text-primary"
                                        >
                                            SIT AND REACH (CM)
                                        </th>
                                    </tr>
                                    <tr class="active">
                                        <th
                                            class="border border-primary text-primary"
                                        >
                                            FLEKSIBILITAS
                                        </th>
                                        <td
                                            class="border border-primary text-center"
                                        >
                                            n/a
                                        </td>
                                    </tr>
                                </table>
                                <table class="table table-xs">
                                    <tr class="text-center">
                                        <th
                                            class="border border-primary bg-primary"
                                        ></th>
                                        <th
                                            class="border border-primary text-primary"
                                        >
                                            PUSH UP
                                        </th>
                                        <th
                                            class="border border-primary text-primary"
                                        >
                                            SIT UP
                                        </th>
                                        <th
                                            class="border border-primary text-primary"
                                        >
                                            BACK UP
                                        </th>
                                    </tr>
                                    <tr class="active">
                                        <th
                                            class="border border-primary text-primary"
                                        >
                                            MUSCLE
                                        </th>
                                        <td
                                            class="border border-primary text-center"
                                        >
                                            n/a
                                        </td>
                                        <td
                                            class="border border-primary text-center"
                                        >
                                            n/a
                                        </td>
                                        <td
                                            class="border border-primary text-center"
                                        >
                                            n/a
                                        </td>
                                    </tr>
                                </table>
                                <table class="table table-xs">
                                    <tr class="text-center">
                                        <th
                                            class="border border-primary bg-primary"
                                        ></th>
                                        <th
                                            class="border border-primary text-primary"
                                        >
                                            VERTICAL JUMP
                                        </th>
                                        <th
                                            class="border border-primary bg-primary"
                                        ></th>
                                        <th
                                            class="border border-primary text-primary"
                                        >
                                            30 METER (SEC)
                                        </th>
                                    </tr>
                                    <tr class="active">
                                        <th
                                            class="border border-primary text-primary"
                                        >
                                            POWER
                                        </th>
                                        <td
                                            class="border border-primary text-center"
                                        >
                                            n/a
                                        </td>
                                        <th
                                            class="border border-primary text-primary"
                                        >
                                            SPEED
                                        </th>
                                        <td
                                            class="border border-primary text-center"
                                        >
                                            n/a
                                        </td>
                                    </tr>
                                </table>

                                <table class="table table-xs">
                                    <tr class="text-center">
                                        <th
                                            class="border border-primary bg-primary"
                                        ></th>
                                        <th
                                            colspan="2"
                                            class="border border-primary text-primary"
                                        >
                                            ARROW HEAD (SEC)
                                        </th>
                                    </tr>
                                    <tr class="text-center text-primary">
                                        <th
                                            class="border border-primary bg-primary"
                                        ></th>
                                        <th class="border border-primary">
                                            LEFT
                                        </th>
                                        <th class="border border-primary">
                                            RIGHT
                                        </th>
                                    </tr>
                                    <tr class="active">
                                        <th
                                            class="border border-primary text-primary"
                                        >
                                            AGILITY
                                        </th>
                                        <td
                                            class="border border-primary text-center"
                                        >
                                            n/a
                                        </td>
                                        <td
                                            class="border border-primary text-center"
                                        >
                                            n/a
                                        </td>
                                    </tr>
                                </table>
                                <table class="table table-xs">
                                    <tr class="text-center">
                                        <th
                                            class="border border-primary bg-primary"
                                        ></th>
                                        <th
                                            colspan="5"
                                            class="border border-primary text-primary"
                                        >
                                            YYIRT 2
                                        </th>
                                    </tr>
                                    <tr class="text-center text-primary">
                                        <th
                                            class="border border-primary bg-primary"
                                        ></th>
                                        <th class="border border-primary">
                                            STAGE
                                        </th>
                                        <th class="border border-primary">
                                            SPEED LEVEL
                                        </th>
                                        <th class="border border-primary">
                                            SHUTTLE
                                        </th>
                                        <th class="border border-primary">
                                            DISTANCE
                                        </th>
                                        <th class="border border-primary">
                                            VO2MAX
                                        </th>
                                    </tr>
                                    <tr class="active">
                                        <th
                                            class="border border-primary text-primary"
                                        >
                                            ENDURANCE
                                        </th>
                                        <td
                                            class="border border-primary text-center"
                                        >
                                            n/a
                                        </td>
                                        <td
                                            class="border border-primary text-center"
                                        >
                                            n/a
                                        </td>
                                        <td
                                            class="border border-primary text-center"
                                        >
                                            n/a
                                        </td>
                                        <td
                                            class="border border-primary text-center"
                                        >
                                            n/a
                                        </td>
                                        <td
                                            class="border border-primary text-center"
                                        >
                                            n/a
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-compact bg-base-100 my-4 shadow">
                    <div class="card-body">
                        <div id="chart">
                            <apexchart
                                type="radar"
                                height="350"
                                :options="chartOptions"
                                :series="series"
                            ></apexchart>
                        </div>
                    </div>
                </div>
                <div class="card card-compact bg-base-100 my-4 shadow">
                    <div class="card-body">
                        <div
                            class="text-xl font-bold mb-4 text-center text-primary"
                        >
                            Torehan Gelar
                        </div>
                        <div class="text-center">No Data</div>
                    </div>
                </div>
                <div class="card card-compact bg-base-100 my-4 shadow">
                    <div class="card-body">
                        <div
                            class="text-xl font-bold mb-4 text-center text-primary"
                        >
                            Penghargaan
                        </div>
                        <div class="text-center">No Data</div>
                    </div>
                </div>
            </div>
            <div class="h-20 md:hidden"></div>
        </div>
    </div>
</template>
<script>
import moment from "moment";
import layout from "../superadmin/layout.vue";
import VueApexCharts from "vue3-apexcharts";

export default {
    layout: layout,
    props: {
        auth: Object,
        master: Object,
    },
    components: {
        apexchart: VueApexCharts,
    },
    data() {
        return {
            series: [
                {
                    name: "Series 1",
                    data: [80, 50, 30, 40, 100, 20],
                },
            ],
            chartOptions: {
                chart: {
                    height: 350,
                    type: "radar",
                },
                title: {
                    text: "Basic Radar Chart",
                },
                xaxis: {
                    categories: [
                        "January",
                        "February",
                        "March",
                        "April",
                        "May",
                        "June",
                    ],
                },
            },
        };
    },
    setup() {
        return {
            moment,
        };
    },
    methods: {},
};
</script>
<style lang=""></style>
