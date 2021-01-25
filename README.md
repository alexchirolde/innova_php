## TAREAS

- Crear un script que rellene la tabla de participantes. Para los avatar usar algunas urls de ejemplo para que tengan diferentes avatares.
- Crear un script que genere conversaciones aleatorias entre participantes con un número aleatorio n de mensajes entre ellos.
- Crear un script que rellene la tabla de etiquetas
- Crear un script que añada etiquetas aleatoriamente a las conversaciones existentes.

 
- Maquetar una página funcional de chat de acuerdo a las especificaciones y mockup propuesto.
- Opcional: añadir un autocompletar de etiquetas en la ficha de conversación
- Opcional: añadir un bloque de etiquetas donde aparezcan las etiquetas creadas y se puedan filtrar las conversaciones


### ESPECIFICACIONES

La página debe ser completamente funciona. Debe mostrar solo las conversaciones en las que esté el parcipante definido y permitir leer los mensajes y enviar nuevos mensajes a una conversacion. Una conversación puede estar compuesta por uno o varios participantes

Para las pruebas, definir una constante en el archivo config.php que indique cual es el ID del participante que ejecuta la web.

El listado de conversaciones ha de ser un scroll infinito. Al hacer click en una conversación se cargará por ajax el contenido. El listado de mensajes también será un scroll infinito , aunque la cabecera con los detalles y el bloque de enviar respuesta estarán siempre visibles.

Usar el editor https://quilljs.com/ como editor wysiwyg. Debe haber una constante definida en el archivo config.php que indique si el editor funciona en modo HTML o modo MARKDOWN

Se incluye un schema propuesto para la base de datos. Al entregar el proyecto, incluir un dump de la base de datos en caso de que haya modificado. Se valorará seguir un patrón MVC para el desarrollo de la prueba, así como una maquetación limpia y ajustada a responsive. Usar bootstrap 4 para la maquetación de la página.