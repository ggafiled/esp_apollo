<template>
    <li class="list-group-item bg-transparent">
        <a :href="_route" @click.prevent="navigate">{{ title }}</a>
        <div class="d-flex justify-content-between mt-3">
            <small class="text-muted">{{ details }}</small>
            <small class="text-muted"> </small>
        </div>
    </li>
</template>
<script>
export default {
    props: {
        route:{
            type: String,
            required: true
        },
        tab:{
            type: String,
            required: true
        },
        title: {
            type: String,
            default: ''
        },
        details:{
            type: String,
            default: ''
        }
    },
    computed: {
        _route: function(){
            return this.route + `?tab=${this.tab}`;
        }
    },
    methods: {
        navigate(){
            this.$router.push(this._route);
        }
    }
};
</script>
