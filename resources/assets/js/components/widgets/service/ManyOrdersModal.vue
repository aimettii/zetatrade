<template>
    <div>
        <div slot="title">
            <div class="service-logo" :style="settings.logoStyles"></div>
            <span class="caption-subject font-red sbold uppercase">
                    <h3>{{ settings.modal.title }}</h3>
                </span>
        </div>
        <div slot="body">
            <div class="table-container">
                <table class="table table-striped table-bordered table-hover table-checkable dataTable"
                       id="datatable_ajax">
                    <thead>
                    <tr role="row" class="heading">
                        <th v-for="column in settings.modal.columns"
                            :colspan="column.colspan"
                            :rowspan="column.rowspan || settings.modal.defaultRowspan"
                            :class="column.classes || column.type"
                            v-if="column.row !== 2"
                        >{{ column.name }}</th>
                    </tr>
                    <tr class="heading">
                        <th v-for="column in settings.modal.columns"
                            v-if="column.row === 2">
                            {{ column.name }}
                                    </th>
                    </tr>
                    <tr>
                        <table-filter-cell v-for="column in settings.modal.columns"
                                           v-if="!column.colspan"
                                           style="max-width: 1px;"
                                           :class="column.classes || column.type"
                                           :column-settings="column"
                        ></table-filter-cell>
                    </tr>
                    </thead>
                    <tbody v-relation="handle">
                    <tr v-for="order in modalOrders"
                        @click="openSingleServiceOrder(order)"
                    >
                        <table-cell v-for="column in settings.modal.columns"
                                    v-if="column.path"
                                    :class="column.classes || column.type"
                                    :order-data="order"
                                    :column-settings="column"
                        ></table-cell>
                    </tr>
                    </tbody>
                </table>
                <div v-if="settings.loadingOrders" :style="{height: settings.modal.loadingWrapper.height + 'px'}" class="loading-wrapper">
                    <ring-loader></ring-loader>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default{

        props: [
            'settings'
        ],

    }

</script>