delete table SISTEMA_EXPERTO;

Create Table SISTEMA_EXPERTO (IDP NUMBER(2), ID NUMBER(6), PREMISA VARCHAR2 (100), DESCRIPCION VARCHAR2(400));	
	
Describe SISTEMA_EXPERTO;	
	
Insert Into SISTEMA_EXPERTO 
		values('1','4096', '¿Es un Animal Cuadrúpedo?', 'Un cuadrúpedo es un animal que se traslada caminando sobre cuatro extremidades.');	

Insert Into SISTEMA_EXPERTO 
		values('2','6144', '¿Es un Animal De Carga?', 'Son aquellos animales que se utilizan para transportar cargas pesadas en trayectos largos, en caminos de difícil acceso.');	

Insert Into SISTEMA_EXPERTO 
		values('3','5120', '¿Es un Animal De Granja?', 'Estos animales has sido domesticados por el ser humano para ayudarse de su fuerza en el trabajo.');	

Insert Into SISTEMA_EXPERTO 
		values('4 ','7168','¿Es un Animal Que Se Destaca Por Su Velocidad?', 'Estos animales son identificados por su forma de galopear y por su forma de belleza. ');	

Insert Into SISTEMA_EXPERTO 
		values('5','6656', '¿El Animal Que Buscas Es Un BURRO?', 'EL BURRO: 
Mamífero équido doméstico más pequeño que el caballo, de pelo largo y áspero generalmente grisáceo, crin corta, orejas grandes y cola larga con un mechón de cerdas en la punta; por ser muy resistente se usa en especial para el trabajo del campo y para la carga.');	

Insert Into SISTEMA_EXPERTO 
		values('6','7680', '¿El Animal Que Buscas Es Un CABALLO?', 'EL CABALLO:  Mamífero équido, macho, de tamaño mediano o grande, pelo corto de color generalmente uniforme y orejas cortas; se domestica con facilidad y suele usarse para la monta; hay muchas especies diferentes.');	

Insert Into SISTEMA_EXPERTO 
		values('7','4608', '¿Es un Animal Canino?', 'Los cánidos se distinguen por ser carnívoros y digitígrados, lo cual quiere decir que caminan sobre sus dedos, esto los hace ser más rápidos y silenciosos que otros animales.');	

Insert Into SISTEMA_EXPERTO 
		values('8','4352', '¿El Animal Que Buscas Es Un GATO?', 'EL GATO: Mamífero felino de tamaño generalmente pequeño, cuerpo flexible, cabeza redonda, patas cortas, cola larga, pelo espeso y suave, largos bigotes y uñas retráctiles; es carnívoro y tiene gran agilidad, buen olfato, buen oído y excelente visión nocturna; existen muchas especies diferentes. ');	

Insert Into SISTEMA_EXPERTO 
		values('9','4864', '¿El Animal Que Buscas Es Un PERRO?', 'EL PERRO: Mamífero carnívoro doméstico de la familia de los cánidos que se caracteriza por tener los sentidos del olfato y el oído muy finos, por su inteligencia y por su fidelidad al ser humano, que lo ha domesticado desde tiempos prehistóricos; hay muchísimas razas, de características muy diversas.');	

Insert Into SISTEMA_EXPERTO 
		values('10','5632', '¿El Animal Tiene Lana?', 'Una parte de estos animales sirve para tejer sacos y ruanas etc.');

Insert Into SISTEMA_EXPERTO 
		values('11','5376', '¿El Animal Que Buscas Es Un CERDO?', 'EL CERDO: Mamífero paquidermo de cuerpo pesado y rechoncho, piel generalmente rosada o parda con fuertes cerdas, cabeza grande, hocico chato y casi cilíndrico, grandes orejas caídas, patas cortas, y cola pequeña y delgada; es doméstico y se cría en granjas.');

Insert Into SISTEMA_EXPERTO 
		values('12','5888', '¿El Animal Que Buscas Es Un OVEJA?', 'LA OVEJA: Mamífero rumiante ovino, hembra, con el cuerpo cubierto de lana espesa y flexible, generalmente blanca o negra; se cría en domesticidad y de él se aprovechan especialmente la lana, la carne y la leche.');

Insert Into SISTEMA_EXPERTO 
		values('13','2048', '¿El Animal Nada?', 'Animal que se puede tener como mascota y siempre permanece en el agua.');

Insert Into SISTEMA_EXPERTO 
		values('14','1024', '¿El Animal tiene plumas?', 'Estos animales se destacan porque todos tienen plumas.');

Insert Into SISTEMA_EXPERTO 
		values('15','512', '¿El animal Se Come en Diciembre?', 'Es aquel animal que se disfruta por tradicion en las noches navideñas y se prepara de diferentes formas.');

Insert Into SISTEMA_EXPERTO 
		values('16','256', '¿El Animal Que Buscas Es Una GALLINA?', 'LA GALLINA: la subespecie doméstica de la especie Gallus gallus, una especie de ave galliforme de la familia Phasianidae procedente del sudeste asiático. Es el ave más numerosa del planeta, pues se calcula que supera los 16 000 millones de ejemplares.');

Insert Into SISTEMA_EXPERTO 
		values('17','768', '¿El Animal Que Buscas Es Un PAVO?', 'EL PAVO: Ave gallinácea de hasta 1 m de alto, plumaje generalmente negruzco o pardo verdoso, con manchas blancas en los extremos de las alas y en la cola, cuello largo y carnosidades rojas en este y en la cabeza; es oriunda de América del Norte; su carne es comestible y muy apreciada.');

Insert Into SISTEMA_EXPERTO 
		values('18','1536', '¿El Animal Aprende a Hablar?', 'Este animal aprende y repite con facilidad algunas palabras que escucha de conversaciones.');

Insert Into SISTEMA_EXPERTO  
		values('19','1280', 'El Animal Que Buscas Es Un PERICO?', 'EL PERICO: Ave trepadora, especie de papagayo, de unos 25 cm de altura, con pico rosáceo, ojos encarnados de contorno blanco, manchas rojizas, diseminadas en el cuello, lomo verdinegro y vientre verde pálido, plumas remeras de color verde azulado en el lado externo y amarillo en el interno, y mástil negro, plumas timoneras verdosas y su mástil negro por encima y amarillento por debajo, y pies de color gris.');

Insert Into SISTEMA_EXPERTO 
		values('20','1792', '¿El Animal Que Buscas Es Un LORO?', 'EL LORO: Los: Se caracteriza por tener un pico curvado, con una mandíbula inferior con cierta movilidad en su conexión con el cráneo y situada en una posición bastante vertical. Además, tienen una gran capacidad craneal y son uno de los grupos de aves más inteligentes. Son aves que vuelan bien y son capaces de agarrarse a las ramas de los árboles y trepar por ellas con destreza, gracias a sus garras prensiles zigodáctilas (con dos dedos hacia delante y dos hacia atrás.');

Insert Into SISTEMA_EXPERTO 
		values('21','3072', '¿El Animal Tiene Escamas?', 'Utiliza sus escamas como un medio de protección.');

Insert Into SISTEMA_EXPERTO 
		values('22','3584', '¿El Animal Que Buscas Es Un Pez?', 'EL PESCADO: Serie de animales que viven en el agua (salada o dulce) y que el hombre ha venido utilizando como alimentos desde tiempos más remotos. El pescado es un alimento de gran importancia para la humanidad por su contenido proteico y por la potencialidad de los recursos del mar.');

Insert Into SISTEMA_EXPERTO 
		Values('23','2560', '¿ El Animal Que Vive La Mayor Parte De Su Tiempo En El Agua?, Pero Su Tamaño Es Grande', 'Estos animales pueden convivir juntos, pueden estar en el agua juntos pero se distinguen por su tamaño.');

Insert Into SISTEMA_EXPERTO 
		values('24','2304', '¿El Animal Que Buscas Es Un PATO?', 'EL PATO: Ave palmípeda de plumaje denso, patas cortas y pico más ancho en la punta que en la base, que vive en estado salvaje o domesticada; nada y bucea muy bien, pero camina con torpeza; es comestible y muy estimada como pieza de caza; hay muchas especies, que varían en tamaño y color.');

Insert Into SISTEMA_EXPERTO 
		values('25','2816', '¿El Animal Que Buscas Es Un GANSO?', 'EL GANSO: Ave palmípeda de hasta 1 m de longitud, plumaje generalmente gris o blanco, alas grandes, patas cortas, cuello largo y pico rosado o anaranjado; es monógama y migradora, y se cría en ambientes húmedos; es apreciada por sus plumas, su carne y su hígado.');
    
    
    
select *from SISTEMA_EXPERTO;

Select * From Global_Name;

select SISTEMA_EXPERTO 
from v$system_parameter;
    