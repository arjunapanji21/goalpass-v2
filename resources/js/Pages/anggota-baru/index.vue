<template lang="">
    <div
        class="flex flex-col lg:flex-row justify-between items-center gap-2 pb-2"
    >
        <div class="breadcrumbs p-2 font-semibold">
            <ul>
                <li>
                    <Link :href="route('beranda')">{{ auth.user.role }}</Link>
                </li>
                <li><Link :href="route('anggota.index')">Anggota</Link></li>
                <li>Anggota Baru</li>
            </ul>
        </div>
        <div>
            <Link
                v-if="auth.user.role == 'Admin Askot/Askab'"
                :href="route('anggota-baru.create')"
                class="btn btn-primary btn-block lg:btn-wide"
                >+ Pengajuan Baru</Link
            >
        </div>
    </div>
    <div class="grid lg:grid-cols-2 gap-3">
        <div class="card card-compact bg-base-100 shadow-lg">
            <div class="card-body">
                <div class="card-title">
                    Pengajuan <span class="badge badge-warning">Pending</span>
                </div>
                <div class="overflow-auto min-h-96 bg-base-100 rounded-lg">
                    <table class="table table-sm w-full">
                        <!-- head -->
                        <thead class="sticky top-0 bg-base-100 z-10">
                            <tr class="text-center">
                                <th>Tgl. Pengajuan</th>
                                <th>Nama Pemain</th>
                                <th>Klub</th>
                                <th>Kota/Kab.</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template
                                v-for="(
                                    pending, index
                                ) in master.submission_pending"
                                :key="index"
                            >
                                <tr>
                                    <td class="text-right">
                                        {{
                                            moment(pending.created_at).format(
                                                "DD/MM/YYYY"
                                            )
                                        }}
                                    </td>
                                    <td>
                                        {{ pending.nama }}
                                    </td>
                                    <td>{{ pending.klub }}</td>
                                    <td>
                                        {{ pending.kota_kab }}
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="badge badge-warning badge-sm"
                                            >{{ pending.status }}</span
                                        >
                                    </td>
                                    <td class="text-center">
                                        <Link
                                            :href="
                                                route(
                                                    'anggota-baru.show',
                                                    pending.id
                                                )
                                            "
                                            class="btn btn-ghost text-primary btn-sm btn-circle"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                height="16"
                                                width="16"
                                                viewBox="0 0 512 512"
                                                class="w-4 h-4"
                                                fill="currentColor"
                                            >
                                                <path
                                                    d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"
                                                />
                                            </svg>
                                        </Link>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-3">
            <div class="card card-compact bg-base-100 shadow-lg">
                <div class="card-body">
                    <div class="card-title">
                        Pengajuan
                        <span class="badge badge-success">Diterima</span>
                    </div>
                    <div class="overflow-auto min-h-96 bg-base-100 rounded-lg">
                        <table class="table table-sm w-full">
                            <!-- head -->
                            <thead class="sticky top-0 bg-base-100 z-10">
                                <tr class="text-center">
                                    <th>Tgl. Pengajuan</th>
                                    <th>Nama Pemain</th>
                                    <th>Klub</th>
                                    <th>Kota/Kab.</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template
                                    v-for="(
                                        accept, index
                                    ) in master.submission_accept"
                                    :key="index"
                                >
                                    <tr>
                                        <td class="text-right">
                                            {{
                                                moment(
                                                    accept.created_at
                                                ).format("DD/MM/YYYY")
                                            }}
                                        </td>
                                        <td>
                                            {{ accept.nama }}
                                        </td>
                                        <td>{{ accept.klub }}</td>
                                        <td>
                                            {{ accept.kota_kab }}
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="badge badge-success badge-sm"
                                                >{{ accept.status }}</span
                                            >
                                        </td>
                                        <td class="text-center">
                                            <Link
                                                :href="
                                                    route(
                                                        'anggota-baru.show',
                                                        accept.id
                                                    )
                                                "
                                                class="btn btn-ghost text-primary btn-sm btn-circle"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    height="16"
                                                    width="16"
                                                    viewBox="0 0 512 512"
                                                    class="w-4 h-4"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"
                                                    />
                                                </svg>
                                            </Link>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card card-compact bg-base-100 shadow-lg">
                <div class="card-body">
                    <div class="card-title">
                        Pengajuan <span class="badge badge-error">Ditolak</span>
                    </div>
                    <div class="overflow-auto min-h-96 bg-base-100 rounded-lg">
                        <table class="table table-sm w-full">
                            <!-- head -->
                            <thead class="sticky top-0 bg-base-100 z-10">
                                <tr class="text-center">
                                    <th>Tgl. Pengajuan</th>
                                    <th>Nama Pemain</th>
                                    <th>Klub</th>
                                    <th>Kota/Kab.</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template
                                    v-for="(
                                        reject, index
                                    ) in master.submission_reject"
                                    :key="index"
                                >
                                    <tr>
                                        <td class="text-right">
                                            {{
                                                moment(
                                                    reject.created_at
                                                ).format("DD/MM/YYYY")
                                            }}
                                        </td>
                                        <td>
                                            {{ reject.nama }}
                                        </td>
                                        <td>{{ reject.klub }}</td>
                                        <td>
                                            {{ reject.kota_kab }}
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="badge badge-error badge-sm"
                                                >{{ reject.status }}</span
                                            >
                                        </td>
                                        <td class="text-center">
                                            <Link
                                                :href="
                                                    route(
                                                        'anggota-baru.show',
                                                        reject.id
                                                    )
                                                "
                                                class="btn btn-ghost text-primary btn-sm btn-circle"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    height="16"
                                                    width="16"
                                                    viewBox="0 0 512 512"
                                                    class="w-4 h-4"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"
                                                    />
                                                </svg>
                                            </Link>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import moment from "moment";
import layout from "../superadmin/layout.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import axios from "axios";
export default {
    layout: layout,
    props: {
        auth: Object,
        session: Object,
        master: Object,
    },
    setup(props) {
        const formCari = useForm({});

        return {
            moment,
            formCari,
        };
    },
    data() {
        return {};
    },
    methods: {},
    watch: {},
};
</script>
<style lang=""></style>
