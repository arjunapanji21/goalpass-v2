<template lang="">
    <div
        class="flex flex-col lg:flex-row justify-between items-center gap-2 pb-2"
    >
        <div class="breadcrumbs p-2 font-semibold">
            <ul>
                <li>
                    <Link :href="route('beranda')">{{ auth.user.role }}</Link>
                </li>
                <li><Link :href="route('anggota.index')">Anggota</Link></li>
                <li>Mutasi</li>
            </ul>
        </div>
    </div>
    <div class="card card-compact bg-base-100 shadow-lg">
            <div class="card-body">
                <div class="card-title">
                    Mutasi Anggota
                </div>
                <div class="overflow-auto min-h-96 bg-base-100 rounded-lg">
                    <table class="table table-sm w-full">
                        <!-- head -->
                        <thead class="sticky top-0 bg-base-100 z-10">
                            <tr class="text-center">
                                <th>Tgl. Pengajuan</th>
                                <th>Nama Pemain</th>
                                <th>Klub</th>
                                <th>Kota/Kabupaten</th>
                                <th>Submit By</th>
                                <th>Status</th>
                                <th>Confirm By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(row, index) in master.mutasi" :key="index">
                                <tr class="text-center">
                                    <td>{{moment(row.created_at).format("DD/MM/YYYY")}}</td>
                                    <td>{{row.nama}}</td>
                                    <td><span class="flex justify-center items-center gap-2">
                                        <span class=" ">
                                            {{row.klub_asal}}
                                        </span> 
                                        <span class="text-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512" class="w-4 h-4" fill="currentColor"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                                        </span>
                                         <span class="font-bold">{{row.klub_tujuan}}</span>
                                    </span></td>
                                    <td><span class="flex justify-center items-center gap-2">
                                        <span class=" ">
                                            {{row.kota_asal}}
                                        </span>
                                        <span class="text-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512" class="w-4 h-4" fill="currentColor"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                                        </span> 
                                         <span class="font-bold">{{row.kota_tujuan}}</span>
                                    </span></td>
                                    <td>{{row.submit_by}}</td>
                                    <td>
                                        <span class="badge badge-sm uppercase font-bold badge-warning" v-if="row.status == 'Pending'">{{row.status}}</span>
                                        <span class="badge badge-sm uppercase font-bold badge-success" v-if="row.status == 'Accepted'">{{row.status}}</span>
                                        <span class="badge badge-sm uppercase font-bold badge-error" v-if="row.status == 'Rejected'">{{row.status}}</span>
                                    </td>
                                    <td>{{row.confirm_by == null ? "-" : row.confirm_by}}</td>
                                    <td>
                                        <div class="flex gap-2 justify-center items-center" v-if="row.status == 'Pending'">
                                            <label v-if="auth.user.role == 'Super Admin' || auth.user.role == 'Admin Asprov'" for="modal_detail_mutasi" @click="get_mutasi_detail(row)" class="btn btn-primary btn-xs btn-circle btn-outline">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="16" width="14" viewBox="0 0 448 512"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                                        </label>
                                        <label for="modal_hapus_mutasi" @click="get_mutasi_hapus(row)" class="btn btn-error btn-xs btn-circle btn-outline">
                                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                                        </label>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Detail Mutasi -->
        <input type="checkbox" id="modal_detail_mutasi" class="modal-toggle" />
        <div class="modal" role="dialog">
            <div class="modal-box">
                <h3 class="font-bold text-lg" id="txtKonfirmasiMutasi"></h3>
                <div class="modal-action">
                    <button @click="btn_konfirmasi_mutasi()" class="btn btn-primary">Ya</button>
                <label for="modal_detail_mutasi" class="btn">Tidak</label>
                </div>
            </div>
        </div>

        <!-- Modal Hapus Mutasi -->
        <input type="checkbox" id="modal_hapus_mutasi" class="modal-toggle" />
        <div class="modal" role="dialog">
            <div class="modal-box">
                <h3 class="font-bold text-lg" id="txtBatalkanMutasi"></h3>
                <input hidden readonly type="text" v-model="mutasi.id">
                <div class="modal-action">
                <button @click="btn_hapus_mutasi()" class="btn btn-primary">Ya</button>
                <label for="modal_hapus_mutasi" class="btn">Tidak</label>
                </div>
            </div>
        </div>
</template>
<script>
import moment from "moment";
import layout from "../superadmin/layout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import axios from "axios";
export default {
    layout: layout,
    props: {
        auth: Object,
        session: Object,
        master: Object,
    },
    setup(props) {
        const formCari = useForm({});
        const mutasi = useForm({
            id: null,
        });
        return {
            moment,
            formCari,
            mutasi,
        };
    },
    data() {
        return {};
    },
    methods: {
        get_mutasi_detail(data){
            var txtJudul = document.getElementById('txtKonfirmasiMutasi');
            txtJudul.innerHTML = "Terima permintaan mutasi pemain a.n. "+data.nama+" ?";
            this.mutasi.id = data.id;
        },
        btn_konfirmasi_mutasi(){
            this.mutasi.post(route("mutasi.update", this.mutasi.id), {
                onSuccess: () => {
                    alert("Permintaan mutasi pemain diterima.");
                },
                preserveScroll: true,
            });
        },
        get_mutasi_hapus(data){
            var txtJudul = document.getElementById('txtBatalkanMutasi');
            txtJudul.innerHTML = "Batalkan mutasi pemain a.n. "+data.nama+" ?";
            this.mutasi.id = data.id;
        },
        btn_hapus_mutasi(){
            this.mutasi.post(route("mutasi.destroy", this.mutasi.id), {
                onSuccess: () => {
                    alert("Mutasi pemain telah dibatalkan.");
                },
                preserveScroll: true,
            });
        }
    },
    watch: {},
};
</script>
<style lang=""></style>
