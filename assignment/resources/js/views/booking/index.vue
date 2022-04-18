<template>
  <div style="display: flex; flex-direction: column; height: 90vh;">
      <h3 v-if="nameAuditorium" style="text-align: center; margin-top: 20px;">Sala {{nameAuditorium}}</h3>
      <h5 v-if="showMovie" style="text-align: center; margin-top: 20px;">{{showMovie}}</h5>
      <div style="margin:auto; max-width: 800px;  width: 800px; display: flex; height:30px; background-color: black; text-align: center; justify-content: center;"> <p style="color: white;">Pantalla</p></div>
      <div style="margin:auto; max-width: 800px; display: flex; justify-content: center; flex-wrap: wrap; height:auto;">
        <div v-for="(seat, index) in seats" :key="index" style="height: 35px; width:35px; text-align: center; display: flex; justify-content: center; align-items: center; margin: 20px;">
          <div :class="[(seat.status == false ) ? activeClass : seatClass]" style="height:100%; width:100%" @click="seat.status = !seat.status">
            <p style="color: white;">{{seat.name}}</p>
          </div>
        </div>
      </div>
      <div style="margin:auto; max-width: 200px; display: flex; justify-content: center;">
        <v-text-field
          label="Correo"
          outlined
          dense
        ></v-text-field>
      </div>
  </div>
</template>

<script>

export default {
  components: {
    },
    props:{
      idAuditorium: Number,
      nameAuditorium: String,
      showMovie: String,
    },

    data: () => ({
        loading: false,
        seats: [],
        activeClass: 'selectedColor',
        seatClass: 'seatColor'
    }),
    mounted() {
        this.getAuditorium();
    },
    methods: {
        getAuditorium(){
          if (this.idAuditorium) {
            this.loading = true;

            axios.get(`/api/show-auditorium/${this.idAuditorium}`)
                .then(res => {
                    this.seats = res.data.auditorium.seats;
                }).catch(er => {
                    console.warn(er.response);
                }).then(() => this.loading = false);
          }
            
        },
        goToBookingRoute(){
            console.log('goToBookingRoute');
            this.$router.push({
                        name: 'booking',
                    });
        }
    },
    computed: {
    },
};
</script>

<style>
.selectedColor{
  background-color: #3F51B5;
}
.seatColor{
  background-color: gray;
}
.selectedColor:hover{
  cursor: pointer;
}
.seatColor:hover{
  cursor: pointer;
}
</style>