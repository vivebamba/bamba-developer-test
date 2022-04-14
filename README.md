## Bamba Developer Test

Hola,

Gracias por tu interés en ser parte del equipo de Bamba. Este ejercicio tiene como finalidad entender tu proceso de resolucion de problemas, conocimiento del lenguaje y buenas practicas de programacion.

Para completar este ejercio primero debes hacer un fork de este repo, resolver los puntos que estarán comentados a continuacion y luego hacer push de tus cambios en tu propio repo, por supouesto enviandonos luego la URL del repositorio.

## Assignment: Movie Teather Booking System

Se necesita crear un sencillo sistema de agenda para una sala de cine, que cumpla con las siguientes consideraciones:

- No hay cartelera de películas, se asume que todas las salas están pasando la misma película
- No hay que implementar ningún sistema de compra, es solo agendar el boleto
- El cine tiene 3 salas disponibles, que llamaremos Sala A, Sala B y Sala C
- Las salas tienen los siguientes horarios: 3:00 pm, 5:00 pm y 7:00 pm
- Las salas A y B tienen un aforo de 20 personas. La Sala C tiene un aforo de 30.
- El cine funciona todos los dias, por lo que el único limitante para una agenda es el horario y la disponibilidad de asientos para la sala seleccionada.

### Modelos recomendados:

Booker: representa a la persona que adquiere el boleto. Esta relacionado con un booking.

Booking: representa la agenda para una sala. Esta relacionado con una sala, un horario y un asiento.

Auditorium: representa cada sala en el cine. Tiene una cantidad de horarios disponibles y un numero de asientos.

Seat: representa un asiento numerado dentro de una sala. Esta relacionado con un booker y pertenece a una sala.

### Casos de uso a implementar:

- Debe existir una vista donde el posible booker pueda ver la disponibilidad de asientos en una sala para un horario específico.
- Debe existir un formulario que le permite al booker crear su booking para la sala en el horario elegido. Se le debe pedir un correo electrónico.
- Una vez realizado el proceso con éxito debera ser dirigido a una vista de confirmación donde le muestre los siguientes detalles del booking: correo electrónico, código de reserva (id del booking), sala seleccionada, horario seleccionado y el asiento seleccionado.

### Preguntas a responder:

- ¿Que mejoras hubieses implementado si fuese un proyecto "de la vida real"?
- Si se incluye un cátalogo de películas y cada sala muestra distintas películas ¿qué cambios en el diseño de la base de datos y lógica de negocio tendrías que implementar?
- ¿Cómo evitarias que dos usuarios agenden el mismo asiento en la misma sala para el mismo horario?