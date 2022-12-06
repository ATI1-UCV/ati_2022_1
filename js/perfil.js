async function load(obj) {
	const response = await fetch('data/24105182/perfil.json');
	const mydata = await response.json();
	//console.log(obj);
	//console.log(mydata);

	//var mydata = JSON.parse(perfil);
	//var obj = JSON.parse(config);
	//var mydata = perfil;
	//var obj = config;

	document.getElementById("logo").innerHTML =  obj.sitio[0]+ '<small>'+ obj.sitio[1]+ '</small> '+ obj.sitio[2];
	document.getElementById("saludo").innerHTML =  obj.saludo+ ", "+ mydata.nombre;
	document.getElementById("inicio").innerHTML =  obj.home;
	
	document.getElementById("imagen").src = 'data/24105182/'+ mydata.imagen;
	document.getElementById("nombre").innerHTML = mydata.nombre;
	document.getElementById("descripción").innerHTML = mydata.descripción;
	document.getElementById("color").innerHTML = obj.color+ " " + mydata.color;
	document.getElementById("libro").innerHTML = obj.libro+ " " + mydata.libro;
	document.getElementById("música").innerHTML =obj.música+ " " +mydata.música;

	let i = 0
	let list= mydata.video_juego;
	let string= list[i];
	i=i+1;
	while (i < list.length) {
		string= string+", " + list[i]
		i=i+1
	}
	document.getElementById("video_juego").innerHTML = obj.video_juego + " " + string;

	i = 0
	list= mydata.lenguajes;
	string= list[i];
	i=i+1
	while (i < list.length) {
		string= string+", " + list[i]
		i=i+1
	}
	document.getElementById("lenguajes").innerHTML = obj.lenguajes+ " " + string;



	//document.getElementById("como_comunicarse").innerHTML = obj.como_comunicarse + document.getElementById("como_comunicarse").innerHTML;

	let text = obj.email;
	const myArray = text.split("[email]");

	document.getElementById("como_comunicarse").insertAdjacentHTML('afterbegin', myArray[0]);

	var com = document.getElementById("como_comunicarse").getElementsByClassName("email");
	com[0].href= mydata.email;
	com[0].innerHTML= mydata.email;


	document.getElementById("como_comunicarse").insertAdjacentHTML('beforeend', myArray[1]);


	document.getElementById("copyRight").innerHTML =obj.copyRight;


	//copyRight
	

}

