<template lang="">
    <div class="p-4">
        <div class="card card-compact bg-base-100">
            <div class="card-body">
                <div class="text-2xl flex gap-2 font-semibold text-center">
                    <span>Tambah Data Kota</span>
                </div>
                <div class="form-control w-full">
                    <label class="label gap-2 justify-start">
                        <span class="label-text">Kode Kota/Kabupaten</span>
                        <span class="label-text-alt text-error">*</span>
                    </label>
                    <input
                        type="number"
                        placeholder="Kode Kota/Kabupaten"
                        class="input input-bordered w-full"
                        v-model="form.kd_kota"
                    />
                    <label class="label">
                        <span class="label-text-alt text-error italic"
                            >*Kode Kota/Kabupaten wajib di isi.</span
                        >
                    </label>
                </div>
                <div class="form-control w-full">
                  <label class="label gap-2 justify-start">
                      <span class="label-text">Nama Kota/Kabupaten</span>
                      <span class="label-text-alt text-error">*</span>
                  </label>
                  <input
                      type="text"
                      placeholder="Nama Kota/Kabupaten"
                      class="input input-bordered w-full"
                      v-model="form.nama"
                  />
                  <label class="label">
                      <span class="label-text-alt text-error italic"
                          >*Nama Kota/Kabupaten wajib di isi.</span
                      >
                  </label>
              </div>
                <div class="card-actions justify-end">
                    <Link :href="route('kota.index')" class="btn">Batal</Link>
                    <button @click="btn_submit()" class="btn btn-primary">
                        Simpan
                    </button>
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
    },
    setup(props) {
        const form = useForm({
            kd_kota: null,
            nama: null,
        });
        return { form };
    },
    methods: {
        btn_submit() {
            this.form.post(route("kota.store"), {
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
