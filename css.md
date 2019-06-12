# CSS


```css
body{
    background-color: #000000;
}
section{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    width: 80%;
    margin: auto;
    background-color: #FFFFFF;
}
section article{
    width: 50%;
    padding: 30px;
    box-sizing: border-box;
    border-bottom: 1px solid #000000;
}

section article:nth-child(-n+2){
    border-top: 1px solid #000000;
}
section article:nth-child(even){
    border-left: 1px solid #000000;
}
section article img{
    width: 80%;
    margin: auto;
    display: block;
}



@media screen and (max-width:640px) {
    section{
        width: 98%;
    }    
    section article{
        width: 100%;
    }
    section article{
        border: 0px;
    }
    section article:nth-child(even){
        border-left: none;
    }   
    section article:nth-child(-n+2){
        border-top: none;
    }
}
```

Clase para elminar la flotabilidad, es necesario despues de utilizar elmentos con float.

```css
.borrar{
    float:none;
    clear:both;

}
```