<template lang="">
    <div class="">
        <div class="flex m-2 gap-4 items-center">
            <div class="w-full flex flex-col lg:flex-row gap-2 items-center justify-between font-semibold">
                <div class="breadcrumbs p-2">
                    <ul>
                        <li>
                            <Link :href="route('beranda')">{{ auth.user.role }}</Link>
                        </li>
                        <li>Activity Log</li>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <div class="overflow-auto h-96 lg:h-[450px] xl:h-[900px] bg-base-100 rounded-lg shadow">
                <table class="table table-sm table-zebra w-full">
                    <!-- head -->
                    <thead class="sticky top-0 bg-base-100 shadow z-10">
                        <tr>
                            <th class="text-center">#</th>
                            <th>IP Address</th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Activity</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template
                            v-for="(log, index) in master.activities"
                            :key="index"
                        >
                            <tr>
                                <td class="text-center">{{index+1}}</td>
                                <td>{{log.ip_add}}</td>
                                <td><span class="font-bold">{{log.user}}</span></td>
                                <td>
                                    <span v-if="log.role=='Super Admin'" class="badge badge-sm badge-info">{{log.role}}</span>
                                    <span v-else-if="log.role=='Admin Asprov'" class="badge badge-sm badge-warning">{{log.role}}</span>
                                    <span v-else class="badge badge-sm badge-success">{{log.role}}</span>
                                </td>
                                <td>{{log.activity}}</td>
                                <td>{{moment(log.created_at).format("DD/MM/YYYY H:mm:s")}}</td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="pb-20"></div>
</template>
<script>
import moment from "moment";
import layout from "../superadmin/layout.vue";
import axios from "axios";
export default {
    layout: layout,
    props: {
        auth: Object,
        master: Object,
    },
    setup() {
        return {
            moment,
        };
    },
    methods: {
        
    },
};
</script>
<style lang="">
    
</style>