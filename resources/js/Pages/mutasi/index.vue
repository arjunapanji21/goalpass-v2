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
                                        <label @click="get_mutasi_detail(row)" class="btn btn-primary btn-sm btn-circle btn-outline">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512" class="w-4 h-4" fill="currentColor"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                                        </label>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Detail Mutasi -->
        <input type="checkbox" id="modal_mutasi" class="modal-toggle" />
        <div class="modal" role="dialog">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Hello!</h3>
                <p class="py-4">This modal works with a hidden checkbox!</p>
                <div class="modal-action">
                <label for="modal_mutasi" class="btn">Close!</label>
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

        return {
            moment,
            formCari,
        };
    },
    data() {
        return {};
    },
    methods: {
        get_mutasi_detail(data){
            console.log(data);
        }
    },
    watch: {},
};
</script>
<style lang=""></style>
