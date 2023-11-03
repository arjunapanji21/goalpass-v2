<template lang="">
    <div class="p-4">
        <div class="card card-compact bg-base-100">
            <div class="card-body">
                <div class="text-2xl flex gap-2 font-semibold text-center">
                    <span>Tambah Data Anggota</span>
                </div>
                <div class="grid lg:grid-cols-2 gap-2">
                    <div class="form-control w-full">
                        <label class="label gap-2 justify-start">
                            <span class="label-text">Nama Pemain</span>
                            <span class="label-text-alt text-error">*</span>
                        </label>
                        <input
                            type="text"
                            placeholder="Nama Pemain"
                            class="input input-bordered w-full"
                            v-model="form.nama"
                        />
                        <label class="label">
                            <span class="label-text-alt text-error italic"
                                >*Nama pemain wajib di isi</span
                            >
                        </label>
                    </div>
                    <div class="form-control w-full">
                        <label class="label gap-2 justify-start">
                            <span class="label-text">NIK</span>
                            <span class="label-text-alt text-error">*</span>
                        </label>
                        <input
                            type="number"
                            placeholder="Nomor Induk Kependudukan"
                            class="input input-bordered w-full"
                            v-model="form.nik"
                        />
                        <label class="label">
                            <span class="label-text-alt text-error italic"
                                >*NIK pemain wajib di isi</span
                            >
                        </label>
                    </div>
                    <div class="form-control w-full">
                        <label class="label gap-2 justify-start">
                            <span class="label-text">Tgl. Lahir</span>
                            <span class="label-text-alt text-error">*</span>
                        </label>
                        <input
                            type="date"
                            class="input input-bordered w-full"
                            v-model="form.tgl_lahir"
                        />
                        <label class="label">
                            <span class="label-text-alt text-error italic"
                                >*Tanggal lahir pemain wajib di isi</span
                            >
                        </label>
                    </div>
                    <div class="form-control w-full">
                        <label class="label gap-2 justify-start">
                            <span class="label-text">Gender</span>
                            <span class="label-text-alt text-error">*</span>
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
                            <span class="label-text-alt text-error italic"
                                >*Pilih gender pemain</span
                            >
                        </label>
                    </div>
                    <div class="form-control w-full">
                        <label class="label gap-2 justify-start">
                            <span class="label-text">Kota/Kabupaten</span>
                            <span class="label-text-alt text-error">*</span>
                        </label>
                        <select @change="get_klub_by_location()"
                            class="select select-bordered w-full"
                            v-model="form.kota_id"
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
                            <span class="label-text-alt text-error italic"
                                >*Pilih Kota/Kabupaten</span
                            >
                        </label>
                    </div>
                    <div class="form-control w-full">
                        <label class="label gap-2 justify-start">
                            <span class="label-text">Klub</span>
                            <span class="label-text-alt text-error">*</span>
                        </label>
                        <select
                            class="select select-bordered w-full"
                            v-model="form.klub"
                        >
                            <option disabled :value="null" selected>
                                Pilih Klub:
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
                        <label class="label">
                            <span class="label-text-alt text-error italic"
                                >*Pilih Klub</span
                            >
                        </label>
                    </div>
                    <div class="form-control w-full">
                        <label class="label gap-2 justify-start">
                            <span class="label-text">Kategori Usia</span>
                            <span class="label-text-alt text-error">*</span>
                        </label>
                        <select
                            class="select select-bordered w-full"
                            v-model="form.umur"
                        >
                            <option disabled :value="null" selected>
                                Pilih Kategori Usia:
                            </option>
                            <option value="U-13">U-13</option>
                            <option value="U-15">U-15</option>
                            <option value="U-17">U-17</option>
                            <option value="SENIOR">SENIOR</option>
                        </select>
                        <label class="label">
                            <span class="label-text-alt text-error italic"
                                >*Pilih Kategori Usia</span
                            >
                        </label>
                    </div>
                    <div class="form-control w-full">
                        <label class="label gap-2 justify-start">
                            <span class="label-text">Foto Pemain</span>
                            <span class="label-text-alt text-error">*</span>
                        </label>
                        <input
                            accept=".jpg"
                            id="foto"
                            type="file"
                            class="file-input file-input-bordered w-full"
                            @change="cek_file_size()"
                        />
                        <label class="label">
                            <span class="label-text-alt text-error italic"
                                >*Ukuran maksimal 2MB</span
                            >
                        </label>
                    </div>
                </div>
                <div class="card-actions justify-end">
                    <button @click="btn_submit()" class="btn btn-primary">
                        Simpan
                    </button>
                    <Link :href="route('anggota')" class="btn">Batal</Link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { useForm } from "@inertiajs/inertia-vue3";
import layout from "./layout.vue";
import axios from 'axios';
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
            kota_id: null,
            klub: null,
            umur: null,
            foto: null,
        });
        return { form };
    },
    methods: {
        btn_submit() {
            this.form.post(route("anggota.store"), {
                onSuccess: () => {
                    alert("Berhasil menambahkan anggota baru!");
                },
                preserveScroll: true,
            });
        },
        cek_file_size() {
            const uploadFoto = document.getElementById("foto");
            if (uploadFoto.files[0].size > 2097152) {
                alert("Ukuran file lebih dari 2MB");
                uploadFoto.value = "";
            } else {
                this.form.foto = uploadFoto.files[0];
            }
        },
        get_klub_by_location(){
            axios
            .get(route('get.klub', this.form.kota_id))
            .then((response) => (this.master.klub = response.data));
        }
    },
};
</script>
<style lang=""></style>
