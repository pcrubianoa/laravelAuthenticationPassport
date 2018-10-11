<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Timeline</div>

                    <div class="card-body">
                        <div class="media" v-for="tweet in tweets" v-bind:key="tweet.id">
                            <div class="media-left mr-3">
                                <a href="#">
                                    <img width="30" src="http://cdn.onlinewebfonts.com/svg/img_87237.png" alt="User Avatar">
                                </a>
                            </div>
                            <div class="media-body">
                                <strong>{{ tweet.user.name }}</strong>
                                <p>{{ tweet.body }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                tweets: []
            }
        },
        mounted() {
            this.$http.get('/tweets').then((response) => {
                this.tweets = response.body
            })
        }
    }
</script>
