<template>
    <td slot="column.type" v-for="column in columns"
        :class="column.classes"
    >{{ _.get(order, column.path) }}</td>
</template>

<script>

    export default{

        props: [
            'order',
            'columns'
        ]

    }

</script>