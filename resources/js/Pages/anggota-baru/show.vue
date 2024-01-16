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
            <div class="w-full">
                <div class="card card-compact w-full bg-base-100">
                    <div class="card-body">
                        <div class="card-title">
                            <span>Data Anggota Baru</span>
                        </div>
                        <div class="">
                            <div class="flex flex-col lg:flex-row gap-4">
                                <div class="bg-base-100 rounded-box lg:w-72">
                                    <img
                                        id="fotoProfile"
                                        :src="
                                            '/uploads/anggota_baru/' +
                                            master.data.nama +
                                            '/' +
                                            master.data.foto
                                        "
                                        alt="Foto Anggota"
                                        class="rounded-box"
                                    />
                                </div>
                                <div class="w-full">
                                    <div class="overflow-auto">
                                        <table class="table table-xs">
                                            <tr>
                                                <th>Nama</th>
                                                <td>
                                                    <input
                                                        type="text"
                                                        class="input input-sm input-bordered w-full"
                                                        :value="
                                                            master.data.nama
                                                        "
                                                        disabled
                                                    />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>NIK</th>
                                                <td>
                                                    <input
                                                        type="text"
                                                        class="input input-sm input-bordered w-full"
                                                        :value="master.data.nik"
                                                        disabled
                                                    />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Tgl. Lahir</th>
                                                <td>
                                                    <input
                                                        type="text"
                                                        class="input input-sm input-bordered w-full"
                                                        :value="
                                                            master.data
                                                                .tgl_lahir
                                                        "
                                                        disabled
                                                    />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Gender</th>
                                                <td>
                                                    <input
                                                        v-if="
                                                            master.data
                                                                .kd_gender ==
                                                            '01'
                                                        "
                                                        type="text"
                                                        class="input input-sm input-bordered w-full"
                                                        value="Laki-laki"
                                                        disabled
                                                    />
                                                    <input
                                                        v-if="
                                                            master.data
                                                                .kd_gender ==
                                                            '02'
                                                        "
                                                        type="text"
                                                        class="input input-sm input-bordered w-full"
                                                        value="Perempuan"
                                                        disabled
                                                    />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Kota/Kabupaten</th>
                                                <td>
                                                    <input
                                                        type="text"
                                                        class="input input-sm input-bordered w-full"
                                                        :value="
                                                            master.data.kota_kab
                                                        "
                                                        disabled
                                                    />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Klub</th>
                                                <td>
                                                    <input
                                                        type="text"
                                                        class="input input-sm input-bordered w-full"
                                                        :value="
                                                            master.data.klub
                                                        "
                                                        disabled
                                                    />
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Kategori Usia</th>
                                                <td>
                                                    <input
                                                        type="text"
                                                        class="input input-sm input-bordered w-full"
                                                        :value="
                                                            master.data.umur
                                                        "
                                                        disabled
                                                    />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="divider">Dokumen Pendukung</div>
                            <div class="grid grid-cols-2 gap-2">
                                <label class="form-control w-full">
                                    <div class="label justify-start gap-1">
                                        <span class="label-text"
                                            >Akta Kelahiran</span
                                        >
                                        <span class="label-text-alt text-error"
                                            >*</span
                                        >
                                    </div>
                                    <div class="join">
                                        <input
                                            type="text"
                                            :value="master.data.akta_lahir"
                                            class="join-item input input-bordered w-full input-sm"
                                            disabled
                                        />
                                        <a
                                            :href="
                                                '/uploads/anggota_baru/' +
                                                master.data.nama +
                                                '/' +
                                                master.data.akta_lahir
                                            "
                                            target="_blank"
                                            class="join-item btn btn-info hover:btn-primary btn-sm"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                height="16"
                                                width="18"
                                                viewBox="0 0 576 512"
                                                class="w-4 h-4"
                                                fill="currentColor"
                                            >
                                                <path
                                                    d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"
                                                />
                                            </svg>
                                        </a>
                                    </div>
                                </label>
                                <label class="form-control w-full">
                                    <div class="label justify-start gap-1">
                                        <span class="label-text"
                                            >Kartu Keluarga</span
                                        >
                                        <span class="label-text-alt text-error"
                                            >*</span
                                        >
                                    </div>
                                    <div class="join">
                                        <input
                                            type="text"
                                            :value="master.data.KK"
                                            class="join-item input input-bordered w-full input-sm"
                                            disabled
                                        />
                                        <a
                                            :href="
                                                '/uploads/anggota_baru/' +
                                                master.data.nama +
                                                '/' +
                                                master.data.KK
                                            "
                                            target="_blank"
                                            class="join-item btn btn-info hover:btn-primary btn-sm"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                height="16"
                                                width="18"
                                                viewBox="0 0 576 512"
                                                class="w-4 h-4"
                                                fill="currentColor"
                                            >
                                                <path
                                                    d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"
                                                />
                                            </svg>
                                        </a>
                                    </div>
                                </label>
                                <label class="form-control w-full">
                                    <div class="label justify-start gap-1">
                                        <span class="label-text">KIA/KTP</span>
                                        <span class="label-text-alt text-error"
                                            >*</span
                                        >
                                    </div>
                                    <div class="join">
                                        <input
                                            type="text"
                                            :value="master.data.KTP"
                                            class="join-item input input-bordered w-full input-sm"
                                            disabled
                                        />
                                        <a
                                            :href="
                                                '/uploads/anggota_baru/' +
                                                master.data.nama +
                                                '/' +
                                                master.data.KTP
                                            "
                                            target="_blank"
                                            class="join-item btn btn-info hover:btn-primary btn-sm"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                height="16"
                                                width="18"
                                                viewBox="0 0 576 512"
                                                class="w-4 h-4"
                                                fill="currentColor"
                                            >
                                                <path
                                                    d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"
                                                />
                                            </svg>
                                        </a>
                                    </div>
                                </label>
                                <label class="form-control w-full">
                                    <div class="label justify-start gap-1">
                                        <span class="label-text">Pasfoto</span>
                                        <span class="label-text-alt text-error"
                                            >*</span
                                        >
                                    </div>
                                    <div class="join">
                                        <input
                                            type="text"
                                            :value="master.data.pasfoto"
                                            class="join-item input input-bordered w-full input-sm"
                                            disabled
                                        />
                                        <a
                                            :href="
                                                '/uploads/anggota_baru/' +
                                                master.data.nama +
                                                '/' +
                                                master.data.pasfoto
                                            "
                                            target="_blank"
                                            class="join-item btn btn-info hover:btn-primary btn-sm"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                height="16"
                                                width="18"
                                                viewBox="0 0 576 512"
                                                class="w-4 h-4"
                                                fill="currentColor"
                                            >
                                                <path
                                                    d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"
                                                />
                                            </svg>
                                        </a>
                                    </div>
                                </label>
                                <label class="form-control w-full">
                                    <div class="label justify-start gap-1">
                                        <span class="label-text"
                                            >Kartu Pelahar/KTM</span
                                        >
                                        <span class="label-text-alt text-error"
                                            >*</span
                                        >
                                    </div>
                                    <div class="join">
                                        <input
                                            type="text"
                                            :value="master.data.KTM"
                                            class="join-item input input-bordered w-full input-sm"
                                            disabled
                                        />
                                        <a
                                            :href="
                                                '/uploads/anggota_baru/' +
                                                master.data.nama +
                                                '/' +
                                                master.data.KTM
                                            "
                                            target="_blank"
                                            class="join-item btn btn-info hover:btn-primary btn-sm"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                height="16"
                                                width="18"
                                                viewBox="0 0 576 512"
                                                class="w-4 h-4"
                                                fill="currentColor"
                                            >
                                                <path
                                                    d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"
                                                />
                                            </svg>
                                        </a>
                                    </div>
                                </label>
                                <label class="form-control w-full">
                                    <div class="label justify-start gap-1">
                                        <span class="label-text"
                                            >Ijazah Terakhir</span
                                        >
                                        <span class="label-text-alt text-error"
                                            >*</span
                                        >
                                    </div>
                                    <div class="join">
                                        <input
                                            type="text"
                                            :value="master.data.ijazah"
                                            class="join-item input input-bordered w-full input-sm"
                                            disabled
                                        />
                                        <a
                                            :href="
                                                '/uploads/anggota_baru/' +
                                                master.data.nama +
                                                '/' +
                                                master.data.ijazah
                                            "
                                            target="_blank"
                                            class="join-item btn btn-info hover:btn-primary btn-sm"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                height="16"
                                                width="18"
                                                viewBox="0 0 576 512"
                                                class="w-4 h-4"
                                                fill="currentColor"
                                            >
                                                <path
                                                    d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"
                                                />
                                            </svg>
                                        </a>
                                    </div>
                                </label>
                            </div>
                            <div class="divider">Status Pengajuan</div>
                            <label
                                class="form-control w-full"
                                v-if="
                                    (auth.user.role == 'Super Admin' &&
                                        master.data.status != 'Accepted') ||
                                    (auth.user.role == 'Admin Asprov' &&
                                        master.data.status != 'Accepted')
                                "
                            >
                                <select
                                    v-model="form.status"
                                    class="select select-bordered w-full"
                                >
                                    <option value="Pending">Pending</option>
                                    <option value="Accepted">Accepted</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </label>
                            <div
                                v-if="
                                    auth.user.role == 'Admin Askot/Askab' ||
                                    master.data.status == 'Accepted'
                                "
                                class="flex justify-center items-center w-full"
                            >
                                <span
                                    class="badge badge-lg font-bold"
                                    :class="{
                                        'badge-warning':
                                            master.data.status == 'Pending',
                                        'badge-success':
                                            master.data.status == 'Accepted',
                                        'badge-error':
                                            master.data.status == 'Rejected',
                                    }"
                                >
                                    {{ master.data.status }}
                                </span>
                            </div>
                            <label
                                class="form-control"
                                v-if="form.status == 'Rejected'"
                            >
                                <div class="label justify-start gap-1">
                                    <span class="label-text"
                                        >Alasan Ditolak</span
                                    >
                                    <span class="label-text-alt text-error"
                                        >*</span
                                    >
                                </div>
                                <textarea
                                    v-if="master.data.status == 'Rejected'"
                                    readonly
                                    class="textarea textarea-bordered h-24 w-full"
                                    >{{ master.data.reject_msg }}</textarea
                                >
                                <textarea
                                    v-else
                                    class="textarea textarea-bordered h-24 w-full"
                                    placeholder="Ditolak ..."
                                    v-model="form.reject_msg"
                                    >{{ master.data.reject_msg }}</textarea
                                >
                            </label>
                        </div>
                        <div class="card-actions justify-end p-2">
                            <button
                                @click="btn_submit()"
                                class="btn btn-primary"
                                v-if="
                                    (auth.user.role == 'Super Admin' &&
                                        master.data.status != 'Accepted') ||
                                    (auth.user.role == 'Admin Asprov' &&
                                        master.data.status != 'Accepted')
                                "
                            >
                                Simpan
                            </button>
                            <Link
                                :href="route('anggota-baru.index')"
                                class="btn"
                                >Kembali</Link
                            >
                        </div>
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
export default {
    layout: layout,
    props: {
        auth: Object,
        master: Object,
    },
    setup(props) {
        const form = useForm({
            status: props.master.data.status,
            reject_msg: null,
        });
        return { form };
    },
    methods: {
        btn_submit() {
            this.form.put(route("anggota-baru.update", this.master.data), {
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
