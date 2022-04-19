<template>
  <div style="display: flex; flex-direction: column; height: 90vh; justify-content: center; text-align: center;">
    <v-alert
        style="margin:auto; text-align: center; margin-top: 20px;"
        border="bottom"
        colored-border
        :type="typeAlert"
        v-model="alert"
      >{{messageAlert}}</v-alert>
      <h3 v-if="nameAuditorium" style="text-align: center; margin-top: 20px;">Sala {{nameAuditorium}}</h3>
      <h5 v-if="scheduleName" style="text-align: center; margin-top: 20px;">{{scheduleName}}</h5>
      <div style="margin: auto; max-width: 800px;  width: 800px; display: flex; height:30px; background-color: black; text-align: center; justify-content: center;"> <p style="color: white;">P A N T A L L A</p></div>
      <div style="margin: auto; max-width: 800px; display: flex; justify-content: center; flex-wrap: wrap; height:auto;">
        <div v-for="(seat, index) in seats" :key="index" style="height: 35px; width:35px; text-align: center; display: flex; justify-content: center; align-items: center; margin: 20px;">
          <div :class="[(seat.status == false ) ? activeClass : seatClass]" style="height:100%; width:100%" @click="addSeatToArray(index)">
            <p style="color: white;">{{seat.name}}</p>
          </div>
        </div>
      </div>
      <div style="margin:auto; max-width: 200px; display: flex; justify-content: center; flex-direction: column;">
        <v-text-field
          label="Correo"
          outlined
          dense
          v-model="email"
        ></v-text-field>
        <v-btn
          @click="saveBooking"
          color="primary"
          elevation="2"
          class="mt-5"
        >AGENDAR</v-btn>
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
      scheduleName: String,
      scheduleId: Number,
    },

    data: () => ({
        loading: false,
        seats: [],
        activeClass: 'selectedColor',
        seatClass: 'seatColor',
        seatsSelected: [],
        bookerEmail: '',
        email:'',
        alert: false,
        messageAlert: '',
        typeAlert: 'error',
        token_id: '',
    }),
    mounted() {
        this.getAuditorium();
    },
    methods: {
        /**
         * Get auditoriums with yours seats and schedules.
         */
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
        /**
         * Save new Booking.
         */
        saveBooking(){
            if (this.validations()) {
            let data = {
            auditorium_id: this.idAuditorium,
            seats_ids: this.seatsSelected,
            schedule_id: this.scheduleId,
            email: this.email,
          }  

          axios.post('/api/save-booking', data)
                .then(res => {
                    this.token_id = res.data.token_id;
                    this.alert = true
                    this.messageAlert = 'Boletos agendados';
                    this.typeAlert = 'success';
                    setTimeout(() => {
                        this.goToShowBooking();
                    }, 600);
                }).catch(this.handleError);
          }

        },
        /**
         * Change status and color of scuare seats.
         */
        changeStatus(indexArr){
          this.seats[indexArr].status = !this.seats[indexArr].status;
        },
        /**
         * Add Ids of seats selected.
         */
        addSeatToArray(indexArr){  
          this.changeStatus(indexArr);
            
            if (!this.seatsSelected.includes(this.seats[indexArr].id) && !this.seats[indexArr].status) {
              this.seatsSelected.push(this.seats[indexArr].id);
            }    
            if (this.seatsSelected.includes(this.seats[indexArr].id) && this.seats[indexArr].status) {
              let indexInSelected = this.seatsSelected.indexOf(this.seats[indexArr].id);
              this.seatsSelected.splice(indexInSelected, 1)
            } 
        },
        /**
         * Validate that fiels requireds.
         */
        validations(){
          let isComplete = true;
          this.alert = false;
          if (!this.email && this.seatsSelected.length < 1) {
            this.messageAlert = 'Seleciona un asiento y agrega un correo electrónico';
            this.alert = true;
            isComplete = false;
          }
          else{
            if (this.seatsSelected.length < 1) {
            this.messageAlert = 'Seleciona un asiento'
            this.alert = true;
            isComplete = false;
            }
            if (!this.email) {
              this.messageAlert = 'Incresa un correo electrónico'
              this.alert = true;
              isComplete = false;
            }
          }
          return isComplete;
        },
        /**
         * Goto detail booking.
         */
        goToShowBooking(){
            if (this.token_id) {
                let dataUrl =  {
                    ...{name: 'booking-detail'},
                    ...{params: { token_id: this.token_id }},
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
.selectedColor{
  background-color: #3F51B5;
}
.seatColor{
  background-color: darkgray;
}
.selectedColor:hover{
  cursor: pointer;
}
.seatColor:hover{
  cursor: pointer;
}
</style>