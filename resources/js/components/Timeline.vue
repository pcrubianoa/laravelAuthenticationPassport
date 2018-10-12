<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Timeline</div>

                    
                    <div class="card-body">
                    <post-tweet :tweets="tweets"></post-tweet>
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
import PostTweet from './PostTweet.vue';
    export default {
        data(){
            return {
                tweets: []
            }
        },
        components: {
            'post-tweet': PostTweet
        },
        mounted() {
            const serviceURL = "http://laravelauthenticationpassport.test/tweets";
            axios.get(serviceURL).then(response => {
                this.tweets = response.data;
            });
        }
    }
</script>
