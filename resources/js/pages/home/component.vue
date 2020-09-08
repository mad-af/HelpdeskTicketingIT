<template>
  <div>
  </div>
</template>

<script>
export default {
    data() {
        return{
            persons: []
        }
    },
    created() {
        this.loadData()
    },
    methods: {
        loadData() {
            axios.get("http://localhost:8000/api/person")
            .then(res => {
                this.persons = res.data
            })
        },
        deleteData(id) {
            axios.delete("http://localhost:8000/api/person/")
            .then(res => {
                this.loadData()
            })
        }
    }
}
</script>