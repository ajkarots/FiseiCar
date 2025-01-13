const boxProvincias = document.getElementById('boxProvincias');
const boxCiudades = document.getElementById('boxCiudades');

boxProvincias.addEventListener('change', e => {
            const valor = boxProvincias.value;
            switch (valor) {
                case "Azuay":
                    boxCiudades.innerHTML=`
            <option value="Cuenca">Cuenca</option>
            <option value="Gualaceo">Gualaceo</option>
            <option value="Paute">Paute</option>
            <option value="Sígsig">Sígsig</option>
            <option value="Nabón">Nabón</option>
            <option value="Chordeleg">Chordeleg</option>
            <option value="Girón">Girón</option>
            <option value="Santa Isabel">Santa Isabel</option>
            <option value="Camilo Ponce Enríquez">Camilo Ponce Enríquez</option>
            <option value="Oña">Oña</option>
            <option value="Sevilla de Oro">Sevilla de Oro</option>
            <option value="San Fernando">San Fernando</option>`;
            break;
        case "Bolívar":
            boxCiudades.innerHTML=`
            <option value="Guaranda">Guaranda</option>
            <option value="San Miguel">San Miguel</option>
            <option value="Chillanes">Chillanes</option>
            <option value="Chimbo">Chimbo</option>
            <option value="Caluma">Caluma</option>
            <option value="Echeandía">Echeandía</option>
            <option value="Las Naves">Las Naves</option>`;
            break;
        case "Cañar":
            boxCiudades.innerHTML=`
            <option value="Azogues">Azogues</option>
            <option value="Cañar">Cañar</option>
            <option value="La Troncal">La Troncal</option>
            <option value="El Tambo">El Tambo</option>
            <option value="Suscal">Suscal</option>
            <option value="Biblián">Biblián</option>
            <option value="Déleg">Déleg</option>`;
            break;
        case "Carchi":
            boxCiudades.innerHTML=`            <option value="Tulcán">Tulcán</option>
            <option value="San Gabriel">San Gabriel</option>
            <option value="El Ángel">El Ángel</option>
            <option value="Mira">Mira</option>
            <option value="Bolívar">Bolívar</option>
            <option value="Montúfar">Montúfar</option>
            <option value="Huaca">Huaca</option>`;
            break;
        case "Chimborazo":
            boxCiudades.innerHTML=`            <option value="Riobamba">Riobamba</option>
            <option value="Guano">Guano</option>
            <option value="Colta">Colta</option>
            <option value="Chanchán">Chanchán</option>
            <option value="Alausí">Alausí</option>
            <option value="Macas">Macas</option>
            <option value="Chimborazo">Chimborazo</option>`;
            break;
        case "Cotopaxi":
            boxCiudades.innerHTML=`            <option value="Latacunga">Latacunga</option>
            <option value="Pujilí">Pujilí</option>
            <option value="Salcedo">Salcedo</option>
            <option value="La Maná">La Maná</option>
            <option value="Sigchos">Sigchos</option>
            <option value="Rumiñahui">Rumiñahui</option>`;
            break;
        case "El Oro":
            boxCiudades.innerHTML=`
            <option value="Machala">Machala</option>
            <option value="Pasaje">Pasaje</option>
            <option value="Santa Rosa">Santa Rosa</option>
            <option value="Arenillas">Arenillas</option>
            <option value="Piñas">Piñas</option>
            <option value="Zaruma">Zaruma</option>
            <option value="Portovelo">Portovelo</option>
            <option value="Balsas">Balsas</option>
            <option value="Chilla">Chilla</option>
            <option value="Huaquillas">Huaquillas</option>`;
            break;
        case "Esmeraldas":
            boxCiudades.innerHTML=`
            <option value="Esmeraldas">Esmeraldas</option>
            <option value="Atacames">Atacames</option>
            <option value="Quinindé">Quinindé</option>
            <option value="Muisne">Muisne</option>
            <option value="Río Verde">Río Verde</option>
            <option value="Tonchigüe">Tonchigüe</option>
            <option value="San Lorenzo">San Lorenzo</option>
            `;
            break;
        case "Galápagos":
            boxCiudades.innerHTML=`            <option value="Puerto Ayora">Puerto Ayora</option>
            <option value="Puerto Baquerizo Moreno">Puerto Baquerizo Moreno</option>
            <option value="Puerto Villamil">Puerto Villamil</option>
            <option value="Santa Cruz">Santa Cruz</option>
            <option value="San Cristóbal">San Cristóbal</option>
            <option value="Isabela">Isabela</option>
            <option value="Floreana">Floreana</option>
            <option value="Genovesa">Genovesa</option>`;
            break;
        case "Guayas":
            boxCiudades.innerHTML=`
            <option value="Guayaquil">Guayaquil</option>
            <option value="Durán">Durán</option>
            <option value="Samborondón">Samborondón</option>
            <option value="Daule">Daule</option>
            <option value="Milagro">Milagro</option>
            <option value="Baba">Baba</option>
            <option value="Naranjal">Naranjal</option>
            <option value="Playas">Playas</option>
            <option value="General Villamil">General Villamil</option>
            <option value="Balzar">Balzar</option>
            <option value="Salitre">Salitre</option>`;
            break;
        case "Imbabura":
            boxCiudades.innerHTML=`            <option value="Ibarra">Ibarra</option>
            <option value="Otavalo">Otavalo</option>
            <option value="Cotacachi">Cotacachi</option>
            <option value="Antonio Ante">Antonio Ante</option>
            <option value="La Esperanza">La Esperanza</option>
            <option value="Urcuquí">Urcuquí</option>
            <option value="Pimampiro">Pimampiro</option>`;
            break;
        case "Loja":
            boxCiudades.innerHTML=`            <option value="Loja">Loja</option>
            <option value="Catamayo">Catamayo</option>
            <option value="Cariamanga">Cariamanga</option>
            <option value="Zumbi">Zumbi</option>
            <option value="Macará">Macará</option>
            <option value="Paltas">Paltas</option>
            <option value="Sozoranga">Sozoranga</option>
            <option value="Cazaderos">Cazaderos</option>`;
            break;
        case "Los Ríos":
            boxCiudades.innerHTML=`            <option value="Babahoyo">Babahoyo</option>
            <option value="Quevedo">Quevedo</option>
            <option value="Ventanas">Ventanas</option>
            <option value="Montalvo">Montalvo</option>
            <option value="Buena Fe">Buena Fe</option>
            <option value="Valencia">Valencia</option>
            <option value="Palestina">Palestina</option>
            <option value="Puebloviejo">Puebloviejo</option>`;
            break;
        case "Manabí":
            boxCiudades.innerHTML=`            <option value="Portoviejo">Portoviejo</option>
            <option value="Manta">Manta</option>
            <option value="Chone">Chone</option>
            <option value="Bahía de Caráquez">Bahía de Caráquez</option>
            <option value="Jipijapa">Jipijapa</option>
            <option value="El Carmen">El Carmen</option>
            <option value="Pedernales">Pedernales</option>
            <option value="Montecristi">Montecristi</option>
            <option value="Rocafuerte">Rocafuerte</option>
            <option value="24 de Mayo">24 de Mayo</option>
            <option value="Junín">Junín</option>`;
            break;
        case "Morona Santiago":
            boxCiudades.innerHTML=`            <option value="Macas">Macas</option>
            <option value="Gualaquiza">Gualaquiza</option>
            <option value="Sucúa">Sucúa</option>
            <option value="Palora">Palora</option>
            <option value="Huamboya">Huamboya</option>
            <option value="Limon Indanza">Limon Indanza</option>
            <option value="Yantzaza">Yantzaza</option>
            <option value="Zumbi">Zumbi</option>`;
            break;
        case "Napo":
            boxCiudades.innerHTML=`            <option value="Tena">Tena</option>
            <option value="Archidona">Archidona</option>
            <option value="El Chaco">El Chaco</option>
            <option value="Quito Nuevo">Quito Nuevo</option>
            <option value="Ahuano">Ahuano</option>
            <option value="Pano">Pano</option>
            <option value="Cascales">Cascales</option>`;
            break;
        case "Orellana":
            boxCiudades.innerHTML=`            <option value="Coca">Coca</option>
            <option value="Loreto">Loreto</option>
            <option value="Joya de los Sachas">Joya de los Sachas</option>
            <option value="El Chaco">El Chaco</option>
            <option value="Francisco de Orellana">Francisco de Orellana</option>
            <option value="La Joya de los Sachas">La Joya de los Sachas</option>
            <option value="Sacha">Sacha</option>`;
            break;
        case "Pastaza":
            boxCiudades.innerHTML=`            <option value="Puyo">Puyo</option>
            <option value="Mera">Mera</option>
            <option value="Arajuno">Arajuno</option>
            <option value="El Triunfo">El Triunfo</option>
            <option value="Santa Clara">Santa Clara</option>
            <option value="Pastaza">Pastaza</option>`;
            break;
        case "Pichincha":
            boxCiudades.innerHTML=`         <option value="Quito">Quito</option>
            <option value="Cayambe">Cayambe</option>
            <option value="Sangolquí">Sangolquí</option>
            <option value="Rumiñahui">Rumiñahui</option>
            <option value="Mejía">Mejía</option>
            <option value="Puerto Quito">Puerto Quito</option>
            <option value="Valle de los Chillos">Valle de los Chillos</option>`;
            break;
        case "Santa Elena":
            boxCiudades.innerHTML=`            
            <option value="Santa Elena">Santa Elena</option>
            <option value="Salinas">Salinas</option>
            <option value="La Libertad">La Libertad</option>
            <option value="Manglaralto">Manglaralto</option>
            <option value="Anconcito">Anconcito</option>`;
            break;
        case "Santo Domingo":
            boxCiudades.innerHTML=`
            <option value="Santo Domingo">Santo Domingo</option>
            <option value="La Concordia">La Concordia</option>
            <option value="El Carmen">El Carmen</option>
            <option value="Bajos de Montecristi">Bajos de Montecristi</option>
            <option value="Santo Domingo de los Tsáchilas">Santo Domingo de los Tsáchilas</option>`;
            break;
        case "Sucumbíos":
            boxCiudades.innerHTML=`<option value="Nueva Loja">Nueva Loja</option>
            <option value="Shushufindi">Shushufindi</option>
            <option value="Cuyabeno">Cuyabeno</option>
            <option value="Sucumbíos">Sucumbíos</option>
            <option value="Gonzalo Pizarro">Gonzalo Pizarro</option>`;
            break;
        case "Tungurahua":
            boxCiudades.innerHTML=` <option value="Ambato">Ambato</option>
            <option value="Baños">Baños</option>
            <option value="Pelileo">Pelileo</option>
            <option value="Cevallos">Cevallos</option>
            <option value="Patate">Patate</option>
            <option value="Tisaleo">Tisaleo</option>
            <option value="Mocha">Mocha</option>`;
            break;
        case "Zamora Chinchipe":
            boxCiudades.innerHTML=`<option value="Zamora">Zamora</option>
            <option value="Yantzaza">Yantzaza</option>
            <option value="El Pangui">El Pangui</option>
            <option value="Loja">Loja</option>
            <option value="Chinchipe">Chinchipe</option>
            <option value="Centinela del Cóndor">Centinela del Cóndor</option>
            <option value="Canganú">Canganú</option>`;
            break;
        default:
            mensaje = "Provincia no encontrada. Por favor, ingrese una provincia válida.";


            }});