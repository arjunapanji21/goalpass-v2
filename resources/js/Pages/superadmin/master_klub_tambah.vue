<template lang="">
    <div class="p-4">
        <div class="card card-compact bg-base-100">
            <div class="card-body">
                <div class="text-2xl flex gap-2 font-semibold text-center">
                    <span>Tambah Data Klub</span>
                </div>
                <div class="form-control w-full ">
                    <label class="label gap-2 justify-start">
                      <span class="label-text">Nama Klub</span>
                      <span class="label-text-alt text-error">*</span>
                    </label>
                    <input type="text" placeholder="Nama Klub" class="input input-bordered w-full " v-model="form.nama"/>
                    <label class="label">
                      <span class="label-text-alt text-error italic">*Nama klub wajib di isi.</span>
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
                        <option disabled selected>Pilih Kota/Kabupaten:</option>
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
                    <Link :href="route('klub.index')" class="btn">Batal</Link>
                    <button @click="btn_submit()" class="btn btn-primary">Simpan</button>
                  </div>
            </div>
        </div>
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
            kota_kab: null,
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
    },
};
</script>
<style lang=""></style>
