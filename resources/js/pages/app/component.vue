<template>
    <div>
        <Navbar></Navbar>
        <div class='container'>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import { components } from "../../components/index"

export default {
    components: {
        'Navbar': components.Navbar
    },
}
</script>