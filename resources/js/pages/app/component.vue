<template>
    <div>
        <Navbar></Navbar>
        <Sidebar></Sidebar>
        <div class='container'>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import { components } from "../../components/index"

export default {
    components: {
        'Navbar': components.Navbar,
        'Sidebar': components.Sidebar
    },
}
</script>