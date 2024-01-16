<template lang="">
    <div class="card card-compact">
        <div class="card-body">
            <div class="breadcrumbs p-2 font-semibold">
                <ul>
                    <li>
                        <Link :href="route('beranda')">{{
                            auth.user.role
                        }}</Link>
                    </li>
                    <li><Link :href="route('anggota.index')">Anggota</Link></li>
                    <li>Mutasi</li>
                </ul>
            </div>
            <div class="card w-full bg-base-100">
                <div class="card-body">
                    <div class="card-title">
                        <span>Mutasi Baru</span>
                    </div>
                    <div>
                        <div
                            class="flex flex-col lg:flex-row gap-3 items-center justify-center"
                        >
                            <div>
                                <img
                                    :src="
                                        '/foto_anggota/' +
                                        master.anggota.foto.replace(/’/g, '__')
                                    "
                                    alt=""
                                    width="150"
                                    class="bg-base-100 rounded-box shadow"
                                />
                            </div>
                            <div>
                                <table class="table">
                                    <tr class="border-b">
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{ master.anggota.nama }}</td>
                                    </tr>
                                    <tr class="border-b">
                                        <td>Tgl. Lahir</td>
                                        <td>:</td>
                                        <td>
                                            {{
                                                moment(
                                                    master.anggota.tgl_lahir
                                                ).format("DD MMMM YYYY")
                                            }}
                                        </td>
                                    </tr>
                                    <tr class="border-b">
                                        <td>No. Anggota</td>
                                        <td>:</td>
                                        <td>{{ master.anggota.kd_kartu }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="grid lg:grid-cols-3 gap-2">
                        <div>
                            <div>
                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text"
                                            >Kota Asal</span
                                        >
                                    </div>
                                    <input
                                        readonly
                                        v-model="form.kota_asal"
                                        type="text"
                                        class="input input-bordered w-full input-disabled"
                                    />
                                </label>
                            </div>
                            <div>
                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text"
                                            >Klub Asal</span
                                        >
                                    </div>
                                    <input
                                        readonly
                                        type="text"
                                        v-model="form.klub_asal"
                                        class="input input-bordered w-full input-disabled"
                                    />
                                </label>
                            </div>
                        </div>
                        <div
                            class="hidden lg:flex items-center justify-center text-primary animate-pulse"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                height="16"
                                width="16"
                                viewBox="0 0 512 512"
                                class="w-12 h-12"
                                fill="currentColor"
                            >
                                <path
                                    d="M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z"
                                />
                            </svg>
                        </div>
                        <div>
                            <div>
                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text"
                                            >Kota/Kabupaten Tujuan</span
                                        >
                                    </div>
                                    <select
                                        @change="get_klub_by_location()"
                                        class="select select-bordered"
                                        v-model="form.kota_tujuan"
                                    >
                                        <option disabled :value="null" selected>
                                            Pilih Kota Tujuan
                                        </option>
                                        <template
                                            v-for="(kota, index) in master.kota"
                                            :key="index"
                                        >
                                            <option :value="kota.id">
                                                {{ kota.kd_kota }} -
                                                {{ kota.nama }}
                                            </option>
                                        </template>
                                    </select>
                                </label>
                            </div>
                            <div>
                                <label class="form-control w-full">
                                    <div class="label">
                                        <span class="label-text"
                                            >Klub Tujuan</span
                                        >
                                    </div>
                                    <select
                                        v-model="form.klub_tujuan"
                                        class="select select-bordered"
                                    >
                                        <option disabled :value="null" selected>
                                            Pilih Klub Tujuan
                                        </option>
                                        <template
                                            v-for="(klub, index) in master.klub"
                                            :key="index"
                                        >
                                            <option :value="klub.nama">
                                                {{ klub.nama }}
                                            </option>
                                        </template>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card-actions justify-end p-2">
                        <button @click="btn_submit()" class="btn btn-primary">
                            Simpan
                        </button>
                        <Link
                            :href="route('anggota.index')"
                            class="btn btn-ghost"
                            >Batal
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { useForm } from "@inertiajs/inertia-vue3";
import layout from "../superadmin/layout.vue";
import axios from "axios";
import moment from "moment";
export default {
    layout: layout,
    props: {
        auth: Object,
        master: Object,
    },
    setup(props) {
        const form = useForm({
            anggota_id: props.master.anggota.id,
            kota_asal: props.master.anggota.kota_kab,
            klub_asal: props.master.anggota.klub,
            kota_tujuan: null,
            klub_tujuan: null,
        });
        return { form, moment };
    },
    methods: {
        btn_submit() {
            this.form.post(route("mutasi.store", this.form.anggota_id), {
                onSuccess: () => {
                    alert("Permintaan Mutasi Anggota Berhasil Dibuat.");
                },
                preserveScroll: true,
            });
        },
        get_klub_by_location() {
            axios
                .get(route("get.klub", this.form.kota_tujuan))
                .then((response) => (this.master.klub = response.data));
        },
    },
};
</script>
<style lang=""></style>
