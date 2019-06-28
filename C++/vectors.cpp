#include <cstdlib>
#include <iostream>
#include <conio.h>
#define  localizar  (struct nodo *) malloc (sizeof (struct nodo))
#define AVL_arbol (struct AVL *) malloc (sizeof (struct AVL))
#define MAXIMO 20
using namespace std;
//Primera Estructura (Registro)
struct alumno
{
       char codigo[50];
       char nombre[50];
       char telefono[50];
       char sexo[50];
       char edad[50];
}yo;
//Estructura lista enlazada
struct lista
{
       int dato;
       struct lista *sig;
};
//Estructura de la Cola
struct cola 
{
       int dato;
       struct cola *sig;
};
//EStructuras para Arbol AVL
struct AVL {
	int info;
	int bal;
	struct AVL *izq;
	struct AVL *der;
};
//-AVL
struct LIFO {
	int t;
	struct AVL *a [MAXIMO];
};
//Variables para programa de vectores y matrices 
int V[5]={2,41,16,-19,22};
int M1[4][4]={{4,8,7,19},{20,-15,13,12},{-8,10,-20,14},{16,6,3,-25}};
int M2[4][4]={{2,4,6,8},{3,16,5,7},{-30,-12,17,5},{20,10,-15,-4}};
//Prototipo de funciones Vectores y Matrices
void imprimovec();
void sumavec();
void impares();
void invertido();
void inprimomat1();
void sumamat1();
void filasmat2();
void columnasmat1();
void diagonalmat1();
void esquinasmat2();
void mat1ymat2();
void multiplicomat1ymat2();
//Funciones Para registro
void registro();
//Funciones para lista enlazada
int lista_enlazada();
void crearlista(lista **primero,lista **ultimo);
void enlistar(lista **primero,lista **ultimo,lista *ptr,int elemento);
void desenlista(lista **primero,lista **ultimo,lista *ptr);
void recorrer(lista *primero,lista *ultimo,lista *ptr);
//Variables para programa de conjuntos 
int C[8]={10,39,29,45,12,43,56,98};
int C2[8]={39,23,16,43,98,36,94,10};
//Funciones de Conjuntos 
void unio();
void inter();
//Funciones a utilizar para el manejo de la Cola
int colas();
void crearcola(cola **primero,cola **ultimo);
void encolar(cola **primero,cola **ultimo,int elemento);
void desencolar(cola **primero);
void borrarcola(cola **q);
void recorrer(cola *primero,cola *ultimo);
//Funciones a utilizar para el manejo del arbol AVL
int avl();
void inorden (struct AVL *raiz);
int ins_avl(struct AVL **, int);
int retirar_avl(struct AVL **, int);
void r_derecha (struct AVL *p,struct AVL *q);
void r_izquierda (struct AVL *p,struct AVL *q);
void dr_derecha (struct AVL *p,struct AVL **q);
void dr_izquierda (struct AVL *p,struct AVL **q);
void bal_der (struct AVL *q,struct AVL **t,int *terminar);
void bal_izq (struct AVL *q,struct AVL **t,int *terminar);
int lea();
void init_pila (struct LIFO *p);
int pila_vacia (struct LIFO *p);
void ins_pila (struct LIFO *p, struct nodo *s);
void retira_pila (struct LIFO *p,struct nodo **s);
//Programa Principal
int main()
{
    system("color 4B");
    int o,s;    
    do
    {
    cout<<"\t\t**************  UNIVERSIDAD INCCA DE COLOMBIA  *************\n\n\n\n\n";
    cout<<"\t\tESTRUCTURA DE DATOS\n\n\n\n\n";
    cout<<"\t\tJEISSON ARTURO GONZALEZ PIRACOCA\n\n\n";
    cout<<"\t\t72806\n\n\n\n\n";
    cout<<"\t\t************************************************************\n\n\n\n\n";
    cout<<"Oprima 1 para seguir\n";
    cin>>s;
    }
    while(s!=1);
    {
    }
    do
    { 
    system("color 1F");
    system("cls");       
    cout<<"\t\t           Menu Principal              \n\n";
    cout<<"1. Vectores y Matrices\n";
    cout<<"2. Registro\n";
    cout<<"3. Conjuntos\n";
    cout<<"4. Listas\n";
    cout<<"5. Cola\n";
    cout<<"6. Arboles\n";
    cout<<"7. Salir\n\n";
    cout<<"________________________________________________________________________________\n";
    cin>>o;
    switch(o)
    {
             case 1:
                  int op;
                  do
                  {
                  system("cls");
                  cout<<"\t\tVectores y Matrices\n\n";
                  cout<<"1. Ver vector\n";
                  cout<<"2. Sumar vector\n";
                  cout<<"3. Ver impares del vector\n";
                  cout<<"4. Invertir vector\n";
                  cout<<"5. Ver primera matriz\n";
                  cout<<"6. Sumar la primera matriz\n";
                  cout<<"7. Ver filas de la segunda matriz\n";
                  cout<<"8. Ver columnas de la primera matriz\n";
                  cout<<"9. Ver diagonal de la primera matriz\n";
                  cout<<"10. Ver esquinas de la segunda matriz\n";
                  cout<<"11. Sumar la primera matrz con la segunda matriz\n";
                  cout<<"12. Multiplicar la primera matrz con la segunda matriz\n";
                  cout<<"13. Salir\n\n";
                  cout<<"________________________________________________________________________________\n";
                  cin>>op;
                  switch (op)
                  {
                         case 1:
                              system("cls");
                              imprimovec();
                              getch();
                              break;
                         case 2:
                              system("cls");
                              sumavec();
                              getch();
                              break;
                         case 3:
                              system("cls");
                              impares();
                              getch();
                              break;
                         case 4:
                              system("cls");
                              invertido();
                              getch();
                              break;
                         case 5:
                              system("cls");
                              inprimomat1();
                              getch();
                              break;
                         case 6:
                              system("cls");
                              sumamat1();
                              getch();
                              break;
                         case 7:
                              system("cls");
                              filasmat2();
                              getch();
                              break;
                         case 8:
                              system("cls");
                              columnasmat1();
                              getch();
                              break;
                         case 9:
                              system("cls");
                              diagonalmat1();
                              getch();
                              break;
                         case 10:
                              system("cls");
                              esquinasmat2();
                              getch();
                              break;
                         case 11:
                              system("cls");
                              mat1ymat2();
                              getch();
                              break;
                         case 12:
                              system("cls");
                              multiplicomat1ymat2();
                              getch();
                              break;
                  }
                  }
                  while(op!=13);
                  {

                  }
                  break;
             case 2:
                  system("cls");
                  registro();
                  getch();
                  break;
             case 3:
                  int opc;
                  do
                  {
                  system("cls");
                  cout<<"\t\tConjuntos\n\n";
                  cout<<"1. Union de conjuntos\n";
                  cout<<"2. Interseccion de conjuntos\n";
                  cout<<"3. Salir\n\n";
                  cout<<"________________________________________________________________________________\n";
                  cin>>opc;
                  switch (opc)
                  {
                         case 1:
                              system("cls");
                              unio();
                              getch();
                              break;
                         case 2:
                              system("cls");
                              inter();
                              getch();
                              break;
                  }
                  }
                  while(opc!=3);
                  {
                              
                  }
                  break;
             case 4:
                  system("cls");
                  lista_enlazada();
                  getch();
                  break;
             case 5:
                  system("cls");
                  colas();
                  getch();
                  break;
             case 6:
                  system("cls");
                  avl();
                  getch();
                  break;
             default:
                      cout<<"Opcion no valida\n";    
    }
    }
    while(o!=7);
    {
    return 0;
    }
}
//----------------------------------Funciones Vectores Y Matrices----------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------
void imprimovec()
{
     int i;
     cout<<"1. IMPRIMIR VECTOR\n";
     cout<<" \n\n "; 
     for( i=0;i<5;i++)
     {
          cout<<V[i]<<" ";
     }
     cout<<" \n\n\n ";
}
void sumavec()
{
     int i,s=0;
     cout<<"2. SUMAR LOS COMPONENTES DEL VECTOR\n";
     cout<<" \n\n "; 
     for( i=0;i<5;i++)
     {
          s=V[i]+s;     
     }
     cout<<" el resultado de la suma de los componenetes dentro del vector es "<<s<<"\n";
     cout<<" \n\n\n ";      
}
void impares()
{
     int i,m;
     cout<<"3. HALLAR LOS NUMEROS IMPARES DEL VECTOR\n";
     cout<<" \n\n "; 
     for(i=0;i<5;i++)
     {
          if(V[i]%2==0) 
          {
                        cout<<V[i]<<" ";
          }    
     }
                 cout<<" \n\n\n ";
}
void invertido()
{
     int i;
     cout<<"4. INVERTIR VECTOR\n"; 
     cout<<" \n\n "; 
     for( i=4;i>=0;i--)
     {
          cout<<V[i]<<" ";                                  
     }
     cout<<" \n\n\n ";
}
void inprimomat1()
{
     int i,j;
     cout<<"5. IMPRIMIR MATRIZ 1 \n"; 
     cout<<" \n\n ";   
     for (i=0;i<4;i++)
     {
         for (j=0;j<4;j++)
         {
             cout<<M1[i][j]<<" ";
         }
         cout<<" \n ";
     }
     cout<<" \n\n\n ";
}
void sumamat1()
{
     int s=0,i,j;
     cout<<"6. SUMAR ELEMENTOS DE LA MATRIZ 1";
     cout<<" \n\n "; 
     for (i=0;i<4;i++)
     {
         for (j=0;j<4;j++)
         {
             s=M1[i][j]+s;
         }
                      
     }
     cout<<" el resultado de la suma de los componenetes dentro de la matriz: "<<s<<"\n";
     cout<<" \n\n\n ";    
}
void filasmat2()
{
     int i,j;
     cout<<"7. IMPRIMIR FILAS MATRIZ 2";
     cout<<" \n\n ";   
     for (i=0;i<4;i++)
     {
         cout<<"fila "<<j+1<<": ";
         for (j=0;j<4;j++)
         {
             cout<<M2[i][j]<<" ";
         }
         cout<<" \n ";
     }
     cout<<" \n\n\n ";        
}
void columnasmat1()
{
     int i,j;
     cout<<"8. IMPRIMIR COLUMNAS MATRIZ 1";
     cout<<" \n\n ";  
     for (j=0;j<4;j++)
     {
         cout<<"columnas "<<j+1<<"\n";
         for (i=0;i<4;i++)
         {
             cout<<M1[i][j]<<" ";
             cout<<" \n ";
         }
         cout<<" \n ";
     }
     cout<<" \n\n\n ";  
}
void diagonalmat1()
{
     int i,j;
     cout<<"9. IMPRIMIR DIAGONAL MATRIZ 1";
     cout<<" \n\n ";   
     for (i=0;i<4;i++)
     {
         for (j=0;j<4;j++)
     {
         if(i==j)
         {
                 cout<<M1[i][j]<<" ";
         }
     }
         cout<<" \n ";
     }
     cout<<" \n\n\n ";                   
}
void esquinasmat2()
{
     int i,j;
     cout<<"10. IMPRIMIR ESQUINAS MATRIZ 2";
     cout<<" \n ";  
     for (i=0;i<4;i++)
     {
         for (j=0;j<4;j++)
         {
             if(i==0&&j==0||i==0&&j==3||i==3&&j==0||i==3&&j==3){
             cout<<M2[i][j]<<" ";
         }     
         cout<<" ";
     }
     cout<<" \n\n\n "; 
}
}
void mat1ymat2()
{
     int i,j,S[4][4];
     cout<<"11. SUMAR MATRICES 1 Y 2";
     cout<<" \n\n ";  
     for (i=0;i<4;i++)
     {
         for (j=0;j<4;j++)
         {
             S[i][j]=M1[i][j]+M2[i][j];
         }
     }
     for (i=0;i<4;i++)
     {
         for (j=0;j<4;j++)
         {
             cout<<S[i][j]<<" ";
         }
         cout<<" \n ";
     }
     cout<<" \n\n\n ";                
}
void multiplicomat1ymat2()
{
     int i,j,P[4][4];
     cout<<"12. MULTIPLICAR MATRICES 1 Y 2";
     cout<<" \n\n "; 
     for (i=0;i<4;i++)
     {
         for (j=0;j<4;j++)
         {
             P[i][j]=M1[i][j]*M2[j][i];
         }
     }
     for (i=0;i<4;i++)
     {
         for (j=0;j<4;j++)
         {
             cout<<P[i][j]<<" ";
         }
         cout<<" \n ";
     }
     cout<<" \n\n\n "; 
}
//----------------------------------Funciones Registro---------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------
void registro()
{
    
    int i,p;
    cout<<"Los datos de cuantas personas desea ingresar:\n\n";
    cin>>p;
    system("cls");
    for(i=0;i<p;i++)
    {
                    cout<<"\tINGRESAR REGISTRO\n\n";
                    cout<<"Ingresar codigo: \n";
                    cin>>yo.codigo;
                    cout<<"Ingresar Nombre: \n";
                    cin>>yo.nombre;
                    cout<<"Ingresar telefono: \n";
                    cin>>yo.telefono;
                    cout<<"Ingresar sexo: \n";
                    cin>>yo.sexo;
                    cout<<"Ingresar edad: \n";
                    cin>>yo.edad;
                    cout<<"\n";
    }
    system("cls");
    printf("\tCodigo\tNombre\tTelefono\tSexo\tEdad\n");
    for(i=0;i<p;i++)
    {
                    cout<<"\t"<<yo.codigo;
                    cout<<"\t"<<yo.nombre;
                    cout<<"\t"<<yo.telefono;
                    cout<<"\t\t"<<yo.sexo;
                    cout<<"\t"<<yo.edad;
                    cout<<"\n";
    }
}
//----------------------------------Funciones Lista enlazada---------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------
int lista_enlazada()
{
    struct lista *primero;
    struct lista *ultimo;
    struct lista *ptr;
    primero=(lista*)malloc(sizeof(lista));
    ultimo=(lista*)malloc(sizeof(lista));
    int op,aux;
    
    do{
        system("cls");
        cout<<"\t\tLista enlazada\n\n";
        cout<<"1. Inicializar la lista\n";
        cout<<"2. Mostrar la lista\n";
        cout<<"3. Anidar elemento\n";
        cout<<"4. Eliminar elemento\n";
        cout<<"5. Salir\n";
        cout<<"________________________________________________________________________________\n";
        cin>>op;
        switch(op)
        {
                  case 1:
                       system("cls");
                       crearlista(&primero,&ultimo);
                       break;
                  case 2:
                       system("cls");
                       recorrer(primero,ultimo,ptr);
                       break;
                  case 3:
                       system("cls");
                       cout<<"Ingrese el valor:\n";
                       cin>>aux;
                       enlistar(&primero,&ultimo,ptr,aux);
                       break;
                  case 4:
                       system("cls");
                       desenlista(&primero,&ultimo,ptr);
                       break;
        }
    }
    while(op!=5);
    {
                 return 0;
    }
}
void crearlista(lista **primero,lista **ultimo)
{
     *primero=NULL;
     *ultimo=NULL;
}

void enlistar(lista **primero,lista **ultimo,lista *ptr,int elemento)
{
     ptr=(lista*)malloc(sizeof(lista));
     ptr->dato=elemento;
     ptr->sig=NULL;
     if(*primero==NULL)
     {
                      cout<<"La cola esta vacia\n";
                      *primero=ptr;
                      *ultimo=ptr;
     }
     else
     {
         (*ultimo)->sig=ptr;
         *ultimo=ptr;
     }
     cout<<"Anidado\n";
     getch();
}

void desenlista(lista **primero, lista **ultimo,lista *ptr)
{
     int o;
     ptr=*primero;
     struct lista *ptr2;
     if(*primero==NULL)
     {
                       cout<<"Lista vacia\n";
     }
     else
     {
         do
         {
                       system("cls");
                       cout<<"\t\tEliminar de la lista\n\n";
                       cout<<"1. Eliminar el primero\n";
                       cout<<"2. Eliminar el ultimo\n";
                       cout<<"3. Salir\n";
                       cout<<"________________________________________________________________________________\n";
                       cin>>o;
                       switch(o)
                       {
                                case 1:
                                     system("cls");
                                     (*primero)=(*primero)->sig;
                                     cout<<"Eliminado";
                                     getch();
                                     break;
                                case 2:
                                     system("cls");
                                     if((*primero)->sig==NULL)
                                     {
                                                            free(*primero);
                                                            (*primero)=NULL;
                                     }
                                     else
                                     {
                                         (ptr)=(*primero);
                                         (ptr2)=(ptr->sig);
                                         while(ptr2->sig!=NULL)
                                         {
                                                               (ptr)=(ptr2);
                                                               (ptr2)=(ptr2)->sig;
                                         }
                                         ptr->sig=NULL;
                                         free(ptr2);
                                         cout<<"Eliminado\n";
                                     }
                                     getch();
                                     break;
                       }
         }
         while(o!=3);
         {
         }
     getch();
     }
}

void recorrer(lista *primero,lista *ultimo,lista *ptr)
{
     ptr=primero;
     while(ptr!=NULL)
     {
                     cout<<"\n"<<ptr->dato;
                     ptr=ptr->sig;
     }
     getch();
}
//----------------------------------Funciones Conjuntos--------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------
void unio()
{
     int i,j;
     cout<<"La union es la siguiente:\n\n";
     cout<<"C={";
     for(i=0;i<8;i++)
     {
                     for(j=0;j<8;j++)
                     {
                                     if(C2[j]==C[i])
                                     {
                                             cout<<j<<" ";
                                     }
                     }
     }
     cout<<"}\n";
}
void inter()
{
     int i,j;
     cout<<"La interseccion es la siguiente:\n\n";
     cout<<"C={";
     for(i=0;i<8;i++)
     {
                     cout<<C[i]<<" ";
     }
     for(j=0;j<8;j++)
     {
                     cout<<C2[j]<<" ";                      
     }
     cout<<"}\n";
}
//----------------------------------Funciones Cola-------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------
int colas()
{
    struct cola *primero;
    struct cola *ultimo;
    primero=(cola*)malloc(sizeof(cola));
    ultimo=(cola*)malloc(sizeof(cola));
    
    int op,aux;
    
    do{
        system("cls");
        cout<<"\t\tCola\n\n";
        cout<<"1. Inicializar la cola\n";
        cout<<"2. Mostrar la cola\n";
        cout<<"3. Encolar\n";
        cout<<"4. Desencolar\n";
        cout<<"5. Salir\n";
        cout<<"________________________________________________________________________________\n";
        cin>>op;
        switch(op)
        {
                  case 1:
                       system("cls");
                       crearcola(&primero,&ultimo);
                       break;
                  case 2:
                       system("cls");
                       recorrer(primero,ultimo);
                       break;
                  case 3:
                       system("cls");
                       cout<<"Ingrese el valor:\n";
                       cin>>aux;
                       encolar(&primero,&ultimo,aux);
                       break;
                  case 4:
                       system("cls");
                       desencolar(&primero);
                       break;
        }
    }
    while(op!=5);
    {
                 return 0;
    }
}
void crearcola(cola **primero,cola **ultimo)
{
     *primero=NULL;
     *ultimo=NULL;
}

void encolar(cola **primero,cola **ultimo,int elemento)
{
     struct cola *ptr;
     ptr=(cola*)malloc(sizeof(cola));
     ptr->dato=elemento;
     ptr->sig=NULL;
     if(*primero==NULL)
     {
                      cout<<"La cola esta vacia\n";
                      *primero=ptr;
                      *ultimo=ptr;
     }
     else
     {
         (*ultimo)->sig=ptr;
         *ultimo=ptr;
     }
     cout<<"Encolado\n";
     getch();
}

void desencolar(cola **primero)
{
     if(*primero==NULL)
     {
                       cout<<"Cola vacia\n";
     }
     else
     {
         (*primero)=(*primero)->sig;
         cout<<"Desencolado";
     }
     getch();
}

void recorrer(cola *primero,cola *ultimo)
{
     cola *ptr=primero;
     while(ptr!=NULL)
     {
                     cout<<"\n"<<ptr->dato;
                     ptr=ptr->sig;
     }
     getch();
}
//----------------------------------Funciones AVL--------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------
int avl()
{
    int n,lea();
	void inorden (struct AVL *raiz);
	int ins_avl(struct AVL **, int);
    int retirar_avl(struct AVL **, int);
	struct AVL *raiz=NULL; 
    n = lea();
	while (n != 9999) 
    {
		ins_avl (&raiz,n);
		cout<<"Ingrese el valor \n"; 
        n = lea();
	}
	inorden (raiz); 
    cout<<"\n";
	cout<<"cual nodo desea retirar? \n";
	n = lea ();
	while (n != 9999) 
    {
		retirar_avl (&raiz,n);
		inorden (raiz); 
        cout<<"\n";
		cout<<"cual nodo desea retirar?\n";
		n = lea();
	}
	inorden(raiz);
    cout<<"\n";
}
void inorden (struct AVL *raiz)
{
	if (raiz != NULL) 
    {
		inorden (raiz->izq);
		cout<<raiz->info<<" "<<raiz->bal<<" ";
		inorden (raiz->der);
	}
}

void r_derecha (struct AVL *p,struct AVL *q)
{
	p->bal = 0;
	q->bal = 0;
	p->izq = q->der;
	q->der = p;
}
void r_izquierda (struct AVL *p,struct AVL *q)
{
	p->bal = 0;
	q->bal = 0;
	p->der = q->izq;
	q->izq = p;
}

void dr_derecha (struct AVL *p,struct AVL **q)
{
	struct AVL *r;

	r = (*q)->der;
	(*q)->der = r->izq;
	r->izq = *q;
	p->izq = r->der;
	r->der = p;
	switch (r->bal) {
		case -1 : (*q)->bal = 1;
				p->bal = 0;
				break;
		case  0 : (*q)->bal = p->bal = 0;
				break;
		case  1 : (*q)->bal = 0;
				p->bal = -1;
				break;
	}
	r->bal = 0;
	*q = r;
}
void dr_izquierda (struct AVL *p,struct AVL **q)
{
	struct AVL *r;

	r = (*q)->izq;
	(*q)->izq = r->der;
	r->der = *q;
	p->der = r->izq;
	r->izq = p;
	switch (r->bal) {
		case -1 : (*q)->bal = 0;
				p->bal = 1;
				break;
		case  1 : (*q)->bal = -1;
				p->bal =  0;
				break;
		case  0 : (*q)->bal = p->bal = 0;
				break;

	}
	r->bal = 0;
	*q = r;
}

void bal_der (struct AVL *q,struct AVL **t,int *terminar)
{
	switch (q->bal) {
		case  1 : q->bal = 0;
			  break;
		case -1 : *t = q->der;
			  switch ( (*t)->bal) {
					case 1 : dr_izquierda(q,t);
						 break;
					case -1: r_izquierda (q,*t);
						 break;
					case 0 : q->der = (*t)->izq;
						 (*t)->izq = q;
						 (*t)->bal = 1;
						 *terminar = 1;
						 break;
			  }
			  break;
		case  0 : q->bal = -1;
			  *terminar = 1;
			  break;
	}
}

void bal_izq (struct AVL *q,struct AVL **t,int *terminar)
{
	switch (q->bal) {
		case -1 : q->bal = 0;
			  break;
		case  1 : *t = q->izq;
			  switch ( (*t)->bal) {
			  case  1: r_derecha (q,*t);
				   break;
			  case -1: dr_derecha (q,t);
				   break;
			  case 0 : q->izq = (*t)->der;
				   (*t)->der = q;
				   (*t)->bal = -1;
				   *terminar = 1;
				   break;
			  }
			  break;
		case  0 : q->bal = 1;
			  *terminar = 1;
			  break;
	}
}


struct AVL *crear_nodo (int n)
{
	struct AVL *nuevo;

	nuevo = AVL_arbol;
	nuevo->info = n;
	nuevo->bal = 0;
	nuevo->izq = NULL;
	nuevo->der = NULL;
	return (nuevo);
}

int ins_avl (struct AVL **raiz,int n)
{
	struct AVL *nuevo,*p,*q,*s,*pivote,*pp;
	int llave,altura;

	nuevo = crear_nodo(n);
	if (*raiz == NULL) {
		*raiz = nuevo;
		return (1);  /* el arbol tiene un solo nodo */
	}
	pp = q = NULL;
	pivote = p = *raiz;
	llave = nuevo->info;
	while (p != NULL) {
		if (p->bal) {
			pp = q;
			pivote = p;
		}
		if (llave == p->info) {
			free (nuevo);
			return (2); /* ya existe */
		}
		else {
				q = p;
				if (llave < p->info)
					p = p->izq;
				else p = p->der;
			}
	}
	if (llave < q->info)
		q->izq = nuevo;
	else q->der = nuevo;
	if (llave < pivote->info) {
		s = pivote->izq;
		altura  = 1;
	}
	else {
			s = pivote->der;
			altura = -1;
		}
	p = s;
	while (p != nuevo) 
		if (llave < p->info) {
			p->bal = 1;
			p = p->izq;
		}
		else {
				p->bal = -1;
				p = p->der;
			}
	if (pivote->bal == 0)
		pivote->bal = altura;
	else if (pivote->bal + altura == 0)
			pivote->bal = 0;
		else {
				if (altura == 1)
					if (s->bal == 1)
						r_derecha (pivote,s);
					else dr_derecha (pivote,&s);
				else if (s->bal == -1)
						r_izquierda (pivote,s);
					else dr_izquierda (pivote,&s);
				if (pp == NULL)
					*raiz = s;
				else if (pp->izq == pivote)
						pp->izq = s;
					else pp->der = s;
		}
		return 0;
}
int lea()
{
	char l[10];

	gets(l);
	return (atoi(l));
}
int retirar_avl (struct AVL **raiz,int n)
 /* retira un nodo de un arbol avl  */
/* manteniendo esta propiedad */
{
	struct LIFO pila;
	void init_pila (struct LIFO *p);
	int pila_vacia (struct LIFO *p);
	void ins_pila (struct LIFO *p, struct AVL *s);
	void retira_pila (struct LIFO *p,struct AVL **s);
	struct AVL *p,*q,*t,*r;
	int encontro,llave,terminar,accion;

	if (*raiz == NULL) {
		cout<<"arbol vacio\n";
		return (1);
	}
	init_pila (&pila);
	encontro = terminar = 0;
	p = *raiz;
	while (!encontro && p != NULL) 
    {
		ins_pila (&pila,p);
		if (n < p->info)
			p = p->izq;
		else if (n > p->info)
			p = p->der;
		else encontro = 1;
	}
	if (!encontro) {
		cout<<"no existe en el arbol\n";
		return (2);
	}
	t = NULL;
	retira_pila (&pila,&p);
	llave = p->info;
	if (p->izq == NULL && p->der == NULL)
		accion = 0;
	else if (p->der == NULL)
		accion = 1;
	else if (p->izq == NULL)
		accion = 2;
	else accion = 3;
	if (accion == 0 || accion == 1 || accion == 2) {
		if (!pila_vacia (&pila) ) {
			retira_pila (&pila,&q);
			if (llave < q->info) {
				switch (accion) {
				   case 0:
				   case 1: q->izq = p->izq;
					   bal_der (q,&t,&terminar);
						break;
					case 2: q->izq = p->der;
						bal_der (q,&t,&terminar);
					   break;
				}
			}
			else {
				switch (accion) {
				   case 0:
				   case 2: q->der = p->der;
					   bal_izq (q,&t,&terminar);
					   break;
				   case 1: q->der = p->izq;
					   bal_izq (q,&t,&terminar);
					   break;
				}
			}
		}
		else switch (accion) {
			case 0 : *raiz = NULL;
				 terminar = 1;
				 break;
			case 1 : *raiz = p->izq;
				 break;
			case 2 : *raiz = p->der;
				 break;
		     }
	}
	else {
			ins_pila (&pila,p);
			r = p; p = r->der;
			q = NULL;
			while (p->izq != NULL)  {
				ins_pila (&pila,p);
				q = p;
				p = p->izq;       
			}
			llave = r->info = p->info;
			if (q != NULL) {
				q->izq =p ->der;
				bal_der (q,&t,&terminar);
			}
			else {
				r->der = p->der;
				bal_izq (r,&t,&terminar);
			}
			retira_pila (&pila,&q);
	}
	free (p);
	while (!pila_vacia (&pila)  && !terminar) {
		retira_pila (&pila,&q);
		if (llave < q->info) {
			if (t != NULL)  {
				q->izq = t;
				t = NULL;
			}
			bal_der (q,&t,&terminar);
		}
		else {
				if (t != NULL)  {
					q->der = t;
					t = NULL;
				}
				bal_izq (q,&t,&terminar);
			}
	}
	if (t != NULL)
		if (pila_vacia (&pila) )
			*raiz = t;
		else {
			retira_pila (&pila,&q);
			if (llave < q->info)
			     q->izq = t;
			else q->der = t;
		}
      return 0;
}

void init_pila (struct LIFO *p)
{
	p->t = 0;
}

int pila_vacia (struct LIFO *p)
{
	return (!p->t);
}

void ins_pila (struct LIFO *p, struct AVL *s)
{
	if (p->t == MAXIMO)
		cout<<"la pila no soporta mas elementos\n";
	else  {
			p->t++;
			p->a [p->t -1] = s;
	}
}

void retira_pila (struct LIFO *p,struct AVL **s)
{
     if (pila_vacia (p) )  {
		cout<<"la pila esta vacia\n";
		*s = NULL;
	  }
	else  {
			*s = p->a [p->t -1];
			p->t--;
	}
}
