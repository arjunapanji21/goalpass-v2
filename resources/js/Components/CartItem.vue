<template lang="">
    <tr>
        <th width="60">
            <label class="btn btn-error btn-square btn-sm btn-outline">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-trash-fill"
                    viewBox="0 0 16 16"
                >
                    <path
                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"
                    />
                </svg>
            </label>
        </th>
        <td>
            <div class="flex items-center space-x-3">
                <div>
                    <div class="font-bold">{{ name }}</div>
                    <div class="text-sm opacity-50">{{ remark }}</div>
                </div>
            </div>
        </td>
        <td class="text-right">{{ price }}</td>
    </tr>
</template>
<script>
export default {
    props: {
        name: String,
        remark: String,
        price: String,
    },
};
</script>
<style lang=""></style>
