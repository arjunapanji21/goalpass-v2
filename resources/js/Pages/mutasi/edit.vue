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
                    <li>Anggota Baru</li>
                </ul>
            </div>
            <div class="flex flex-col lg:flex-row gap-2">
                <div class="card card-compact w-full lg:w-1/2 bg-base-100">
                    <div class="card-body">
                        <div class="card-title">
                            <span>Data Anggota Baru</span>
                        </div>
                        <div class="">
                            <div
                                class="p-3 mx-auto bg-base-100 rounded-box shadow lg:w-72"
                            >
                                <img
                                    id="fotoProfile"
                                    :src="
                                        '/uploads/anggota_baru/'+master.data.nama +'/'+ master.data.foto
                                    "
                                    alt="Foto Anggota"
                                    class="rounded-box"
                                />
                            </div>
                            <div class="form-control w-full">
                                <label class="label gap-2 justify-start">
                                    <span class="label-text">Foto Pemain</span>
                                    <span class="label-text-alt text-error"
                                        >*</span
                                    >
                                </label>
                                <input
                                    accept=".jpg"
                                    id="foto"
                                    type="file"
                                    class="file-input file-input-bordered file-input-accent w-full"
                                    @change="cek_file_size()"
                                />
                                <label class="label">
                                    <span
                                        class="label-text-alt text-error italic"
                                        >*Ukuran maksimal 2MB</span
                                    >
                                </label>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="form-control w-full">
                                    <label class="label gap-2 justify-start">
                                        <span class="label-text"
                                            >Scan Akta Kelahiran <a :href="'/uploads/anggota_baru/'+master.data.nama+'/'+master.data.akta_lahir" download class="link font-semibold italic text-primary">Download</a></span
                                        >
                                    </label>
                                    <input
                                        id="input_akta_kelahiran"
                                        accept=".pdf"
                                        type="file"
                                        class="file-input file-input-sm file-input-bordered file-input-accent w-full"
                                        @change="input_akta_kelahiran()"
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
                                            >Scan Kartu Keluarga <a :href="'/uploads/anggota_baru/'+master.data.nama+'/'+master.data.KK" download class="link font-semibold italic text-primary">Download</a></span
                                        >
                                    </label>
                                    <input
                                        id="input_kk"
                                        accept=".pdf"
                                        type="file"
                                        class="file-input file-input-sm file-input-bordered file-input-accent w-full"
                                        @change="input_kartu_keluarga()"
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
                                            >Scan KIA/KTP <a :href="'/uploads/anggota_baru/'+master.data.nama+'/'+master.data.KTP" download class="link font-semibold italic text-primary">Download</a></span
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
                                        <span class="label-text">Pas Foto <a :href="'/uploads/anggota_baru/'+master.data.nama+'/'+master.data.pasfoto" download class="link font-semibold italic text-primary">Download</a></span>
                                    </label>
                                    <input
                                        accept=".jpg"
                                        id="input_pasfoto"
                                        type="file"
                                        class="file-input file-input-sm file-input-bordered file-input-accent w-full"
                                        @change="input_pasfoto()"
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
                                            >Scan Kartu Pelajar/KTM<a :href="'/uploads/anggota_baru/'+master.data.nama+'/'+master.data.KTM" download class="link font-semibold italic text-primary">Download</a></span
                                        >
                                    </label>
                                    <input
                                        accept=".pdf"
                                        id="input_ktm"
                                        type="file"
                                        class="file-input file-input-sm file-input-bordered file-input-accent w-full"
                                        @change="input_ktm()"
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
                                            >Scan Ijazah Terakhir <Link :href="'/uploads/anggota_baru/'+master.data.nama+'/'+master.data.ijazah" download class="link font-semibold italic text-primary">Download</Link></span
                                        >
                                    </label>
                                    <input
                                        accept=".pdf"
                                        id="input_ijazah"
                                        type="file"
                                        class="file-input file-input-sm file-input-bordered file-input-accent w-full"
                                        @change="input_ijazah()"
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
                                    <span class="label-text">Nama Pemain</span>
                                    <span class="label-text-alt text-error"
                                        >*</span
                                    >
                                </label>
                                <input 
                                    type="text"
                                    placeholder="Nama Pemain"
                                    class="input input-bordered w-full"
                                    v-model="form.nama"
                                />
                                <label class="label">
                                    <span
                                        class="label-text-alt text-error italic"
                                        >*Nama pemain wajib di isi</span
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
                                        >*NIK pemain wajib di isi</span
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
                                        >*Tanggal lahir pemain wajib di
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
                                    <option :value="null" selected>
                                        Gender:
                                    </option>
                                    <option value="01">Laki-laki</option>
                                    <option value="02">Perempuan</option>
                                </select>
                                <label class="label">
                                    <span
                                        class="label-text-alt text-error italic"
                                        >*Pilih gender pemain</span
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
                                <select disabled
                                    @change="get_klub_by_location()"
                                    class="select select-bordered w-full"
                                    v-model="form.kota_kab"
                                >
                                    <option :value="auth.user.kota_kab" selected>
                                        {{auth.user.kota_kab}}
                                    </option>
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
                                    <span class="label-text">Klub</span>
                                    <span class="label-text-alt text-error"
                                        >*</span
                                    >
                                </label>
                                <select
                                    class="select select-bordered w-full"
                                    v-model="form.klub"
                                >
                                <option disabled :value="null" selected>
                                        Pilih Klub:
                                    </option>
                                    <option value="- FREE AGENT -">
                                        - FREE AGENT -
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
                                    <span
                                        class="label-text-alt text-error italic"
                                        >*Pilih Klub</span
                                    >
                                </label>
                            </div>
                            <div class="form-control w-full">
                                <label class="label gap-2 justify-start">
                                    <span class="label-text"
                                        >Kategori Usia</span
                                    >
                                    <span class="label-text-alt text-error"
                                        >*</span
                                    >
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
                                    <span
                                        class="label-text-alt text-error italic"
                                        >*Pilih Kategori Usia</span
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
                <Link :href="route('anggota.index')" class="btn btn-ghost"
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
            nama: props.master.data.nama,
            tgl_lahir: props.master.data.tgl_lahir,
            kd_gender: props.master.data.kd_gender,
            nik: props.master.data.nik,
            kota_kab: props.auth.user.kota_kab,
            klub: props.master.data.klub,
            umur: props.master.data.umur,
            foto: props.master.data.foto,
            akta_lahir: props.master.data.akta_lahir,
            KK: props.master.data.KK,
            KTP: props.master.data.KTP,
            pasfoto: props.master.data.pasfoto,
            KTM: props.master.data.KTM,
            ijazah: props.master.data.ijazah,
        });
        return { form };
    },
    methods: {
        btn_submit() {
            this.form.post(route("anggota-baru.store"), {
                onSuccess: () => {
                    alert("Berhasil menambahkan anggota baru!");
                },
                preserveScroll: true,
            });
        },
        btn_upload() {
            this.form.file = document.getElementById("file").files[0];
            this.form.post(route("anggota.import"), {
                // onSuccess: () => {
                //     alert("Login Success!");
                // },
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
                var reader = new FileReader();
                var imgtag = document.getElementById("fotoProfile");
                imgtag.title = uploadFoto.files[0].name;
                reader.onload = function (event) {
                    imgtag.src = event.target.result;
                };

                reader.readAsDataURL(uploadFoto.files[0]);
            }
        },
        input_akta_kelahiran() {
            const uploadFile = document.getElementById("input_akta_kelahiran");
            if (uploadFile.files[0].size > 2097152) {
                alert("Ukuran file lebih dari 2MB");
                uploadFile.value = "";
            } else {
                this.form.akta_lahir = uploadFile.files[0];
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
        input_pasfoto() {
            const uploadFile = document.getElementById("input_pasfoto");
            if (uploadFile.files[0].size > 2097152) {
                alert("Ukuran file lebih dari 2MB");
                uploadFile.value = "";
            } else {
                this.form.pasfoto = uploadFile.files[0];
            }
        },
        input_ktm() {
            const uploadFile = document.getElementById("input_ktm");
            if (uploadFile.files[0].size > 2097152) {
                alert("Ukuran file lebih dari 2MB");
                uploadFile.value = "";
            } else {
                this.form.KTM = uploadFile.files[0];
            }
        },
        input_ijazah() {
            const uploadFile = document.getElementById("input_ijazah");
            if (uploadFile.files[0].size > 2097152) {
                alert("Ukuran file lebih dari 2MB");
                uploadFile.value = "";
            } else {
                this.form.ijazah = uploadFile.files[0];
            }
        },
        get_klub_by_location() {
            axios
                .get(route("get.klub", props.auth.user.kota_kab))
                .then((response) => (this.master.klub = response.data));
        },
    },
};
</script>
<style lang=""></style>
