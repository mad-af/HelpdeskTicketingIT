<template>
    <section>
        <div class="calendar">
            <Calendar 
                title-position="left"
                :columns="layout.columns"
                :rows="layout.rows"
                :is-expanded="layout.isExpanded"
                :attributes="attributes"
            />
        </div>
    </section>    
</template>

<style lang="scss" scoped>
  
</style>

<script>
import Calendar from 'v-calendar/lib/components/calendar.umd'
import DatePicker from 'v-calendar/lib/components/date-picker.umd'

export default {
  components: {
    Calendar,
    DatePicker
  },
  data: function () {
    return {
        attributes: [
            {
                key: 'today',
                highlight: true,
                dates: new Date()
            }
        ]
    }
  },
  computed: {
    layout() {
      return this.$screens(
        {
          default: {
            columns: 1,
            rows: 1,
            isExpanded: true,
          },
        },
      );
    }
  }
}
</script>