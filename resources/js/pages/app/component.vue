<template>
    <div class='container'>
        <Navbar></Navbar>
        <router-view></router-view>
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