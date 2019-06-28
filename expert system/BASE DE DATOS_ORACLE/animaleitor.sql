delete table SISTEMA_EXPERTO;

Create Table SISTEMA_EXPERTO (IDP NUMBER(2), ID NUMBER(6), PREMISA VARCHAR2 (100), DESCRIPCION VARCHAR2(400));	
	
Describe SISTEMA_EXPERTO;	
	
Insert Into SISTEMA_EXPERTO 
		values('1','4096', '�Es un Animal Cuadr�pedo?', 'Un cuadr�pedo es un animal que se traslada caminando sobre cuatro extremidades.');	

Insert Into SISTEMA_EXPERTO 
		values('2','6144', '�Es un Animal De Carga?', 'Son aquellos animales que se utilizan para transportar cargas pesadas en trayectos largos, en caminos de dif�cil acceso.');	

Insert Into SISTEMA_EXPERTO 
		values('3','5120', '�Es un Animal De Granja?', 'Estos animales has sido domesticados por el ser humano para ayudarse de su fuerza en el trabajo.');	

Insert Into SISTEMA_EXPERTO 
		values('4 ','7168','�Es un Animal Que Se Destaca Por Su Velocidad?', 'Estos animales son identificados por su forma de galopear y por su forma de belleza. ');	

Insert Into SISTEMA_EXPERTO 
		values('5','6656', '�El Animal Que Buscas Es Un BURRO?', 'EL BURRO: 
Mam�fero �quido dom�stico m�s peque�o que el caballo, de pelo largo y �spero generalmente gris�ceo, crin corta, orejas grandes y cola larga con un mech�n de cerdas en la punta; por ser muy resistente se usa en especial para el trabajo del campo y para la carga.');	

Insert Into SISTEMA_EXPERTO 
		values('6','7680', '�El Animal Que Buscas Es Un CABALLO?', 'EL CABALLO:  Mam�fero �quido, macho, de tama�o mediano o grande, pelo corto de color generalmente uniforme y orejas cortas; se domestica con facilidad y suele usarse para la monta; hay muchas especies diferentes.');	

Insert Into SISTEMA_EXPERTO 
		values('7','4608', '�Es un Animal Canino?', 'Los c�nidos se distinguen por ser carn�voros y digit�grados, lo cual quiere decir que caminan sobre sus dedos, esto los hace ser m�s r�pidos y silenciosos que otros animales.');	

Insert Into SISTEMA_EXPERTO 
		values('8','4352', '�El Animal Que Buscas Es Un GATO?', 'EL GATO: Mam�fero felino de tama�o generalmente peque�o, cuerpo flexible, cabeza redonda, patas cortas, cola larga, pelo espeso y suave, largos bigotes y u�as retr�ctiles; es carn�voro y tiene gran agilidad, buen olfato, buen o�do y excelente visi�n nocturna; existen muchas especies diferentes. ');	

Insert Into SISTEMA_EXPERTO 
		values('9','4864', '�El Animal Que Buscas Es Un PERRO?', 'EL PERRO: Mam�fero carn�voro dom�stico de la familia de los c�nidos que se caracteriza por tener los sentidos del olfato y el o�do muy finos, por su inteligencia y por su fidelidad al ser humano, que lo ha domesticado desde tiempos prehist�ricos; hay much�simas razas, de caracter�sticas muy diversas.');	

Insert Into SISTEMA_EXPERTO 
		values('10','5632', '�El Animal Tiene Lana?', 'Una parte de estos animales sirve para tejer sacos y ruanas etc.');

Insert Into SISTEMA_EXPERTO 
		values('11','5376', '�El Animal Que Buscas Es Un CERDO?', 'EL CERDO: Mam�fero paquidermo de cuerpo pesado y rechoncho, piel generalmente rosada o parda con fuertes cerdas, cabeza grande, hocico chato y casi cil�ndrico, grandes orejas ca�das, patas cortas, y cola peque�a y delgada; es dom�stico y se cr�a en granjas.');

Insert Into SISTEMA_EXPERTO 
		values('12','5888', '�El Animal Que Buscas Es Un OVEJA?', 'LA OVEJA: Mam�fero rumiante ovino, hembra, con el cuerpo cubierto de lana espesa y flexible, generalmente blanca o negra; se cr�a en domesticidad y de �l se aprovechan especialmente la lana, la carne y la leche.');

Insert Into SISTEMA_EXPERTO 
		values('13','2048', '�El Animal Nada?', 'Animal que se puede tener como mascota y siempre permanece en el agua.');

Insert Into SISTEMA_EXPERTO 
		values('14','1024', '�El Animal tiene plumas?', 'Estos animales se destacan porque todos tienen plumas.');

Insert Into SISTEMA_EXPERTO 
		values('15','512', '�El animal Se Come en Diciembre?', 'Es aquel animal que se disfruta por tradicion en las noches navide�as y se prepara de diferentes formas.');

Insert Into SISTEMA_EXPERTO 
		values('16','256', '�El Animal Que Buscas Es Una GALLINA?', 'LA GALLINA: la subespecie dom�stica de la especie Gallus gallus, una especie de ave galliforme de la familia Phasianidae procedente del sudeste asi�tico. Es el ave m�s numerosa del planeta, pues se calcula que supera los 16 000 millones de ejemplares.');

Insert Into SISTEMA_EXPERTO 
		values('17','768', '�El Animal Que Buscas Es Un PAVO?', 'EL PAVO: Ave gallin�cea de hasta 1 m de alto, plumaje generalmente negruzco o pardo verdoso, con manchas blancas en los extremos de las alas y en la cola, cuello largo y carnosidades rojas en este y en la cabeza; es oriunda de Am�rica del Norte; su carne es comestible y muy apreciada.');

Insert Into SISTEMA_EXPERTO 
		values('18','1536', '�El Animal Aprende a Hablar?', 'Este animal aprende y repite con facilidad algunas palabras que escucha de conversaciones.');

Insert Into SISTEMA_EXPERTO  
		values('19','1280', 'El Animal Que Buscas Es Un PERICO?', 'EL PERICO: Ave trepadora, especie de papagayo, de unos 25 cm de altura, con pico ros�ceo, ojos encarnados de contorno blanco, manchas rojizas, diseminadas en el cuello, lomo verdinegro y vientre verde p�lido, plumas remeras de color verde azulado en el lado externo y amarillo en el interno, y m�stil negro, plumas timoneras verdosas y su m�stil negro por encima y amarillento por debajo, y pies de color gris.');

Insert Into SISTEMA_EXPERTO 
		values('20','1792', '�El Animal Que Buscas Es Un LORO?', 'EL LORO: Los: Se caracteriza por tener un pico curvado, con una mand�bula inferior con cierta movilidad en su conexi�n con el cr�neo y situada en una posici�n bastante vertical. Adem�s, tienen una gran capacidad craneal y son uno de los grupos de aves m�s inteligentes. Son aves que vuelan bien y son capaces de agarrarse a las ramas de los �rboles y trepar por ellas con destreza, gracias a sus garras prensiles zigod�ctilas (con dos dedos hacia delante y dos hacia atr�s.');

Insert Into SISTEMA_EXPERTO 
		values('21','3072', '�El Animal Tiene Escamas?', 'Utiliza sus escamas como un medio de protecci�n.');

Insert Into SISTEMA_EXPERTO 
		values('22','3584', '�El Animal Que Buscas Es Un Pez?', 'EL PESCADO: Serie de animales que viven en el agua (salada o dulce) y que el hombre ha venido utilizando como alimentos desde tiempos m�s remotos. El pescado es un alimento de gran importancia para la humanidad por su contenido proteico y por la potencialidad de los recursos del mar.');

Insert Into SISTEMA_EXPERTO 
		Values('23','2560', '� El Animal Que Vive La Mayor Parte De Su Tiempo En El Agua?, Pero Su Tama�o Es Grande', 'Estos animales pueden convivir juntos, pueden estar en el agua juntos pero se distinguen por su tama�o.');

Insert Into SISTEMA_EXPERTO 
		values('24','2304', '�El Animal Que Buscas Es Un PATO?', 'EL PATO: Ave palm�peda de plumaje denso, patas cortas y pico m�s ancho en la punta que en la base, que vive en estado salvaje o domesticada; nada y bucea muy bien, pero camina con torpeza; es comestible y muy estimada como pieza de caza; hay muchas especies, que var�an en tama�o y color.');

Insert Into SISTEMA_EXPERTO 
		values('25','2816', '�El Animal Que Buscas Es Un GANSO?', 'EL GANSO: Ave palm�peda de hasta 1 m de longitud, plumaje generalmente gris o blanco, alas grandes, patas cortas, cuello largo y pico rosado o anaranjado; es mon�gama y migradora, y se cr�a en ambientes h�medos; es apreciada por sus plumas, su carne y su h�gado.');
    
    
    
select *from SISTEMA_EXPERTO;

Select * From Global_Name;

select SISTEMA_EXPERTO 
from v$system_parameter;
    