<template lang="">
    <div class="p-4">
        <div class="card card-compact bg-base-100">
            <div class="card-body">
                <div class="text-2xl flex gap-2 font-semibold text-center">
                    <span>Tambah Data Klub</span>
                </div>
                <div class="form-control w-full">
                    <label class="label gap-2 justify-start">
                        <span class="label-text">Nama Klub</span>
                        <span class="label-text-alt text-error">*</span>
                    </label>
                    <input
                        type="text"
                        placeholder="Nama Klub"
                        class="input input-bordered w-full"
                        v-model="form.nama"
                    />
                    <label class="label">
                        <span class="label-text-alt text-error italic"
                            >*Nama klub wajib di isi.</span
                        >
                    </label>
                </div>
                <div class="form-control w-full">
                    <label class="label gap-2 justify-start">
                        <span class="label-text">Kota/Kabupaten</span>
                        <span class="label-text-alt text-error">*</span>
                    </label>
                    <select
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
                            >*Pilih Kota/Kabupaten.</span
                        >
                    </label>
                </div>
                <div class="card-actions justify-end">
                    <button @click="btn_submit()" class="btn btn-primary">
                        Simpan
                    </button>
                    <Link :href="route('klub.index')" class="btn">Batal</Link>
                </div>
            </div>
        </div>
        <!-- <template v-if="auth.user.role == 'Super Admin'">
            <div class="divider">Atau</div>
            <div class="card card-compact bg-base-100">
                <div class="card-body">
                    <div class="card-title">Import Data Klub</div>
                    <div class="form-control w-full">
                        <label class="label gap-2 justify-start">
                            <span class="label-text">Upload File:</span>
                            <span class="label-text-alt text-error">*</span>
                        </label>
                        <input
                            accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                            id="file"
                            type="file"
                            class="file-input file-input-bordered w-full"
                        />
                        <label class="label">
                            <a
                                download
                                href="/template_import/template_klub.xlsx"
                                class="label-text-alt text-error hover:text-primary font-semibold italic"
                                >Download template</a
                            >
                        </label>
                    </div>
                    <div class="card-actions">
                        <button
                            @click="btn_upload()"
                            class="btn btn-primary btn-block"
                        >
                            Upload
                        </button>
                    </div>
                </div>
            </div>
        </template> -->
    </div>
</template>
<script>
import { useForm } from "@inertiajs/inertia-vue3";
import layout from "./layout.vue";
export default {
    layout: layout,
    props: {
        auth: Object,
        master: Object,
    },
    setup(props) {
        const form = useForm({
            nama: null,
            kota_id: null,
            file: null,
        });
        return { form };
    },
    methods: {
        btn_submit() {
            this.form.post(route("klub.store"), {
                // onSuccess: () => {
                //     alert("Login Success!");
                // },
                preserveScroll: true,
            });
        },
        btn_upload() {
            this.form.file = document.getElementById("file").files[0];
            this.form.post(route("klub.import"), {
                // onSuccess: () => {
                //     alert("Login Success!");
                // },
                preserveScroll: true,
            });
        },
    },
};
</script>
<style lang=""></style>
