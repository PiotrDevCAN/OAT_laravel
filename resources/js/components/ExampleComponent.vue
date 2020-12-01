<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <div class="card-body">
                        I'm an example component.
                        <p>
                            <router-link to="/vue">Go to vue</router-link>
                            <router-link to="/my-new-vue-route">Go to my-new-vue-route</router-link>
                        </p>
                        <!-- route outlet -->
                        <!-- component matched by the route will render here -->
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Example Component mounted.')
        }
    }
</script>
