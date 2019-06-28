Create Table  ACTUALIZACION (ID NUMBER(2),  ANIMAL VARCHAR2(30), PREMISA VARCHAR2(100));	
	
Describe ACTUALIZACION;
	
	
Insert Into ACTUALIZACION 
		values( ' ' , ' ' , ' ' );
	
Insert Into ACTUALIZACION (ID, ANIMAL)
		values( ' ' , ' ' );

Insert Into ACTUALIZACION (ID, PREMISA)
		values( ' ' , ' ' );

Insert Into ACTUALIZACION (ANIMAL, PREMISA)
		values( ' ' , ' ' );

Insert Into ACTUALIZACION (ID)
		values ' ';

Insert Into ACTUALIZACION (ANIMAL)
		values ' ';

Insert Into ACTUALIZACION (PREMISA)
		values ' ';


SENTENCIA SELECT

Select * 
From	ACTUALIZACION;

Select  ID, ANIMAL
From	ACTUALIZACION

Select  ID, PREMISA
From	ACTUALIZACION;

Select  ANIMAL, PREMISA
From	ACTUALIZACION;

Select  ID
From    ACTUALIZACION;

Select  ANIMAL
From    ACTUALIZACION;

Select  PREMISA
From    ACTUALIZACION;

Select  ID, ANIMAL, PREMISA
From    ACTUALIZACION
Where   CONDICION = 'DATO';
 

SENTENCIA UPDATE

Update ACTUALIZACION
Set 	ID = 'DATO'
Where 	ID = ' ';  

Update ACTUALIZACION 
Set	ANIMAL = 'DATO'
Where	ANIMAL = ' ';  

Update ACTUALIZACION 
Set 	PREMISA = 'DATO'
Where 	PREMISA = ' ';  

Update ACTUALIZACION 
Set 	ID = 'DATO';

Update ACTUALIZACION 
Set 	ANIMAL = 'DATO';

Update ACTUALIZACION 
Set 	PREMISA = 'DATO';


SENTENCIA DELETE

Delete From ACTUALIZACION 
Where	ID = 'DATO';

Delete From ACTUALIZACION 
Where	ANIMAL = 'DATO';

Delete From ACTUALIZACION 
Where	PREMISA = 'DATO';

Delete From ID;

Delete From ANIMAL;

Delete From PREMISA;
