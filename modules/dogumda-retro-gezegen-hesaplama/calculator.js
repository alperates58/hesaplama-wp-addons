function hcDogumdaRetroHesapla() {
    const birthDate = document.getElementById('hc-br-birth').value;
    const birthTime = document.getElementById('hc-br-time').value;

    if (!birthDate || !birthTime) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const date = new Date(birthDate + 'T' + birthTime);
    const dateNext = new Date(date.getTime() + 86400000);

    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    
    function getPlanetPos(n) {
        let Ls = (280.460 + 0.9856474 * n) % 360;
        let gs = (357.528 + 0.9856003 * n) % 360;
        let sunL = Ls + 1.915 * Math.sin(gs * Math.PI / 180);

        return {
            mer: (sunL + ( ( (252.250 + 4.0923344 * n) - sunL + 180) % 360 - 180 ) ) % 360,
            ven: (sunL + ( ( (181.979 + 1.6021302 * n) - sunL + 180) % 360 - 180 ) ) % 360,
            mar: (355.453 + 0.5240248 * n + 10.70 * Math.sin((19.387 + 0.5240208 * n) * Math.PI / 180)) % 360,
            jup: (34.404 + 0.0830853 * n + 5.55 * Math.sin((19.388 + 0.0830853 * n) * Math.PI / 180)) % 360,
            sat: (49.944 + 0.0334597 * n + 6.39 * Math.sin((316.967 + 0.0334442 * n) * Math.PI / 180)) % 360,
            ura: (313.232 + 0.0117258 * n + 0.52 * Math.sin((142.956 + 0.0117258 * n) * Math.PI / 180)) % 360,
            nep: (304.880 + 0.0059735 * n + 0.23 * Math.sin((260.247 + 0.0059735 * n) * Math.PI / 180)) % 360,
            plu: (238.928 + 0.0039755 * n + 0.17 * Math.sin((14.882 + 0.0039755 * n) * Math.PI / 180)) % 360
        };
    }

    const pos1 = getPlanetPos(getJD(date) - 2451545.0);
    const pos2 = getPlanetPos(getJD(dateNext) - 2451545.0);

    const planetData = {
        mer: { name: 'Merkür', desc: 'Zihinsel enerjiyi içe döndürür, derinlemesine düşünme ve özgün ifade yeteneği verir.' },
        ven: { name: 'Venüs', desc: 'Sevgi ve değer anlayışını içselleştirir, ilişkilerde özgünlük ve kendini sorgulama getirir.' },
        mar: { name: 'Mars', desc: 'Enerjiyi ve öfkeyi içe yöneltir, dolaylı eylem tarzı ve büyük bir içsel güç verir.' },
        jup: { name: 'Jüpiter', desc: 'İnançları ve şans algısını içselleştirir, derin bir ruhsal bilgelik ve etik anlayış sağlar.' },
        sat: { name: 'Satürn', desc: 'Sorumluluk ve disiplini içten gelen bir dürtüyle sağlar, mükemmeliyetçilik ve iç disiplin verir.' },
        ura: { name: 'Uranüs', desc: 'Bireysel özgürlüğü çok derin ve içsel bir boyutta yaşatır, toplumsal normlara içten karşı çıkış.' },
        nep: { name: 'Neptün', desc: 'Hayal gücünü ve ruhsallığı çok yoğun bir içsel deneyim haline getirir, mistik derinlik verir.' },
        plu: { name: 'Plüton', desc: 'Dönüşüm ve güç ihtiyacını içselleştirir, psikolojik derinlik ve direnç kazandırır.' }
    };

    let retrosFound = [];
    Object.keys(planetData).forEach(id => {
        let diff = pos2[id] - pos1[id];
        if (diff < -180) diff += 360;
        if (diff > 180) diff -= 360;
        if (diff < 0) retrosFound.push(id);
    });

    let summaryHtml = retrosFound.length > 0 
        ? `Haritanızda <strong>${retrosFound.length}</strong> adet retro gezegen bulundu.`
        : `Haritanızda hiç retro gezegen bulunmuyor. Tüm gezegenleriniz ileri hareketli!`;

    let detailsHtml = "";
    retrosFound.forEach(id => {
        detailsHtml += `<div class="hc-br-item">
            <strong>${planetData[id].name} Retro:</strong> ${planetData[id].desc}
        </div>`;
    });

    document.getElementById('hc-br-summary').innerHTML = summaryHtml;
    document.getElementById('hc-br-details').innerHTML = detailsHtml;
    document.getElementById('hc-birth-retro-result').classList.add('visible');
}
