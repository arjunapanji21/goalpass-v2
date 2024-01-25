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
                    <li><Link :href="route('wasit.index')">Wasit</Link></li>
                    <li>Input Data Wasit</li>
                </ul>
            </div>
            <div class="flex flex-col lg:flex-row gap-2">
                <div class="card card-compact w-full lg:w-1/2 bg-base-100">
                    <div class="card-body">
                        <div class="card-title">
                            <span>Input Data Wasit</span>
                        </div>
                        <div class="">
                            <div
                                class="p-3 mx-auto bg-base-100 rounded-box shadow lg:w-72"
                            >
                                <img
                                    id="fotoProfile"
                                    src="/images/no-profile.webp"
                                    alt="Foto Anggota"
                                    class="rounded-box"
                                />
                            </div>
                            <div class="divider"></div>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="form-control w-full">
                                    <label class="label gap-2 justify-start">
                                        <span class="label-text">Foto Wasit</span>
                                        <span class="label-text-alt text-error"
                                            >*</span
                                        >
                                    </label>
                                    <input
                                        accept=".jpg"
                                        id="foto"
                                        type="file"
                                        class="file-input file-input-sm file-input-bordered file-input-accent w-full"
                                        @change="cek_file_size()"
                                    />
                                    <label class="label">
                                        <span
                                            class="label-text-alt text-error italic"
                                            >*Ukuran maksimal 2MB</span
                                        >
                                    </label>
                                </div>
                                <div class="form-control w-full">
                                    <label class="label gap-2 justify-start">
                                        <span class="label-text"
                                            >Scan Kartu Keluarga</span
                                        >
                                    </label>
                                    <input
                                        id="input_kk"
                                        accept=".pdf"
                                        type="file"
                                        class="file-input file-input-sm file-input-bordered file-input-accent w-full"
                                        @change="input_kk()"
                                    />
                                    <label class="label">
                                        <span
                                            class="label-text-alt text-error italic"
                                            >*Ukuran maksimal 2MB</span
                                        >
                                    </label>
                                </div>
                                <div class="form-control w-full">
                                    <label class="label gap-2 justify-start">
                                        <span class="label-text"
                                            >Scan KTP</span
                                        >
                                    </label>
                                    <input
                                        accept=".pdf"
                                        id="input_ktp"
                                        type="file"
                                        class="file-input file-input-sm file-input-bordered file-input-accent w-full"
                                        @change="input_ktp()"
                                    />
                                    <label class="label">
                                        <span
                                            class="label-text-alt text-error italic"
                                            >*Ukuran maksimal 2MB</span
                                        >
                                    </label>
                                </div>
                                <div class="form-control w-full">
                                    <label class="label gap-2 justify-start">
                                        <span class="label-text"
                                            >Scan Sertifikat Wasit</span
                                        >
                                    </label>
                                    <input
                                        accept=".pdf"
                                        id="input_sertifikat"
                                        type="file"
                                        class="file-input file-input-sm file-input-bordered file-input-accent w-full"
                                        @change="input_sertifikat()"
                                    />
                                    <label class="label">
                                        <span
                                            class="label-text-alt text-error italic"
                                            >*Ukuran maksimal 2MB</span
                                        >
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-compact w-full lg:w-1/2 bg-base-100">
                    <div class="card-body">
                        <div class="">
                            <div class="form-control w-full">
                                <label class="label gap-2 justify-start">
                                    <span class="label-text">Nama Wasit</span>
                                    <span class="label-text-alt text-error"
                                        >*</span
                                    >
                                </label>
                                <input
                                    type="text"
                                    placeholder="Nama Wasit"
                                    class="input input-bordered w-full"
                                    v-model="form.nama"
                                />
                                <label class="label">
                                    <span
                                        class="label-text-alt text-error italic"
                                        >*Nama wasit wajib di isi</span
                                    >
                                </label>
                            </div>
                            <div class="form-control w-full">
                                <label class="label gap-2 justify-start">
                                    <span class="label-text">NIK</span>
                                    <span class="label-text-alt text-error"
                                        >*</span
                                    >
                                </label>
                                <input
                                    type="number"
                                    placeholder="Nomor Induk Kependudukan"
                                    class="input input-bordered w-full"
                                    v-model="form.nik"
                                />
                                <label class="label">
                                    <span
                                        class="label-text-alt text-error italic"
                                        >*NIK wasit wajib di isi</span
                                    >
                                </label>
                            </div>
                            <div class="form-control w-full">
                                <label class="label gap-2 justify-start">
                                    <span class="label-text">Tgl. Lahir</span>
                                    <span class="label-text-alt text-error"
                                        >*</span
                                    >
                                </label>
                                <input
                                    type="date"
                                    class="input input-bordered w-full"
                                    v-model="form.tgl_lahir"
                                />
                                <label class="label">
                                    <span
                                        class="label-text-alt text-error italic"
                                        >*Tanggal lahir wasit wajib di
                                        isi</span
                                    >
                                </label>
                            </div>
                            <div class="form-control w-full">
                                <label class="label gap-2 justify-start">
                                    <span class="label-text">Gender</span>
                                    <span class="label-text-alt text-error"
                                        >*</span
                                    >
                                </label>
                                <select
                                    class="select select-bordered w-full"
                                    v-model="form.kd_gender"
                                >
                                    <option disabled :value="null" selected>
                                        Gender:
                                    </option>
                                    <option value="01">Laki-laki</option>
                                    <option value="02">Perempuan</option>
                                </select>
                                <label class="label">
                                    <span
                                        class="label-text-alt text-error italic"
                                        >*Pilih gender wasit</span
                                    >
                                </label>
                            </div>
                            <div class="form-control w-full">
                                <label class="label gap-2 justify-start">
                                    <span class="label-text"
                                        >Kota/Kabupaten</span
                                    >
                                    <span class="label-text-alt text-error"
                                        >*</span
                                    >
                                </label>
                                <select
                                    class="select select-bordered w-full"
                                    v-model="form.kota_kab"
                                >
                                    <option disabled :value="null" selected>
                                    Pilih Kota/Kabupaten:
                                    </option>
                                    <template
                                        v-for="(kota, index) in master.kota"
                                        :key="index"
                                    >
                                        <option :value="kota.id">
                                            {{ kota.kd_kota }} - {{ kota.nama }}
                                        </option>
                                    </template>
                                </select>
                                <label class="label">
                                    <span
                                        class="label-text-alt text-error italic"
                                        >*Pilih Kota/Kabupaten</span
                                    >
                                </label>
                            </div>
                            <div class="form-control w-full">
                                <label class="label gap-2 justify-start">
                                    <span class="label-text"
                                        >Lisensi Wasit</span
                                    >
                                    <span class="label-text-alt text-error"
                                        >*</span
                                    >
                                </label>
                                <select
                                    class="select select-bordered w-full"
                                    v-model="form.license"
                                >
                                    <option disabled :value="null" selected>
                                        Lisensi Wasit:
                                    </option>
                                    <option value="unlicensed">unlicensed</option>
                                    <option value="C2">C2</option>
                                    <option value="C1">C1</option>
                                </select>
                                <label class="label">
                                    <span
                                        class="label-text-alt text-error italic"
                                        >*Pilih lisensi wasit</span
                                    >
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-actions justify-end p-2">
                <button @click="btn_submit()" class="btn btn-primary">
                    Simpan
                </button>
                <Link :href="route('anggota-baru.index')" class="btn btn-ghost"
                    >Batal</Link
                >
            </div>
        </div>
    </div>
</template>
<script>
import { useForm } from "@inertiajs/inertia-vue3";
import layout from "../superadmin/layout.vue";
import axios from "axios";
export default {
    layout: layout,
    props: {
        auth: Object,
        master: Object,
    },
    setup(props) {
        const form = useForm({
            nama: null,
            tgl_lahir: null,
            kd_gender: null,
            nik: null,
            kota_kab: null,
            foto: null,
            KK: null,
            KTP: null,
            sertifikat: null,
            license: "unlicensed"
        });
        return { form };
    },
    methods: {
        btn_submit() {
            this.form.post(route("wasit.store"), {
                onSuccess: () => {
                    alert("Berhasil menambahkan data wasit!");
                },
            });
        },
        cek_file_size() {
            const uploadFoto = document.getElementById("foto");
            if (uploadFoto.files[0].size > 2097152) {
                alert("Ukuran file lebih dari 2MB");
                uploadFoto.value = "";
            } else {
                this.form.foto = uploadFoto.files[0];
                var reader = new FileReader();
                var imgtag = document.getElementById("fotoProfile");
                imgtag.title = uploadFoto.files[0].name;
                reader.onload = function (event) {
                    imgtag.src = event.target.result;
                };

                reader.readAsDataURL(uploadFoto.files[0]);
            }
        },
        input_kk() {
            const uploadFile = document.getElementById("input_kk");
            if (uploadFile.files[0].size > 2097152) {
                alert("Ukuran file lebih dari 2MB");
                uploadFile.value = "";
            } else {
                this.form.KK = uploadFile.files[0];
            }
        },
        input_ktp() {
            const uploadFile = document.getElementById("input_ktp");
            if (uploadFile.files[0].size > 2097152) {
                alert("Ukuran file lebih dari 2MB");
                uploadFile.value = "";
            } else {
                this.form.KTP = uploadFile.files[0];
            }
        },
        input_sertifikat() {
            const uploadFile = document.getElementById("input_sertifikat");
            if (uploadFile.files[0].size > 2097152) {
                alert("Ukuran file lebih dari 2MB");
                uploadFile.value = "";
            } else {
                this.form.sertifikat = uploadFile.files[0];
            }
        },
    },
};
</script>
<style lang=""></style>
