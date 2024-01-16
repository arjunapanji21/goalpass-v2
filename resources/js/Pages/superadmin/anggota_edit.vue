<template lang="">
    <div class="p-4">
        <div class="card card-compact bg-base-100">
            <div class="card-body">
                <div class="text-2xl flex gap-2 font-semibold text-center">
                    <span>Ubah Data Anggota</span>
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
                            @change="generate_kode_kartu()"
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
                            @change="generate_kode_kartu()"
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
                        <select
                            @change="get_klub_by_location()"
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
                            <span class="label-text">No. Urut Kota</span>
                            <span class="label-text-alt text-error">*</span>
                        </label>
                        <input
                            @change="generate_kode_kartu()"
                            type="number"
                            class="input input-bordered w-full"
                            v-model="form.kd_urutkota"
                        />
                        <label class="label">
                            <span class="label-text-alt text-error italic"
                                >*Input nomor urut kota</span
                            >
                        </label>
                    </div>
                    <div class="form-control w-full">
                        <label class="label gap-2 justify-start">
                            <span class="label-text">Kode Kartu</span>
                            <span class="label-text-alt text-error">*</span>
                        </label>
                        <input
                            disabled
                            type="number"
                            class="input input-bordered w-full font-bold"
                            v-model="form.kd_kartu"
                        />
                        <label class="label">
                            <span class="label-text-alt text-error italic"
                                >*Kode Kartu di Generate oleh Sistem</span
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
                    <Link :href="route('anggota.index')" class="btn"
                        >Batal</Link
                    >
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { useForm } from "@inertiajs/inertia-vue3";
import layout from "./layout.vue";
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
            nama: props.master.data.nama,
            tgl_lahir: props.master.data.tgl_lahir,
            kd_gender: props.master.data.kd_gender,
            nik: props.master.data.nik,
            kota_id: props.master.data.kd_kota,
            kd_urutkota: props.master.data.kd_urutkota,
            kd_kartu: props.master.data.kd_kartu,
            klub: props.master.data.klub,
            umur: props.master.data.umur,
            foto: props.master.data.foto,
            file: null,
        });
        return { moment, form };
    },
    methods: {
        btn_submit() {
            this.form.post(route("anggota.update_data", this.master.data.id), {
                onSuccess: () => {
                    alert("Data Anggota Berhasil di Update!");
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
        get_klub_by_location() {
            axios
                .get(route("get.klub", this.form.kota_id))
                .then((response) => (this.master.klub = response.data));
            this.generate_kode_kartu();
        },
        generate_kode_kartu() {
            var kd_kota = this.form.kota_id;
            var kd_gender = this.form.kd_gender;
            var kd_urutkota = this.form.kd_urutkota;
            var tgl_lahir = moment(this.form.tgl_lahir).format("DDMMYYYY");

            if (kd_kota < 10) {
                kd_kota = "0" + kd_kota;
            }

            if (kd_urutkota < 10) {
                kd_urutkota = "000" + kd_urutkota;
            } else if (kd_urutkota < 100) {
                kd_urutkota = "00" + kd_urutkota;
            } else if (kd_urutkota < 1000) {
                kd_urutkota = "0" + kd_urutkota;
            }

            this.form.kd_kartu = kd_kota + kd_gender + kd_urutkota + tgl_lahir;
        },
    },
};
</script>
<style lang=""></style>
