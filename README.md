# calculator

Calculadora web con interfaz en HTML/CSS/JavaScript y procesamiento de la expresión en PHP.

## 1. Descripción

El usuario construye la operación con los botones de la calculadora; al presionar `=`, la expresión se envía por `POST` al servidor PHP, que la valida, la calcula y devuelve el resultado en la misma página.

## 2. Características

- Operaciones aritméticas básicas con paréntesis y decimales.
- Interfaz centrada con **flexbox** y botones en **grid**.
- Validación en el servidor: solo se aceptan dígitos, `+ - * / . ( )`.
- Manejo de errores con `try/catch`.
- Estilos con CSS propio y Bootstrap 5.

## 3. Tecnologías

- PHP · HTML · CSS · JavaScript
- Bootstrap 5

## 4. Requisitos

- PHP 7.4 o superior (o XAMPP/WAMP)

## 5. Uso

Con el servidor integrado de PHP:

```bash
php -S localhost:8000
```

Abre `http://localhost:8000/index.php`.

## 6. Flujo cliente–servidor

1. JavaScript guarda la expresión en una variable y actualiza la pantalla (programación funcional, sin clases).
2. Al pulsar `=`, el formulario envía el campo `expresion` por `POST`.
3. PHP valida la expresión con una expresión regular, la evalúa y devuelve el resultado.

El archivo `preguntas.txt` contiene las respuestas de la actividad sobre este flujo.

## 7. Estructura

```
calculator/
├── index.php        # Interfaz y lógica en PHP
├── estilo.css
└── preguntas.txt    # Preguntas y respuestas de la práctica
```

## 8. Nota

El resultado se calcula con `eval()` tras validar la expresión con una lista blanca de caracteres. Para un entorno de producción conviene reemplazarlo por un evaluador de expresiones dedicado.
