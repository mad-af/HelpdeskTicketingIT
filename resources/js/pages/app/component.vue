<template>
    <div>
        <Navbar />
        <router-view></router-view>
    </div>
</template>

<script>
import { components } from "../../components/index"

export default {
    components: {
        Navbar: components.Navbar,
        Sidebar: components.Sidebar
    }
}
</script>