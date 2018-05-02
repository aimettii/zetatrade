<template>
    <div id="service-mini-table">
        <table class="table table-hover table-light mini-table">
            <thead>
            <tr>
                <th :class="column.classes" v-for="column in settings.columns">{{ column.name }}</th>
            </tr>
            </thead>
        </table>
        <div class="scroller">
            <div class="table">
                <table class="table table-hover table-light mini-table">
                    <tbody>
                    <tr v-for="order in orders"
                    >

                    </tr>
                    </tbody>
                </table>
                <a class="more-orders">Więcej zamówień</a>
            </div>
        </div>
    </div>
</template>

<script>

    export default{

        props: [
            'orders',
            'settings'
        ]

    }

</script>