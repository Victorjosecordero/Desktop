document.addEventListener("DOMContentLoaded",()=>{
    const toma =new XMLHttpRequest();
    toma.open("GET","data/mascotas.json");

    toma.send();
    toma.responseType="json";
    toma.addEventListener("load",()=>{
        if (toma.readyState == 4 && toma.status == 200) {
        const datos=toma.response;
        console.log(datos);
        }else{
            console.log("Hubo un error");
        }
    })


})