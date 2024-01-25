<template lang="">
    <div class="">
        <div class="flex m-2 gap-4 items-center">
            <div class="w-full flex flex-col lg:flex-row gap-2 items-center justify-between font-semibold">
                <div class="breadcrumbs p-2">
                    <ul>
                        <li>
                            <Link :href="route('beranda')">{{ auth.user.role }}</Link>
                        </li>
                        <li>Wasit</li>
                    </ul>
                </div>
                <div class="flex flex-row gap-2">
                    <Link v-if="auth.user.role == 'Super Admin' || auth.user.role == 'Admin Asprov'" :href="route('wasit.create')" class="btn lg:btn-wide btn-primary btn-outline shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" class="w-4 h-4" fill="currentColor"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                        <span class="hidden lg:flex">Input Data Wasit</span></Link>
                </div>
            </div>
        </div>
        <div>
            <div class="flex flex-row gap-2 justify-between items-center py-2">
                <!-- <div class="" v-if="auth.user.role == 'Super Admin'">
                    <button @click="btnBatchDownload()" class="btn" :class="{'btn-disabled':batchDownload.length<1,'btn-primary':batchDownload.length>0}">Batch Download</button>
                    <a id="linkDownload" href="" hidden></a>
                </div> -->
            </div>
            <div class="overflow-auto h-96 lg:h-[450px] xl:h-[900px] bg-base-100 rounded-lg shadow">
                <table class="table table-sm w-full">
                    <!-- head -->
                    <thead class="sticky top-0 bg-base-100 shadow z-10">
                        <tr>
                            <!-- <th v-if="auth.user.role == 'Super Admin'"><input type="checkbox" class="checkbox" v-model="checkAll" @change="checkAllCheckbox()"/></th> -->
                            <th class="text-center">#</th>
                            <th class="text-center">Foto</th>
                            <th>Nama Lengkap</th>
                            <th>License</th>
                            <th>No. Wasit</th>
                            <th>Kota/Kabupaten</th>
                            <th class="text-right" v-if="auth.user.role == 'Super Admin'">Jumlah Dicetak</th>
                            <th class="text-right" v-else>Tgl. Update</th>
                            <!-- <th class="text-center">Detail</th> -->
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template
                            v-for="(wasit, index) in master.wasit.data"
                            :key="index"
                        >
                            <tr>
                                <!-- <td v-if="auth.user.role == 'Super Admin'"><input :id="wasit.id" :value="wasit.id" type="checkbox" class="checkbox" v-model="batchDownload"/></td> -->
                                <td>{{ wasit.id }}</td>
                                <td class="text-center">
                                    <div class="avatar">
                                        <div
                                            class="mask mask-squircle w-12 h-12"
                                        >
                                            <img
                                                :src="
                                                    '/foto_wasit/' +
                                                    wasit.foto.replace(
                                                        /’/g,
                                                        '__'
                                                    )
                                                "
                                                alt="Foto wasit"
                                            />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ wasit.nama }}
                                </td>
                                <td>
                                    {{ wasit.license }}
                                </td>
                                <td>
                                    {{ wasit.kd_kartu }}
                                </td>
                                <td>
                                    {{ wasit.kota_kab }}
                                </td>
                                <td class="text-right" v-if="auth.user.role == 'Super Admin'">
                                    {{ wasit.jml_cetak }}
                                </td>
                                <td class="text-right" v-else>
                                    {{ moment(wasit.updated_at).format('DD/MM/YYYY') }}
                                </td>
                                <td class="text-center">
                                    <div class="flex gap-1 justify-center">
                                        <Link
                                            :href="
                                                route(
                                                    'wasit.show',
                                                    wasit.kd_kartu
                                                )
                                            "
                                            class="btn btn-circle btn-outline btn-primary btn-sm"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-person-lines-fill"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"
                                                />
                                            </svg>
                                        </Link>
                                        <!-- <Link
                                            :href="
                                                route(
                                                    'mutasi.create',
                                                    wasit.id
                                                )
                                            "
                                            class="btn btn-circle btn-outline btn-primary btn-sm"
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512" class="w-4 h-4" fill="currentColor"><path d="M64 64a64 64 0 1 1 128 0A64 64 0 1 1 64 64zM25.9 233.4C29.3 191.9 64 160 105.6 160h44.8c27 0 51 13.4 65.5 34.1c-2.7 1.9-5.2 4-7.5 6.3l-64 64c-21.9 21.9-21.9 57.3 0 79.2L192 391.2V464c0 26.5-21.5 48-48 48H112c-26.5 0-48-21.5-48-48V348.3c-26.5-9.5-44.7-35.8-42.2-65.6l4.1-49.3zM448 64a64 64 0 1 1 128 0A64 64 0 1 1 448 64zM431.6 200.4c-2.3-2.3-4.9-4.4-7.5-6.3c14.5-20.7 38.6-34.1 65.5-34.1h44.8c41.6 0 76.3 31.9 79.7 73.4l4.1 49.3c2.5 29.8-15.7 56.1-42.2 65.6V464c0 26.5-21.5 48-48 48H496c-26.5 0-48-21.5-48-48V391.2l47.6-47.6c21.9-21.9 21.9-57.3 0-79.2l-64-64zM272 240v32h96V240c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2l64 64c9.4 9.4 9.4 24.6 0 33.9l-64 64c-6.9 6.9-17.2 8.9-26.2 5.2s-14.8-12.5-14.8-22.2V336H272v32c0 9.7-5.8 18.5-14.8 22.2s-19.3 1.7-26.2-5.2l-64-64c-9.4-9.4-9.4-24.6 0-33.9l64-64c6.9-6.9 17.2-8.9 26.2-5.2s14.8 12.5 14.8 22.2z"/></svg>
                                        </Link> -->
                                        <Link v-if="
                                                auth.user.role == 'Super Admin' || auth.user.role == 'Admin Asprov'" :href="route('wasit.edit', wasit.kd_kartu)"
                                            class="btn btn-circle btn-outline btn-primary btn-sm"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-pencil-fill"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"
                                                />
                                            </svg>
                                        </Link>
                                        <Link
                                            v-if="
                                                auth.user.role == 'Super Admin'
                                            "
                                            :href="
                                                route(
                                                    'wasit.cetak',
                                                    wasit.kd_kartu
                                                )
                                            "
                                            target="_blank"
                                            class="btn btn-circle btn-outline btn-primary btn-sm"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-printer-fill"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"
                                                />
                                                <path
                                                    d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"
                                                />
                                            </svg>
                                        </Link>
                                        <button @click="btn_hapus(wasit.id)"
                                            v-if="
                                                auth.user.role == 'Super Admin' || auth.user.role == 'Admin Asprov'
                                            "
                                            class="btn btn-circle btn-outline btn-error btn-sm"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="16"
                                                height="16"
                                                fill="currentColor"
                                                class="bi bi-trash3-fill"
                                                viewBox="0 0 16 16"
                                            >
                                                <path
                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="btn-group flex text-right justify-end pt-5">
            <div class="w-[28rem] md:w-full">
                <Link
                    class="btn btn-sm btn-primary bg-base-100 shadow btn-outline"
                    :class="{ 'btn-active': wasit.active }"
                    v-for="(wasit, index) in master.wasit.links"
                    :key="index"
                    :href="
                        wasit.url
                    "
                    v-html="wasit.label"
                ></Link>
            </div>
        </div>
    </div>
    <div class="pb-20"></div>
</template>
<script>
import moment from "moment";
import layout from "../superadmin/layout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import axios from 'axios';
export default {
    layout: layout,
    props: {
        auth: Object,
        session: Object,
        master: Object,
    },
    setup(props) {
        const batch = useForm({
            id_wasit: null,
        });

        return {
            moment,
            batch,
        };
    },
    data(){
        return{
            batchDownload:[],
            checkAll: false,
        }
    },
    methods: {
        // checkAllCheckbox(){
        //     if(this.checkAll){
        //         this.batchDownload = [];
        //         this.master.wasit.data.forEach((wasit) => {
        //             document.getElementById(wasit.id).checked = true;
        //             this.batchDownload.push(wasit.id);
        //         });
        //     }else{
        //         this.master.wasit.data.forEach((wasit) => {
        //             document.getElementById(wasit.id).checked = false;
        //         });
        //         this.batchDownload = [];
        //     }
        //     // console.log(this.batchDownload);
        // },
        // btnBatchDownload(){
        //     this.batch.id_wasit = this.batchDownload;
        //     this.batch.post(route('wasit.batch.download'), {
        //         onSuccess: (response) => {
        //             var a = document.getElementById('linkDownload');
        //             a.href = '/' + response.props.session.download;
        //             a.click();
        //         },
        //         preserveScroll: true,
        //     });
        // },
        btn_hapus(id){
            if(confirm("Hapus data wasit ini?")){
                axios.delete(route('wasit.destroy', id))
                .then((response) => alert(response.data.msg));
            }
            location.reload();
        }
    },
};
</script>
<style lang=""></style>
