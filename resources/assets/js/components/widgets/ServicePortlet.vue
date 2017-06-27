<template>
    <div id="service-portlet">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <div class="caption">
                        <img src="">
                        <span class="caption-subject font-red sbold uppercase">
                        <h3>{{ title }}</h3>
                    </span></div>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""></a>
                </div>
                <div class="actions">
                    <a href="javascript:;" class="btn btn-default btn-sm">
                        <i class="fa fa-plus"></i> Dodaj </a>
                    <a class="btn btn-sm btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
                </div>
            </div>
            <div class="portlet-body" style="display: block;">
                <div class="scroller" style="height:200px" data-rail-visible="1">
                    <div class="table">
                        <table class="table table-hover table-light">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> First Name </th>
                                <th> Last Name </th>
                                <th> Username </th>
                                <th> Status </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td> 1 </td>
                                <td> Mark </td>
                                <td> Otto </td>
                                <td> makr124 </td>
                                <td>
                                    <span class="label label-sm label-success"> Approved </span>
                                </td>
                            </tr>
                            <tr>
                                <td> 2 </td>
                                <td> Jacob </td>
                                <td> Nilson </td>
                                <td> jac123 </td>
                                <td>
                                    <span class="label label-sm label-info"> Pending </span>
                                </td>
                            </tr>
                            <tr>
                                <td> 3 </td>
                                <td> Larry </td>
                                <td> Cooper </td>
                                <td> lar </td>
                                <td>
                                    <span class="label label-sm label-warning"> Suspended </span>
                                </td>
                            </tr>
                            <tr>
                                <td> 4 </td>
                                <td> Sandy </td>
                                <td> Lim </td>
                                <td> sanlim </td>
                                <td>
                                    <span class="label label-sm label-danger"> Blocked </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        props: [
            'title'
        ],
    }
</script>

<style>
#service-portlet h3{
    margin: 0;
}
</style>