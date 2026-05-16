function hcAyDugumuHesapla() {
    const dateStr = document.getElementById('hc-node-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    function getNodePos(d) {
        function getJD(date) { return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5; }
        const jd = getJD(d);
        const T = (jd - 2451545.0) / 36525;
        // Mean Node
        let omega = (125.0445 - 1934.1363 * T + 0.002078 * T * T) % 360;
        if (omega < 0) omega += 360;
        return omega;
    }

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    function getSign(deg) { return signs[Math.floor(deg / 30)]; }

    let current = new Date(dateStr + 'T12:00:00');
    let northDeg = getNodePos(current);
    let southDeg = (northDeg + 180) % 360;

    document.getElementById('hc-node-north').innerText = getSign(northDeg);
    document.getElementById('hc-node-south').innerText = getSign(southDeg);

    document.getElementById('hc-node-desc').innerText = `Kuzey Ay Düğümü (KAD) ruhun bu yaşamda gitmesi gereken yönü, gelişim alanlarını ve kadersel amacı temsil ederken; Güney Ay Düğümü (GAD) geçmiş yaşam kalıplarını, konfor alanını ve geride bırakılması gereken alışkanlıkları temsil eder. KAD'ınız ${getSign(northDeg)} burcunda olduğu için bu hayat yolculuğunda ${getSign(northDeg)} özelliklerini öğrenmeniz ve geliştirmeniz beklenir.`;

    document.getElementById('hc-moon-node-result').classList.add('visible');
}
