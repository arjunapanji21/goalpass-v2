<template lang="">
    <div class="p-4">
        <div class="card card-compact bg-base-100 shadow">
            <div class="card-body">
                <div class="text-2xl flex gap-2 font-semibold text-center">
                    <span>Tambah Admin Asprov</span>
                </div>
                <div class="form-control w-full">
                    <label class="label gap-2 justify-start">
                        <span class="label-text">Nama</span>
                        <span class="label-text-alt text-error">*</span>
                    </label>
                    <input
                        type="text"
                        placeholder="Nama"
                        class="input input-bordered w-full"
                        v-model="form.nama"
                    />
                    <label class="label">
                        <span class="label-text-alt text-error italic"
                            >*Nama wajib di isi.</span
                        >
                    </label>
                </div>
                <div class="form-control w-full">
                    <label class="label gap-2 justify-start">
                        <span class="label-text">Email</span>
                        <span class="label-text-alt text-error">*</span>
                    </label>
                    <input
                        type="email"
                        placeholder="Email"
                        class="input input-bordered w-full"
                        v-model="form.email"
                    />
                    <label class="label">
                        <span class="label-text-alt text-error italic"
                            >*Email wajib di isi.</span
                        >
                    </label>
                </div>
                <div class="form-control w-full">
                    <label class="label gap-2 justify-start">
                        <span class="label-text">Username</span>
                        <span class="label-text-alt text-error">*</span>
                    </label>
                    <input
                        type="text"
                        placeholder="Username"
                        class="input input-bordered w-full"
                        v-model="form.username"
                    />
                    <label class="label">
                        <span class="label-text-alt text-error italic"
                            >*Username wajib di isi.</span
                        >
                    </label>
                </div>
                <div class="form-control w-full">
                    <label class="label gap-2 justify-start">
                        <span class="label-text">Password</span>
                        <span class="label-text-alt text-error">*</span>
                    </label>
                    <input
                        type="password"
                        placeholder="Password"
                        class="input input-bordered w-full"
                        v-model="form.password"
                    />
                    <label class="label">
                        <span class="label-text-alt text-error italic"
                            >*Password wajib di isi.</span
                        >
                    </label>
                </div>
                <div class="form-control w-full">
                    <label class="label gap-2 justify-start">
                        <span class="label-text">Ulangi Password</span>
                        <span class="label-text-alt text-error">*</span>
                    </label>
                    <input
                        type="password"
                        placeholder="Ulangi Password"
                        class="input input-bordered w-full"
                        v-model="form.password_confirmation"
                    />
                    <label class="label">
                        <span class="label-text-alt text-error italic"
                            >*Ketik ulang password yang sama.</span
                        >
                    </label>
                </div>
                <div class="card-actions justify-end">
                    <button @click="btn_submit()" class="btn btn-primary">
                        Simpan
                    </button>
                    <Link :href="route('admin')" class="btn">Batal</Link>
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
            nama: null,
            email: null,
            username: null,
            password: null,
            password_confirmation: null,
        });
        return { form };
    },
    methods: {
        btn_submit() {
            this.form.post(route("asprov.store"), {
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
