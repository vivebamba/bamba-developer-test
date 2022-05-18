## Bamba Developer Test

Hola,

Gracias por tu interés en ser parte del equipo de Bamba. Este ejercicio tiene como finalidad entender tu proceso de resolucion de problemas, conocimiento del lenguaje y buenas practicas de programacion.

Para completar este ejercio primero debes hacer un fork de este repo, resolver los puntos que estarán comentados a continuacion y luego hacer push de tus cambios en tu propio repo, por supuesto enviandonos luego la URL del repositorio.

## Tarea: Movie Teather Booking System

Se necesita crear un sistema de agenda para una sala de cine, que cumpla con las siguientes reglas de negocio:

- El usuario podra elegir entre las 3 salas disponible, que llamaremos Sala A, Sala B y Sala C.
- Cada sala tendra su propia cartelera de peliculas.
- Las salas tienen los siguientes horarios: 3:00 pm, 5:00 pm y 7:00 pm. Los sabados y domingo esta disponible un horario vespertino a las 11:30 am.
- Las salas A y B tienen un aforo de 20 personas. La Sala C tiene un aforo de 30 personas.
- El usuario tendra la posibilidad de adquirir un boleto para sala, pelicula y funcion que elija, siempre que este disponible el asiento.
- No existe sistema de compra, solo se debe mostrar pantalla de confirmación con la informacion del boleto adquirido al final del proceso.

### Modelos recomendados (pero no excluyentes):

Booker: representa a la persona que adquiere el boleto. Esta relacionado con un booking.

Booking: representa la agenda para una sala. Esta relacionado con una sala, un horario y un asiento.

Auditorium: representa cada sala en el cine. Tiene una cantidad de horarios disponibles y un numero de asientos.

Seat: representa un asiento numerado dentro de una sala. Esta relacionado con un booker y pertenece a una sala.

### Casos de uso a implementar:

- Debe existir una vista donde el posible booker pueda ver la disponibilidad de asientos en una sala para un horario específico.
- Debe existir un formulario que le permite al booker crear su booking para la sala en el horario elegido. Se le debe pedir un correo electrónico.
- Una vez realizado el proceso con éxito debera ser dirigido a una vista de confirmación donde le muestre los siguientes detalles del booking: correo electrónico, código de reserva (id del booking), sala seleccionada, horario seleccionado y el asiento seleccionado.

### Testing

- Testear una agenda exitosa que haga match con la pantalla de confirmacion
- Testear que dos usuarios no puedan agendar el mismo asiento de la misma sala/pelicula/horario
- Testear que no se pueda exceder la capacidad de la sala
- Testear que el horario vespertino solo este disponible en fines de semana.

### Puntos a evaluar:

- Que el proceso de booking funcion segun se específica
- Dependency Injection
- Codigo limpio
- Testing

### Stack para la realizacion de la prueba tecnica

- Laravel
- Fronted framework/library a eleccion
- MySQL or MariaDB
- Docker
- Agregar un Readme con instrucciones para ejecutar el proyecto