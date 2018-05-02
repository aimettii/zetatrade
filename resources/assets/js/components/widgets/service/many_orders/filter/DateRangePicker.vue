<template>
    <div class="form-group form-md-line-input has-success form-md-floating-label">
        <div class="input-icon" style="">
            <flat-pickr v-model="value" :config="options" class="form-control" :input-class="inputClasses"></flat-pickr>
            <label for="form_control_1">
                <p>{{ column.name }}</p>
            </label>
            <!--<span class="help-block after-edited" style="">Zamówienia filtrowane</span>-->
            <!--<span class="help-block" style="">Przypisz filtr do kolumny</span>-->
            <i class="fa fa-calendar"></i>
        </div>
    </div>
</template>

<script>
    export default{
        props: [
            'column'
        ],
        data () {
            return {
                value: '',
                edited: false
            }
        },

        watch: {
            value (val){
                let filter = _.split(val, ' to ');
                if(filter.length !== 2) return;
                this.edited = true;
            }
        },

        computed: {
            rangeDate (){

            },
            inputClasses (){
                return {
                    edited: this.edited
                }
            },
            options (){
                return {
                    mode: 'range',
                    dateFormat: 'Y-m-d H:i',
                    maxDate: moment().format(),
                    enableTime: true,
                    time_24hr: true,
                    minuteIncrement: 0
                }
            }
        }
    }
</script>