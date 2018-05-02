<template>
    <div class="form-group form-md-line-input has-success form-md-floating-label">
        <div class="input-icon" style="">
                <slot name="input"></slot>
            <label for="form_control_1">
                <p>{{ column.name }}</p>
            </label>
            <!--<span class="help-block after-edited" style="">Zamówienia filtrowane</span>-->
            <!--<span class="help-block" style="">Przypisz filtr do kolumny</span>-->
            <slot name="icon"></slot>
            <!--<i class="fa fa-calendar"></i>-->
        </div>
    </div>
</template>

<script>
    export default{
        props: [
            'column'
       ]
    }
</script>