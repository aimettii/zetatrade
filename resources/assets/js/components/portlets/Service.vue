<template>
    <div id="service-portlet" :name="settings.name">
        <div class="portlet light"
             :class="{'portlet-fullscreen': fullscreen}">
            <div class="portlet-title">
                <div class="service-logo" :style="settings.logoStyles"></div>
                <div class="caption">
                        <span class="caption-subject font-red sbold uppercase">
                            <h3>{{ settings.title }}</h3>
                        </span>
                </div>
                <div class="tools">
                    <a href="javascript:;"
                       :class="{'collapse': show, 'expand': !show}"
                       @click="show = !show"
                       v-show="!fullscreen">
                    </a>
                </div>
                <div class="actions">
                    <a href="javascript:;" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Dodaj </a>
                    <a href="#full" class="btn btn-sm btn-default fullscreen" data-toggle="modal"
                       :class="{'on': fullscreen}"
                       ><i class="fa" :class="{'fa-tasks': !fullscreen, 'fa-reply': fullscreen}"></i> {{ fullscreen ? 'Powrót' : 'Więcej' }} </a>
                </div>
            </div>
            <transition v-on:beforeEnter="beforeEnter"
                        v-on:leave="leave"
                        v-bind:css="false">
                <div class="portlet-body"
                     v-show="show">
                    <table class="table table-hover table-light">
                        <thead>
                        <tr>
                            <th :class="column.classes" v-for="column in settings.columns">
                                {{ column.name }}
                                </th>
                        </tr>
                        </thead>
                    </table>
                    <div class="scroller">
                        <div class="table">
                            <table class="table table-hover table-light">
                                <tbody>
                                <tr @click="openSingleOrder(key)" v-for="(order, key, index) in orders.data" v-if="conditionOrder(key)">
                                    <td v-html="getCellValue(order, column)" :class="column.classes" v-for="column in settings.columns">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <a v-show="!fullscreen" @click="fullscreen=true" class="more-orders">Więcej zamówień</a>
                        </div>
                    </div>
                </div>
            </transition>

        </div>
    </div>
</template>

<script>
    import DefaultModal from '../modals/Default.vue'

    export default{

        props: [
            'settings',
            'orders'
        ],

        mounted () {
            this.initSlimScroll(this.settings.scrollBoxClass, this.$el, this.getCurrentBoxSize);
            this.scrollBox = $(this.$el).find(this.settings.scrollBoxClass);
        },

        data () {
            return {
                show: true,
                fullscreen: false,
                loadingOrders: true,
                scollBox: null
            }
        },

        watch: {

            fullscreen (val) {
                this.show = true;
                this.scrollBox.parent().replaceWith(this.scrollBox);
                this.destroySlimScroll(this.settings.scrollBoxClass, this.$el);
                this.initSlimScroll(this.settings.scrollBoxClass, this.$el, this.getCurrentBoxSize);
            },

            orders () {
                this.loadingOrders = false;
            }

        },

        methods: {

//            onScroll(e) {
//                if(!this.loadingOrders){
//                    let h = this.scrollBox.children().height(), st = this.scrollBox.scrollTop();
//                    console.log('Height:'+h, '|ScrollTop:'+st);
//                    if(h - st - 1 <= this.getCurrentBoxSize){
//                        this.loadingOrders = true;
//                        this.moreOrders(15);
//                    }
//                }
//            },

            moreOrders (count) {
                this.$emit('update-pagination', Object.assign({}, this.settings.pagination, {
                    perPage: this.settings.pagination.perPage + count
                }));
            },

            newPage (page) {
                this.$emit('update-pagination', Object.assign({}, this.settings.pagination, {
                    perPage: 50
                }));
            },

            beforeEnter (e) {
                $(e).slideDown(200);
            },

            leave (e, done) {
                $(e).slideUp(200);
            },

            getCellValue (orderData, columnSettings) {
                let columnData = getByPath(orderData, columnSettings.path);

                if(typeof columnSettings.type !== 'undefined'){
                    switch (columnSettings.type){
                        case 'status':
                            return this.transformStatusValue(columnData);
                            break;
                    }
                }

                return columnData;
            },

            transformStatusValue (statusData) {
                  let statusTypeClass;
                  switch (statusData.name){
                      case 'open':
                          statusTypeClass = 'label-success';
                          break;
                      case 'in line':
                          statusTypeClass = 'label-info';
                          break;
                      case 'error':
                          statusTypeClass = 'label-danger';
                          break;
                      case 'done':
                          statusTypeClass = 'label-default';
                          break;
                  }

                  return '<span class="label label-sm '+ statusTypeClass +'"> ' + ucfirst(statusData.name) + ' </span>';
            },

            conditionOrder (key) {
                return this.orders.links[this.settings.name].indexOf(Number(key)) !== -1;
            },

            openSingleOrder (orderId) {
               alert(orderId);
            }

        },

        computed: {

            getCurrentBoxSize () {
                return this.fullscreen ? this.settings.fullscreenBoxSize : this.settings.defaultBoxSize;
            }

        }
    }
</script>

<style lang="scss">

#service-portlet{

    &[name="epi"] .portlet{
        margin-bottom: 0;
    }

    .portlet{
        border: 1px solid rgba(68, 77, 88, 0.26);
    }

    .portlet-title{
        .service-logo{
            height: 26px;
            width: 50px;
            float: left;
            margin-top: 7px;
            margin-right: 20px;
            background-size: contain;
            background-repeat: no-repeat;
        }
        .caption{
            padding-top: 5.5px;
            h3{
                margin: 0;
            }
        }
        a{
            color: #666 !important;
        }
    }

    .portlet-body {
        overflow: hidden;
        border-radius: 4px;
        border: 1px solid #ced1d4;
        padding: 0;
    }

    .portlet-fullscreen{
        border: none;
    }

    .table{
        margin-bottom: 0;
        &.table-light{
            thead tr th{
                border-bottom: 1px solid rgba(68, 77, 88, 0.26);
                color: #828282;
                font-weight: bold;
            }
            tbody tr {
                cursor: pointer;
                word-break: break-all;
            }
        }
        .more-orders{
            float: left;
            width: calc(100% + 13px);
            text-align: center;
            height: 36px;
            padding: 9px;
            border-top: 1px solid rgb(242, 245, 248);
            text-decoration: none;
            transition: .2s;
            &:hover{
                background: rgba(176, 214, 253, 0.31)!important;
            }
        }
    }
}

</style>