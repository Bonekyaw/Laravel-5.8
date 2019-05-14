<template>
    <div class="test">
        <button :type="type" v-text="back.name" class="btn btn-primary"></button>
    </div>
</template>

<script>
    export default {
        props:[
            'type',
            'text',
        ],
        data() {
            return {
                back : null,
            }
        },
        mounted() {
            axios.post('api/vue',{})
                .then((response) => {
                   this.back = response.data
                })
        }
    }
</script>
<style>

</style>

