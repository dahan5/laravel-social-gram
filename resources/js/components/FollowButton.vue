<template>
    <div class="container">
        <a class="btn btn-sm btn-primary ml-3 text-light" @click="followUser()" v-text="btnText"></a>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],
        mounted() {
            console.log('Component mounted.')
        },
        data: function() {
            return {
                status: this.follows
            }
        },
        methods: {
            followUser() {
                axios.post(`/follow/${this.userId}`)
                    .then(response => {
                        this.status = !this.status;
                    })
                    .catch(err => {
                        if(err.response.status == 401)
                            window.location = '/login';
                    })
            }
        },
        computed: {
            btnText() {
                return this.status ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>
