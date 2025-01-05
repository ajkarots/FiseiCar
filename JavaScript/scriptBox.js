        const box_marcas = document.getElementById('box_marcas');
        const box_modelos = document.getElementById('box_modelos');
        document.getElementById('formulario_editar_vehiculo').addEventListener('submit', function(event) {
            let campo1 = document.getElementById('descripcion_editar').value;
            let campo2 = document.getElementById('img_editar').value;
            let campo3 = document.getElementById('caballos_editar').value;
            let campo4 = document.getElementById('precio_editar').value;

            if (campo1 === '' || campo2 === '' || campo3 === '' || campo4 === '') {
                event.preventDefault(); // Evita el envío del formulario
                alert('Por favor, completa todos los campos.');
            }
        });
        box_marcas.addEventListener('change', e => {
            const valor = box_marcas.value;
            switch (valor) {
                case 'toyota':
                    box_modelos.innerHTML = `<option value="aygo">Toyota Aygo</option>
                    <option value="yaris">Toyota Yaris</option>
                    <option value="yaris-cross">Toyota Yaris Cross</option>
                    <option value="corolla">Toyota Corolla</option>
                    <option value="corolla-touring-sport">Toyota Corolla Touring Sport</option>
                    <option value="chr">Toyota C-HR</option>
                    <option value="rav4">Toyota RAV4</option>
                    <option value="rav4-plug-in">Toyota RAV4 Plug-in Hybrid</option>
                    <option value="prius">Toyota Prius</option>
                    <option value="prius-plug-in">Toyota Prius Plug-in</option>
                    <option value="land-cruiser">Toyota Land Cruiser</option>
                    <option value="land-cruiser-70">Toyota Land Cruiser 70</option>
                    <option value="hilux">Toyota Hilux</option>
                    <option value="supra">Toyota Supra</option>
                    <option value="mirai">Toyota Mirai (eléctrico de pila de hidrógeno)</option>
                    <option value="bZ4X">Toyota bZ4X (eléctrico)</option>
                    <option value="proace">Toyota Proace</option>
                    <option value="proace-city">Toyota Proace City</option>
                    <option value="camry">Toyota Camry</option>
                    <option value="avensis">Toyota Avensis</option>
                    <option value="prius-c">Toyota Prius C</option>
                    <option value="tundra">Toyota Tundra</option>
                    <option value="sequoia">Toyota Sequoia</option>
                    <option value="sienna">Toyota Sienna</option>
                    <option value="vios">Toyota Vios</option>
                    <option value="fortuner">Toyota Fortuner</option>
                    <option value="proace-ev">Toyota Proace EV (eléctrico)</option>`;
                    break;
                case 'ford':
                    box_modelos.innerHTML = `  <option value="fiesta">Ford Fiesta</option>
                    <option value="focus">Ford Focus</option>
                    <option value="mustang">Ford Mustang</option>
                    <option value="mondeo">Ford Mondeo</option>
                    <option value="fusion">Ford Fusion</option>
                    <option value="ka">Ford Ka</option>
                    <option value="c-max">Ford C-Max</option>
                    <option value="s-max">Ford S-Max</option>
                    <option value="galaxy">Ford Galaxy</option>
                    <option value="ecosport">Ford EcoSport</option>
                    <option value="kuga">Ford Kuga</option>
                    <option value="edge">Ford Edge</option>
                    <option value="explorer">Ford Explorer</option>
                    <option value="expedition">Ford Expedition</option>
                    <option value="f-150">Ford F-150</option>
                    <option value="f-250">Ford F-250</option>
                    <option value="f-350">Ford F-350</option>
                    <option value="f-450">Ford F-450</option>
                    <option value="ranger">Ford Ranger</option>
                    <option value="bronco">Ford Bronco</option>
                    <option value="puma">Ford Puma</option>
                    <option value="focus-ev">Ford Focus Electric</option>
                    <option value="mustang-mach-e">Ford Mustang Mach-E (eléctrico)</option>
                    <option value="b-max">Ford B-Max</option>
                    <option value="tourneo-custom">Ford Tourneo Custom</option>
                    <option value="tourneo-connect">Ford Tourneo Connect</option>
                    <option value="gt">Ford GT</option>
                    <option value="maverick">Ford Maverick</option>
                    <option value="fairlane">Ford Fairlane</option>
                    <option value="zephyr">Ford Zephyr</option>`;
                    break;
                case 'chevrolet':
                    box_modelos.innerHTML=` <option value="spark">Chevrolet Spark</option>
                    <option value="aveo">Chevrolet Aveo</option>
                    <option value="sonic">Chevrolet Sonic</option>
                    <option value="malibu">Chevrolet Malibu</option>
                    <option value="impala">Chevrolet Impala</option>
                    <option value="cruze">Chevrolet Cruze</option>
                    <option value="trax">Chevrolet Trax</option>
                    <option value="captiva">Chevrolet Captiva</option>
                    <option value="equinox">Chevrolet Equinox</option>
                    <option value="blazer">Chevrolet Blazer</option>
                    <option value="traverse">Chevrolet Traverse</option>
                    <option value="Tahoe">Chevrolet Tahoe</option>
                    <option value="suburban">Chevrolet Suburban</option>
                    <option value="colorado">Chevrolet Colorado</option>
                    <option value="silverado-1500">Chevrolet Silverado 1500</option>
                    <option value="silverado-2500">Chevrolet Silverado 2500</option>
                    <option value="silverado-3500">Chevrolet Silverado 3500</option>
                    <option value="bolts">Chevrolet Bolt EV (eléctrico)</option>
                    <option value="blazer-ev">Chevrolet Blazer EV (eléctrico)</option>
                    <option value="camaro">Chevrolet Camaro</option>
                    <option value="corvette">Chevrolet Corvette</option>
                    <option value="malibu-hybrid">Chevrolet Malibu Hybrid</option>
                    <option value="trailblazer">Chevrolet Trailblazer</option>
                    <option value="monza">Chevrolet Monza</option>
                    <option value="sonic-ev">Chevrolet Sonic EV (eléctrico)</option>
                    <option value="niva">Chevrolet Niva</option>
                    <option value="spark-ev">Chevrolet Spark EV (eléctrico)</option>`;
                    break;
                case 'honda':
                    box_modelos.innerHTML=`  <option value="fit">Honda Fit</option>
                    <option value="civic">Honda Civic</option>
                    <option value="accord">Honda Accord</option>
                    <option value="insight">Honda Insight</option>
                    <option value="clarity">Honda Clarity</option>
                    <option value="cr-v">Honda CR-V</option>
                    <option value="hr-v">Honda HR-V</option>
                    <option value="pilot">Honda Pilot</option>
                    <option value="passport">Honda Passport</option>
                    <option value="odyssey">Honda Odyssey</option>
                    <option value="ridgeline">Honda Ridgeline</option>
                    <option value="honda-e">Honda e (eléctrico)</option>
                    <option value="element">Honda Element</option>
                    <option value="crider">Honda Crider</option>
                    <option value="accord-hybrid">Honda Accord Hybrid</option>
                    <option value="cr-v-hybrid">Honda CR-V Hybrid</option>
                    <option value="pilot-hybrid">Honda Pilot Hybrid</option>
                    <option value="jazz">Honda Jazz</option>
                    <option value="crosstour">Honda Crosstour</option>
                    <option value="urban">Honda Urban</option>
                    <option value="br-v">Honda BR-V</option>
                    <option value="mobilio">Honda Mobilio</option>
                    <option value="brio">Honda Brio</option>
                    <option value="n-one">Honda N-One</option>
                    <option value="s660">Honda S660</option>
                    <option value="acura-mdx">Acura MDX (marca premium de Honda)</option>
                    <option value="acura-rdx">Acura RDX (marca premium de Honda)</option>`;
                    break;
                case 'bmw':
                    box_modelos.innerHTML=`  <option value="serie-1">BMW Serie 1</option>
                    <option value="serie-2">BMW Serie 2</option>
                    <option value="serie-3">BMW Serie 3</option>
                    <option value="serie-4">BMW Serie 4</option>
                    <option value="serie-5">BMW Serie 5</option>
                    <option value="serie-6">BMW Serie 6</option>
                    <option value="serie-7">BMW Serie 7</option>
                    <option value="serie-8">BMW Serie 8</option>
                    <option value="m3">BMW M3</option>
                    <option value="m4">BMW M4</option>
                    <option value="m5">BMW M5</option>
                    <option value="m8">BMW M8</option>
                    <option value="x1">BMW X1</option>
                    <option value="x2">BMW X2</option>
                    <option value="x3">BMW X3</option>
                    <option value="x4">BMW X4</option>
                    <option value="x5">BMW X5</option>
                    <option value="x6">BMW X6</option>
                    <option value="x7">BMW X7</option>
                    <option value="x8">BMW X8</option>
                    <option value="z4">BMW Z4</option>
                    <option value="i3">BMW i3 (eléctrico)</option>
                    <option value="i4">BMW i4 (eléctrico)</option>
                    <option value="i8">BMW i8 (híbrido)</option>
                    <option value="iX">BMW iX (eléctrico)</option>
                    <option value="iX3">BMW iX3 (eléctrico)</option>
                    <option value="serie-2-active-tourer">BMW Serie 2 Active Tourer</option>
                    <option value="serie-3-touring">BMW Serie 3 Touring</option>
                    <option value="serie-4-gran-coupé">BMW Serie 4 Gran Coupé</option>
                    <option value="serie-5-touring">BMW Serie 5 Touring</option>
                    <option value="serie-6-gran-turismo">BMW Serie 6 Gran Turismo</option>
                    <option value="serie-7-luxury">BMW Serie 7 Luxury</option>
                    <option value="m2">BMW M2</option>
                    <option value="m6">BMW M6</option>
                    <option value="bmw-alpina-b7">BMW Alpina B7</option>
                    <option value="bmw-alpina-b8">BMW Alpina B8</option>
                    <option value="bmw-4-series-gran-coupe">BMW 4 Series Gran Coupe</option>
                    <option value="bmw-x5-m">BMW X5 M</option>
                    <option value="bmw-x6-m">BMW X6 M</option>
                    <option value="bmw-x7-m">BMW X7 M</option>`;
                    break;
                case 'audi':
                    box_modelos.innerHTML=`  <option value="a1">Audi A1</option>
                    <option value="a3">Audi A3</option>
                    <option value="a4">Audi A4</option>
                    <option value="a5">Audi A5</option>
                    <option value="a6">Audi A6</option>
                    <option value="a7">Audi A7</option>
                    <option value="a8">Audi A8</option>
                    <option value="q2">Audi Q2</option>
                    <option value="q3">Audi Q3</option>
                    <option value="q4-e-tron">Audi Q4 e-tron (eléctrico)</option>
                    <option value="q5">Audi Q5</option>
                    <option value="q7">Audi Q7</option>
                    <option value="q8">Audi Q8</option>
                    <option value="tt">Audi TT</option>
                    <option value="r8">Audi R8</option>
                    <option value="rs3">Audi RS3</option>
                    <option value="rs4">Audi RS4</option>
                    <option value="rs5">Audi RS5</option>
                    <option value="rs7">Audi RS7</option>
                    <option value="rsq3">Audi RS Q3</option>
                    <option value="rsq8">Audi RS Q8</option>
                    <option value="s3">Audi S3</option>
                    <option value="s4">Audi S4</option>
                    <option value="s5">Audi S5</option>
                    <option value="s6">Audi S6</option>
                    <option value="s7">Audi S7</option>
                    <option value="s8">Audi S8</option>
                    <option value="e-tron">Audi e-tron (eléctrico)</option>
                    <option value="e-tron-gt">Audi e-tron GT (eléctrico)</option>
                    <option value="e-tron-sportback">Audi e-tron Sportback (eléctrico)</option>
                    <option value="a1-sportback">Audi A1 Sportback</option>
                    <option value="a3-sportback">Audi A3 Sportback</option>
                    <option value="a4-allroad">Audi A4 Allroad</option>
                    <option value="a6-allroad">Audi A6 Allroad</option>
                    <option value="q3-sportback">Audi Q3 Sportback</option>
                    <option value="q5-sportback">Audi Q5 Sportback</option>
                    <option value="q7-sportback">Audi Q7 Sportback</option>
                    <option value="q8-sportback">Audi Q8 Sportback</option>
                    <option value="a6-avant">Audi A6 Avant</option>
                    <option value="a7-avant">Audi A7 Avant</option>
                    <option value="a8-avant">Audi A8 Avant</option>
                    <option value="q5-hybrid">Audi Q5 Hybrid</option>
                    <option value="q7-hybrid">Audi Q7 Hybrid</option>
                    <option value="a3-hybrid">Audi A3 Hybrid</option>
                    <option value="a6-hybrid">Audi A6 Hybrid</option>`;
                    break;
                case 'mercedes':
                    box_modelos.innerHTML=`  <option value="a-klasse">Mercedes-Benz A-Class</option>
                    <option value="b-klasse">Mercedes-Benz B-Class</option>
                    <option value="c-klasse">Mercedes-Benz C-Class</option>
                    <option value="e-klasse">Mercedes-Benz E-Class</option>
                    <option value="s-klasse">Mercedes-Benz S-Class</option>
                    <option value="cls-klasse">Mercedes-Benz CLS-Class</option>
                    <option value="cl-klasse">Mercedes-Benz CL-Class</option>
                    <option value="gla">Mercedes-Benz GLA</option>
                    <option value="glb">Mercedes-Benz GLB</option>
                    <option value="glc">Mercedes-Benz GLC</option>
                    <option value="gld">Mercedes-Benz GLD</option>
                    <option value="gle">Mercedes-Benz GLE</option>
                    <option value="gls">Mercedes-Benz GLS</option>
                    <option value="g-class">Mercedes-Benz G-Class</option>
                    <option value="cla">Mercedes-Benz CLA</option>
                    <option value="slk">Mercedes-Benz SLK</option>
                    <option value="sl">Mercedes-Benz SL</option>
                    <option value="sls-amg">Mercedes-Benz SLS AMG</option>
                    <option value="amg-gt">Mercedes-Benz AMG GT</option>
                    <option value="eqa">Mercedes-Benz EQA (eléctrico)</option>
                    <option value="eqb">Mercedes-Benz EQB (eléctrico)</option>
                    <option value="eqc">Mercedes-Benz EQC (eléctrico)</option>
                    <option value="eqs">Mercedes-Benz EQS (eléctrico)</option>
                    <option value="eqv">Mercedes-Benz EQV (eléctrico)</option>
                    <option value="s-class-coupe">Mercedes-Benz S-Class Coupe</option>
                    <option value="maybach-s-class">Mercedes-Maybach S-Class</option>
                    <option value="maybach-gls">Mercedes-Maybach GLS</option>
                    <option value="smart-eq">Smart EQ (eléctrico, parte de Mercedes)</option>
                    <option value="vito">Mercedes-Benz Vito</option>
                    <option value="v-class">Mercedes-Benz V-Class</option>
                    <option value="x-class">Mercedes-Benz X-Class (camioneta)</option>
                    <option value="citan">Mercedes-Benz Citan</option>
                    <option value="mercedes-benz-v-klasse">Mercedes-Benz V-Klasse</option>`;
                    break;
                case 'volkswagen':
                    box_modelos.innerHTML=`<option value="up">Volkswagen Up!</option>
                    <option value="polo">Volkswagen Polo</option>
                    <option value="golf">Volkswagen Golf</option>
                    <option value="jetta">Volkswagen Jetta</option>
                    <option value="arteon">Volkswagen Arteon</option>
                    <option value="passat">Volkswagen Passat</option>
                    <option value="t-roc">Volkswagen T-Roc</option>
                    <option value="tiguan">Volkswagen Tiguan</option>
                    <option value="touareg">Volkswagen Touareg</option>
                    <option value="id.3">Volkswagen ID.3 (eléctrico)</option>
                    <option value="id.4">Volkswagen ID.4 (eléctrico)</option>
                    <option value="id.5">Volkswagen ID.5 (eléctrico)</option>
                    <option value="id.buzz">Volkswagen ID. Buzz (eléctrico)</option>
                    <option value="polo-gti">Volkswagen Polo GTI</option>
                    <option value="golf-gti">Volkswagen Golf GTI</option>
                    <option value="golf-r">Volkswagen Golf R</option>
                    <option value="gti-arteon">Volkswagen Arteon R</option>
                    <option value="tiguan-r">Volkswagen Tiguan R</option>
                    <option value="touareg-r">Volkswagen Touareg R</option>
                    <option value="sharan">Volkswagen Sharan</option>
                    <option value="caravelle">Volkswagen Caravelle</option>
                    <option value="caddy">Volkswagen Caddy</option>
                    <option value="amarok">Volkswagen Amarok</option>
                    <option value="volkswagen-id.4-xtreme">Volkswagen ID.4 Xtreme (eléctrico)</option>
                    <option value="virtus">Volkswagen Virtus</option>
                    <option value="polo-van">Volkswagen Polo Van</option>
                    <option value="caddy-cargo">Volkswagen Caddy Cargo</option>
                    <option value="california">Volkswagen California</option>
                    <option value="crafter">Volkswagen Crafter</option>`;
                    break;
                case 'nissan':
                    box_modelos.innerHTML = ` <option value="micra">Nissan Micra</option>
                    <option value="juke">Nissan Juke</option>
                    <option value="leaf">Nissan Leaf (eléctrico)</option>
                    <option value="altima">Nissan Altima</option>
                    <option value="maxima">Nissan Maxima</option>
                    <option value="sentra">Nissan Sentra</option>
                    <option value="370z">Nissan 370Z</option>
                    <option value="gt-r">Nissan GT-R</option>
                    <option value="versa">Nissan Versa</option>
                    <option value="x-trail">Nissan X-Trail</option>
                    <option value="rogue">Nissan Rogue</option>
                    <option value="murano">Nissan Murano</option>
                    <option value="pathfinder">Nissan Pathfinder</option>
                    <option value="frontier">Nissan Frontier</option>
                    <option value="titan">Nissan Titan</option>
                    <option value="armada">Nissan Armada</option>
                    <option value="navara">Nissan Navara</option>
                    <option value="nv200">Nissan NV200</option>
                    <option value="nv350">Nissan NV350</option>
                    <option value="leaf-plus">Nissan Leaf Plus (eléctrico)</option>
                    <option value="e-nv200">Nissan e-NV200 (eléctrico)</option>
                    <option value="gt-r-nismo">Nissan GT-R Nismo</option>
                    <option value="juke-nismo">Nissan Juke Nismo</option>
                    <option value="armada-platinum">Nissan Armada Platinum</option>
                    <option value="nissan-z">Nissan Z</option>`;
                    break;
                case 'kia':
                    box_modelos.innerHTML=`  <option value="picanto">Kia Picanto</option>
                    <option value="rio">Kia Rio</option>
                    <option value="ceed">Kia Ceed</option>
                    <option value="stinger">Kia Stinger</option>
                    <option value="soul">Kia Soul</option>
                    <option value="niro">Kia Niro</option>
                    <option value="seltos">Kia Seltos</option>
                    <option value="sportage">Kia Sportage</option>
                    <option value="telluride">Kia Telluride</option>
                    <option value="carnival">Kia Carnival</option>
                    <option value="xceed">Kia Xceed</option>
                    <option value="ev6">Kia EV6 (eléctrico)</option>
                    <option value="e-niro">Kia e-Niro (eléctrico)</option>
                    <option value="stinger-gt">Kia Stinger GT</option>
                    <option value="kia-xceed-phev">Kia Xceed PHEV (híbrido enchufable)</option>
                    <option value="sorento">Kia Sorento</option>
                    <option value="sorento-hybrid">Kia Sorento Hybrid</option>
                    <option value="sorento-phev">Kia Sorento PHEV (híbrido enchufable)</option>
                    <option value="picanto-electric">Kia Picanto Electric (eléctrico)</option>
                    <option value="stonic">Kia Stonic</option>
                    <option value="sportage-hybrid">Kia Sportage Hybrid</option>
                    <option value="sportage-phev">Kia Sportage PHEV (híbrido enchufable)</option>`;
                    break;
                case 'mazda':
                    box_modelos.innerHTML=`  <option value="mazda2">Mazda2</option>
                    <option value="mazda3">Mazda3</option>
                    <option value="mazda6">Mazda6</option>
                    <option value="mx-5-miata">Mazda MX-5 Miata</option>
                    <option value="mazda-cx-3">Mazda CX-3</option>
                    <option value="mazda-cx-30">Mazda CX-30</option>
                    <option value="mazda-cx-5">Mazda CX-5</option>
                    <option value="mazda-cx-50">Mazda CX-50</option>
                    <option value="mazda-cx-9">Mazda CX-9</option>
                    <option value="mazda-cx-8">Mazda CX-8</option>
                    <option value="mazda-3-hatchback">Mazda3 Hatchback</option>
                    <option value="mazda-3-sedan">Mazda3 Sedan</option>
                    <option value="mazda-6-sedan">Mazda6 Sedan</option>
                    <option value="mazda-mx-30">Mazda MX-30 (eléctrico)</option>
                    <option value="mazda-cx-5-hybrid">Mazda CX-5 Hybrid</option>
                    <option value="mazda-cx-50-hybrid">Mazda CX-50 Hybrid</option>
                    <option value="mazda-mazda3-phev">Mazda3 PHEV (híbrido enchufable)</option>
                    <option value="mazda-mazda6-phev">Mazda6 PHEV (híbrido enchufable)</option>
                    <option value="mazda-bt-50">Mazda BT-50 (pickup)</option>`;
                    break;
                case 'hyundai':
                    box_modelos.innerHTML=`  <option value="i10">Hyundai i10</option>
                    <option value="i20">Hyundai i20</option>
                    <option value="i30">Hyundai i30</option>
                    <option value="elantra">Hyundai Elantra</option>
                    <option value="sonata">Hyundai Sonata</option>
                    <option value="tucson">Hyundai Tucson</option>
                    <option value="santa-fe">Hyundai Santa Fe</option>
                    <option value="palisade">Hyundai Palisade</option>
                    <option value="kona">Hyundai Kona</option>
                    <option value="venue">Hyundai Venue</option>
                    <option value="ioniq">Hyundai Ioniq (eléctrico)</option>
                    <option value="ioniq-5">Hyundai Ioniq 5 (eléctrico)</option>
                    <option value="ioniq-6">Hyundai Ioniq 6 (eléctrico)</option>
                    <option value="veloster">Hyundai Veloster</option>
                    <option value="accent">Hyundai Accent</option>
                    <option value="genesis">Hyundai Genesis</option>
                    <option value="genesis-g80">Hyundai Genesis G80</option>
                    <option value="genesis-g90">Hyundai Genesis G90</option>
                    <option value="nexo">Hyundai Nexo (hidrógeno)</option>
                    <option value="kona-electric">Hyundai Kona Electric (eléctrico)</option>
                    <option value="tucson-hybrid">Hyundai Tucson Hybrid</option>
                    <option value="tucson-phev">Hyundai Tucson PHEV (híbrido enchufable)</option>
                    <option value="santa-fe-hybrid">Hyundai Santa Fe Hybrid</option>
                    <option value="santa-fe-phev">Hyundai Santa Fe PHEV (híbrido enchufable)</option>
                    <option value="veloster-n">Hyundai Veloster N</option>
                    <option value="staria">Hyundai Staria</option>
                    <option value="staria-elite">Hyundai Staria Elite</option>
                    <option value="nexo-fuel-cell">Hyundai Nexo Fuel Cell (hidrógeno)</option>
                    <option value="creta">Hyundai Creta</option>
                    <option value="santro">Hyundai Santro</option>
                    <option value="tucson-2022">Hyundai Tucson 2022</option>`;
                    break;
                case 'jeep':
                    box_modelos.innerHTML=`  <option value="cherokee">Jeep Cherokee</option>
                    <option value="compass">Jeep Compass</option>
                    <option value="grand-cherokee">Jeep Grand Cherokee</option>
                    <option value="renegade">Jeep Renegade</option>
                    <option value="wrangler">Jeep Wrangler</option>
                    <option value="wagoneer">Jeep Wagoneer</option>
                    <option value="grand-wagoneer">Jeep Grand Wagoneer</option>
                    <option value="gladiator">Jeep Gladiator</option>
                    <option value="cherokee-trailhawk">Jeep Cherokee Trailhawk</option>
                    <option value="compass-trailhawk">Jeep Compass Trailhawk</option>
                    <option value="grand-cherokee-trailhawk">Jeep Grand Cherokee Trailhawk</option>
                    <option value="wrangler-rubicon">Jeep Wrangler Rubicon</option>
                    <option value="wrangler-4xe">Jeep Wrangler 4xe (híbrido enchufable)</option>
                    <option value="grand-cherokee-4xe">Jeep Grand Cherokee 4xe (híbrido enchufable)</option>
                    <option value="renegade-4xe">Jeep Renegade 4xe (híbrido enchufable)</option>
                    <option value="cherokee-limited">Jeep Cherokee Limited</option>
                    <option value="compass-limited">Jeep Compass Limited</option>
                    <option value="grand-cherokee-limited">Jeep Grand Cherokee Limited</option>
                    <option value="wagoneer-series-ii">Jeep Wagoneer Series II</option>
                    <option value="wagoneer-series-iii">Jeep Wagoneer Series III</option>
                    <option value="grand-wagoneer-series-ii">Jeep Grand Wagoneer Series II</option>
                    <option value="grand-wagoneer-series-iii">Jeep Grand Wagoneer Series III</option>
                    <option value="gladiator-rubicon">Jeep Gladiator Rubicon</option>
                    <option value="wrangler-jl">Jeep Wrangler JL</option>
                    <option value="gladiator-sport">Jeep Gladiator Sport</option>
                    <option value="renegade-limited">Jeep Renegade Limited</option>
                    <option value="wrangler-sahara">Jeep Wrangler Sahara</option>
                    <option value="cherokee-overland">Jeep Cherokee Overland</option>
                    <option value="grand-cherokee-overland">Jeep Grand Cherokee Overland</option>
                    <option value="wrangler-sport">Jeep Wrangler Sport</option>
                    <option value="renegade-sport">Jeep Renegade Sport</option>`;
                    break;
                case 'subaru':
                    box_modelos.innerHTML=`  <option value="impreza">Subaru Impreza</option>
                    <option value="outback">Subaru Outback</option>
                    <option value="legacy">Subaru Legacy</option>
                    <option value="crosstrek">Subaru Crosstrek</option>
                    <option value="forester">Subaru Forester</option>
                    <option value="ascent">Subaru Ascent</option>
                    <option value="wrx">Subaru WRX</option>
                    <option value="wrx-sti">Subaru WRX STI</option>
                    <option value="brz">Subaru BRZ</option>
                    <option value="solterra">Subaru Solterra (eléctrico)</option>
                    <option value="outback-hybrid">Subaru Outback Hybrid</option>
                    <option value="crosstrek-hybrid">Subaru Crosstrek Hybrid</option>
                    <option value="forester-hybrid">Subaru Forester Hybrid</option>
                    <option value="ascent-hybrid">Subaru Ascent Hybrid</option>
                    <option value="impreza-sport">Subaru Impreza Sport</option>
                    <option value="legacy-sport">Subaru Legacy Sport</option>
                    <option value="forester-sport">Subaru Forester Sport</option>
                    <option value="ascent-premium">Subaru Ascent Premium</option>
                    <option value="crosstrek-premium">Subaru Crosstrek Premium</option>
                    <option value="outback-premium">Subaru Outback Premium</option>
                    <option value="wrx-premium">Subaru WRX Premium</option>
                    <option value="impreza-limited">Subaru Impreza Limited</option>
                    <option value="legacy-limited">Subaru Legacy Limited</option>
                    <option value="forester-limited">Subaru Forester Limited</option>
                    <option value="outback-limited">Subaru Outback Limited</option>
                    <option value="ascent-limited">Subaru Ascent Limited</option>
                    <option value="wrx-limited">Subaru WRX Limited</option>
                    <option value="brz-premium">Subaru BRZ Premium</option>
                    <option value="wrx-sport">Subaru WRX Sport</option>
                    <option value="ascent-touring">Subaru Ascent Touring</option>
                    <option value="outback-touring">Subaru Outback Touring</option>
                    <option value="forester-touring">Subaru Forester Touring</option>
                    <option value="crosstrek-touring">Subaru Crosstrek Touring</option>
                    <option value="solterra-touring">Subaru Solterra Touring (eléctrico)</option>
                    <option value="brz-touring">Subaru BRZ Touring</option>`;
                    break;
                case 'peugeot':
                    box_modelos.innerHTML = `<option value="108">Peugeot 108</option><option value="208">Peugeot 208</option>
                    <option value="2008">Peugeot 2008</option>
                    <option value="3008">Peugeot 3008</option>
                    <option value="5008">Peugeot 5008</option>
                    <option value="508">Peugeot 508</option>
                    <option value="307">Peugeot 307</option>
                    <option value="308">Peugeot 308</option>
                    <option value="407">Peugeot 407</option>
                    <option value="508SW">Peugeot 508 SW</option>
                    <option value="208-hybrid">Peugeot 208 Hybrid</option>
                    <option value="3008-hybrid">Peugeot 3008 Hybrid</option>
                    <option value="508-hybrid">Peugeot 508 Hybrid</option>
                    <option value="e-208">Peugeot e-208 (eléctrico)</option>
                    <option value="e-2008">Peugeot e-2008 (eléctrico)</option>
                    <option value="partner">Peugeot Partner</option>
                    <option value="expert">Peugeot Expert</option>
                    <option value="boxer">Peugeot Boxer</option>
                    <option value="rcz">Peugeot RCZ</option>
                    <option value="208-gt">Peugeot 208 GT</option>
                    <option value="3008-gt">Peugeot 3008 GT</option>
                    <option value="508-gt">Peugeot 508 GT</option>
                    <option value="207">Peugeot 207</option>
                    <option value="607">Peugeot 607</option>
                    <option value="406">Peugeot 406</option>
                    <option value="206">Peugeot 206</option>
                    <option value="bipper">Peugeot Bipper</option>
                    <option value="satellis">Peugeot Satellis</option>
                    <option value="vibrance">Peugeot Vibrance</option>`;
                    break;
                case 'suzuki':
                    box_modelos.innerHTML=`    <option value="swift">Suzuki Swift</option>
                    <option value="vitara">Suzuki Vitara</option>
                    <option value="s-cross">Suzuki S-Cross</option>
                    <option value="jimny">Suzuki Jimny</option>
                    <option value="ertiga">Suzuki Ertiga</option>
                    <option value="baleno">Suzuki Baleno</option>
                    <option value="ignis">Suzuki Ignis</option>
                    <option value="celerio">Suzuki Celerio</option>
                    <option value="alto">Suzuki Alto</option>`;
                    break;
                default:
                    // Acción si no se encuentra ninguna marca válida
                    break;
            }
        });