function hcRüzgarDüzeltmeAçısıHesapla() {
    const course = parseFloat(document.getElementById('hc-wca-course').value);
    const tas = parseFloat(document.getElementById('hc-wca-tas').value);
    const wDir = parseFloat(document.getElementById('hc-wca-wdir').value);
    const wSpeed = parseFloat(document.getElementById('hc-wca-wspeed').value);

    if (isNaN(course) || isNaN(tas) || isNaN(wDir) || isNaN(wSpeed) || tas <= 0 || wSpeed < 0) {
        alert('Lütfen geçerli rota, hız ve rüzgar değerleri giriniz.');
        return;
    }

    // Dereceyi radyana dönüştürelim
    const trkRad = course * (Math.PI / 180);
    const wdirRad = wDir * (Math.PI / 180);

    // Rüzgar açısı farkı
    const angleDiff = wdirRad - trkRad;

    // Yan rüzgar ve kafa rüzgarı bileşenleri
    const crosswind = wSpeed * Math.sin(angleDiff);
    const headwind = wSpeed * Math.cos(angleDiff);

    // WCA = arcsin(crosswind / TAS)
    const sinWca = crosswind / tas;

    if (Math.abs(sinWca) > 1) {
        alert('Rüzgar hızı uçağın uçuş hızına göre aşırı yüksek! Uçuş emniyetli değildir, WCA hesaplanamıyor.');
        return;
    }

    const wcaRad = Math.asin(sinWca);
    const wcaDeg = wcaRad * (180 / Math.PI);

    // Heading = Course + WCA
    let heading = course + wcaDeg;
    if (heading < 0) heading += 360;
    if (heading > 360) heading -= 360;

    // Ground Speed: GS = TAS * cos(WCA) - headwind
    const gs = tas * Math.cos(wcaRad) - headwind;

    // Yorum
    let crossLabel = Math.abs(crosswind).toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' ' + (crosswind > 0 ? '(Sağdan)' : '(Soldan)');
    let headLabel = '';
    if (headwind > 0) {
        headLabel = Math.abs(headwind).toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' (Kafa Rüzgarı - Yavaşlatır)';
    } else {
        headLabel = Math.abs(headwind).toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' (Kuyruk Rüzgarı - Hızlandırır)';
    }

    document.getElementById('hc-wca-val').innerText = (wcaDeg > 0 ? '+' : '') + wcaDeg.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + '°';
    document.getElementById('hc-wca-hdg-val').innerText = Math.round(heading) + '°';
    document.getElementById('hc-wca-gs-val').innerText = gs.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-wca-cross-val').innerText = crossLabel;
    document.getElementById('hc-wca-head-val').innerText = headLabel;

    document.getElementById('hc-ruzgar-duzeltme-acisi-result').classList.add('visible');
}
