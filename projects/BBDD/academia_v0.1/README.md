# Introducción

Se solicita el diseño de una aplicación web para asignar las tutorías de profesores en academias o colegios. Esta aplicación se realizará a medida y en exclusiva para el cliente (#nombrecliente). 

La academia contará con un panel de administración para dar de alta los profesores y asignar las correspondientes materias que estarán capacitados para realizar las tutorías de los alumnos. Desde este panel se podrán crear nuevas materias para poder asignárselas a los profesores al darles de alta.

# Funcionalidades

En este apartado podemos encontrar una explicación no técnica sobre cuales serán las funcionalidades.

La aplicación cuenta con:

- *Acceso privado para las academias*: los permisos se asignaran mediante ficheros del sistema, ya que no necesitamos identificar a diferentes academias.
- *Acceso privado para los alumnos*: Para facilidad de los alumnos la identificación la realizaremos mediante cookies para mantener el acceso durante un periodo de tiempo más largo.
- *Acceso privado para los profesores*: tendrá el mismo tipo de acceso que los alumnos.


## 1. Creación de la base de datos

Explicación de las entidades(tablas)

## Tablas principales

**Profesores**
- Los profesores unicamente pertenecen a una academia.
- Pueden pueden dar una o varias asignaturas.
- Constará los siguientes datos:
  - *ID*:int(10)
  - Nombre*:char(150)
  - *Teléfono*:ini(11)
  - *Mail*:char(250)
  - *Password*:char(25)
 
**Alumnos**
  - Esta tabla contiene la información sobre los alumnos
  - Constará de los siguientes datos:
    - *ID*:int(10)
    - Nombre*:char(150)
    - *Teléfono*:ini(11)
    - *Mail*:char(250)
    - *Password*:char(25)

**Materias**
  - La tabla contendrá las diferentes categorías de materias disponibles.
  - Constará de los siguientes datos:
    - *ID*:int(10)
    - *Materia*:char(100) -> nombre de la materia de la que pueden dar las tutorías los profesores.

**Horarios**
- Esta tabla guarda los horarios que los profesores están disponibles.
- Constará de los siguientes datos:
  - *ID*:int(10)
  - *Fecha*:(date): la fecha en la que estará disponible 
  - *Hora*:int(2) -> dato entero de dos cifras, sera la hora que esta disponible el profesor, por ejemplo a las 16.
  - *ID_Profesor*:int(10) -> es el id del profesor.

  Esta tabla no puede tener en una misma fecha y hora el mismo id de profesor, por lo que tenemos que que hacer los datos únicos(los 3 a la vez[fecha,hora,id_profesor]).

## Tablas pivote

Las tablas pivote son necesarias para unir las tablas nombradas por su nombre.

**profesores_materias**
Esta tabla nos sirve para poder asignar diferentes materias acada profesor.

Constara de los siguientes datos:
- *ID*:int(10)
- *id_profesor*:int(10) -> identificador referente al id del profesor.
- *id_materia*: int(10) -> identificador de la materia.

**horarios_alumnos**
La tabla se utilizara para relacionar los horarios que los alumnos van a seleccionar, también contiene la información sobre el estado de la solucitud  y un comentario.

Constará de los siguientes datos:
- *ID*:int(10)
- *id_horario*:int(10) -> identificardor de la hora dispoble de la tabla de horarios, 
- *id_alumno*:int(10)
- *estado*:tiny(1)
- *id_materia*:int(10)
- *comentario*:char(255)

