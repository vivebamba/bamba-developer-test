<template>
  <div style="display: flex; flex-direction: column; height: 90vh; justify-content: center; text-align: center;">
    <h2>Detalle de Agenda</h2>
        <v-card
        class="mx-auto"
        max-width="400"
        width="400"
        >
            <v-card-text style="text-align: initial;">
            <div>FOLIO: {{this.token_id}}</div>
            <p class="text-h5 text--primary">
                AVENGERS
            </p>
            <div>HORARIO: {{this.tiket.schedule_name}}</div>
            <p>A NOMBRE DE: {{this.tiket.email}}</p>
            <div class="text--primary">
                SALA: {{this.tiket.auditorium_name}} 
            </div>
            <div class="text--primary">
                ASIENTOS: 
                <label v-for="seat in this.tiket.seats_names" :key="seat">{{seat + `, `}}</label>
            </div>
            </v-card-text>
            <v-card-actions>
            </v-card-actions>
        </v-card>
        <div style="display: flex; justify-content: center; margin-top: 34px;">
        <v-btn
          @click="goToAuditoriums"
          color="primary"
          elevation="2"
          class="mt-5"
        >VOLVER A CARTELERA</v-btn>
      </div>
  </div>
</template>

<script>

export default {
  components: {
    },
    props:{
      token_id: String,
    },
    data: () => ({
        loading: false,
        tiket:{
            email: '',
            auditorium_name: '',
            schedule_name: '',
            seats_names: [],
        }

    }),
    mounted() {
        this.showBooking();
    },
    methods: {
        /**
         * Display the Boiking by token string.
         */
        showBooking(){
            if (this.token_id) {
                axios.get(`/api/show-booking/${this.token_id}`)
                .then(res => {
                    this.tiket = res.data.tiket;
                }).catch(er => {
                    console.warn(er.response);
                })
            }
        },
        /**
         * Go to route auditoriums.
         */
        goToAuditoriums(){
            this.$router.push({name: 'auditoriums'});
        }
    },
    computed: {
    },
};
</script>

<style>
</style>