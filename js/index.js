const InsertData = () => {
    document.getElementById("logo").innerHTML = `${config["sitio"][0]}  <small>${config["sitio"][1]}<small>  ${config["sitio"][2]}`;
    document.getElementById("saludo").innerHTML = `${config["saludo"]} Jorge Contreras`;
    document.getElementById("copyright").innerHTML = `${config["copyRight"]}`;
}
InsertData();

const LeerListado = () => {
    try {

        const listadoSise = listado.length;


        for (let i = 0; i < listadoSise; i++) {

            const section = document.createElement("section");

            section.className = "containerPerfil";

            const img = document.createElement("img");

            img.id = i;

            img.src = `./${listado[i]["imagen"]}`;

            const linkUsuario = document.createElement("a");

            linkUsuario.textContent = listado[i]["nombre"];

            section.appendChild(img);

            section.appendChild(linkUsuario);

            containerListadoEstudiantes.appendChild(section);

            img.addEventListener('error', (event) => {

                event.target.src = photoDefault;

            });
        }

    } catch (error) {
        console.log("ERROR!!!!!!!!!!!!", error);
    }

}