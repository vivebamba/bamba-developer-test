<template>
  <div>
    <h2 style="text-align: center; color: white;">LARA MOVIE</h2>
    <h3 style="text-align: center;">Cartelera</h3>
    <v-card style="max-width: 50vw; margin: auto; margin-top: 30vh;">
        <v-toolbar
            flat
            color="primary"
            dark
        >
            <v-toolbar-title>Avengers</v-toolbar-title>
        </v-toolbar>
        <v-tabs vertical style="align-items: center;">
            <v-tab v-for="(auditorium, index) in auditoriums" :key="index">
            <v-icon left>
                mdi-filmstrip-box-multiple
            </v-icon>
            Sala {{auditorium.name}}
            </v-tab>
            <v-tab-item v-for="(auditorium, index) in auditoriums" :key="index" style="justify-content: center; display: flex;">
                <v-chip-group
                    active-class="primary--text"
                    column
                >
                    <v-chip
                    v-for="(tag, index) in auditorium.schedules"
                    :key="index"
                    @click="goToBookingRoute(auditorium.id, auditorium.name, tag.start_time, tag.id)"
                    >
                    {{ tag.start_time }}
                    </v-chip>
                </v-chip-group>
            </v-tab-item>
        </v-tabs>
    </v-card>         
  </div>
</template>

<script>

export default {
  components: {
    },
    data: () => ({
        loading: false,
        auditoriums: [
            {name:'A',
            schedules: [{start_time: '15:00:00'}, {start_time: '17:00:00'}]
            },
            {name:'B',
            schedules: [{start_time: '15:00:00'}, {start_time: '17:00:00'}]
            }
        ],
    }),
    mounted() {
        this.getAuditoriums();
    },
    methods: {
        /**
         * Get auditoriums with yours attributes.
         */
        getAuditoriums(){
            this.loading = true;

            axios.get('/api/auditoriums')
                .then(res => {
                    this.auditoriums= res.data.auditoriums;
                }).catch(er => {
                    console.warn(er.response);
                }).then(() => this.loading = false);
        },
        /**
         * Go to route booking.
         */
        goToBookingRoute(idAuditorium, nameAuditorium, scheduleName, scheduleId){
            if (idAuditorium && nameAuditorium) {
                let dataUrl =  {
                    ...{name: 'booking'},
                    ...{params: { idAuditorium: idAuditorium, nameAuditorium: nameAuditorium, scheduleName:scheduleName, scheduleId:scheduleId }},
                }

                this.$router.push(dataUrl);
            }
        }
    },
    computed: {
    },
};
</script>

<style>
</style>